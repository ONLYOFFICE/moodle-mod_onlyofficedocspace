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
 * Define a class for interacting with users table.
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\moodle\repositories;

use context_system;
use stdClass;

/**
 * User repository class
 */
class user_repository {
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
    public function get_all(string $sort = 'id', string $dir = 'ASC', int $limitfrom = 0, int $limitnum = 0): array {
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
     * Return users with editor roles
     * @param int $offset
     * @param int $limit
     * @return array
     */
    public function get_users_with_editor_roles(int $offset = 0, int $limit = 0) {
        $context = context_system::instance();

        $roles = $this->persistence->get_records_sql("
            SELECT id, shortname 
            FROM {role} 
            WHERE shortname IN ('manager', 'coursecreator', 'editingteacher', 'teacher')
            ORDER BY 
                CASE shortname
                    WHEN 'manager' THEN 1
                    WHEN 'coursecreator' THEN 2
                    WHEN 'editingteacher' THEN 3
                    WHEN 'teacher' THEN 4
                END
        ");

        if (empty($roles)) {
            return [];
        }

        $roleids = array_column($roles, 'id');
        $rolemap = array_combine(
            array_column($roles, 'id'),
            array_map(function($role) {
                switch($role) {
                    case 'manager':
                        return get_string('manager', 'onlyofficedocspace');
                    case 'coursecreator':
                        return get_string('coursecreator', 'onlyofficedocspace');;
                    case 'editingteacher':
                        return get_string('editingteacher', 'onlyofficedocspace');;
                    case 'teacher':
                        return get_string('teacher', 'onlyofficedocspace');;
                    default:
                        return $role;
                }
            }
            , array_column($roles, 'shortname'))
        );

        // 2. Get users with these roles
        $sql = "SELECT DISTINCT u.*, MIN(ra.roleid) as highest_role
            FROM {user} u
            JOIN {role_assignments} ra ON ra.userid = u.id
            WHERE ra.roleid IN (" . implode(',', array_keys($roleids)) . ")
            AND u.deleted = 0 
            AND u.suspended = 0
            GROUP BY u.id
            ORDER BY u.firstname, u.lastname";

        $users = $this->persistence->get_records_sql($sql, [], $offset, $limit);

        // 3. Format the results with role names
        $result = [];
        foreach ($users as $user) {
            $isadmin = has_capability('moodle/site:config', $context, $user);

            $result[] = (object)[
                'id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'role' => $isadmin
                ? get_string('siteadmin', 'onlyofficedocspace')
                : $rolemap[$user->highest_role] ?? '',
            ];
        }

        return $result;
    }

    /**
     * Get multiple users by their ids
     * @param array $ids
     * @return array
     */
    public function get_multiple_by_id(array $ids) {
        if (empty($ids)) {
            return [];
        }

        $idlist = implode(",", $ids);
        $extrasql = "id IN ( $idlist )";
        $users = get_users_listing(extraselect: $extrasql);

        return $users;
    }

    /**
     * Count users.
     *
     * @return int
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
     * Return user counts with system or course editor roles
     * @return int
     */
    public function count_users_with_editor_roles(): int {
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
     *
     * @param string $userid
     * @return ?stdClass
     */
    public function get_by_id(string $id): ?stdClass {
        $user = $this->persistence->get_record($this->table, ['id' => $id]);

        if ($user === false) {
            return null;
        }

        return $user;
    }
}
