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
 * The ONLYOFFICE DocSpace configuration form
 *
 * It uses the standard core Moodle formslib. For more info about them, please
 * visit: http://docs.moodle.org/en/Development:lib/formslib.php
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use mod_onlyofficedocspace\local\docspace\docspace_settings;
use mod_onlyofficedocspace\local\moodle\moodle_docspace_user_manager;
use mod_onlyofficedocspace\local\moodle\plugin_settings;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/course/moodleform_mod.php');

/**
 * New ONLYOFFICE DocSpace module form.
 *
 * It uses the standard core Moodle formslib. For more info about them, please
 * visit: http://docs.moodle.org/en/Development:lib/formslib.php
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_onlyofficedocspace_mod_form extends moodleform_mod {


    /**
     * Defines forms elements
     */
    public function definition() {
        global $CFG, $PAGE, $OUTPUT, $USER, $DB;

        $mform = $this->_form;

        $docspacesettings = new docspace_settings();

        try {
            $docspacesettings->healthCheck();
        } catch (Exception) {
            $mform->addElement('html', $OUTPUT->notification(get_string('docspaceunreachable', 'onlyofficedocspace'), 'error'));
            $this->standard_hidden_coursemodule_elements();
            return;
        }

        $moodledocspaceusermanager = new moodle_docspace_user_manager();
        $docspaceuser = $moodledocspaceusermanager->get($USER->email);

        if (!$docspaceuser) {
            $mform->addElement('html', $OUTPUT->notification(get_string('docspaceusernotfound', 'onlyofficedocspace'), 'error'));
            $this->standard_hidden_coursemodule_elements();
            return;
        }

        // Adding the "general" fieldset, where all the common settings are showed.
        $mform->addElement('header', 'general', get_string('general', 'form'));

        // Adding the standard "name" field.
        $mform->addElement('text', 'name', get_string('activityname', 'onlyofficedocspace'), ['size' => '64']);
        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEANHTML);
        }
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');

        // Adding the standard "intro" and "introformat" fields.
        $this->standard_intro_elements();

        $element = $mform->getElement('introeditor');
        $attributes = $element->getAttributes();
        $attributes['rows'] = 5;
        $element->setAttributes($attributes);

        $selectelements = [];
        $onlyofficedocspaceactivity = null;

        if ($this->_instance) {
            $onlyofficedocspaceid = $this->_instance;
            $onlyofficedocspaceactivity = $DB->get_record(
                'onlyofficedocspace',
                ['id' => $onlyofficedocspaceid],
                'docspaceitemid, docspaceitemtype, docspacerequesttoken, docspaceitemname, docspaceitemicon',
                MUST_EXIST
            );
        }

        $selectelements[] = &$mform->createElement(
            'hidden',
            'docspaceitemtype',
            $onlyofficedocspaceactivity ? $onlyofficedocspaceactivity->docspaceitemtype : ''
        );
        $selectelements[] = &$mform->createElement(
            'hidden',
            'docspaceitemid',
            $onlyofficedocspaceactivity ? $onlyofficedocspaceactivity->docspaceitemid : ''
        );
        $selectelements[] = &$mform->createElement(
            'hidden',
            'docspacerequesttoken',
            $onlyofficedocspaceactivity ? $onlyofficedocspaceactivity->docspacerequesttoken : ''
        );
        $selectelements[] = &$mform->createElement(
            'hidden',
            'docspaceitemname',
            $onlyofficedocspaceactivity ? $onlyofficedocspaceactivity->docspaceitemname : ''
        );
        $selectelements[] = &$mform->createElement(
            'hidden',
            'docspaceitemicon',
            $onlyofficedocspaceactivity ? $onlyofficedocspaceactivity->docspaceitemicon : ''
        );

        $mform->setType('docspaceitemtype', PARAM_TEXT);
        $mform->setType('docspaceitemid', PARAM_TEXT);
        $mform->setType('docspacerequesttoken', PARAM_TEXT);
        $mform->setType('docspaceitemname', PARAM_TEXT);
        $mform->setType('docspaceitemicon', PARAM_TEXT);

        $selectelements[] = &$mform->createElement('html', $OUTPUT->render_from_template('onlyofficedocspace/select_element', [
            'docspaceurl' => plugin_settings::url(),
        ]));
        $PAGE->requires->js_call_amd(
            'mod_onlyofficedocspace/select_element',
            'init',
            [
                'docspaceUrl' => plugin_settings::url(),
                'user' => ['email' => $docspaceuser->email, 'hash' => $docspaceuser->password],
                'activity' => $onlyofficedocspaceactivity,
            ],
        );
        $mform->addGroup(
            $selectelements,
            'select_element',
            get_string('selectelement:room', 'onlyofficedocspace'),
            '',
            false
        );
        $mform->addRule(
            'select_element',
            get_string('required'),
            'required',
            null,
            'client'
        );

        // Add standard grading elements.
        // Add grading capability. need use case for grading.
        // $this->standard_grading_coursemodule_elements();
        // Add standard elements, common to all modules.
        $this->standard_coursemodule_elements();

        // Add standard buttons, common to all modules.
        $this->add_action_buttons();
    }

    /**
     * Form verification.
     *
     * @param array $data form data.
     * @param array $files uploaded file.
     * @return mixed of "element_name"=>"error_description" if there are errors,
     *         or an empty array if everything is OK (true allowed for backwards compatibility too).
     */
    public function validation($data, $files) {
        $errors = [];

        $errors = parent::validation($data, $files);

        if (
            empty($data['docspaceitemtype'])
            || empty($data['docspaceitemid'])
            || empty($data['docspacerequesttoken'])
            || empty($data['docspaceitemname'])
            || empty($data['docspaceitemicon'])
        ) {
            $errors['select_element'] = get_string('required');
        }

        return $errors;
    }
}
