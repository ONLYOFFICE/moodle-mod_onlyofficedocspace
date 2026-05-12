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
 * Unit tests for docspace_user_repository.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\moodle\repositories;

\defined('MOODLE_INTERNAL') || die();

/**
 * Unit tests for {@see docspace_user_repository}.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \mod_onlyofficedocspace\local\moodle\repositories\docspace_user_repository
 */
final class docspace_user_repository_test extends \advanced_testcase {
    /**
     * Reset Moodle state after every test.
     */
    protected function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    /**
     * Test that get_by_email returns the persisted record for a matching email.
     */
    public function test_get_by_email_returns_record_for_matching_email(): void {
        $userid = $this->create_moodle_user('alice@example.com');
        $this->insert_dsuser_record($userid, 'alice@example.com', 'a3c8b9d2f4e6a1b5');

        $record = (new docspace_user_repository())->get_by_email('alice@example.com');

        $this->assertSame('alice@example.com', $record->email);
        $this->assertSame('a3c8b9d2f4e6a1b5', $record->password);
        $this->assertEquals($userid, $record->userid);
    }

    /**
     * Test that get_by_email returns null when no record matches the email.
     */
    public function test_get_by_email_returns_null_when_no_record_exists(): void {
        $this->assertNull((new docspace_user_repository())->get_by_email('alice@example.com'));
    }

    /**
     * Test that get_by_moodleuserid returns the persisted record for a matching Moodle user.
     */
    public function test_get_by_moodleuserid_returns_record_for_matching_user(): void {
        $userid = $this->create_moodle_user('alice@example.com');
        $this->insert_dsuser_record($userid, 'alice@example.com');

        $record = (new docspace_user_repository())->get_by_moodleuserid($userid);

        $this->assertSame('alice@example.com', $record->email);
        $this->assertEquals($userid, $record->userid);
    }

    /**
     * Test that get_by_moodleuserid returns null when no record matches the Moodle user id.
     */
    public function test_get_by_moodleuserid_returns_null_when_no_record_exists(): void {
        $this->assertNull((new docspace_user_repository())->get_by_moodleuserid(99999));
    }

    /**
     * Test that get_multiple_by_email returns only the records whose email is in the list.
     */
    public function test_get_multiple_by_email_returns_only_matching_records(): void {
        $aliceid = $this->create_moodle_user('alice@example.com');
        $bobid = $this->create_moodle_user('bob@example.com');
        $carolid = $this->create_moodle_user('carol@example.com');
        $this->insert_dsuser_record($aliceid, 'alice@example.com');
        $this->insert_dsuser_record($bobid, 'bob@example.com');
        $this->insert_dsuser_record($carolid, 'carol@example.com');

        $records = (new docspace_user_repository())->get_multiple_by_email([
            'alice@example.com',
            'carol@example.com',
        ]);

        $emails = array_column($records, 'email');
        sort($emails);
        $this->assertSame(['alice@example.com', 'carol@example.com'], $emails);
    }

    /**
     * Test that get_multiple_by_moodleuserids returns only the records whose userid is in the list.
     */
    public function test_get_multiple_by_moodleuserids_returns_only_matching_records(): void {
        $aliceid = $this->create_moodle_user('alice@example.com');
        $bobid = $this->create_moodle_user('bob@example.com');
        $this->insert_dsuser_record($aliceid, 'alice@example.com');
        $this->insert_dsuser_record($bobid, 'bob@example.com');

        $records = (new docspace_user_repository())->get_multiple_by_moodleuserids([$aliceid]);

        $this->assertCount(1, $records);
        $record = reset($records);
        $this->assertSame('alice@example.com', $record->email);
    }

