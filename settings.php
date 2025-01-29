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

use mod_onlyofficedocspace\local\common\flash_message;
use mod_onlyofficedocspace\local\common\url_parser;
use mod_onlyofficedocspace\local\docspace\docspace_settings;
use mod_onlyofficedocspace\local\errors\docspace_error;
use mod_onlyofficedocspace\output\docspaceusers;

defined('MOODLE_INTERNAL') || die();

require_once(dirname(__FILE__) . '/lib.php');

global $DB, $PAGE, $CFG;

$docspacesettings = new docspace_settings();

$ADMIN->add('modsettings', new admin_category('onlyoffice_docspace_settings', get_string('pluginname', 'onlyofficedocspace')));

// Define docspace settings page.

$managedocspacesettings = new admin_settingpage($section, get_string('settings', 'onlyofficedocspace'), 'moodle/site:config');

$defaulthost = 'https://docspaceserver.url';
$sectionparam = null;

if ($ADMIN->fulltree) {
    $sectionparam = $PAGE->url->get_param('section');
    $categoryparam = $PAGE->url->get_param('category');

    if ($categoryparam === 'onlyoffice_docspace_settings' || $sectionparam === $section) {
        $flash = new flash_message();
        $success = $flash->get('success');
        $warning = $flash->get('warning');
        $error = $flash->get('error');

        if ($success) {
            $notification = $OUTPUT->notification($success, 'success');
            $managedocspacesettings->add(
                new admin_setting_heading(
                    'onlyofficedocspace/docspace_settings_success_status',
                    '',
                    $notification
                )
            );
        }

        if ($warning) {
            $notification = $OUTPUT->notification($warning, 'warning');
            $managedocspacesettings->add(
                new admin_setting_heading(
                    'onlyofficedocspace/docspace_settings_warning_status',
                    '',
                    $notification
                )
            );
        }

        if ($error) {
            $notification = $OUTPUT->notification($error, 'error');
            $managedocspacesettings->add(
                new admin_setting_heading(
                    'onlyofficedocspace/docspace_settings_error_status',
                    '',
                    $notification
                )
            );
        }

        $url = url_parser::get_base($CFG->wwwroot);
        $managedocspacesettings->add(
            new admin_setting_heading(
                'onlyofficedocspace/docspace_csp_warning',
                '',
                $OUTPUT->notification(get_string('cspwarning', 'onlyofficedocspace', $url), 'warning'),
            )
        );

        $managedocspacesettings->add(
            new admin_setting_heading(
                'onlyofficedocspace/docspace_room_admin_warning',
                '',
                $OUTPUT->notification(get_string('rolewarning', 'onlyofficedocspace', $url), 'warning'),
            )
        );

        $docspaceurlconfigtext = new admin_setting_configtext(
            'onlyofficedocspace/docspace_server_url',
            get_string('docspaceserverurl', 'onlyofficedocspace'),
            get_string('adminsettings:urldescription', 'onlyofficedocspace'),
            $defaulthost
        );
        $managedocspacesettings->add($docspaceurlconfigtext);

        $docspaceloginconfigtext = new admin_setting_configtext(
            'onlyofficedocspace/docspace_login',
            get_string('docspacelogin', 'onlyofficedocspace'),
            '',
            ''
        );
        $managedocspacesettings->add($docspaceloginconfigtext);

        $docspacepasswordconfigtext = new admin_setting_encryptedpassword(
            'onlyofficedocspace/docspace_password',
            get_string('docspacepassword', 'onlyofficedocspace'),
            '',
        );
        $managedocspacesettings->add($docspacepasswordconfigtext);

        $PAGE->requires->js_call_amd('mod_onlyofficedocspace/admin_settings', 'init', [
            'urls' => [
                'current' => $docspacesettings->url(),
                'default' => docspace_settings::DOCSPACE_DEFAULT_URL,
            ],
        ]);
    }
}

$ADMIN->add('onlyoffice_docspace_settings', $managedocspacesettings);

// Define docspace users page.

$managedocspaceuserssettings = new admin_settingpage(
    'manageonlyofficedocspaceusers',
    get_string('docspaceuserscategory:title', 'onlyofficedocspace'),
    'moodle/site:config'
);

if ($ADMIN->fulltree) {
    if ($sectionparam && $sectionparam === 'manageonlyofficedocspaceusers') {
        try {
            $sort = optional_param('sort', 'firstname', PARAM_ALPHANUMEXT);
            $dir = optional_param('dir', 'ASC', PARAM_ALPHA);
            $page = optional_param('page', 1, PARAM_INT);
            $perpage = 30;

            $params = new stdClass();
            $params->sort = $sort;
            $params->dir = $dir;
            $params->page = $page;
            $params->perpage = $perpage;

            $docspaceusersrenderable = new docspaceusers($params);
            $docspaceusersrenderer = $PAGE->get_renderer('mod_onlyofficedocspace');

            $managedocspaceuserssettings->add(
                new admin_setting_heading(
                    'onlyofficedocspace/docspace_users',
                    '',
                    $docspaceusersrenderer->render($docspaceusersrenderable)
                    )
            );

            $PAGE->requires->js_call_amd('mod_onlyofficedocspace/docspace_users', 'init', [$docspacesettings->url()]);
        } catch (docspace_error $e) {
            $managedocspaceuserssettings->add(
                new admin_setting_heading(
                    'onlyofficedocspace/docspace_users',
                    '',
                    $OUTPUT->notification(get_string('docspaceconfigurationerror', 'onlyofficedocspace'), 'error')
                )
            );
        }
    } else {
        $url = new moodle_url('/admin/settings.php', ['section' => 'manageonlyofficedocspaceusers']);
        $docspaceusersplaceholder = $OUTPUT->render_from_template('onlyofficedocspace/docspace_users_category', ['url' => $url]);
        $managedocspaceuserssettings->add(
            new admin_setting_heading('onlyofficedocspace/docspace_users', '', $docspaceusersplaceholder)
        );
    }
}

$ADMIN->add('onlyoffice_docspace_settings', $managedocspaceuserssettings);
$settings = null;
