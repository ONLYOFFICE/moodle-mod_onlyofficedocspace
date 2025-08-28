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
 * Upgrade code for the onlyoffice.
 *
 * @package     mod_onlyofficedocspace
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Execute ONLYOFFICE DocSpace upgrade from the given old version
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_onlyofficedocspace_upgrade($oldversion) {
    global $DB;
    $dbman = $DB->get_manager();
    if ($oldversion < 2024111201) {
        // Change docspaceitemid field type and precision.
        $table1 = new xmldb_table('onlyofficedocspace');
        $field1 = new xmldb_field('docspaceitemid');

        $field1->set_attributes(XMLDB_TYPE_CHAR, 255, null, XMLDB_NOTNULL, null);
        $dbman->change_field_type($table1, $field1);
        $dbman->change_field_precision($table1, $field1);
        $dbman->change_field_notnull($table1, $field1);

        // No settings to migrate.
        // Update db version tag.
        upgrade_mod_savepoint(true, 2024111201, 'onlyofficedocspace');
    }

    if ($oldversion < 2025012901) {
        // Remove deprecated settings that are no longer used.
        unset_config('docspace_login', 'onlyofficedocspace');
        unset_config('docspace_password', 'onlyofficedocspace');
        unset_config('docspace_token', 'onlyofficedocspace');

        // Define field userid to be added to onlyofficedocspace_dsuser.
        $table = new xmldb_table('onlyofficedocspace_dsuser');
        $field = new xmldb_field('userid', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'password');
        $key = new xmldb_key('userid_key', XMLDB_KEY_FOREIGN, ['userid'], 'user', ['id']);

        // Add the field first.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Add the foreign key.
        if (!$dbman->find_key_name($table, $key)) {
            $dbman->add_key($table, $key);
        }

        // Populate the userid field by matching email addresses.
        $dsusers = $DB->get_recordset('onlyofficedocspace_dsuser', ['userid' => null]);
        
        foreach ($dsusers as $dsuser) {
            if (empty($dsuser->email)) {
                continue;
            }
            
            // Find matching Moodle user by email.
            $user = $DB->get_record('user', ['email' => $dsuser->email, 'deleted' => 0], 'id', IGNORE_MULTIPLE);
            
            if ($user) {
                $dsuser->userid = $user->id;
                $DB->update_record('onlyofficedocspace_dsuser', $dsuser);
            }
        }
        $dsusers->close();

        // Update db version tag.
        upgrade_mod_savepoint(true, 2025012901, 'onlyofficedocspace');
    }

    return true;
}
