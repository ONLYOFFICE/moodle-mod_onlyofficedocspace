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
 * Define http request class
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\common;

/**
 * http request class
 */
class http_request {

    /**
     * Make head request
     * @param string $url
     * @param array $options
     *
     * @return http_response
     */
    public static function head(string $url, array $options = []): http_response {
        $options = [
            CURLOPT_NOBODY => true,
            CURLOPT_HEADER => true,
        ];

        return self::send($url, $options);
    }

    /**
     * Make get request
     * @param string $url
     * @param array $options
     *
     * @return http_response
     */
    public static function get(string $url, array $options = []): http_response {
        return self::send($url, $options);
    }

    /**
     * Make post request
     * @param string $url
     * @param mixed $data
     * @param array $options
     *
     * @return http_response
     */
    public static function post(string $url, mixed $data, array $options = []): http_response {
        $options += [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
        ];

        return self::send($url, $options);
    }

    /**
     * Send request
     * @param string $url
     * @param array $options
     *
     * @return http_response
     */
    private static function send(string $url, array $options): http_response {
        $curl = curl_init($url);
        $options[CURLOPT_RETURNTRANSFER] = true;

        foreach ($options as $option => $value) {
            curl_setopt($curl, $option, $value);
        }

        $response = curl_exec($curl);
        $error    = curl_error($curl);
        $errno    = curl_errno($curl);
        $status = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);

        curl_close($curl);

        return new http_response($response, $status, $errno, $error);
    }
}
