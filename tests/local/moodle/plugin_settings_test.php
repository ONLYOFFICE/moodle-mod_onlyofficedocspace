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
 * Unit tests for plugin_settings.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\moodle;

\defined('MOODLE_INTERNAL') || die();

/**
 * Unit tests for {@see plugin_settings}.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \mod_onlyofficedocspace\local\moodle\plugin_settings
 */
final class plugin_settings_test extends \advanced_testcase {
    /**
     * Reset Moodle state after every test.
     */
    protected function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    /**
     * Test that a value persisted via set is read back via get for the same key.
     */
    public function test_set_persists_value_and_get_returns_it(): void {
        plugin_settings::set('docspace_server_url', 'https://docspace.example.com');

        $this->assertSame('https://docspace.example.com', plugin_settings::get('docspace_server_url'));
    }

    /**
     * Test that get returns the caller-supplied default when the requested key has no
     * stored value.
     */
    public function test_get_returns_supplied_default_when_key_is_unset(): void {
        $this->assertSame(
            'https://docspaceserver.url',
            plugin_settings::get('docspace_server_url', 'https://docspaceserver.url'),
        );
    }

    /**
     * Test that get falls back to the empty-string default when no default is supplied.
     */
    public function test_get_returns_empty_string_when_no_default_supplied(): void {
        $this->assertSame('', plugin_settings::get('docspace_server_url'));
    }

    /**
     * Test that url returns the value stored under URL_PARAM_NAME.
     */
    public function test_url_returns_stored_docspace_server_url(): void {
        plugin_settings::set(plugin_settings::URL_PARAM_NAME, 'https://docspace.example.com');

        $this->assertSame('https://docspace.example.com', plugin_settings::url());
    }

    /**
     * Test that url returns an empty string when the URL setting is unset.
     */
    public function test_url_returns_empty_string_when_unset(): void {
        $this->assertSame('', plugin_settings::url());
    }

    /**
     * Test that api_key returns the value stored under API_KEY_PARAM_NAME.
     */
    public function test_api_key_returns_stored_docspace_api_key(): void {
        plugin_settings::set(plugin_settings::API_KEY_PARAM_NAME, 'sk_4f3e9c8b2a1d5e6f');

        $this->assertSame('sk_4f3e9c8b2a1d5e6f', plugin_settings::api_key());
    }

    /**
     * Test that api_key returns an empty string when the API key setting is unset.
     */
    public function test_api_key_returns_empty_string_when_unset(): void {
        $this->assertSame('', plugin_settings::api_key());
    }
}
