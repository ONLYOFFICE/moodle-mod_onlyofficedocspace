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
 * DocSpace URL validator class.
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\validators;

use mod_onlyofficedocspace\local\docspace\docspace_client;
use mod_onlyofficedocspace\local\errors\docspace_client_error;

/**
 * DocSpace URL validator class.
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class docspace_url_validator extends validator {

    /**
     * Validate DocSpace URL.
     *
     * @param string $url DocSpace URL
     *
     * @return void
     */
    public function validate(string $url): bool {
        $this->errors = [];

        if (empty(trim($url))) {
            $this->errors[] = get_string('validationerror:emptyurl', 'onlyofficedocspace');
            return false;
        }

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $this->errors[] = get_string('validationerror:invalidurl', 'onlyofficedocspace');
            return false;
        }

        try {
            $docspaceclient = new docspace_client($url, '');
            $docspaceclient->fetch_portal_settings();
        } catch (docspace_client_error) {
            $this->errors[] = get_string('docspaceunreachable', 'onlyofficedocspace');
            return false;
        }

        return true;
    }
}
