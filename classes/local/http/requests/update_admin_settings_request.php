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

namespace mod_onlyofficedocspace\local\http\requests;

use mod_onlyofficedocspace\local\common\flash_message;
use mod_onlyofficedocspace\local\docspace\docspace_settings;
use mod_onlyofficedocspace\local\docspace\docspace_user_manager;
use mod_onlyofficedocspace\local\docspace\enums\docspace_user_type;
use mod_onlyofficedocspace\local\errors\docspace_error;
use mod_onlyofficedocspace\local\errors\invalid_credentials_error;
use mod_onlyofficedocspace\local\errors\validation_error;
use mod_onlyofficedocspace\local\moodle\moodle_docspace_user_manager;
use moodle_exception;

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
        try {
            $this->docspaceurl = required_param('url', PARAM_URL);
            $this->docspaceemail = required_param('email', PARAM_EMAIL);
            $this->docspacepassword = required_param('password', PARAM_RAW);
            $this->randompassword = required_param('randomPassword', PARAM_RAW);
        } catch (moodle_exception) {
            throw new validation_error(get_string('paramsmissingvalidationerror', 'onlyofficedocspace'));
        }

        $this->sanitize();
    }

    /**
     * Sanitize data
     *
     * @return void
     */
    private function sanitize(): void {
        $this->docspaceurl = filter_var(trim($this->docspaceurl), FILTER_SANITIZE_URL);
        $this->docspaceurl = rtrim($this->docspaceurl, "/");
        $this->docspaceemail = filter_var(trim($this->docspaceemail), FILTER_SANITIZE_EMAIL);
        $this->docspacepassword = trim($this->docspacepassword);
        $this->randompassword = trim($this->randompassword);
    }

    /**
     * __invoke
     *
     * @return void
     */
    public function __invoke() {
        global $USER;

        $flashmessage = new flash_message();

        $oldurl = get_config('onlyofficedocspace', docspace_settings::DOCSPACE_URL);

        $settings = new docspace_settings(
            $this->docspaceurl,
            $this->docspaceemail,
            $this->docspacepassword,
        );

        try {
            $settings->ensureIntegrity();
        } catch (invalid_credentials_error $e) {
            throw new validation_error($e->getMessage());
        }

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
            } catch (docspace_error $e) {
                $flashmessage->add('error', $e->getMessage());
            }
        } else {
            $flashmessage->add('warning', get_string('docspaceuseralreadyexists', 'onlyofficedocspace', $USER->email));
        }
    }
}
