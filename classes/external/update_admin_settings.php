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
 * External function class for updating DocSpace admin settings
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
use mod_onlyofficedocspace\local\common\flash_message;
use mod_onlyofficedocspace\local\docspace\docspace_settings;
use mod_onlyofficedocspace\local\docspace\docspace_user_manager;
use mod_onlyofficedocspace\local\docspace\enums\docspace_user_type;
use mod_onlyofficedocspace\local\errors\docspace_error;
use mod_onlyofficedocspace\local\errors\invalid_credentials_error;
use mod_onlyofficedocspace\local\moodle\moodle_docspace_user_manager;

/**
 * update_adminsettings external function class
 */
class update_admin_settings extends \core_external\external_api {

    /**
     * Returns description of method parameters
     *
     * @return external_function_parameters
     */
    public static function execute_parameters() {
        return new external_function_parameters([
            'url' => new external_value(PARAM_URL, 'DocSpace platform url'),
            'email' => new external_value(PARAM_EMAIL, 'DocSpace admin email'),
            'password' => new external_value(PARAM_RAW, 'DocSpace admin password hash'),
            'randompassword' => new external_value(PARAM_RAW, 'Random password hash'),
        ]);
    }

    /**
     * Update DocSpace admin settings
     * @param string $url DocSpace url
     * @param string $email DocSpace email
     * @param string $password DocSpace password hash
     * @param string $randompassword Random password hash
     * @return array
     */
    public static function execute(
        string $url,
        string $email,
        string $password,
        string $randompassword
    ) {
        $contextsystem = context_system::instance();
        self::validate_context($contextsystem);
        require_capability('moodle/site:config', $contextsystem);

        global $USER;

        [
            'url' => $url,
            'email' => $email,
            'password' => $password,
            'randompassword' => $randompassword
        ] = self::validate_parameters(self::execute_parameters(), [
            'url' => $url,
            'email' => $email,
            'password' => $password,
            'randompassword' => $randompassword,
        ]);

        if (empty($url) | empty($email) | empty($password) | empty($randompassword)) {
            return self::return_errors(
                0,
                'paramsmissingvalidationerror',
                get_string('paramsmissingvalidationerror', 'onlyofficedocspace')
            );
        }

        // Sanitize user input.
        $url = rtrim(filter_var(trim($url), FILTER_SANITIZE_URL), "/");
        $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
        $password = trim($password);
        $randompassword = trim($randompassword);

        $flashmessage = new flash_message();

        $oldurl = get_config('onlyofficedocspace', docspace_settings::DOCSPACE_URL);

        $settings = new docspace_settings($url, $email, $password);

        try {
            $settings->ensureIntegrity();
        } catch (invalid_credentials_error $e) {
            return self::return_errors(
                0,
                'invalidcredentialserror',
                $e->getMessage()
            );
        }

        $moodledocspaceusermanager = new moodle_docspace_user_manager();

        if ($settings->url() !== $oldurl) {
            $moodledocspaceusermanager->clear();
        }

        $usermanager = new docspace_user_manager($settings->url(), $settings->token());

        $currentuser = $usermanager->get($USER->email);

        if ($currentuser === null) {
            try {
                $usermanager->invite(
                    $USER->email,
                    $randompassword,
                    $USER->firstname,
                    $USER->lastname,
                    docspace_user_type::ROOM_ADMIN
                );
                $moodledocspaceusermanager->create_or_update($USER->email, $randompassword);
            } catch (docspace_error $e) {
                $flashmessage->add('error', $e->getMessage());
            }
        } else {
            $flashmessage->add('warning', get_string('docspaceuseralreadyexists', 'onlyofficedocspace', $USER->email));
        }

        $flashmessage->add('success', get_string('adminsettings:updated', 'onlyofficedocspace'));

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
