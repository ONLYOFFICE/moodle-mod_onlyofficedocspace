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
use invalid_parameter_exception;
use mod_onlyofficedocspace\local\common\flash_message;
use mod_onlyofficedocspace\local\docspace\docspace_user_manager;
use mod_onlyofficedocspace\local\docspace\enums\docspace_user_type;
use mod_onlyofficedocspace\local\errors\docspace_error;
use mod_onlyofficedocspace\local\moodle\moodle_docspace_user_manager;
use mod_onlyofficedocspace\local\moodle\moodle_user_manager;
use mod_onlyofficedocspace\local\moodle\plugin_settings;

/**
 * invite_users external function class
 */
class invite_users extends \core_external\external_api {

    /**
     * Returns description of method parameters
     *
     * @return external_function_parameters
     */
    public static function execute_parameters() {
        return new external_function_parameters([
            'users' => new external_multiple_structure(
                new external_single_structure([
                    'id' => new external_value(PARAM_INT, 'user\'s id'),
                    'hash' => new external_value(PARAM_RAW, 'generated hash'),
                ])
            ),
        ]);
    }

    /**
     * Invite users to OnlyOffice DocSpace
     * @param array $users users array (with ids and hash strings)
     * @return array
     */
    public static function execute($users) {
        $contextsystem = context_system::instance();
        self::validate_context($contextsystem);
        require_capability('moodle/site:config', $contextsystem);

        [
            'users' => $users
        ] = self::validate_parameters(self::execute_parameters(), [
            'users' => $users,
        ]);

        if (empty($users)) {
            throw new invalid_parameter_exception(get_string('paramsmissingvalidationerror', 'onlyofficedocspace'));
        }

        foreach ($users as $user) {
            $user = (object)$user;
            if (trim($user->hash) == '') {
                throw new invalid_parameter_exception(get_string('paramsmissingvalidationerror', 'onlyofficedocspace'));
            }
        }

        $skippedinvitations = 0;
        $failedinvitations = 0;
        $sentinvitations = 0;

        $docspaceusermanager = new docspace_user_manager(plugin_settings::url(), plugin_settings::api_key());
        $docspaceusers = $docspaceusermanager->all();

        $moodleusermanager = new moodle_user_manager();
        $moodledocspaceusermanager = new moodle_docspace_user_manager();

        foreach ($users as $useritem) {
            $user = $moodleusermanager->get($useritem['id']);

            if ($user === null) {
                $skippedinvitations++;
                continue;
            }

            if ($docspaceusers->get($user->email) === null) {
                try {
                    $docspaceusermanager->invite(
                        $user->email,
                        $useritem['hash'],
                        $user->firstname,
                        $user->lastname,
                        docspace_user_type::POWER_USER,
                    );
                    $sentinvitations++;
                } catch (docspace_error $e) {
                    $failedinvitations++;
                }

                $moodledocspaceusermanager->create_or_update($user->email, $useritem['hash']);
            } else {
                $skippedinvitations++;
            }
        }

        $userscount = count($users);

        $flash = new flash_message();

        if ($skippedinvitations > 0) {
            $flash->add(
                'skipped_invitations',
                get_string('skippedinvitations', 'onlyofficedocspace', "$skippedinvitations / $userscount")
            );
        }
        if ($sentinvitations > 0) {
            $flash->add(
                'sent_invitations',
                get_string('sentinvitations', 'onlyofficedocspace', "$sentinvitations / $userscount")
            );
        }
        if ($failedinvitations > 0) {
            $flash->add(
                'failed_invitations',
                get_string('failedinvitations', 'onlyofficedocspace', "$failedinvitations / $userscount")
            );
        }

        return [];
    }

    /**
     * Describe the return structure of the external service.
     *
     * @return external_single_structure
     */
    public static function execute_returns(): external_single_structure {
        return new external_single_structure([]);
    }
}
