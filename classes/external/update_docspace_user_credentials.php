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
 * External function class for updating DocSpace user password
 *
 * @package     mod_onlyofficedocspace
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
 * update_user_password external function class
 */
class update_docspace_user_credentials extends \core_external\external_api {
    /**
     * Returns description of method parameters
     *
     * @return external_function_parameters
     */
    public static function execute_parameters() {
        return new external_function_parameters([
            'email' => new external_value(PARAM_EMAIL, 'DocSpace user email'),
            'password' => new external_value(PARAM_RAW, 'DocSpace user password hash'),
        ]);
    }

    /**
     * Update DocSpace user password
     * @param string $email DocSpace email
     * @param string $password DocSpace password hash
     * @return array
     */
    public static function execute(
        string $email,
        string $password,
    ) {
        global $USER;

        $contextsystem = context_system::instance();
        self::validate_context($contextsystem);

        [
            'email' => $email,
            'password' => $password,
        ] = self::validate_parameters(self::execute_parameters(), [
            'email' => $email,
            'password' => $password,
        ]);

        $docspaceuserrepository = new docspace_user_repository();
        $docspaceuser = $docspaceuserrepository->get_by_moodleuserid($USER->id);

        if ($docspaceuser) {
            $docspaceuserrepository->update([
                'id' => $docspaceuser->id,
                'email' => $email,
                'password' => $password,
                'userid' => $docspaceuser->userid,
            ]);
        } else {
            $docspaceuserrepository->create([
                'email' => $email,
                'password' => $password,
                'userid' => $USER->id,
            ]);
        }

        return static::return_success();
    }

    /**
     * Describe the return structure of the external service.
     *
     * @return external_single_structure
     */
    public static function execute_returns(): external_single_structure {
        return new external_single_structure([
            'status' => new external_value(PARAM_TEXT, 'External function status: success or error'),
            'errors' => new external_multiple_structure(
                new external_value(PARAM_TEXT, 'Error message'),
                'Error message list',
                VALUE_OPTIONAL
            ),
        ]);
    }

    /**
     * Return success array
     * @return array
     */
    public static function return_success(): array {
        return ['status' => 'success'];
    }

    /**
     * Return error array
     * @param array $errors
     * @return array
     */
    public static function return_errors(array $errors): array {
        return [
            'status' => 'error',
            'errors' => $errors,
        ];
    }
}
