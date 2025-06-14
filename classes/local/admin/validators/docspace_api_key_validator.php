<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * DocSpace settings validator.
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\admin\validators;

use core\http_client;
use GuzzleHttp\Exception\RequestException;
use mod_onlyofficedocspace\local\errors\validation_error;

/**
 * DocSpace settings validator.
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class docspace_api_key_validator extends validator {

    /**
     * DocSpace URL.
     *
     * @var string
     */
    private string $url;

    /**
     * DocSpace API key.
     *
     * @var string
     */
    private string $apikey;

    /**
     * Constructor.
     *
     * @param string $url DocSpace URL
     */
    public function __construct(string $url, string $apikey) {
        $this->url = $url;
        $this->apikey = $apikey;
    }

    /**
     * Validate DocSpace settings.
     *
     * @return void
     */
    public function validate() {
        try {
            $currentapikey = $this->fetch_current_api_key();

            $this->ensure_api_key_is_valid($currentapikey);

            $permissions = $currentapikey['permissions'] ?? [];

            $this->ensure_api_key_has_permissions($permissions);

            $owner = $this->fetch_api_key_owner($this->apikey);

            $this->ensure_api_key_owner_is_admin($owner);

        } catch (validation_error $e) {
            $this->errors[] = $e->getMessage();
        }
    }

    /**
     * Fetch current api key from DocSpace.
     *
     * @return array
     */
    private function fetch_current_api_key() {
        $url = $this->url .  "/api/2.0/keys";
        $currentapikey = [];

        $client = new http_client();

        try {
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->apikey,
                ],
            ]);
            $body = json_decode($response->getBody(), true, flags: JSON_THROW_ON_ERROR);
            $keys = $body['response'] ?? [];

            foreach ($keys as $key) {
                if (str_ends_with($this->apikey, $key['keyPostfix'])) {
                    $currentapikey = $key;
                    break;
                }
            }
        } catch (RequestException $e) {
            if ($e->hasResponse() && $e->getResponse()->getStatusCode() === 401) {
                throw new validation_error(get_string('docspaceunauthorized', 'onlyofficedocspace'));
            } else {
                throw new validation_error(get_string('docspaceunreachable', 'onlyofficedocspace'));
            }
        }

        if (empty($currentapikey)) {
            throw new validation_error(get_string('docspaceapikeynotfound', 'onlyofficedocspace'));
        }

        return $currentapikey;
    }

    /**
     * Fetch the api key owner from DocSpace.
     *
     * @var string
     * @return array
     */
    private function fetch_api_key_owner(string $apikey): array {
        $url = $this->url . "/api/2.0/people/@self";
        $owner = [];

        $client = new http_client();

        try {
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $apikey,
                ],
            ]);
            $body = json_decode($response->getBody(), true, flags: JSON_THROW_ON_ERROR);
            $owner = $body['response'] ?? [];
        } catch (RequestException $e) {
            if ($e->hasResponse() && $e->getResponse()->getStatusCode() === 401) {
                throw new validation_error(get_string('docspaceunauthorized', 'onlyofficedocspace'));
            } else {
                throw new validation_error(get_string('docspaceunreachable', 'onlyofficedocspace'));
            }
        }

        if (empty($owner)) {
            throw new validation_error(get_string('docspacekeyownernotfound', 'onlyofficedocspace'));
        }

        return $owner;
    }

    /**
     * Ensure the API key is valid.
     *
     * @param string $apikey API key to validate
     * @return void
     */
    private function ensure_api_key_is_valid(array $apikey): void {
        if (empty($apikey) || $apikey['isActive'] !== true) {
            throw new validation_error(get_string('docspaceinvalidapikey', 'onlyofficedocspace'));
        }
    }

    /**
     * Ensure the API key has the required permissions.
     *
     * @param array $permissions Permissions to validate
     * @return void
     */
    private function ensure_api_key_has_permissions(array $permissions): void {
        if (empty($permissions)
            || !(in_array('accounts.self:read', $permissions, true)
                && in_array('accounts:write', $permissions, true)
                && in_array('rooms:write', $permissions, true))) {
            throw new validation_error(get_string('docspaceinvalidpermissions', 'onlyofficedocspace'));
        }
    }

    /**
     * Ensure the API key owner is DocSpace admin.
     *
     * @var array $owner owner data
     * @return void
     */
    private function ensure_api_key_owner_is_admin(array $owner): void {
        if (empty($owner) || !isset($owner['isAdmin']) || !$owner['isAdmin']) {
            throw new validation_error(get_string('docspaceapikeyownerisnotadmin', 'onlyofficedocspace'));
        }
    }
}
