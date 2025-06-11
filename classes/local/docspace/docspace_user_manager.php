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
use GuzzleHttp\Exception\RequestException;
use mod_onlyofficedocspace\local\docspace\enums\docspace_user_type;
use mod_onlyofficedocspace\local\errors\docspace_error;

/**
 * Docspace user manager class
 */
class docspace_user_manager {

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
        $url = docspace_settings::url() .  "/api/2.0/people/active";
        $apikey = docspace_settings::api_key();

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
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $apikey,
                ],
                'json' => $user,
            ]);

            $body = json_decode($response->getBody(), true, flags: JSON_THROW_ON_ERROR);
        } catch (RequestException $e) {
            $statuscode = $e->hasResponse() ? $e->getResponse()->getStatusCode() : null;

            if ($statuscode === 401 || $statuscode === 403) {
                // Unauthorized access, throw an error.
                throw new docspace_error(get_string('docspaceunauthorized', 'onlyofficedocspace'));
            }

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
        $url = docspace_settings::url() . "/api/2.0/people";
        $apikey = docspace_settings::api_key();

        $client = new http_client();

        try {
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $apikey,
                ],
            ]);

            $body = json_decode($response->getBody(), true, flags: JSON_THROW_ON_ERROR);
        } catch (RequestException $e) {
            $statuscode = $e->hasResponse() ? $e->getResponse()->getStatusCode() : null;

            if ($statuscode === 401 || $statuscode === 403) {
                // Unauthorized access, throw an error.
                throw new docspace_error(get_string('docspaceunauthorized', 'onlyofficedocspace'));
            }

            throw new docspace_error(get_string('docspacerequesterror', 'onlyofficedocspace'));
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
        $url = docspace_settings::url() . "/api/2.0/people/email?email=$email";
        $apikey = docspace_settings::api_key();

        $client = new http_client();

        try {
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $apikey,
                ],
            ]);

            $body = json_decode($response->getBody(), true, flags: JSON_THROW_ON_ERROR);
        } catch (RequestException $e) {
            $statuscode = $e->hasResponse() ? $e->getResponse()->getStatusCode() : null;
            if ($statuscode === 404) {
                // User not found, return null.
                return null;
            }

            if ($statuscode === 401 || $statuscode === 403) {
                // Unauthorized access, throw an error.
                throw new docspace_error(get_string('docspaceunauthorized', 'onlyofficedocspace'));
            }

            throw new docspace_error(get_string('docspacerequesterror', 'onlyofficedocspace'));
        }

        return $body['response'];
    }
}
