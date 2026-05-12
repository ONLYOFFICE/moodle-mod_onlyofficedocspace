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
 * Unit tests for user_repository.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\moodle\repositories;

\defined('MOODLE_INTERNAL') || die();

/**
 * Unit tests for {@see user_repository}.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \mod_onlyofficedocspace\local\moodle\repositories\user_repository
 */
final class user_repository_test extends \advanced_testcase {
    /**
     * Reset Moodle state after every test.
     */
    protected function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    /**
     * Test that get_users_with_editor_roles returns only users holding one of the
     * editor-class roles (manager, coursecreator, editingteacher, teacher) and excludes
     * students.
     */
    public function test_get_users_with_editor_roles_returns_only_editor_role_holders(): void {
        $course = $this->getDataGenerator()->create_course();
        $teacher = $this->getDataGenerator()->create_and_enrol($course, 'editingteacher', [
            'email' => 'alice@example.com',
            'firstname' => 'Alice',
            'lastname' => 'Anderson',
        ]);
        $this->getDataGenerator()->create_and_enrol($course, 'student', [
            'email' => 'bob@example.com',
            'firstname' => 'Bob',
            'lastname' => 'Brown',
        ]);

        $users = (new user_repository())->get_users_with_editor_roles();

        $this->assertCount(1, $users);
        $this->assertEquals($teacher->id, reset($users)->id);
    }

    /**
     * Test that deleted and suspended users are filtered out even when their role
     * assignments still match the editor-role criteria.
     */
    public function test_get_users_with_editor_roles_excludes_deleted_and_suspended_users(): void {
        global $DB;

        $course = $this->getDataGenerator()->create_course();
        $alice = $this->getDataGenerator()->create_and_enrol($course, 'editingteacher', [
            'email' => 'alice@example.com',
        ]);
        $bob = $this->getDataGenerator()->create_and_enrol($course, 'editingteacher', [
            'email' => 'bob@example.com',
        ]);
        $carol = $this->getDataGenerator()->create_and_enrol($course, 'editingteacher', [
            'email' => 'carol@example.com',
        ]);

        $DB->set_field('user', 'deleted', 1, ['id' => $bob->id]);
        $DB->set_field('user', 'suspended', 1, ['id' => $carol->id]);

        $users = (new user_repository())->get_users_with_editor_roles();

        $this->assertCount(1, $users);
        $this->assertEquals($alice->id, reset($users)->id);
    }

    /**
     * Test that a user listed in $CFG->siteadmins is labelled with the plugin's
     * Site Administrator string, overriding the role-name mapping.
     */
    public function test_get_users_with_editor_roles_labels_site_admin(): void {
        $course = $this->getDataGenerator()->create_course();
        $admin = $this->getDataGenerator()->create_and_enrol($course, 'editingteacher', [
            'email' => 'site-admin@example.com',
        ]);

        set_config('siteadmins', $admin->id);

        $users = (new user_repository())->get_users_with_editor_roles();

        $this->assertSame(
            get_string('siteadmin', 'onlyofficedocspace'),
            reset($users)->role,
        );
    }

    /**
     * Test that the offset and limit arguments page through the ordered result set,
     * which is sorted by firstname then lastname.
     */
    public function test_get_users_with_editor_roles_supports_offset_and_limit(): void {
        $course = $this->getDataGenerator()->create_course();
        $this->getDataGenerator()->create_and_enrol($course, 'editingteacher', [
            'firstname' => 'Alice',
            'lastname' => 'Anderson',
        ]);
        $this->getDataGenerator()->create_and_enrol($course, 'editingteacher', [
            'firstname' => 'Bob',
            'lastname' => 'Brown',
        ]);
        $this->getDataGenerator()->create_and_enrol($course, 'editingteacher', [
            'firstname' => 'Carol',
            'lastname' => 'Carter',
        ]);

        $page = (new user_repository())->get_users_with_editor_roles(1, 1);

        $this->assertCount(1, $page);
        $this->assertSame('Bob', reset($page)->firstname);
    }

    /**
     * Test that get_multiple_by_id returns only the users whose ids are listed.
     */
    public function test_get_multiple_by_id_returns_matching_users(): void {
        $alice = $this->getDataGenerator()->create_user(['email' => 'alice@example.com']);
        $this->getDataGenerator()->create_user(['email' => 'bob@example.com']);
        $carol = $this->getDataGenerator()->create_user(['email' => 'carol@example.com']);

        $users = (new user_repository())->get_multiple_by_id([$alice->id, $carol->id]);

        $emails = array_column($users, 'email');
        sort($emails);
        $this->assertSame(['alice@example.com', 'carol@example.com'], $emails);
    }

    /**
     * Test that get_multiple_by_id short-circuits on an empty input and returns an
     * empty array.
     */
    public function test_get_multiple_by_id_returns_empty_array_for_empty_input(): void {
        $this->assertSame([], (new user_repository())->get_multiple_by_id([]));
    }

    /**
     * Test that count_users_with_editor_roles counts editor-role users and excludes
     * students.
     */
    public function test_count_users_with_editor_roles_counts_editors_excluding_students(): void {
        $this->setAdminUser();
        $course = $this->getDataGenerator()->create_course();
        $this->getDataGenerator()->create_and_enrol($course, 'editingteacher');
        $this->getDataGenerator()->create_and_enrol($course, 'teacher');
        $this->getDataGenerator()->create_and_enrol($course, 'student');

        $this->assertSame(2, (new user_repository())->count_users_with_editor_roles());
    }

    /**
     * Test that get_by_id returns the user record for a matching id.
     */
    public function test_get_by_id_returns_user_record(): void {
        $alice = $this->getDataGenerator()->create_user(['email' => 'alice@example.com']);

        $user = (new user_repository())->get_by_id((string) $alice->id);

        $this->assertNotNull($user);
        $this->assertSame('alice@example.com', $user->email);
    }

    /**
     * Test that get_by_id returns null when the id has no matching user record.
     */
    public function test_get_by_id_returns_null_when_no_match(): void {
        $this->assertNull((new user_repository())->get_by_id('99999'));
    }
}
