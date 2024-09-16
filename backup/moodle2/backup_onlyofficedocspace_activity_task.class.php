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
 * Defines backup_onlyofficedocspace_activity_task class
 *
 * @package     mod_onlyofficedocspace
 * @subpackage
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/mod/onlyofficedocspace/backup/moodle2/backup_onlyofficedocspace_stepslib.php');
require_once($CFG->dirroot . '/mod/onlyofficedocspace/backup/moodle2/backup_onlyofficedocspace_settingslib.php');

/**
 * ONLYOFFICE DocSpace backup task that provides all the settings and steps to perform one
 * complete backup of the activity
 */
class backup_onlyofficedocspace_activity_task extends backup_activity_task {


    /**
     * Define (add) particular settings this activity can have
     */
    protected function define_my_settings() {
    }

    /**
     * Defines a backup step to store the instance data in the onlyofficedocspace.xml file
     */
    protected function define_my_steps() {
        $this->add_step(new backup_onlyofficedocspace_activity_structure_step(
            'onlyofficedocspace_structure',
            'onlyofficedocspace.xml'
        ));
    }

    /**
     * Code the transformations to perform in the activity in
     * order to get transportable (encoded) links
     * @param mixed $content
     *
     * @return [type]
     */
    public static function encode_content_links($content) {
        global $CFG;

        $base = preg_quote($CFG->wwwroot, '/');

        // Link to instances list.
        $search = "/(" . $base . "\/mod\/onlyofficedocspace\/index.php\?id\=)([0-9]+)/";
        $content = preg_replace($search, '$@ONLYOFFICEDOCSPACEINDEX*$2@$', $content);

        // Link to the editor page.
        $search = "/(" . $base . "\/mod\/onlyofficedocspace\/view.php\?id\=)([0-9]+)/";
        $content = preg_replace($search, '$@ONLYOFFICEDOCSPACEVIEWBYID*$2@$', $content);

        return $content;
    }
}
