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
 * Define docspace auth manager class
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\docspace;

use core\http_client;
use GuzzleHttp\Exception\RequestException;
use mod_onlyofficedocspace\local\errors\docspace_error;
use mod_onlyofficedocspace\local\errors\invalid_credentials_error;

/**
 * Docspace auth manager
 */
class docspace_auth_manager {

    /**
     * __construct
     *
     * @param string $url
     * @return void
     */
    public function __construct(
        /**
         * @var string $url
         */
        private string $url
    ) {
    }

    /**
     * authenticate
     *
     * @param string $login
     * @param string $password
     * @return string
     */
    public function authenticate(string $login, string $password): string {
        $usercredentials = [
            'UserName' => $login,
            'PasswordHash' => $password,
        ];

        $url = "$this->url/api/2.0/authentication";

        $client = new http_client();

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'json' => $usercredentials,
            ]);

            $body = json_decode($response->getBody(), true, flags: JSON_THROW_ON_ERROR);
        } catch (RequestException $e) {
            if ($e->hasResponse() && $e->getResponse()->getStatusCode() === 401) {
                throw new invalid_credentials_error();
            }

            throw new docspace_error(get_string('docspaceautherror', 'onlyofficedocspace'));
        }

        return $body['response']['token'];
    }
}
