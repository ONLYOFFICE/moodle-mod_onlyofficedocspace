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
 * External function class for unlinking DocSpace users
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
use mod_onlyofficedocspace\local\moodle\repositories\docspace_user_repository;

/**
 * Unlink DocSpace users external function class
 */
class unlink_docspace_users extends \core_external\external_api {
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
     * Unlink DocSpace users
     * @param array $userids users array (with ids and hash strings)
     * @return array
     */
    public static function execute(array $userids) {
        $contextsystem = context_system::instance();
        self::validate_context($contextsystem);
        require_capability('moodle/site:config', $contextsystem);

        [
            'userids' => $userids
        ] = self::validate_parameters(self::execute_parameters(), [
            'userids' => $userids,
        ]);

        if (empty($userids)) {
            return static::return_success(0, 0, 0);
        }

        $totalcount = count($userids);
        $unlinkedcount = 0;
        $skippedcount = 0;

        $docspaceuserrepository = new docspace_user_repository();

        $existingusers = $docspaceuserrepository->get_multiple_by_moodleuserids($userids);

        if (empty($existingusers)) {
            static::return_success($totalcount, $unlinkedcount, $totalcount);
        }

        $existinguserids = array_map(fn($user) => $user->userid, $existingusers);
        $docspaceuserrepository->delete_multiple_by_moodleuserid($existinguserids);

        $unlinkedcount = count($existinguserids);
        $skippedcount = $totalcount - $unlinkedcount;

        return static::return_success($totalcount, $unlinkedcount, $skippedcount);
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
            'unlinkedcount' => new external_value(PARAM_INT, 'Unlinked users count'),
            'skippedcount' => new external_value(PARAM_INT, 'Skipped users count'),
        ]);
    }

    /**
     * Return success array
     * @param int $totalcount
     * @param int $unlinkedcount
     * @param int $skippedcount
     * @return array
     */
    public static function return_success(int $totalcount, int $unlinkedcount, int $skippedcount): array {
        return [
            'status' => 'success',
            'totalcount' => $totalcount,
            'unlinkedcount' => $unlinkedcount,
            'skippedcount' => $skippedcount,
        ];
    }
}
