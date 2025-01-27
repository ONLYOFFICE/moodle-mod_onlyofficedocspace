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
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
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

    return true;
}
