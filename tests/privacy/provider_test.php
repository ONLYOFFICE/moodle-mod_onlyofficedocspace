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
 * Unit tests for the privacy provider.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\privacy;

use core_privacy\local\metadata\collection;
use core_privacy\local\request\approved_contextlist;
use core_privacy\local\request\approved_userlist;
use core_privacy\local\request\userlist;
use core_privacy\local\request\writer;
use mod_onlyofficedocspace\local\moodle\repositories\docspace_user_repository;

\defined('MOODLE_INTERNAL') || die();

/**
 * Unit tests for {@see provider}.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \mod_onlyofficedocspace\privacy\provider
 */
final class provider_test extends \advanced_testcase {
    /**
     * Reset Moodle state after every test.
     */
    protected function setUp(): void {
        parent::setUp();
    }

    /**
     * Test that get_metadata registers the dsuser table and both external location links.
     */
    public function test_get_metadata_registers_dsuser_table_and_external_locations(): void {
        $collection = new collection('mod_onlyofficedocspace');

        provider::get_metadata($collection);

        $names = array_map(fn($item) => $item->get_name(), $collection->get_collection());
        $this->assertContains('onlyofficedocspace_dsuser', $names);
        $this->assertContains('onlyofficedocspace_settings', $names);
        $this->assertContains('onlyofficedocspace_users', $names);
    }

    /**
     * Test that get_contexts_for_userid returns the system context when the Moodle user exists.
     */
    public function test_get_contexts_for_userid_returns_system_context_for_existing_user(): void {
        $userid = $this->create_moodle_user('alice@example.com');

        $contextlist = provider::get_contexts_for_userid($userid);

        $contextids = $contextlist->get_contextids();
        $this->assertEquals([\context_system::instance()->id], $contextids);
    }

    /**
     * Test that get_contexts_for_userid returns an empty contextlist for an unknown user id.
     */
    public function test_get_contexts_for_userid_returns_empty_for_unknown_user(): void {
        $contextlist = provider::get_contexts_for_userid(99999);

        $this->assertSame([], $contextlist->get_contextids());
    }

    /**
     * Test that get_users_in_context adds Moodle users whose email matches a stored
     * docspace_user record, when called against the system context.
     */
    public function test_get_users_in_context_finds_users_with_matching_email(): void {
        $aliceid = $this->create_moodle_user('alice@example.com');
        $this->create_moodle_user('bob@example.com');
        $this->insert_dsuser_record($aliceid, 'alice@example.com');

        $userlist = new userlist(\context_system::instance(), 'mod_onlyofficedocspace');

        provider::get_users_in_context($userlist);

        $this->assertSame([$aliceid], $userlist->get_userids());
    }

    /**
     * Test that export_user_data writes the user's docspace_user record under the
     * system context for the approved context list.
     */
    public function test_export_user_data_writes_dsuser_record_for_user(): void {
        $userid = $this->create_moodle_user('alice@example.com');
        $this->insert_dsuser_record($userid, 'alice@example.com');
        $user = \core_user::get_user($userid);
        $context = \context_system::instance();
        $contextlist = new approved_contextlist($user, 'mod_onlyofficedocspace', [$context->id]);

        $this->assertFalse(writer::with_context($context)->has_any_data());

        provider::export_user_data($contextlist);

        $this->assertTrue(writer::with_context($context)->has_any_data());
    }

    /**
     * Test that delete_data_for_user removes the docspace_user record for the requested
     * user while leaving other users' records intact.
     */
    public function test_delete_data_for_user_removes_only_the_targeted_users_record(): void {
        $aliceid = $this->create_moodle_user('alice@example.com');
        $bobid = $this->create_moodle_user('bob@example.com');
        $this->insert_dsuser_record($aliceid, 'alice@example.com');
        $this->insert_dsuser_record($bobid, 'bob@example.com');
        $alice = \core_user::get_user($aliceid);
        $context = \context_system::instance();
        $contextlist = new approved_contextlist($alice, 'mod_onlyofficedocspace', [$context->id]);

        provider::delete_data_for_user($contextlist);

        $repository = new docspace_user_repository();
        $this->assertNull($repository->get_by_moodleuserid($aliceid));
        $this->assertNotNull($repository->get_by_moodleuserid($bobid));
    }

    /**
     * Test that delete_data_for_all_users_in_context wipes every docspace_user record.
     */
    public function test_delete_data_for_all_users_in_context_wipes_dsuser_table(): void {
        $aliceid = $this->create_moodle_user('alice@example.com');
        $bobid = $this->create_moodle_user('bob@example.com');
        $this->insert_dsuser_record($aliceid, 'alice@example.com');
        $this->insert_dsuser_record($bobid, 'bob@example.com');

        provider::delete_data_for_all_users_in_context(\context_system::instance());

        $repository = new docspace_user_repository();
        $this->assertNull($repository->get_by_moodleuserid($aliceid));
        $this->assertNull($repository->get_by_moodleuserid($bobid));
    }

    /**
     * Test that delete_data_for_users removes records only for the users named in the
     * approved userlist.
     */
    public function test_delete_data_for_users_removes_only_listed_users(): void {
        $aliceid = $this->create_moodle_user('alice@example.com');
        $bobid = $this->create_moodle_user('bob@example.com');
        $this->insert_dsuser_record($aliceid, 'alice@example.com');
        $this->insert_dsuser_record($bobid, 'bob@example.com');
        $userlist = new approved_userlist(\context_system::instance(), 'mod_onlyofficedocspace', [$aliceid]);

        provider::delete_data_for_users($userlist);

        $repository = new docspace_user_repository();
        $this->assertNull($repository->get_by_moodleuserid($aliceid));
        $this->assertNotNull($repository->get_by_moodleuserid($bobid));
    }

    /**
     * Create a Moodle user with the given email, returning the user id.
     *
     * @param string $email Email address for the new user.
     * @return int Moodle user id.
     */
    private function create_moodle_user(string $email): int {
        return (int) $this->getDataGenerator()->create_user([
            'email' => $email,
            'lang' => 'en',
        ])->id;
    }

    /**
     * Insert a fixture row into onlyofficedocspace_dsuser.
     *
     * @param int $userid Moodle user id linked to the DocSpace credentials.
     * @param string $email DocSpace email address.
     */
    private function insert_dsuser_record(int $userid, string $email): void {
        global $DB;

        $DB->insert_record('onlyofficedocspace_dsuser', [
            'email' => $email,
            'password' => 'a3c8b9d2f4e6a1b5',
            'userid' => $userid,
        ]);
    }
}
