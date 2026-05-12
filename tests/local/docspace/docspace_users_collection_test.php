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
 * Unit tests for docspace_users_collection.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\docspace;

\defined('MOODLE_INTERNAL') || die();

/**
 * Unit tests for {@see docspace_users_collection}.
 *
 * @package    mod_onlyofficedocspace
 * @category   test
 * @copyright  2026 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \mod_onlyofficedocspace\local\docspace\docspace_users_collection
 */
final class docspace_users_collection_test extends \basic_testcase {
    /**
     * Test that get_by_email returns the same user instance that was added
     * to the collection under that email.
     */
    public function test_get_by_email_returns_user_after_add(): void {
        $alice = new docspace_user('alice@example.com', 'Alice', 'Anderson', true);
        $collection = new docspace_users_collection();

        $collection->add($alice);

        $this->assertSame($alice, $collection->get_by_email('alice@example.com'));
    }

    /**
     * Test that get_by_email returns null when no entry matches.
     */
    public function test_get_by_email_returns_null_for_unknown_email(): void {
        $collection = new docspace_users_collection([
            new docspace_user('alice@example.com', 'Alice', 'Anderson', true),
        ]);

        $this->assertNull($collection->get_by_email('bob@example.com'));
    }

    /**
     * Test that exists distinguishes between emails present and absent in the collection.
     */
    public function test_exists_reports_membership(): void {
        $collection = new docspace_users_collection([
            new docspace_user('alice@example.com', 'Alice', 'Anderson', true),
        ]);

        $this->assertTrue($collection->exists('alice@example.com'));
        $this->assertFalse($collection->exists('bob@example.com'));
    }

    /**
     * Test that get_by_email matches stored and queried email addresses case-insensitively.
     *
     * @dataProvider case_insensitive_email_provider
     * @param string $storedemail Email persisted on the docspace_user.
     * @param string $queriedemail Email used to look up the user.
     */
    public function test_get_by_email_is_case_insensitive(string $storedemail, string $queriedemail): void {
        $alice = new docspace_user($storedemail, 'Alice', 'Anderson', true);
        $collection = new docspace_users_collection([$alice]);

        $this->assertSame($alice, $collection->get_by_email($queriedemail));
    }

    /**
     * Test that exists matches stored and queried email addresses case-insensitively.
     *
     * @dataProvider case_insensitive_email_provider
     * @param string $storedemail Email persisted on the docspace_user.
     * @param string $queriedemail Email used to probe membership.
     */
    public function test_exists_is_case_insensitive(string $storedemail, string $queriedemail): void {
        $collection = new docspace_users_collection([
            new docspace_user($storedemail, 'Alice', 'Anderson', true),
        ]);

        $this->assertTrue($collection->exists($queriedemail));
    }

    /**
     * Pairs of stored / queried email addresses that should be treated as equivalent
     * under a case-insensitive comparison.
     *
     * @return array
     */
    public static function case_insensitive_email_provider(): array {
        return [
            'stored lowercase, queried uppercase' => [
                'alice@example.com',
                'ALICE@EXAMPLE.COM',
            ],
            'stored uppercase, queried lowercase' => [
                'ALICE@EXAMPLE.COM',
                'alice@example.com',
            ],
            'domain part differs only in case' => [
                'alice@example.com',
                'alice@Example.COM',
            ],
            'local part differs only in case' => [
                'alice@example.com',
                'Alice@example.com',
            ],
        ];
    }
}
