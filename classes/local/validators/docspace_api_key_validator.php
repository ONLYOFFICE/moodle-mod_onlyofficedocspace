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
 * DocSpace API key validator class.
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\validators;

use core\http_client;
use GuzzleHttp\Exception\RequestException;
use mod_onlyofficedocspace\local\errors\validation_error;

/**
 * DocSpace API key validator class.
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class docspace_api_key_validator extends validator {
    /**
     * Validate DocSpace API key
     *
     * @param string $url DocSpace url
     * @param string $apikey DocSpace API key
     *
     * @return bool
     */
    public function validate(string $url, string $apikey): bool {
        try {
            $this->ensure_api_key_is_present($apikey);

            $apikeyinfo = $this->fetch_api_key_info($url, $apikey);

            $this->ensure_api_key_info_is_valid($apikeyinfo);

            $permissions = $apikeyinfo['permissions'] ?? [];

            $this->ensure_api_key_has_permissions($permissions);

            $owner = $this->fetch_api_key_owner($url, $apikey);

            $this->ensure_api_key_owner_is_admin($owner);

        } catch (validation_error $e) {
            debugging($e->getMessage(), DEBUG_NORMAL);
            $this->errors[] = get_string('validationerror:invalidapikey', 'onlyofficedocspace');
            return false;
        }

        return true;
    }

    /**
     * Fetch API key info from DocSpace.
     *
     * @param string $url DocSpace url
     * @param string $apikey DocSpace API key
     *
     * @return array
     */
    private function fetch_api_key_info(string $url, string $apikey) {
        $url = "$url/api/2.0/keys";
        $currentapikey = [];

        $client = new http_client();

        try {
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $apikey,
                ],
            ]);
            $body = json_decode($response->getBody(), true, flags: JSON_THROW_ON_ERROR);
            $keys = $body['response'] ?? [];

            foreach ($keys as $key) {
                if (str_ends_with($apikey, $key['keyPostfix'])) {
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
     * Fetch the API key owner from DocSpace.
     *
     * @param string $url DocSpace url
     * @param string $apikey DocSpace API key
     *
     * @return array
     */
    private function fetch_api_key_owner(string $url, string $apikey): array {
        $url = "$url/api/2.0/people/@self";
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
     * Ensure API key is present
     *
     * @param string $apikey DocSpace API key
     *
     * @return void
     * @throws validation_error
     */
    private function ensure_api_key_is_present(string $apikey) {
        if (empty(trim($apikey))) {
            throw new validation_error('API Key cannot be empty.');
        }
    }

    /**
     * Ensure DocSpace API key is valid.
     *
     * @param array $apikey DocSPace API key
     *
     * @return void
     * @throws validation_error
     */
    private function ensure_api_key_info_is_valid(array $apikey): void {
        if (empty($apikey) || $apikey['isActive'] !== true) {
            throw new validation_error(get_string('docspaceinvalidapikey', 'onlyofficedocspace'));
        }
    }

    /**
     * Ensure DocSpace API key has the required permissions.
     *
     * @param array $permissions Permissions to validate
     *
     * @return void
     * @throws validation_error
     */
    private function ensure_api_key_has_permissions(array $permissions): void {
        if (!(in_array('accounts.self:read', $permissions, true)
                && in_array('accounts:write', $permissions, true)
                && in_array('rooms:write', $permissions, true)
                || empty($permissions))) {
            throw new validation_error(get_string('docspaceinvalidpermissions', 'onlyofficedocspace'));
        }
    }

    /**
     * Ensure DocSpace API key owner is DocSpace admin.
     *
     * @param array $owner owner data
     *
     * @return void
     * @throws validation_error
     */
    private function ensure_api_key_owner_is_admin(array $owner): void {
        if (empty($owner) || !isset($owner['isAdmin']) || !$owner['isAdmin']) {
            throw new validation_error(get_string('docspaceapikeyownerisnotadmin', 'onlyofficedocspace'));
        }
    }
}
