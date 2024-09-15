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
 * Library of interface functions and constants for module ONLYOFFICE DocSpace
 *
 * All the core Moodle functions, neeeded to allow the module to work
 * integrated in Moodle should be placed here.
 *
 * All the ONLYOFFICE DocSpace specific functions, needed to implement all the module
 * logic, should go to locallib.php. This will help to save some memory when
 * Moodle is performing actions across all modules.
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Saves a new instance of the ONLYOFFICE DocSpace into the database
 *
 * Given an object containing all the necessary data,
 * (defined by the form in mod_form.php) this function
 * will create a new instance and return the id number
 * of the new instance.
 *
 * @param stdClass $data Submitted data from the form in mod_form.php
 * @param mod_onlyofficedocspace_mod_form|null $mform The form instance itself (if needed)
 * @return int The id of the newly inserted ONLYOFFICE DocSpace record
 */
function onlyofficedocspace_add_instance(stdClass $data, ?mod_onlyofficedocspace_mod_form $mform = null) {
    global $CFG, $DB;

    $cmid = $data->coursemodule;
    $data->timecreated = time();
    $data->timemodified = $data->timecreated;

    $data->id = $DB->insert_record('onlyofficedocspace', $data);

    // We need to use context now, so we need to make sure all needed info is already in db.
    $DB->set_field('course_modules', 'instance', $data->id, ['id' => $cmid]);

    $completiontimeexpected = !empty($data->completionexpected) ? $data->completionexpected : null;
    \core_completion\api::update_completion_date_event($cmid, 'onlyofficedocspace', $data->id, $completiontimeexpected);

    return $data->id;
}

/**
 * Updates an instance of the ONLYOFFICE DocSpace in the database
 *
 * Given an object containing all the necessary data,
 * (defined by the form in mod_form.php) this function
 * will update an existing instance with new data.
 *
 * @param stdClass $data An object from the form in mod_form.php
 * @param mod_onlyofficedocspace_mod_form|null $mform The form instance itself (if needed)
 * @return boolean Success/Fail
 */
function onlyofficedocspace_update_instance(stdClass $data, ?mod_onlyofficedocspace_mod_form $mform = null) {
    global $CFG, $DB;

    $data->timemodified = time();
    $data->id = $data->instance;

    $completiontimeexpected = !empty($data->completionexpected) ? $data->completionexpected : null;
    \core_completion\api::update_completion_date_event(
        $data->coursemodule,
        'onlyofficedocspace',
        $data->id,
        $completiontimeexpected
    );

    $result = $DB->update_record('onlyofficedocspace', $data);

    return $result;
}

/**
 * Removes an instance of the ONLYOFFICE DocSpace from the database
 *
 * Given an ID of an instance of this module,
 * this function will permanently delete the instance
 * and any data that depends on it.
 *
 * @param int $id Id of the module instance
 * @return boolean Success/Failure
 */
function onlyofficedocspace_delete_instance($id) {
    global $DB;

    if (!$onlyofficedocspace = $DB->get_record('onlyofficedocspace', ['id' => $id])) {
        return false;
    }

    $cm = get_coursemodule_from_instance('onlyofficedocspace', $id);
    \core_completion\api::update_completion_date_event($cm->id, 'onlyofficedocspace', $id, null);

    $DB->delete_records('onlyofficedocspace', ['id' => $onlyofficedocspace->id]);

    return true;
}

/**
 * Returns the information on whether the module supports a feature
 *
 * See {@see plugin_supports()} for more info.
 *
 * @param string $feature FEATURE_xx constant for requested feature
 * @return mixed true if the feature is supported, null if unknown
 */
function onlyofficedocspace_supports($feature) {

    switch ($feature) {
        case FEATURE_SHOW_DESCRIPTION:
            return true;
        case FEATURE_BACKUP_MOODLE2:
            return true;
        case FEATURE_MOD_PURPOSE:
            return MOD_PURPOSE_CONTENT;
        default:
            return null;
    }
}
