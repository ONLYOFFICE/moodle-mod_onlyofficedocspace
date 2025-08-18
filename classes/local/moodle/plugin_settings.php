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
 * OnlyOffice DocSpace plugin settings class
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\moodle;

/**
 * OnlyOffice DocSpace plugin settings class
 */
class plugin_settings {

    /**
     * Plugin default value for url parameter
     */
    const DOCSPACE_DEFAULT_URL = 'https://docspaceserver.url';
    /**
     * Plugin url parameter name
     */
    const URL_PARAM_NAME = 'docspace_server_url';
    /**
     * Plugin api key parameter name
     */
    const API_KEY_PARAM_NAME = 'docspace_api_key';

    /**
     * Return DocSpace url
     */
    public static function url(): string {
        return static::get(static::URL_PARAM_NAME, '');
    }

    /**
     * Return DocSpace API key
     */
    public static function api_key(): string {
        return static::get(static::API_KEY_PARAM_NAME, '');
    }

    /**
     * Get setting by key
     * @param string $key setting key
     * @param string $def default value
     * @return string setting value
     */
    public static function get(string $key, string $def = ''): string {
        $option = get_config('onlyofficedocspace', $key);

        if ($option !== false) {
            return $option;
        }

        return $def;
    }

    /**
     * Set setting value by key
     * @param string $key setting key
     * @param mixed $value setting value
     */
    public static function set(string $key, mixed $value): void {
        set_config($key, $value, 'onlyofficedocspace');
    }
}
