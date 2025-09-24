<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Define DocSpace client for interacting with DocSpace back-end API
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\docspace;

use core\http_client;
use GuzzleHttp\Exception\RequestException;
use JsonException;
use mod_onlyofficedocspace\local\errors\docspace_client_error;
use Psr\Http\Message\ResponseInterface;

/**
 * DocSpace client class
 */
class docspace_client {
    /**
     * __construct
     *
     * @param string $base
     * @param string $apikey
     * @return void
     */
    public function __construct(
        /**
         * @var string $base
         */
        protected string $base,
        /**
         * @var string $apitoken
         */
        protected string $apikey
    ) {
    }

    /**
     * Add a new domain to the list of allowed domains for DocSpace.
     *
     * @param string $newdomain The domain to be added.
     * @return void
     */
    public function add_domain_to_csp_list(string $newdomain): void {
        $domains = $this->fetch_csp_domains_list();

        if (!in_array($newdomain, $domains)) {
            $domains[] = $newdomain;
            $this->update_csp_domains_list($domains);
        }
    }

    /**
     * Fetches the allowed domains list from DocSpace portal.
     *
     * @return array The list of allowed domains.
     * @throws docspace_client_error If there has been an error while fetching the domains.
     */
    public function fetch_csp_domains_list(): array {
        $uri = "api/2.0/security/csp";
        $response = $this->get_json($uri);
        $domains = $response['response']['domains'] ?? [];

        return $domains;
    }

    /**
     * Updates the allowed domains list in DocSpace portal.
     *
     * @param array $domains The new list of allowed domains.
     * @return void
     * @throws docspace_client_error If there has been an error while updating the domains.
     */
    public function update_csp_domains_list(array $domains): void {
        if (empty($domains)) {
            return;
        }

        $uri = "api/2.0/security/csp";
        $data = ['domains' => $domains];

        $this->post_json($uri, $data);
    }

    /**
     * Fetch DocSpace portal settings
     *
     * @return array
     * @throws docspace_client_error
     */
    public function fetch_portal_settings(): array {
        $uri = "api/2.0/settings";

        $response = $this->get_json($uri, authenticate: false);

        return $response['response'];
    }

    /**
     * Fetch the API key info.
     *
     * @return array
     * @throws docspace_client_error
     */
    public function fetch_api_key_info(): array {
        $uri = "api/2.0/keys";

        $response = $this->get_json($uri);
        $keys = $response['response'] ?? [];

        foreach ($keys as $key) {
            if (str_ends_with($this->apikey, $key['keyPostfix'])) {
                return $key;
            }
        }

        return [];
    }

    /**
     * Fetch the API key info.
     *
     * @return array
     * @throws docspace_client_error
     */
    public function fetch_api_key_owner(): array {
        $uri = "api/2.0/people/@self";
        $response = $this->get_json($uri);

        return $response['response'] ?? [];
    }

    /**
     * Authenticate a user with DocSpace
     *
     * @param string $username
     * @param string $password
     * @return string
     * @throws docspace_client_error
     */
    public function authenticate(string $username, string $password): string {
        $uri = "api/2.0/authentication";

        $usercredentials = [
            'UserName' => $username,
            'PasswordHash' => $password,
        ];

        $response = $this->post_json($uri, $usercredentials, authenticate: false);

        return $response['response']['token'];
    }

    /**
     * Invite the user to DocSpace
     *
     * @param array $data
     * @return void
     * @throws docspace_client_error
     */
    public function invite_user(array $data) {
        $uri = "api/2.0/people";

        $user = [
            'email'        => $data['email'],
            'passwordHash' => $data['password'],
            'firstName'    => $data['firstname'],
            'lastName'     => $data['lastname'],
            'type'         => $data['type'],
            'cultureName'  => $data['language'] ?? 'en',
        ];

        $this->post_json($uri, $user);
    }

