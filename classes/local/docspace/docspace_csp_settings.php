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
 * Define docspace CSP settings class
 *
 * @package     mod_onlyofficedocspace
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\docspace;

use core\http_client;
use GuzzleHttp\Exception\RequestException;
use mod_onlyofficedocspace\local\errors\docspace_error;

/**
 * Class for managing Content Security Policy (CSP) settings in ONLYOFFICE DocSpace.
 */
class docspace_csp_settings {

    /**
     * Adds a new domain to the list of allowed domains for DocSpace.
     *
     * @param string $newdomain The domain to be added.
     * @return void
     */
    public static function adddomain(string $newdomain): void {
        $domains = static::getdomains();

        if (!in_array($newdomain, $domains)) {
            $domains[] = $newdomain;
            static::updateDomainsList($domains);
        }
    }

    /**
     * Gets the list of allowed domains for DocSpace.
     *
     * @return array The list of allowed domains.
     * @throws docspace_error If there is an error retrieving the domains.
     */
    protected static function getdomains(): array {
        $url = docspace_settings::url() . "/api/2.0/security/csp";
        $apikey = docspace_settings::api_key();

        $client = new http_client();

        try {
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => "Bearer {$apikey}",
                ],
            ]);
            $body = json_decode($response->getBody(), true);
            $domains = $body['response']['domains'] ?? [];
            return $domains;
        } catch (RequestException $e) {
            $statuscode = $e->hasResponse() ? $e->getResponse()->getStatusCode() : null;

            if ($statuscode === 401 || $statuscode === 403) {
                // Unauthorized access, throw an error.
                throw new docspace_error(get_string('docspaceunauthorized', 'onlyofficedocspace'));
            }

            throw new docspace_error(get_string('docspacerequesterror', 'onlyofficedocspace'));
        }
    }

    /**
     * Updates the list of allowed domains for DocSpace.
     *
     * @param array $domains The new list of allowed domains.
     * @return void
     * @throws docspace_error If there is an error updating the domains.
     */
    protected static function updatedomainslist(array $domains): void {
        if (empty($domains)) {
            return;
        }

        $url = docspace_settings::url() . "/api/2.0/security/csp";
        $apikey = docspace_settings::api_key();

        $client = new http_client();
        try {
            $client->post($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => "Bearer {$apikey}",
                ],
                'json' => ['domains' => $domains],
            ]);
        } catch (RequestException $e) {
            $statuscode = $e->hasResponse() ? $e->getResponse()->getStatusCode() : null;

            if ($statuscode === 401 || $statuscode === 403) {
                // Unauthorized access, throw an error.
                throw new docspace_error(get_string('docspaceunauthorized', 'onlyofficedocspace'));
            }

            throw new docspace_error(get_string('docspacerequesterror', 'onlyofficedocspace'));
        }
    }
}