    /**
     * Test that create inserts a new record and returns true.
     */
    public function test_create_persists_user_record_and_returns_true(): void {
        $userid = $this->create_moodle_user('alice@example.com');
        $repository = new docspace_user_repository();

        $result = $repository->create([
            'email' => 'alice@example.com',
            'password' => 'a3c8b9d2f4e6a1b5',
            'userid' => $userid,
        ]);

        $this->assertTrue($result);
        $record = $repository->get_by_email('alice@example.com');
        $this->assertSame('a3c8b9d2f4e6a1b5', $record->password);
        $this->assertEquals($userid, $record->userid);
    }

    /**
     * Test that create_multiple inserts every supplied record and returns true.
     */
    public function test_create_multiple_persists_each_record_and_returns_true(): void {
        $aliceid = $this->create_moodle_user('alice@example.com');
        $bobid = $this->create_moodle_user('bob@example.com');
        $repository = new docspace_user_repository();

        $result = $repository->create_multiple([
            ['email' => 'alice@example.com', 'password' => 'a3c8b9d2f4e6a1b5', 'userid' => $aliceid],
            ['email' => 'bob@example.com', 'password' => '7d4e6f8a9c2b1d3e', 'userid' => $bobid],
        ]);

        $this->assertTrue($result);
        $this->assertNotNull($repository->get_by_email('alice@example.com'));
        $this->assertNotNull($repository->get_by_email('bob@example.com'));
    }

    /**
     * Test that update rewrites the email, password, and userid fields of an existing
     * record and returns true.
     */
    public function test_update_modifies_record_fields_and_returns_true(): void {
        $oldid = $this->create_moodle_user('alice@example.com');
        $newid = $this->create_moodle_user('alice-new@example.com');
        $dsid = $this->insert_dsuser_record($oldid, 'alice@example.com', 'a3c8b9d2f4e6a1b5');
        $repository = new docspace_user_repository();

        $result = $repository->update([
            'id' => $dsid,
            'email' => 'alice-new@example.com',
            'password' => '7d4e6f8a9c2b1d3e',
            'userid' => $newid,
        ]);

        $this->assertTrue($result);
        $record = $repository->get_by_email('alice-new@example.com');
        $this->assertSame('7d4e6f8a9c2b1d3e', $record->password);
        $this->assertEquals($newid, $record->userid);
    }

    /**
     * Test that delete_multiple_by_moodleuserid removes records for the listed users
     * while leaving unrelated records in place.
     */
    public function test_delete_multiple_by_moodleuserid_removes_only_matching_records(): void {
        $aliceid = $this->create_moodle_user('alice@example.com');
        $bobid = $this->create_moodle_user('bob@example.com');
        $this->insert_dsuser_record($aliceid, 'alice@example.com');
        $this->insert_dsuser_record($bobid, 'bob@example.com');
        $repository = new docspace_user_repository();

        $result = $repository->delete_multiple_by_moodleuserid([$aliceid]);

        $this->assertTrue($result);
        $this->assertNull($repository->get_by_email('alice@example.com'));
        $this->assertNotNull($repository->get_by_email('bob@example.com'));
    }

    /**
     * Test that delete_all wipes every row from the table and returns true.
     */
    public function test_delete_all_clears_table_and_returns_true(): void {
        $aliceid = $this->create_moodle_user('alice@example.com');
        $bobid = $this->create_moodle_user('bob@example.com');
        $this->insert_dsuser_record($aliceid, 'alice@example.com');
        $this->insert_dsuser_record($bobid, 'bob@example.com');
        $repository = new docspace_user_repository();

        $result = $repository->delete_all();

        $this->assertTrue($result);
        $this->assertNull($repository->get_by_email('alice@example.com'));
        $this->assertNull($repository->get_by_email('bob@example.com'));
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
     * @param string $password Stored password hash.
     * @return int Inserted record id.
     */
    private function insert_dsuser_record(int $userid, string $email, string $password = 'a3c8b9d2f4e6a1b5'): int {
        global $DB;

        return $DB->insert_record('onlyofficedocspace_dsuser', [
            'email' => $email,
            'password' => $password,
            'userid' => $userid,
        ]);
    }
}
