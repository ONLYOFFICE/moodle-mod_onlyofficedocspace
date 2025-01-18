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
 * Define a class for handling invite users request
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\http\requests;

use JsonException;
use mod_onlyofficedocspace\local\common\flash_message;
use mod_onlyofficedocspace\local\docspace\docspace_settings;
use mod_onlyofficedocspace\local\docspace\docspace_user_manager;
use mod_onlyofficedocspace\local\docspace\enums\docspace_user_type;
use mod_onlyofficedocspace\local\errors\docspace_error;
use mod_onlyofficedocspace\local\errors\validation_error;
use mod_onlyofficedocspace\local\moodle\moodle_docspace_user_manager;
use mod_onlyofficedocspace\local\moodle\moodle_user_manager;
use moodle_exception;

/**
 * invite_users_request
 */
class invite_users_request {

    /**
     * @var array
     */
    private array $users;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        try {
            $usersparam = required_param('users', PARAM_RAW);
            $users = json_decode($usersparam, true, flags: JSON_THROW_ON_ERROR);
        } catch (moodle_exception | JsonException) {
            throw new validation_error(get_string('paramsmissingvalidationerror', 'onlyofficedocspace'));
        }

        if (! is_array($users)) {
            throw new validation_error(get_string('paramsmissingvalidationerror', 'onlyofficedocspace'));
        }

        foreach ($users as $user) {
            if (! (
                (array_key_exists('id', $user) && array_key_exists('hash', $user))
                && (!empty($user['id']) && !empty($user['hash']))
            )) {
                throw new validation_error(get_string('paramsmissingvalidationerror', 'onlyofficedocspace'));
            }
        }

        $this->users = $users;
    }

    /**
     * __invoke
     *
     * @return void
     */
    public function __invoke() {
        $settings = new docspace_settings();
        $settings->ensureIntegrity();

        $skippedinvitations = 0;
        $failedinvitations = 0;
        $sentinvitations = 0;

        $docspaceusermanager = new docspace_user_manager($settings->url(), $settings->token());
        $docspaceusers = $docspaceusermanager->all();

        $moodleusermanager = new moodle_user_manager();
        $moodledocspaceusermanager = new moodle_docspace_user_manager();

        foreach ($this->users as $useritem) {
            $user = $moodleusermanager->get($useritem['id']);

            if ($user === null) {
                $skippedinvitations++;
                continue;
            }

            if ($docspaceusers->get($user->email) === null) {
                try {
                    $docspaceusermanager->invite(
                        $user->email,
                        $useritem['hash'],
                        $user->firstname,
                        $user->lastname,
                        docspace_user_type::POWER_USER,
                    );
                    $sentinvitations++;
                } catch (docspace_error $e) {
                    $failedinvitations++;
                }

                $moodledocspaceusermanager->create_or_update($user->email, $useritem['hash']);
            } else {
                $skippedinvitations++;
            }
        }

        $userscount = count($this->users);

        $flash = new flash_message();

        if ($skippedinvitations > 0) {
            $flash->add(
                'skipped_invitations',
                get_string('skippedinvitations', 'onlyofficedocspace', "$skippedinvitations / $userscount")
            );
        }
        if ($sentinvitations > 0) {
            $flash->add(
                'sent_invitations',
                get_string('sentinvitations', 'onlyofficedocspace', "$sentinvitations / $userscount")
            );
        }
        if ($failedinvitations > 0) {
            $flash->add(
                'failed_invitations',
                get_string('failedinvitations', 'onlyofficedocspace', "$failedinvitations / $userscount")
            );
        }
    }
}
