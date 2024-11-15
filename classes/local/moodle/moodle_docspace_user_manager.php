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
 * Define a class for managing moodle docspace users
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\moodle;

/**
 * Class for managing moodle docspace users
 */
class moodle_docspace_user_manager {
    /**
     * @var $persistence persistence driver
     */
    private $persistence;
    /**
     * @var $table table name
     */
    private $table = 'onlyofficedocspace_dsuser';

    /**
     * Moodle docspace user manager constructor.
     */
    public function __construct() {
        global $DB;

        $this->persistence = $DB;
    }

    /**
     * Get a moodle docspace user by email.
     * @param string $email user email.
     * @return mixed user.
     */
    public function get(string $email): mixed {
        $user = $this->persistence->get_record($this->table, ['email' => $email]);

        if ($user === false) {
            return null;
        }

        return $user;
    }

    /**
     * Create or update a moodle docspace user.
     * @param string $email user email.
     * @param ?string $password user password hash.
     */
    public function create_or_update(string $email, ?string $password = null): void {
        $user = $this->get($email);

        if ($user === null) {
            $this->persistence->insert_record($this->table, [
                'email' => $email,
                'password' => $password,
            ]);
        } else {
            $this->persistence->update_record($this->table, [
                'id' => $user->id,
                'email' => $email,
                'password' => $password,
            ]);
        }
    }

    /**
     * Delete multiple users from database table.
     * @param array $emails user emails.
     */
    public function delete(array $emails): void {
        $this->persistence->delete_records_select(
            $this->table,
            "email IN ('" . implode("','", $emails) . "')",
            []
        );
    }

    /**
     * Delete all users from database table.
     */
    public function clear(): void {
        $this->persistence->delete_records($this->table);
    }
}
