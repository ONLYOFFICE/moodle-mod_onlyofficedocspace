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
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\docspace;

use mod_onlyofficedocspace\common\http_request;
use mod_onlyofficedocspace\docspace\enums\docspace_user_type;
use mod_onlyofficedocspace\errors\docspace_error;

/**
 * Docspace user manager class
 */
class docspace_user_manager {

    /**
     * Docspace user manager class constructor
     * @param string $url,
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

        $options = [
            CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=utf-8'],
            CURLOPT_COOKIE => "asc_auth_key=$this->token",
        ];

        $user = [
            'email'        => $email,
            'passwordHash' => $password,
            'firstname'    => $firstname,
            'lastname'     => $lastname,
            'type'         => $type->value,
        ];

        $data = json_encode($user);

        $response = http_request::post($url, $data, $options);

        if ($response->hasErrors()) {
            throw new docspace_error(get_string('docspaceuserinviteerror', 'onlyofficedocspace'));
        }

        $body = $response->jsonResponse();

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

        $options = [
            CURLOPT_COOKIE => "asc_auth_key=$this->token",
        ];

        $response = http_request::get($url, $options);

        if ($response->hasErrors() || $response->status() !== 200) {
            throw new docspace_error(get_string('docspacerequestuserserror', 'onlyofficedocspace'));
        }

        $body = $response->jsonResponse();

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

        $options = [
            CURLOPT_COOKIE => "asc_auth_key=$this->token",
        ];

        $response = http_request::get($url, $options);

        if ($response->hasErrors() && $response->status() !== 404) {
            throw new docspace_error(get_string('docspacerequestusererror', 'onlyofficedocspace'));
        }

        if ($response->status() === 404) {
            return null;
        }

        $body = $response->jsonResponse();

        return $body['response'];
    }
}
