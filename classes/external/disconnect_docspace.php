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
 * External function class for disconnecting DocSpace portal from Moodle
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
use mod_onlyofficedocspace\local\moodle\plugin_settings;

/**
 * connect_docspace external function class
 */
class disconnect_docspace extends \core_external\external_api {
    /**
     * Returns description of method parameters
     *
     * @return external_function_parameters
     */
    public static function execute_parameters() {
        return new external_function_parameters([]);
    }

    /**
     * Disconnect DocSpace portal from Moodle
     * @return array
     */
    public static function execute() {
        $contextsystem = context_system::instance();
        self::validate_context($contextsystem);
        require_capability('moodle/site:config', $contextsystem);

        // Reset the plugin configs.
        plugin_settings::set(plugin_settings::URL_PARAM_NAME, '');
        plugin_settings::set(plugin_settings::API_KEY_PARAM_NAME, '');

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
