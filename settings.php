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
use mod_onlyofficedocspace\output\docspaceusers;

defined('MOODLE_INTERNAL') || die();

$ADMIN->add('modsettings', new admin_category('onlyoffice_docspace', get_string('pluginname', 'onlyofficedocspace')));
$settings = new admin_settingpage(
    'modsettingonlyofficedocspace',
    get_string('settings', 'onlyofficedocspace'),
    'moodle/site:config'
);
$sectionparam = null;
$connected = plugin_settings::url() && plugin_settings::api_key();

if ($ADMIN->fulltree) {
    $sectionparam = $PAGE->url->get_param('section');
    $categoryparam = $PAGE->url->get_param('category');

    if ($categoryparam === 'onlyoffice_docspace' || $sectionparam === 'modsettingonlyofficedocspace') {
        $defaulthost = 'https://docspaceserver.url';
        $helpcentermoodleurl = 'https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx';

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
    }
}

$ADMIN->add('onlyoffice_docspace', $settings);

// Define docspace users page.

$settings = new admin_settingpage(
    'modsettingdocspaceusers',
    get_string('docspaceuserscategory:title', 'onlyofficedocspace'),
    'moodle/site:config'
);

if ($sectionparam && $sectionparam === 'modsettingdocspaceusers') {
    if ($connected) {
        $docspaceusersrenderable = new docspaceusers();
        $docspaceusersrenderer = $PAGE->get_renderer('mod_onlyofficedocspace');
        $settings->add(
            new admin_setting_heading(
                'onlyofficedocspace/docspace_users',
                '',
                $docspaceusersrenderer->render($docspaceusersrenderable)
            )
        );
    } else {
        $settings->add(
            new admin_setting_heading(
            'onlyofficedocspace/docspace_users',
            '',
            $OUTPUT->notification(get_string('docspaceconfigurationerror', 'onlyofficedocspace'), 'error')
            )
        );
    }
} else {
    $docspaceusersplaceholder = $OUTPUT->render_from_template(
        'onlyofficedocspace/docspace_users_category',
        ['url' => new moodle_url('/admin/settings.php', ['section' => 'modsettingdocspaceusers'])]
    );
    $settings->add(
        new admin_setting_heading(
        'onlyofficedocspace/docspace_users_placeholder',
        '',
        $docspaceusersplaceholder
        )
    );
}

$ADMIN->add('onlyoffice_docspace', $settings);
$settings = null;
