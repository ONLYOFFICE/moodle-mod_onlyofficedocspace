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
 * Unit tests for docspace_password_manager.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\docspace;

\defined('MOODLE_INTERNAL') || die();

/**
 * Unit tests for {@see docspace_password_manager}.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \mod_onlyofficedocspace\local\docspace\docspace_password_manager
 */
final class docspace_password_manager_test extends \basic_testcase {
    /**
     * Test that the generated password hash is a hex string whose length matches the
     * configured key size in bits divided by four.
     */
    public function test_generated_hash_is_hex_string_of_expected_length(): void {
        $hash = docspace_password_manager::generate_random_password_hash([
            'salt' => 'docspace-portal-pbkdf2-salt',
            'iterations' => 1000,
            'size' => 256,
        ]);

        $this->assertMatchesRegularExpression('/^[0-9a-f]{64}$/', $hash);
    }

    /**
     * Test that two successive calls with identical PBKDF2 settings produce different
     * hashes.
     */
    public function test_consecutive_calls_produce_different_hashes(): void {
        $settings = [
            'salt' => 'docspace-portal-pbkdf2-salt',
            'iterations' => 1000,
            'size' => 256,
        ];

        $first = docspace_password_manager::generate_random_password_hash($settings);
        $second = docspace_password_manager::generate_random_password_hash($settings);

        $this->assertNotSame($first, $second);
    }
}
