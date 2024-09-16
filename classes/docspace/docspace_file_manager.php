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
 * Define docspace file manager class
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\docspace;

use mod_onlyofficedocspace\common\http_request;
use mod_onlyofficedocspace\errors\docspace_error;

/**
 * DocSpace file manager
 */
class docspace_file_manager {

    /**
     * DocSpace file manager constructor
     * @param string $url
     * @param string $token
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
     * getfile
     *
     * @param int $id
     * @return array
     */
    public function getfile(int $id): array {
        $url = "$this->url/api/2.0/files/file/$id";

        $options = [
            CURLOPT_COOKIE => "asc_auth_key=$this->token",
        ];

        $response = http_request::get($url, $options);

        if ($response->hasErrors() || $response->status() !== 200) {
            throw new docspace_error(get_string('docspacefilenotfound', 'onlyofficedocspace'));
        }

        $body = $response->jsonResponse();

        return $body['response'];
    }

    /**
     * getroom
     *
     * @param int $id
     * @return array
     */
    public function getroom(int $id): array {
        $url = "$this->url/api/2.0/files/rooms/$id";

        $options = [
            CURLOPT_COOKIE => "asc_auth_key=$this->token",
        ];

        $response = http_request::get($url, $options);

        if ($response->hasErrors() || $response->status() !== 200) {
            throw new docspace_error(get_string('docspaceroomnotfound', 'onlyofficedocspace'));
        }

        $body = $response->jsonResponse();

        return $body['response'];
    }
}
