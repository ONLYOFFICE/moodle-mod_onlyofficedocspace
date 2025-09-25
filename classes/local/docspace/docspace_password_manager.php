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
 * Define DocSpace password manager class
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\docspace;

/**
 * DocSpace password manager class
 */
class docspace_password_manager {
    /**
     * Default algorithm
     * @var string
     */
    const DEFAULT_ALGORITHM = 'SHA256';
    /**
     * Password length
     * @var int
     */
    const PASSWORD_LENGTH = 16;

    /**
     * Generate a random password hash
     * @param array $settings
     * @return string
     */
    public static function generate_random_password_hash(array $settings): string {
        $password = generate_password(static::PASSWORD_LENGTH);

        $key = hash_pbkdf2(
            static::DEFAULT_ALGORITHM,
            $password,
            $settings['salt'],
            $settings['iterations'],
            $settings['size'] / 8,
            true
        );

        return bin2hex($key);
    }
}
