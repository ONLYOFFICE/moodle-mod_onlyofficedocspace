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
 * Define docspace user manager class
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\docspace;

use core\http_client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\RequestException;
use mod_onlyofficedocspace\local\docspace\enums\docspace_user_type;
use mod_onlyofficedocspace\local\errors\docspace_error;

/**
 * Docspace user manager class
 */
class docspace_user_manager {

    /**
     * Docspace user manager class constructor
     * @param string $url
     * @param string $token
     * @return void
     */
    public function __construct(
        /**
         * @var string $url
         */
        private string $url,

        /**
         * @var string $token
         */
        private string $token
    ) {
    }

    /**
     * Invite user to docspace
     * @param string $email
     * @param string $password
     * @param string $firstname
     * @param string $lastname
     * @param docspace_user_type $type
     * @return mixed
     */
    public function invite(string $email, string $password, string $firstname, string $lastname, docspace_user_type $type) {
        $url = "$this->url/api/2.0/people/active";

        $jar = CookieJar::fromArray([
            'asc_auth_key' => $this->token,
        ], parse_url($this->url, PHP_URL_HOST));

        $user = [
            'email'        => $email,
            'passwordHash' => $password,
            'firstname'    => $firstname,
            'lastname'     => $lastname,
            'type'         => $type->value,
        ];

        $client = new http_client();

        try {
            $response = $client->post($url, [
                'cookies' => $jar,
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'json' => $user,
            ]);

            $body = json_decode($response->getBody(), true, flags: JSON_THROW_ON_ERROR);
        } catch (RequestException) {
            throw new docspace_error(get_string('docspaceuserinviteerror', 'onlyofficedocspace', $email));
        }

        return $body['response'];
    }

    /**
     * get
     *
     * @param string $email
     * @return array | null
     */
    public function get(string $email): array | null {
        return $this->requestUser($email);
    }

    /**
     * all
     *
     * @return docspace_users_collection
     */
    public function all(): docspace_users_collection {
        return new docspace_users_collection($this->requestUsers());
    }

    /**
     * requestusers
     *
     * @return array
     */
    private function requestusers(): array {
        $url = "$this->url/api/2.0/people";

        $jar = CookieJar::fromArray([
            'asc_auth_key' => $this->token,
        ], parse_url($this->url, PHP_URL_HOST));

        $client = new http_client();

        try {
            $response = $client->get($url, [
                'cookies' => $jar,
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            $body = json_decode($response->getBody(), true, flags: JSON_THROW_ON_ERROR);
        } catch (RequestException) {
            throw new docspace_error(get_string('docspacerequestuserserror', 'onlyofficedocspace'));
        }

        return $body['response'];
    }

    /**
     * requestuser
     *
     * @param string $email
     * @return array | null
     */
    private function requestuser(string $email): array|null {
        $url = "$this->url/api/2.0/people/email?email=$email";

        $jar = CookieJar::fromArray([
            'asc_auth_key' => $this->token,
        ], parse_url($this->url, PHP_URL_HOST));

        $client = new http_client();

        try {
            $response = $client->get($url, [
                'cookies' => $jar,
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            $body = json_decode($response->getBody(), true, flags: JSON_THROW_ON_ERROR);
        } catch (RequestException $e) {
            if ($e->hasResponse() && $e->getResponse()->getStatusCode() === 404) {
                return null;
            }

            throw new docspace_error(get_string('docspacerequestuserserror', 'onlyofficedocspace'));
        }

        return $body['response'];
    }
}
