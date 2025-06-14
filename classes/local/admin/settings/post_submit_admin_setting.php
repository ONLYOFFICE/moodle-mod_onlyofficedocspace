<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Post-submit admin setting.
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\admin\settings;

use admin_setting;
use core\notification;
use mod_onlyofficedocspace\local\admin\validators\docspace_api_key_validator;
use mod_onlyofficedocspace\local\admin\validators\docspace_url_validator;
use mod_onlyofficedocspace\local\common\url_parser;
use mod_onlyofficedocspace\local\docspace\docspace_csp_settings;
use mod_onlyofficedocspace\local\docspace\docspace_settings;
use mod_onlyofficedocspace\local\moodle\moodle_docspace_user_manager;

/**
 * Post-submit admin setting.
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class post_submit_admin_setting extends admin_setting {
    /**
     * Clear users flag.
     *
     * @var string
     */
    private $clearusers = false;

    /**
     * Constructor.
     */
    public function __construct($clearusers = false) {
        $this->clearusers = $clearusers;
        $this->nosave = true;
        parent::__construct(
            'onlyofficedocspace_post_submit_admin_setting',
            '',
            '',
            ''
        );
    }

    /**
     * Get setting.
     *
     * @return bool True
     */
    public function get_setting() {
        return true;
    }

    /**
     * Write setting.
     *
     * @param string $data Data to write
     * @return string Empty string
     */
    public function write_setting($data) {
        global $CFG;
        // Validate settings after every form submission.
        $docspaceurl = docspace_settings::url();
        $docspaceapikey = docspace_settings::api_key();

        if (empty($docspaceurl) || empty($docspaceapikey)) {
            return '';
        }

        // Validate the DocSpace URL and API key.
        $docspaceurlvalidator = new docspace_url_validator($docspaceurl);
        $docspaceurlvalidator->validate();
        if ($docspaceurlvalidator->has_errors()) {
            foreach ($docspaceurlvalidator->get_errors() as $error) {
                notification::error($error);
            }
            return '';
        }

        $docspaceapikeyvalidator = new docspace_api_key_validator($docspaceurl, $docspaceapikey);
        $docspaceapikeyvalidator->validate();
        if ($docspaceapikeyvalidator->has_errors()) {
            foreach ($docspaceapikeyvalidator->get_errors() as $error) {
                notification::error($error);
            }
            return '';
        }

        $domain = url_parser::get_base($CFG->wwwroot);
        // Add the domain to the CSP allowed list.
        docspace_csp_settings::adddomain($domain);

        // Clear the docspace users in moodle database if the clearusers flag is set.
        $moodledocspaceusermanager = new moodle_docspace_user_manager();

        if ($this->clearusers) {
            $moodledocspaceusermanager->clear();
        }

        return '';
    }

    /**
     * Output HTML.
     *
     * @param string $data Data to output
     * @param string $query Query string
     * @return string HTML output
     */
    public function output_html($data, $query='') {
        return '<div><input type="hidden" name="' . $this->get_full_name() . '" value="1"/></div>';
    }
}
