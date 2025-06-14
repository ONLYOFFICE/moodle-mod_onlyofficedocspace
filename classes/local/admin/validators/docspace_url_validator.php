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

use mod_onlyofficedocspace\local\docspace\docspace_settings;

/**
 * DocSpace settings validator.
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class docspace_url_validator extends validator {

    /**
     * DocSpace URL.
     *
     * @var string
     */
    private string $url;

    /**
     * Constructor.
     *
     * @var string $url DocSpace url
     */
    public function __construct(string $url) {
        $this->url = $url;
    }

    /**
     * Validate DocSpace settings.
     *
     * @return void
     */
    public function validate() {
        if (docspace_settings::healthcheck() === false) {
            $this->errors[] = get_string('docspaceunreachable', 'onlyofficedocspace');
            return;
        }
    }
}
