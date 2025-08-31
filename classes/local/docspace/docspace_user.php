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
 * Define docspace user class
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\docspace;

use mod_onlyofficedocspace\local\docspace\enums\docspace_user_type;

/**
 * DocSpace user class
 */
class docspace_user {
    /**
     * Password hash
     * @var string
     */
    public string $passwordhash;
    /**
     * DocSpace user type
     * @var docspace_user_type
     */
    public docspace_user_type $type;

    /**
     * __construct
     *
     * @param string $email
     * @param string $firstname
     * @param string $lastname
     * @param bool $isroomadmin
     * @return void
     */
    public function __construct(
        /**
         * @var string $email
         */
        public string $email,
        /**
         * @var string $firstname
         */
        public string $firstname,
        /**
         * @var string $lastname
         */
        public string $lastname,
        /**
         * @var bool $isroomadmin
         */
        public bool $isroomadmin,
    ) {
    }

    /**
     * Create a class instance from an array
     * @param array $data
     * @return docspace_user
     */
    public static function from_array(array $data): self {
        return new self(
            $data['email'],
            $data['firstName'],
            $data['lastName'],
            $data['isRoomAdmin'],
        );
    }
}
