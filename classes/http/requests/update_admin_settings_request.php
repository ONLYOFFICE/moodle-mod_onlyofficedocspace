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
 * Define a class for handling update admin settings request
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\http\requests;

use Exception;
use mod_onlyofficedocspace\docspace\docspace_settings;
use mod_onlyofficedocspace\docspace\docspace_user_manager;
use mod_onlyofficedocspace\docspace\enums\docspace_user_type;
use mod_onlyofficedocspace\errors\validation_error;
use mod_onlyofficedocspace\moodle\moodle_docspace_user_manager;

/**
 * update_admin_settings_request
 */
class update_admin_settings_request {

    /**
     * @var string
     */
    private string $docspaceurl;
    /**
     * @var string
     */
    private string $docspaceemail;
    /**
     * @var string
     */
    private string $docspacepassword;
    /**
     * @var string
     */
    private string $randompassword;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        if (
            ! (isset($_POST['url']) && !empty($_POST['url'])
                && isset($_POST['email']) && !empty($_POST['email'])
                && isset($_POST['password']) && !empty($_POST['password'])
                && isset($_POST['randomPassword']) && !empty($_POST['randomPassword']))
        ) {
            throw new validation_error(get_string('paramsmissingvalidationerror', 'onlyofficedocspace'));
        }

        $this->docspaceurl = $_POST['url'];
        $this->docspaceemail = $_POST['email'];
        $this->docspacepassword = $_POST['password'];
        $this->randompassword = $_POST['randomPassword'];
    }

    /**
     * __invoke
     *
     * @return void
     */
    public function __invoke() {
        global $USER;

        $oldurl = get_config('onlyofficedocspace', docspace_settings::DOCSPACE_URL);

        $settings = new docspace_settings(
            $this->docspaceurl,
            $this->docspaceemail,
            $this->docspacepassword,
        );

        $settings->ensureIntegrity();

        $moodledocspaceusermanager = new moodle_docspace_user_manager();

        if ($settings->url() !== $oldurl) {
            $moodledocspaceusermanager->clear();
        }

        $usermanager = new docspace_user_manager($settings->url(), $settings->token());

        $currentuser = $usermanager->get($USER->email);

        if ($currentuser === null) {
            try {
                $usermanager->invite(
                    $USER->email,
                    $this->randompassword,
                    $USER->firstname,
                    $USER->lastname,
                    docspace_user_type::ROOM_ADMIN
                );
                $moodledocspaceusermanager->create_or_update($USER->email, $this->randompassword);
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
    }
}
