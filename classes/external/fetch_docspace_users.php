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
 * External function class for fetching DocSpace users
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\external;

use context_system;
use core_external\external_function_parameters;
use core_external\external_multiple_structure;
use core_external\external_single_structure;
use core_external\external_value;
use mod_onlyofficedocspace\local\docspace\docspace_client;
use mod_onlyofficedocspace\local\docspace\enums\docspace_user_status;
use mod_onlyofficedocspace\local\docspace\enums\docspace_user_type;
use mod_onlyofficedocspace\local\moodle\plugin_settings;
use mod_onlyofficedocspace\local\moodle\repositories\docspace_user_repository;
use mod_onlyofficedocspace\local\moodle\repositories\user_repository;

/**
 * fetch_docspace_users external function class
 */
class fetch_docspace_users extends \core_external\external_api {
    /**
     * Returns description of method parameters
     *
     * @return external_function_parameters
     */
    public static function execute_parameters() {
        return new external_function_parameters([
            'page' => new external_value(PARAM_INT, 'Page number', VALUE_DEFAULT, 1),
            'limit' => new external_value(PARAM_INT, 'Per page limit', VALUE_DEFAULT, 10),
        ]);
    }

    /**
     * Get DocSpace users
     * @param int $page
     * @param int $limit
     * @return array
     */
    public static function execute($page, $limit) {
        $contextsystem = context_system::instance();
        self::validate_context($contextsystem);
        require_capability('moodle/site:config', $contextsystem);

        [
            'page' => $page,
            'limit' => $limit,
        ] = self::validate_parameters(self::execute_parameters(), [
            'page' => $page,
            'limit' => $limit,
        ]);

        $pagination = [
            'page' => $page,
            'limit' => $limit,
            'total' => 0,
        ];

        $userrepository = new user_repository();
        $docspaceuserrepository = new docspace_user_repository();

        $total = $userrepository->count_users_with_editor_roles();

        if ($total <= 0) {
            return static::return_success([], $pagination);
        }

        $pagination['total'] = $total;
        $offset = ($page - 1) * $limit;

        $moodleusers = $userrepository->get_users_with_editor_roles($offset, $limit);
        $userids = array_map(fn($user) => $user->id, $moodleusers);
        $docspaceusers = $docspaceuserrepository->get_multiple_by_moodleuserids($userids);

        $docspaceclient = new docspace_client(plugin_settings::url(), plugin_settings::api_key());
        $remotedocspaceusers = $docspaceclient->fetch_all_users();

        $users = [];

        foreach ($moodleusers as $user) {
            $docspaceuser = array_filter($docspaceusers, fn($duser) => $duser->userid === $user->id);
            $docspaceuser = reset($docspaceuser);
            $email = $user->email;
            $status = "";
            $type = "";

            if ($docspaceuser) {
                $remotedocspaceuser = $remotedocspaceusers->get_by_email($docspaceuser->email);
                $email = $docspaceuser->email;
                $status = docspace_user_status::ACTIVE->value;
                $type = $remotedocspaceuser && $remotedocspaceuser->isroomadmin
                    ? docspace_user_type::ROOM_ADMIN->value
                    : docspace_user_type::POWER_USER->value;
            } else if (($remotedocspaceuser = $remotedocspaceusers->get_by_email($user->email))) {
                $status = docspace_user_status::EXISTS->value;
            }

            $users[] = [
                'id' => $user->id,
                'email' => $email,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'role' => $user->role,
                'status' => $status,
                'type' => $type,
            ];
        }

        return static::return_success($users, $pagination);
    }

    /**
     * Describe the return structure of the external service.
     *
     * @return external_single_structure
     */
    public static function execute_returns(): external_single_structure {
        return new external_single_structure([
            'status' => new external_value(PARAM_TEXT, 'External function status: success or error'),
            'users' => new external_multiple_structure(
                new external_single_structure([
                    'id' => new external_value(PARAM_TEXT, 'Moodle user id'),
                    'email' => new external_value(PARAM_TEXT, 'DocSpace user email'),
                    'firstname' => new external_value(PARAM_TEXT, 'Moodle user firstname'),
                    'lastname' => new external_value(PARAM_TEXT, 'Moodle user lastname'),
                    'role' => new external_value(PARAM_TEXT, 'Moodle user role'),
                    'status' => new external_value(PARAM_TEXT, 'DocSpace user status'),
                    'type' => new external_value(PARAM_TEXT, 'DocSpace user type'),
                ])
            ),
            'pagination' => new external_single_structure([
                'page' => new external_value(PARAM_INT, 'Current page number'),
                'limit' => new external_value(PARAM_INT, 'Users per page'),
                'total' => new external_value(PARAM_INT, 'Total users number'),
            ]),
        ]);
    }

    /**
     * Return success array
     * @param array $users
     * @param array $pagination
     * @return array
     */
    public static function return_success(array $users, $pagination): array {
        return [
            'status' => 'success',
            'users' => $users,
            'pagination' => $pagination,
        ];
    }
}
