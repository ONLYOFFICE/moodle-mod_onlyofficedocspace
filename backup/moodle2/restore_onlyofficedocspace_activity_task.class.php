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
 * Define restore_onlyofficedocspace_activity_task class
 *
 * @package     mod_onlyofficedocspace
 * @subpackage
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/mod/onlyofficedocspace/backup/moodle2/restore_onlyofficedocspace_stepslib.php');

/**
 * Restore task that provides all the settings and steps to perform one complete restore of the activity
 */
class restore_onlyofficedocspace_activity_task extends restore_activity_task {

    /**
     * Define (add) particular settings this activity can have
     */
    protected function define_my_settings() {
        // No particular settings for this activity.
    }

    /**
     * Define (add) particular steps this activity can have
     */
    protected function define_my_steps() {
        $this->add_step(
            new restore_onlyofficedocspace_activity_structure_step('onlyofficedocspace_structure', 'onlyofficedocspace.xml')
        );
    }

    /**
     * Define the contents in the activity that must be
     * processed by the link decoder
     */
    public static function define_decode_contents() {
        $contents = [];

        $contents[] = new restore_decode_content('onlyofficedocspace', ['intro'], 'onlyofficedocspace');

        return $contents;
    }

    /**
     * Define the decoding rules for links belonging
     * to the activity to be executed by the link decoder
     */
    public static function define_decode_rules() {
        $rules = [];

        $rules[] = new restore_decode_rule('ONLYOFFICEDOCSPACEVIEWBYID',
                '/mod/onlyofficedocspace/view.php?id=$1', 'course_module');
        $rules[] = new restore_decode_rule('ONLYOFFICEDOCSPACEINDEX',
                '/mod/onlyofficedocspace/index.php?id=$1', 'course');

        return $rules;

    }

    /**
     * Define the restore log rules that will be applied
     */
    public static function define_restore_log_rules() {
        $rules = [];

        $rules[] = new restore_log_rule('onlyofficedocspace', 'add',
                'view.php?id={course_module}', '{onlyofficedocspace}');
        $rules[] = new restore_log_rule('onlyofficedocspace', 'update',
                'view.php?id={course_module}', '{onlyofficedocspace}');
        $rules[] = new restore_log_rule('onlyofficedocspace', 'view',
                'view.php?id={course_module}', '{onlyofficedocspace}');
        $rules[] = new restore_log_rule('onlyofficedocspace', 'preview',
                'view.php?id={course_module}', '{onlyofficedocspace}');

        return $rules;
    }

    /**
     * Define the restore log rules that will be applied
     */
    public static function define_restore_log_rules_for_course() {
        $rules = [];

        $rules[] = new restore_log_rule('onlyofficedocspace', 'view all', 'index.php?id={course}', null);

        return $rules;
    }
}
