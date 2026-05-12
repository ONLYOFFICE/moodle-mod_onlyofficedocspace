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
 * Unit tests for validator.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\validators;

\defined('MOODLE_INTERNAL') || die();

/**
 * Unit tests for {@see validator}.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \mod_onlyofficedocspace\local\validators\validator
 */
final class validator_test extends \basic_testcase {
    /**
     * Test that has_errors reports false and get_errors returns an empty array on
     * a freshly constructed validator with no errors recorded.
     */
    public function test_has_errors_returns_false_when_no_errors_recorded(): void {
        $validator = new class extends validator {};

        $this->assertFalse($validator->has_errors());
        $this->assertSame([], $validator->get_errors());
    }

    /**
     * Test that has_errors returns true and get_errors returns the recorded errors
     * once a concrete validator subclass has populated them.
     */
    public function test_has_errors_returns_true_after_subclass_records_errors(): void {
        $validator = new class extends validator {
            public function record(string $error): void {
                $this->errors[] = $error;
            }
        };

        $validator->record('URL must be a valid HTTPS endpoint.');
        $validator->record('API key permissions are insufficient.');

        $this->assertTrue($validator->has_errors());
        $this->assertSame(
            [
                'URL must be a valid HTTPS endpoint.',
                'API key permissions are insufficient.',
            ],
            $validator->get_errors(),
        );
    }
}
