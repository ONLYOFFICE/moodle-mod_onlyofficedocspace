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
 * Privacy api.
 *
 * @package     mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\privacy;

use context;
use core_privacy\local\metadata\collection;
use core_privacy\local\request\approved_contextlist;
use core_privacy\local\request\approved_userlist;
use core_privacy\local\request\contextlist;
use core_privacy\local\request\userlist;
use core_privacy\local\request\writer;
use mod_onlyofficedocspace\local\moodle\moodle_docspace_user_manager;
use mod_onlyofficedocspace\local\moodle\moodle_user_manager;

/**
 * Privacy provider class.
 *
 * @package     mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class provider implements \core_privacy\local\metadata\provider,
    \core_privacy\local\request\plugin\provider,
    \core_privacy\local\request\core_userlist_provider {

    /**
     * Extends metadata about system.
     * @param collection $collection
     * @return collection
     */
    public static function get_metadata(collection $collection): collection {
        $collection->add_database_table(
            'onlyofficedocspace_dsuser',
             [
                'email' => 'privacy:metadata:onlyofficedocspace_dsuser:email',
                'password' => 'privacy:metadata:onlyofficedocspace_dsuser:password',
             ],
            'privacy:metadata:onlyofficedocspace_dsuser'
        );

        $collection->add_external_location_link('onlyofficedocspace_admin',
            [
                'login' => 'privacy:metadata:onlyofficedocspace_admin:login',
                'password' => 'privacy:metadata:onlyofficedocspace_admin:password',
            ],
            'privacy:metadata:onlyofficedocspace_admin');

        $collection->add_external_location_link('onlyofficedocspace_users',
            [
                'email' => 'privacy:metadata:onlyofficedocspace_users:email',
            ],
            'privacy:metadata:onlyofficedocspace_users');

        return $collection;
    }

    /**
     * Get the list of contexts that contain user information for the specified user.
     *
     * @param   int           $userid       The user to search.
     * @return  contextlist   $contextlist  The list of contexts used in this plugin.
     */
    public static function get_contexts_for_userid(int $userid): contextlist {
        $contextlist = new contextlist();
        $usermanager = new moodle_user_manager();

        if ($usermanager->get($userid)) {
            $contextlist->add_system_context();
        }

        return $contextlist;
    }

    /**
     * Get the list of users who have data within a context.
     *
     * @param userlist $userlist The userlist containing the list of users who have data in this context/plugin combination.
     */
    public static function get_users_in_context(userlist $userlist) {
        $context = $userlist->get_context();

        if ($context != CONTEXT_SYSTEM) {
            return;
        }

        $sql = "SELECT u.id
                  FROM {user} u
                 WHERE u.email
                    IN (SELECT email FROM {onlyofficedocspace_dsuser})";

        $userlist->add_from_sql('userid', $sql, []);
    }

    /**
     * Export all user data for the specified user, in the specified contexts.
     *
     * @param approved_contextlist $contextlist The approved contexts to export information for.
     */
    public static function export_user_data(approved_contextlist $contextlist) {
        if (empty($contextlist)) {
            return;
        }

        $user = $contextlist->get_user();

        $docspaceusermanager = new moodle_docspace_user_manager();
        $docspaceuser = $docspaceusermanager->get($user->email);

        foreach ($contextlist->get_contexts() as $context) {
            writer::with_context($context)
                ->export_data([get_string('pluginname', 'onlyofficedocspace')], $docspaceuser);
        }
    }

    /**
     * Delete all user data for the specified user, in the specified contexts.
     *
     * @param approved_contextlist $contextlist
     * @return void
     */
    public static function delete_data_for_user(approved_contextlist $contextlist) {
        if (empty($contextlist->count())) {
            return;
        }

        $user = $contextlist->get_user();
        $docspaceusermanager = new moodle_docspace_user_manager();

        foreach ($contextlist->get_contexts() as $context) {
            if ($context->contextlevel === CONTEXT_SYSTEM) {
                $docspaceusermanager->delete([$user->email]);
            }
        }
    }

    /**
     * Delete all personal data for all users in the specified context.
     *
     * @param context $context Context to delete data from.
     */
    public static function delete_data_for_all_users_in_context(context $context) {
        $docspaceusermanager = new moodle_docspace_user_manager();
        $docspaceusermanager->clear();
    }

    /**
     * Delete multiple users within a single context.
     *
     * @param approved_userlist $userlist The approved context and user information to delete information for.
     */
    public static function delete_data_for_users(approved_userlist $userlist) {
        $users = $userlist->get_users();

        $emails = array_map(function($user) {
            return $user->email;
        }, $users);

        $docspaceusermanager = new moodle_docspace_user_manager();
        $docspaceusermanager->delete($emails);
    }
}
