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
 * Unit tests for url_parser.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\utils;

\defined('MOODLE_INTERNAL') || die();

/**
 * Unit tests for {@see url_parser}.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \mod_onlyofficedocspace\local\utils\url_parser
 */
final class url_parser_test extends \basic_testcase {
    /**
     * Test that get_base returns scheme://host(:port) and discards the path, query,
     * fragment, and userinfo for assorted DocSpace-like URLs.
     *
     * @dataProvider get_base_provider
     * @param string $url Input URL.
     * @param string $expected Expected base URL.
     */
    public function test_get_base(string $url, string $expected): void {
        $this->assertSame($expected, url_parser::get_base($url));
    }

    /**
     * Cases for {@see test_get_base}.
     *
     * @return array
     */
    public static function get_base_provider(): array {
        return [
            'https host without explicit port' => [
                'https://docspace.example.com/api/2.0/settings',
                'https://docspace.example.com',
            ],
            'http host with explicit port' => [
                'http://docspace.local:8080/api/2.0/files',
                'http://docspace.local:8080',
            ],
            'https host with non-default explicit port' => [
                'https://docspace.example.com:8443/api/2.0/people',
                'https://docspace.example.com:8443',
            ],
            'path, query string and fragment are dropped' => [
                'https://docspace.example.com/rooms?token=abc&page=2#section-one',
                'https://docspace.example.com',
            ],
            'userinfo segment is dropped' => [
                'https://operator:secret@docspace.example.com/portal',
                'https://docspace.example.com',
            ],
        ];
    }
}