    /**
     * Fetch all users from DocSpace
     *
     * @return docspace_users_collection
     * @throws docspace_client_error
     */
    public function fetch_all_users(): docspace_users_collection {
        $users = new docspace_users_collection();
        $uri = "api/2.0/people";

        $response = $this->get_json($uri);

        foreach ($response['response'] as $user) {
            $users->add(docspace_user::from_array($user));
        }

        return $users;
    }

    /**
     * Fetch a user by email.
     *
     * @param string $email
     * @return ?docspace_user
     * @throws docspace_client_error
     */
    public function fetch_user_by_email(string $email): ?docspace_user {
        $uri = "api/2.0/people/email?email=$email";

        try {
            $response = $this->get_json($uri);
        } catch (docspace_client_error $e) {
            if ($e->get_statuscode() === 404) {
                return null;
            }
            throw $e;
        }

        return docspace_user::from_array($response['response']);
    }

    /**
     * Fetch the file info by id
     *
     * @param string $id
     * @return ?array
     * @throws docspace_client_error
     */
    public function fetch_file_info(string $id): ?array {
        $uri = "api/2.0/files/file/$id";

        try {
            $response = $this->get_json($uri);
        } catch (docspace_client_error $e) {
            if ($e->get_statuscode() === 404) {
                return null;
            }
            throw $e;
        }

        return $response['response'];
    }

    /**
     * Fetch the room info by id
     *
     * @param string $id
     * @return ?array
     * @throws docspace_client_error
     */
    public function fetch_room_info(string $id): ?array {
        $uri = "api/2.0/files/rooms/$id";

        try {
            $response = $this->get_json($uri);
        } catch (docspace_client_error $e) {
            if ($e->get_statuscode() === 404) {
                return null;
            }
            throw $e;
        }

        return $response['response'];
    }

    /**
     * Send a request to DocSpace
     * @param string $uri
     * @param string $method
     * @param array $options
     * @param bool $authenticate
     * @throws docspace_client_error
     * @return ResponseInterface
     */
    protected function send(string $uri, string $method, array $options = [], bool $authenticate = true): ResponseInterface {
        if ($authenticate) {
            $options['headers']['Authorization'] = "Bearer $this->apikey";
        }

        $client = new http_client();

        try {
            return $client->request(
                $method,
                "$this->base/$uri",
                $options,
            );
        } catch (RequestException $e) {
            debugging($e->getMessage(), DEBUG_DEVELOPER);
            $statuscode = $e->hasResponse() ? $e->getResponse()->getStatusCode() : 0;
            throw new docspace_client_error($statuscode);
        }
    }

    /**
     * Send a JSON request to DocSpace
     *
     * @param string $uri
     * @param string $method
     * @param array $body
     * @param array $headers
     * @param bool $authenticate
     * @throws docspace_client_error
     * @return array
     */
    protected function send_json(
        string $uri,
        string $method,
        array $body = [],
        array $headers = [],
        bool $authenticate = true
    ): array {
        $options['headers'] = array_merge([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ], $headers);

        if (!empty($body)) {
            $options['body'] = json_encode($body);
        }

        try {
            $response = $this->send($uri, $method, $options, $authenticate);
            $body = json_decode($response->getBody(), true, flags: JSON_THROW_ON_ERROR);
            return $body;
        } catch (JsonException $e) {
            debugging($e->getMessage(), DEBUG_DEVELOPER);
            throw new docspace_client_error(0);
        }
    }

    /**
     * Send a GET JSON request to DocSpace
     *
     * @param string $uri
     * @param array $body
     * @param array $headers
     * @param bool $authenticate
     * @return array
     * @throws docspace_client_error
     */
    protected function get_json(string $uri, array $body = [], array $headers = [], bool $authenticate = true): array {
        return $this->send_json($uri, 'get', $body, $headers, $authenticate);
    }

    /**
     * Send a POST JSON request to DocSpace
     *
     * @param string $uri
     * @param mixed $body
     * @param array $headers
     * @param bool $authenticate
     * @return array
     * @throws docspace_client_error
     */
    protected function post_json(string $uri, mixed $body = null, array $headers = [], bool $authenticate = true): array {
        return $this->send_json($uri, 'post', $body, $headers, $authenticate);
    }
}
