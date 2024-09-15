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
 * Define a class for handling get users request
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\http\requests;

use mod_onlyofficedocspace\docspace\enums\docspace_user_status;
use mod_onlyofficedocspace\moodle\moodle_docspace_user_manager;
use mod_onlyofficedocspace\moodle\moodle_user_manager;
use mod_onlyofficedocspace\docspace\docspace_settings;
use mod_onlyofficedocspace\docspace\docspace_user_manager;
use mod_onlyofficedocspace\docspace\enums\docspace_user_type;

/**
 * get_users_request
 */
class get_users_request {

    /**
     * @var docspace_settings
     */
    private docspace_settings $docspacesettings;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        $this->docspacesettings = new docspace_settings();
    }

    /**
     * __invoke
     *
     * @param  mixed $sort
     * @param  mixed $dir
     * @param  mixed $page
     * @param  mixed $perpage
     * @return array
     */
    public function __invoke(string $sort = 'id', string $dir = 'ASC', int $page = 0, int $perpage = 0): array {
        $moodleusermanager = new moodle_user_manager();
        $docspaceusermanager = new docspace_user_manager($this->docspacesettings->url(), $this->docspacesettings->token());
        $moodledocspaceusermanager = new moodle_docspace_user_manager();

        $moodleusers = in_array($sort, ['firstname', 'email', 'lastname'])
            ? $moodleusermanager->all($sort, $dir, $perpage * ($page - 1), $perpage)
            : $moodleusermanager->all(limitfrom: $perpage * ($page - 1), limitnum: $perpage);

        $docspaceusers = $docspaceusermanager->all();
        $users = [];

        foreach ($moodleusers as $user) {
            $docspaceuser = $docspaceusers->get($user->email);
            $status = docspace_user_status::NOT_FOUND;
            $type = docspace_user_type::NOT_FOUND;

            if ($docspaceuser) {
                $moodledocspaceuser = $moodledocspaceusermanager->get($user->email);

                if ($moodledocspaceuser === null) {
                    $moodledocspaceusermanager->create_or_update($user->email);
                    $status = docspace_user_status::EXIST;
                } else {
                    $status = $moodledocspaceuser && $moodledocspaceuser->password
                    ? docspace_user_status::ACTIVE
                    : docspace_user_status::EXIST;
                }

                $type = $docspaceuser['isRoomAdmin']
                    ? docspace_user_type::ROOM_ADMIN
                    : docspace_user_type::POWER_USER;
            }

            $users[] = [
                'id' => $user->id,
                'fullname' => "$user->firstname $user->lastname",
                'email' => $user->email,
                'status' => $status,
                'type' => $type,
                'role' => $user->role,
            ];
        }

        return $users;
    }
}
