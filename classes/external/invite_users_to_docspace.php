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
 * External function class for inviting users to OnlyOffice DocSpace
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
use mod_onlyofficedocspace\local\docspace\docspace_password_manager;
use mod_onlyofficedocspace\local\docspace\enums\docspace_user_type;
use mod_onlyofficedocspace\local\errors\docspace_client_error;
use mod_onlyofficedocspace\local\moodle\plugin_settings;
use mod_onlyofficedocspace\local\moodle\repositories\docspace_user_repository;
use mod_onlyofficedocspace\local\moodle\repositories\user_repository;

/**
 * invite_users external function class
 */
class invite_users_to_docspace extends \core_external\external_api {
    /**
     * Returns description of method parameters
     *
     * @return external_function_parameters
     */
    public static function execute_parameters() {
        return new external_function_parameters([
            'userids' => new external_multiple_structure(new external_value(PARAM_INT, 'User ids')),
        ]);
    }

    /**
     * Invite users to OnlyOffice DocSpace
     * @param array $userids
     * @return array
     */
    public static function execute($userids) {
        global $CFG;
        $contextsystem = context_system::instance();
        self::validate_context($contextsystem);
        require_capability('moodle/site:config', $contextsystem);

        [
            'userids' => $userids
        ] = self::validate_parameters(self::execute_parameters(), [
            'userids' => $userids,
        ]);

        if (empty($userids)) {
            return static::return_success(0, 0, 0, 0);
        }

        $totalcount = count($userids);
        $failedcount = 0;

        $docspaceclient = new docspace_client(plugin_settings::url(), plugin_settings::api_key());
        $userrepository = new user_repository();
        $docspaceuserrepository = new docspace_user_repository();

        // Collect only docspace users that do not exist in moodle.
        $docspaceusers = $docspaceuserrepository->get_multiple_by_moodleuserids($userids);
        $presentuserids = array_map(fn($docspaceuser) => $docspaceuser->userid, $docspaceusers);
        $missinguserids = array_filter($userids, fn($user) => !in_array($user, $presentuserids));

        if (empty($missinguserids)) {
            return static::return_success($totalcount, 0, $totalcount, 0);
        }

        // Collect users that does not exist in DocSpace.
        $remotedocspaceusers = $docspaceclient->fetch_all_users();
        $users = $userrepository->get_multiple_by_id($missinguserids);
        $missingusers = array_filter($users, fn($user) => !$remotedocspaceusers->exists($user->email));

        if (empty($missingusers)) {
            return static::return_success($totalcount, 0, $totalcount, 0);
        }

        $docspacesettings = $docspaceclient->fetch_portal_settings();
        $hashsettings = $docspacesettings['passwordHash'];

        // Attempt to invite missing users to DocSpace.
        $invitedusers = [];
        foreach ($missingusers as &$user) {
            $user->passwordhash = docspace_password_manager::generate_random_password_hash($hashsettings);
            try {
                $docspaceclient->invite_user([
                    'email' => $user->email,
                    'password' => $user->passwordhash,
                    'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                    'type' => docspace_user_type::POWER_USER->value,
                    'language' => $user->lang ?? $CFG->lang,
                ]);

                $invitedusers[] = $user;
            } catch (docspace_client_error) {
                $failedcount++;
            }
        }

        // Create records for the invited users in the database.
        $docspaceusersdata = array_map(
            fn($inviteduser) => [
                'email' => $inviteduser->email,
                'password' => $inviteduser->passwordhash,
                'userid' => $inviteduser->id,
            ],
            $invitedusers
        );
        $docspaceuserrepository->create_multiple($docspaceusersdata);

        $invitedcount = count($invitedusers);
        $skippedcount = count($userids) - ($invitedcount + $failedcount);

        return static::return_success($totalcount, $invitedcount, $skippedcount, $failedcount);
    }

    /**
     * Describe the return structure of the external service.
     *
     * @return external_single_structure
     */
    public static function execute_returns(): external_single_structure {
        return new external_single_structure([
            'status' => new external_value(PARAM_TEXT, 'External function status: success or error'),
            'totalcount' => new external_value(PARAM_INT, 'Users total count'),
            'invitedcount' => new external_value(PARAM_INT, 'Invited users count'),
            'skippedcount' => new external_value(PARAM_INT, 'Skipped users count'),
            'failedcount' => new external_value(PARAM_INT, 'Failed invitations count'),
        ]);
    }

    /**
     * Return success array
     * @param int $totalcount
     * @param int $invitedcount
     * @param int $skippedcount
     * @param int $failedcount
     * @return array
     */
    public static function return_success(int $totalcount, int $invitedcount, int $skippedcount, int $failedcount): array {
        return [
            'status' => 'success',
            'totalcount' => $totalcount,
            'invitedcount' => $invitedcount,
            'skippedcount' => $skippedcount,
            'failedcount' => $failedcount,
        ];
    }
}
