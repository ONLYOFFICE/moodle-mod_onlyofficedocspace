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
 * Define docspace settings class
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\docspace;

use core\http_client;
use GuzzleHttp\Exception\RequestException;

/**
 * Docspace settings class
 */
class docspace_settings {

    /**
     * Docspace default url
     */
    const DOCSPACE_DEFAULT_URL = 'https://docspaceserver.url';
    /**
     * Docspace url setting parameter
     */
    const DOCSPACE_URL = 'docspace_server_url';
    /**
     * Docspace api key parameter
     */
    const DOCSPACE_API_KEY = 'docspace_api_key';

    /**
     * Return docspace url
     */
    public static function url(): string {
        return static::get(static::DOCSPACE_URL, static::DOCSPACE_DEFAULT_URL);
    }

    /**
     * Return docspace api key
     */
    public static function api_key(): string {
        return static::get(static::DOCSPACE_API_KEY, '');
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
