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
use core_external\external_single_structure;
use core_external\external_value;
use core_external\external_warnings;
use mod_onlyofficedocspace\local\docspace\docspace_auth_manager;
use mod_onlyofficedocspace\local\docspace\docspace_settings;
use mod_onlyofficedocspace\local\errors\invalid_credentials_error;
use mod_onlyofficedocspace\local\moodle\moodle_docspace_user_manager;

/**
 * update_user_password external function class
 */
class update_user_password extends \core_external\external_api {

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

        // Sanitize user input.
        $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
        $password = trim($password);

        if (empty($email) | empty($password)) {
            return self::return_errors(
                0,
                'paramsmissingvalidationerror',
                get_string('paramsmissingvalidationerror', 'onlyofficedocspace')
            );
        }

        if ($USER->email !== $email) {
            return self::return_errors(
                0,
                'invalidparamsvalidationerror',
                get_string('invalidparamsvalidationerror', 'onlyofficedocspace')
            );
        }

        $settings = new docspace_settings();

        $settings->healthCheck();

        try {
            $docspaceauthmanager = new docspace_auth_manager($settings->url());
            $docspaceauthmanager->authenticate($email, $password);
        } catch (invalid_credentials_error $e) {
            return self::return_errors(
                0,
                'invalidcredentialserror',
                $e->getMessage(),
            );
        }

        $moodledocspaceusermanager = new moodle_docspace_user_manager();
        $moodleuser = $moodledocspaceusermanager->get($USER->email);

        if ($moodleuser === null) {
            return self::return_errors(
                0,
                'docspaceusernotfounderror',
                get_string('docspaceusernotfound', 'onlyofficedocspace')
            );
        }

        $moodledocspaceusermanager->update($moodleuser->id, $email, $password);

        return [
            'status' => true,
            'warnings' => [],
        ];
    }

    /**
     * Describe the return structure of the external service.
     *
     * @return external_single_structure
     */
    public static function execute_returns(): external_single_structure {
        return new external_single_structure([
            'status' => new external_value(PARAM_BOOL, 'Status: true if success'),
            'warnings' => new external_warnings(),
        ]);
    }

    /**
     * Handle return error.
     *
     * @param int $itemid Item id
     * @param string $warningcode Warning code
     * @param string $message Message
     * @return array
     */
    protected static function return_errors(int $itemid, string $warningcode, string $message): array {
        $warnings[] = [
            'item' => $itemid,
            'warningcode' => $warningcode,
            'message' => $message,
        ];

        return [
            'status' => false,
            'warnings' => $warnings,
        ];
    }
}
