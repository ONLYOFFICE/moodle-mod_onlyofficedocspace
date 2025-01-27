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
 * Define a class for managing moodle users
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\moodle;

use context_system;

/**
 * Class for managing moodle users
 */
class moodle_user_manager {
    /**
     * @var $persistence persistence driver
     */
    private $persistence;
     /**
      * @var $table table name
      */
    private string $table = 'user';

    /**
     * Moodle user manager constructor.
     */
    public function __construct() {
        global $DB;

        $this->persistence = $DB;
    }

    /**
     * Get all users
     * @param string $sort
     * @param string $dir
     * @param int $limitfrom
     * @param int $limitnum
     *
     * @return array
     */
    public function all(string $sort = 'id', string $dir = 'ASC', int $limitfrom = 0, int $limitnum = 0): array {
        $context = context_system::instance();

        $systemroles = get_assignable_roles($context);
        $courseroles = array_filter(
            get_default_enrol_roles($context),
            fn($role) => strtolower($role) !== 'student'
        );
        $archetypes = $systemroles + $courseroles;

        $extrasql = "id IN (SELECT userid FROM {role_assignments} a WHERE a.contextid= "
            . SYSCONTEXTID . " AND a.roleid IN (" . implode(",", array_keys($systemroles)) . ") "
            . "UNION SELECT userid FROM {role_assignments} a "
            . "INNER JOIN {context} b ON a.contextid=b.id WHERE b.contextlevel="
            . CONTEXT_COURSE . " AND a.roleid IN (" . implode(",", array_keys($courseroles)) . "))";

        $users = get_users_listing(
            sort: $sort,
            dir: $dir,
            page: $limitfrom,
            recordsperpage: $limitnum,
            extraselect: $extrasql,
            extracontext: $context
        );

        foreach ($users as &$user) {
            $roles = $this->persistence->get_records('role_assignments', ['userid' => $user->id], fields: 'id,roleid');
            $roles = array_unique(array_map(fn($role) => $role->roleid, $roles));
            $user->role = implode(',', array_intersect_key($archetypes, $roles));
        }

        return $users;
    }

    /**
     * Count moodle users.
     * @return int users count.
     */
    public function count(): int {
        global $CFG;

        $context = context_system::instance();

        $systemroles = array_keys(get_assignable_roles($context));
        $courseroles = array_keys(array_filter(get_default_enrol_roles($context), fn($role) => strtolower($role) !== 'student'));

        $extrasql = "id IN (SELECT userid FROM {role_assignments} a WHERE a.contextid= "
            . SYSCONTEXTID . " AND a.roleid IN (" . implode(",", $systemroles) . ") "
            . "UNION SELECT userid FROM {role_assignments} a "
            . "INNER JOIN {context} b ON a.contextid=b.id WHERE b.contextlevel=50 AND a.roleid IN ("
            . implode(",", $courseroles) . "))";

        $sql = "SELECT COUNT(*) FROM {" . $this->table . "} WHERE NOT id = :id AND ";
        $sql .= $extrasql;

        $params = ['id' => $CFG->siteguest];

        $count = $this->persistence->count_records_sql($sql, $params);

        return $count;
    }

    /**
     * Get a user by id.
     * @param string $userid
     *
     * @return mixed
     */
    public function get(string $userid): mixed {
        $user = $this->persistence->get_record($this->table, ['id' => $userid]);

        if ($user === false) {
            return null;
        }

        return $user;
    }
}
