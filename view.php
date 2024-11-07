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

use mod_onlyofficedocspace\docspace\docspace_file_manager;
/**
 * Display DocSpace element
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once(dirname(__FILE__) . '/lib.php');

use mod_onlyofficedocspace\docspace\docspace_settings;
use mod_onlyofficedocspace\errors\docspace_error;
use mod_onlyofficedocspace\moodle\moodle_docspace_user_manager;

global $USER, $CFG;

$id = optional_param('id', 0, PARAM_INT); // Course_module ID.
$n = optional_param('n', 0, PARAM_INT);  // Resource instance ID.
$redirect = optional_param('redirect', 0, PARAM_BOOL);
$docspacesettings = new docspace_settings();
$docspacesettings->ensureIntegrity();

if ($id) {
    $cm = get_coursemodule_from_id('onlyofficedocspace', $id, 0, false, MUST_EXIST);
    $course = $DB->get_record('course', ['id' => $cm->course], '*', MUST_EXIST);
    $onlyofficedocspace = $DB->get_record('onlyofficedocspace', ['id' => $cm->instance], '*', MUST_EXIST);
} else if ($n) {
    $onlyofficedocspace = $DB->get_record('onlyofficedocspace', ['id' => $n], '*', MUST_EXIST);
    $course = $DB->get_record('course', ['id' => $onlyofficedocspace->course], '*', MUST_EXIST);
    $cm = get_coursemodule_from_instance('onlyofficedocspace', $onlyofficedocspace->id, $course->id, false, MUST_EXIST);
} else {
    die('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);
$context = CONTEXT_MODULE::instance($cm->id);
require_capability('mod/onlyofficedocspace:view', $context);

$docspacefilemanager = new docspace_file_manager($docspacesettings->url(), $docspacesettings->token());
$docspacefile = null;

try {
    if ($onlyofficedocspace->docspaceitemtype === 'file') {
        $docspacefile = $docspacefilemanager->getFile($onlyofficedocspace->docspaceitemid);
    } else if ($onlyofficedocspace->docspaceitemtype === 'room') {
        $docspacefile = $docspacefilemanager->getRoom($onlyofficedocspace->docspaceitemid);
    }
} catch (docspace_error $e) {
    $filenotfoundmessage = $e->getMessage();
}

$user = null;

if (has_capability('mod/onlyofficedocspace:edit', $context)) {
    $moodledocspaceusermanager = new moodle_docspace_user_manager();
    $docspaceuser = $moodledocspaceusermanager->get($USER->email);

    if ($docspaceuser) {
        $user['email'] = $docspaceuser->email;
        $user['hash'] = $docspaceuser->password;
    } else {
        $user['email'] = $USER->email;
    }
}

if (property_exists($USER, 'lang')) {
    $lang = stristr($USER->lang, '_', true) !== false ? stristr($USER->lang, '_', true) : $USER->lang;
} else {
    $lang = $CFG->lang;
}

$editorconfig = [
    "frameId" => "ds-editor-frame",
    "width" => "100%",
    "height" => "100%",
    "id" => $onlyofficedocspace->docspaceitemid,
    "requestToken" => $onlyofficedocspace->docspacerequesttoken,
    "locale" => $lang,
];

if ($onlyofficedocspace->docspaceitemtype === 'file') {
    $editorconfig['init'] = true;
    $editorconfig['editorGoBack'] = false;
    $editorconfig['mode'] = 'editor';
    $editorconfig['editorCustomization'] = [
        'anonymous' => [
            'request' => false,
        ],
    ];
} else if ($onlyofficedocspace->docspaceitemtype === 'room') {
    $editorconfig['showFilter'] = true;
    $editorconfig['rootPath'] = '/rooms/share';
    $editorconfig['mode'] = 'manager';
    $editorconfig['viewTableColumns'] = "Name,Modified,Size";
}

$PAGE->set_url('/mod/onlyofficedocspace/view.php', ['id' => $cm->id]);
$PAGE->set_title(format_string($onlyofficedocspace->name));
$PAGE->set_heading(format_string($course->fullname));

echo $OUTPUT->header();
echo $OUTPUT->heading($cm->name);

if ($docspacefile) {
    echo $OUTPUT->render_from_template('mod_onlyofficedocspace/docspace_editor', []);

    $PAGE->requires->js_call_amd(
        'mod_onlyofficedocspace/docspace_editor',
        'init',
        [
            'docspaceUrl' => $docspacesettings->url(),
            'config' => $editorconfig,
            'user' => $user,
        ],
    );
} else {
    echo $OUTPUT->notification($filenotfoundmessage, 'error');
}

echo $OUTPUT->footer();
