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
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\moodle\repositories;

use dml_exception;

/**
 * Class for managing moodle docspace users
 */
class docspace_user_repository {
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
     * Get a docspace user by email.
     *
     * @param string $email
     * @return mixed user.
     */
    public function get_by_email(string $email): mixed {
        $user = $this->persistence->get_record($this->table, ['email' => $email]);

        if ($user === false) {
            return null;
        }

        return $user;
    }

    /**
     * Get a docspace user by moodle user id.
     *
     * @param int $id
     * @return mixed user.
     */
    public function get_by_moodleuserid(int $id): mixed {
        try {
            $user = $this->persistence->get_record($this->table, ['userid' => $id]);
        } catch (dml_exception $e) {
            debugging($e->getMessage(), DEBUG_DEVELOPER);
            return null;
        }

        if ($user === false) {
            return null;
        }

        return $user;
    }

    /**
     * Get multiple docspace users by their emails.
     *
     * @param string $email
     * @return array
     */
    public function get_multiple_by_email(array $emails): array {
        $placeholders = implode(',', array_fill(0, count($emails), '?'));
        $selectsql = "email IN ( $placeholders )";

        $users = $this->persistence->get_records_select($this->table, $selectsql, $emails);

        return $users;
    }

    /**
     * Get multiple docspace users by moodle user ids.
     *
     * @param array $ids
     * @return array
     */
    public function get_multiple_by_moodleuserids(array $ids): array {
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $selectsql = "userid IN ( $placeholders )";

        $users = $this->persistence->get_records_select($this->table, $selectsql, $ids);

        return $users;
    }

    /**
     * Create a DocSpace user.
     *
     * @param array $data
     * @param bool
     */
    public function create(array $data): bool {
        try {
            $this->persistence->insert_record($this->table, [
                'email' => $data['email'],
                'password' => $data['password'],
                'userid' => $data['userid'],
            ]);
        } catch (dml_exception $e) {
            debugging($e->getMessage(), DEBUG_DEVELOPER);
            return false;
        }

        return true;
    }

    /**
     * Create DocSpace users.
     *
     * @param array $users
     * @param bool
     */
    public function create_multiple(array $users): bool {
        try {
            $this->persistence->insert_records($this->table, $users);
        } catch (dml_exception $e) {
            debugging($e->getMessage(), DEBUG_DEVELOPER);
            return false;
        }

        return true;
    }

    /**
     * Create or update a docspace user.
     *
     * @param string $email
     * @param string $password
     */
    public function create_or_update(string $email, string $password = ''): void {
        $user = $this->get_by_email($email);

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
     * Update user data.
     *
     * @param array $data
     * @return bool
     */
    public function update(array $data): bool {
        try {
            $this->persistence->update_record($this->table, [
                'id' => $data['id'],
                'email' => $data['email'],
                'password' => $data['password'],
                'userid' => $data['userid'],
            ]);
        } catch (dml_exception $e) {
            debugging($e->getMessage(), DEBUG_DEVELOPER);
            return false;
        }
        return true;
    }

    /**
     * Delete multiple users by their moodle user ids.
     *
     * @param array $ids
     * @return bool
     */
    public function delete_multiple_by_moodleuserid(array $ids): bool {
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $selectsql = "userid IN ( $placeholders )";

        try {
            $this->persistence->delete_records_select($this->table, $selectsql, $ids);
            return true;
        } catch (dml_exception $e) {
            debugging($e->getMessage(), DEBUG_DEVELOPER);
            return false;
        }
    }

    /**
     * Delete all users from database table.
     * @return bool
     */
    public function delete_all(): bool {
        try {
            $this->persistence->delete_records($this->table);
            return true;
        } catch (dml_exception $e) {
            debugging($e->getMessage(), DEBUG_DEVELOPER);
            return false;
        }
    }
}
