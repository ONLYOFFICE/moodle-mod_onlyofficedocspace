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
 * Unit tests for docspace_user.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\docspace;

\defined('MOODLE_INTERNAL') || die();

/**
 * Unit tests for {@see docspace_user}.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \mod_onlyofficedocspace\local\docspace\docspace_user
 */
final class docspace_user_test extends \basic_testcase {
    /**
     * Test that from_array translates the DocSpace API's camelCase payload keys
     * into the snake_case object properties used internally.
     *
     * @dataProvider from_array_provider
     * @param array $data Raw DocSpace API user payload.
     * @param bool $expectedisroomadmin Expected isroomadmin value on the resulting object.
     */
    public function test_from_array_maps_camel_case_keys_to_properties(
        array $data,
        bool $expectedisroomadmin,
    ): void {
        $user = docspace_user::from_array($data);

        $this->assertSame($data['email'], $user->email);
        $this->assertSame($data['firstName'], $user->firstname);
        $this->assertSame($data['lastName'], $user->lastname);
        $this->assertSame($expectedisroomadmin, $user->isroomadmin);
    }

    /**
     * Cases for {@see test_from_array_maps_camel_case_keys_to_properties}.
     *
     * @return array
     */
    public static function from_array_provider(): array {
        return [
            'room administrator' => [
                [
                    'email' => 'alice@example.com',
                    'firstName' => 'Alice',
                    'lastName' => 'Anderson',
                    'isRoomAdmin' => true,
                ],
                true,
            ],
            'regular power user' => [
                [
                    'email' => 'bob@example.com',
                    'firstName' => 'Bob',
                    'lastName' => 'Brown',
                    'isRoomAdmin' => false,
                ],
                false,
            ],
        ];
    }
}
