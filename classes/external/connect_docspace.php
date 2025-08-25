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
 * External function class for connecting with OnlyOffice DocSpace portal
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
use mod_onlyofficedocspace\local\moodle\plugin_settings;
use mod_onlyofficedocspace\local\moodle\repositories\docspace_user_repository;
use mod_onlyofficedocspace\local\utils\url_parser;
use mod_onlyofficedocspace\local\validators\docspace_api_key_validator;
use mod_onlyofficedocspace\local\validators\docspace_url_validator;

/**
 * connect_docspace external function class
 */
class connect_docspace extends \core_external\external_api {

    /**
     * Returns description of method parameters
     *
     * @return external_function_parameters
     */
    public static function execute_parameters() {
        return new external_function_parameters([
            'url' => new external_value(PARAM_URL, 'DocSpace URL'),
            'apikey' => new external_value(PARAM_RAW, 'DocSpace API key'),
        ]);
    }

    /**
     * Connect a DocSpace portal with Moodle.
     * @param string $url DocSpace url
     * @param string $apikey DocSpace API Key
     * @return array
     */
    public static function execute($url, $apikey) {
        global $CFG;

        $contextsystem = context_system::instance();
        self::validate_context($contextsystem);
        require_capability('moodle/site:config', $contextsystem);

        [
            'url' => $url,
            'apikey' => $apikey,
        ] = self::validate_parameters(self::execute_parameters(), [
            'url' => $url,
            'apikey' => $apikey,
        ]);

        // Sanitize data.
        $url = rtrim(trim($url), "/");
        $apikey = trim($apikey);

        // Validate DocSpace URL.
        $docspaceurlvalidator = new docspace_url_validator();
        if (!$docspaceurlvalidator->validate($url)) {
            return static::return_errors($docspaceurlvalidator->get_errors());
        }

        // Validate DocSpace API key.
        $docspaceapikeyvalidator = new docspace_api_key_validator();
        if (!$docspaceapikeyvalidator->validate($url, $apikey)) {
            return static::return_errors($docspaceapikeyvalidator->get_errors());
        }

        // Check if the user is moving to a new DocSpace portal.
        $oldurl = rtrim(trim(plugin_settings::url()), '/');
        $isnewportal = $oldurl !== $url;

        // Add the domain to the CSP allowed list.
        $domain = url_parser::get_base($CFG->wwwroot);
        $docspaceclient = new docspace_client($url, $apikey);
        $docspaceclient->add_domain_to_csp_list($domain);

        // Update the plugin configs.
        plugin_settings::set(plugin_settings::URL_PARAM_NAME, $url);
        plugin_settings::set(plugin_settings::API_KEY_PARAM_NAME, $apikey);

        // Clear the docspace users in moodle database if the admin is moving to a new portal.
        if ($isnewportal) {
            $docspaceuserrepository = new docspace_user_repository();
            $docspaceuserrepository->delete_all();
        }

        return [
            'status' => 'success',
            'errors' => [],
        ];
    }

    /**
     * Describe the return structure of the external service.
     *
     * @return external_single_structure
     */
    public static function execute_returns(): external_single_structure {
        return new external_single_structure([
            'status' => new external_value(PARAM_TEXT, 'External function status: success or error'),
            'errors' => new external_multiple_structure(new external_value(PARAM_TEXT, 'Error message'), 'Error message list'),
        ]);
    }

    /**
     * Return errors array
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
