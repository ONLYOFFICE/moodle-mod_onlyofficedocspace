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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Adds admin settings for the plugin.
 *
 * @package     mod_onlyofficedocspace
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use mod_onlyofficedocspace\local\moodle\admin\settings\admin_setting_docspace_api_key;
use mod_onlyofficedocspace\local\moodle\admin\settings\admin_setting_docspace_url;
use mod_onlyofficedocspace\local\moodle\plugin_settings;

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $sectionparam = $PAGE->url->get_param('section');
    $categoryparam = $PAGE->url->get_param('category');

    if ($categoryparam === 'onlyoffice_docspace_settings' || $sectionparam === $section) {
        $defaulthost = 'https://docspaceserver.url';
        $helpcentermoodleurl = 'https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx';
        $connected = !(empty(plugin_settings::url()) || empty(plugin_settings::api_key()));

        // Add the plugin intro text.
        $docspaceintro = $OUTPUT->render_from_template('mod_onlyofficedocspace/settings/docspace_intro', [
            'learnmoreurl' => $helpcentermoodleurl,
            'suggesturl' => '#',
        ]);
        $settings->add(new admin_setting_heading('mod_onlyofficedocspace/intro', '', $docspaceintro));

        // Add DocSpace URL setting.
        $settings->add(new admin_setting_docspace_url(
            "onlyofficedocspace/docspace_server_url",
            get_string('docspaceserverurl', 'onlyofficedocspace'),
            get_string('adminsettings:urldescription', 'onlyofficedocspace'),
            '',
        ));

        // Add DocSpace API key setting.
        $settings->add(new admin_setting_docspace_api_key(
            "onlyofficedocspace/docspace_api_key",
            get_string('docspaceapikey', 'onlyofficedocspace'),
            '',
            '',
        ));

        // Add the setting buttons.
        $settingbuttons = $OUTPUT->render_from_template('mod_onlyofficedocspace/settings/docspace_setting_buttons', []);
        $settings->add(new admin_setting_heading('mod_onlyofficedocspace/setting_buttons', '', $settingbuttons));

        $PAGE->requires->js_call_amd('mod_onlyofficedocspace/admin_settings', 'init', ['connected' => $connected]);

        if ($connected) {
            $docspaceusersplaceholder = $OUTPUT->render_from_template('onlyofficedocspace/docspace_users_category', ['url' => '#']);
            $settings->add(
                new admin_setting_heading(
                'onlyofficedocspace/docspace_users',
                get_string('docspaceuserscategory:title', 'onlyofficedocspace'),
                $docspaceusersplaceholder
                )
            );
        }
    }
}
