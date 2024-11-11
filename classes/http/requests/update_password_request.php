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
 * Define a class for handling update user password request
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\http\requests;

use mod_onlyofficedocspace\docspace\docspace_settings;
use mod_onlyofficedocspace\docspace\docspace_auth_manager;
use mod_onlyofficedocspace\errors\validation_error;
use mod_onlyofficedocspace\moodle\moodle_docspace_user_manager;
use moodle_exception;

/**
 * update_password_request
 */
class update_password_request {

    /**
     * docspaceemail
     *
     * @var mixed
     */
    private $docspaceemail;
    /**
     * docspacepassword
     *
     * @var mixed
     */
    private $docspacepassword;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        global $USER;

        try {
            $email = required_param('email', PARAM_EMAIL);
            $password = required_param('password', PARAM_RAW);
        } catch(moodle_exception) {
            throw new validation_error(get_string('paramsmissingvalidationerror', 'onlyofficedocspace'));
        }

        if ($USER->email !== $email) {
            throw new validation_error(get_string('invalidparamsvalidationerror', 'onlyofficedocspace'));
        }

        $this->docspaceemail = $email;
        $this->docspacepassword = $password;
    }

    /**
     * __invoke
     *
     * @return void
     */
    public function __invoke() {
        $settings = new docspace_settings();

        $settings->healthCheck();

        $docspaceauthmanager = new docspace_auth_manager($settings->url());
        $docspaceauthmanager->authenticate($this->docspaceemail, $this->docspacepassword);

        $moodledocspaceusermanager = new moodle_docspace_user_manager();
        $moodledocspaceusermanager->create_or_update($this->docspaceemail, $this->docspacepassword);
    }
}
