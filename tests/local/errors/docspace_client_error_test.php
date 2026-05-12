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
 * Unit tests for docspace_client_error.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\errors;

\defined('MOODLE_INTERNAL') || die();

/**
 * Unit tests for {@see docspace_client_error}.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \mod_onlyofficedocspace\local\errors\docspace_client_error
 */
final class docspace_client_error_test extends \basic_testcase {
    /**
     * Test that get_statuscode returns the HTTP status code passed to the constructor,
     * and that the message argument is forwarded to the base Exception.
     */
    public function test_get_statuscode_returns_constructor_argument(): void {
        $error = new docspace_client_error(404, 'Portal user not found.');

        $this->assertSame(404, $error->get_statuscode());
        $this->assertSame('Portal user not found.', $error->getMessage());
    }

    /**
     * Test that get_statuscode defaults to zero when no arguments are passed.
     */
    public function test_get_statuscode_defaults_to_zero(): void {
        $error = new docspace_client_error();

        $this->assertSame(0, $error->get_statuscode());
    }

    /**
     * Test that the status code is also exposed via the standard Exception::getCode
     * API so generic exception handlers can read it without depending on this class.
     */
    public function test_status_code_is_exposed_as_exception_code(): void {
        $error = new docspace_client_error(500, 'Document server failure.');

        $this->assertSame(500, $error->getCode());
    }
}
