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

use mod_onlyofficedocspace\local\docspace\docspace_client;
use mod_onlyofficedocspace\local\errors\docspace_client_error;

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
            if (empty(trim($apikey))) {
                $this->errors[] = get_string('validationerror:emptyapikey', 'onlyofficedocspace');
                return false;
            }

            $docspaceclient = new docspace_client($url, $apikey);
            $apikeyinfo = $docspaceclient->fetch_api_key_info();

            // Check if the API key is active.
            if (empty($apikeyinfo) || $apikeyinfo['isActive'] !== true) {
                $this->errors[] = get_string('validationerror:invalidapikey', 'onlyofficedocspace');
                return false;
            }

            // Check permissions.
            $permissions = $apikeyinfo['permissions'] ?? [];
            if (
                !(in_array('accounts.self:read', $permissions, true)
                    && in_array('accounts:write', $permissions, true)
                    && in_array('rooms:write', $permissions, true)
                    || empty($permissions))
            ) {
                $this->errors[] = get_string('validationerror:invalidapikey', 'onlyofficedocspace');
                return false;
            }

            // Check if the owner is admin.
            $owner = $docspaceclient->fetch_api_key_owner();
            if (empty($owner) || !isset($owner['isAdmin']) || !$owner['isAdmin']) {
                $this->errors[] = get_string('validationerror:invalidapikey', 'onlyofficedocspace');
                return false;
            }
        } catch (docspace_client_error) {
            $this->errors[] = get_string('validationerror:invalidapikey', 'onlyofficedocspace');
            return false;
        }

        return true;
    }
}
