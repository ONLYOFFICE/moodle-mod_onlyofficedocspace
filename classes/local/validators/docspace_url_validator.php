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

use core\http_client;
use Exception;

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

        if (!static::check_docspace_connectivity($url)) {
            $this->errors[] = get_string('docspaceunreachable', 'onlyofficedocspace');
            return false;
        }

        return true;
    }

    /**
     * Check DocSpace connectivity
     * @param string $url DocSpace URL
     * @return bool
     */
    private static function check_docspace_connectivity(string $url): bool {
        try {
            $client = new http_client();
            $client->head($url);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
}
