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
 * Define docspace users collection class
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\docspace;

/**
 * DocSpace users collection
 */
class docspace_users_collection {

    /**
     * Docspace users list
     * @var array
     */
    protected array $users;

    /**
     * Class contructor
     * @param array $users
     * @return void
     */
    public function __construct(array $users = []) {
        $this->users = $users;
    }

    /**
     * Add a user to the collection
     * @param docspace_user $user
     * @return void
     */
    public function add(docspace_user $user) {
        $this->users[] = $user;
    }

    /**
     * Get the user by email
     *
     * @param string $email
     * @return ?docspace_user
     */
    public function get_by_email(string $email): ?docspace_user {
        foreach ($this->users as $user) {
            if ($user->email === $email) {
                return $user;
            }
        }

        return null;
    }

    /**
     * Check if the user with the given email exists
     *
     * @param string $email
     * @return bool
     */
    public function exists(string $email): bool {
        foreach ($this->users as $user) {
            if ($user->email === $email) {
                return true;
            }
        }

        return false;
    }
}
