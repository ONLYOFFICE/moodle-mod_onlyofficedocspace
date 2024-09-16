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
 * Define flas message class
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\common;

/**
 * flash_message
 */
class flash_message {

    /**
     * flash message key
     * @var string
     */
    const FLASH = 'FLASH_MESSAGES';

    /**
     * add
     * @param string $name
     * @param string $message
     * @return void
     */
    public function add(string $name, string $message): void {
        if (isset($_SESSION[self::FLASH][$name])) {
            unset($_SESSION[self::FLASH][$name]);
        }

        $_SESSION[self::FLASH][$name] = $message;
    }

    /**
     * get
     *
     * @param mixed $name
     * @return string
     */
    public function get(string $name): string | null {
        if (!isset($_SESSION[static::FLASH][$name])) {
            return null;
        }

        $message = $_SESSION[static::FLASH][$name];

        unset($_SESSION[static::FLASH][$name]);

        return $message;
    }
}
