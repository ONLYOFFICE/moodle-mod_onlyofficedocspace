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
 * Web service function declarations for the mod_onlyofficedocspace plugin.
 *
 * @package     mod_onlyofficedocspace
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

$functions = [
    'mod_onlyofficedocspace_invite_users_to_docspace' => [
        'classname' => 'mod_onlyofficedocspace\external\invite_users_to_docspace',
        'description' => 'Invite users to OnlyOffice DocSpace',
        'type' => 'write',
        'ajax' => true,
        'capabilities'  => 'moodle/site:config',
        'services' => [],
    ],
    'mod_onlyofficedocspace_unlink_docspace_users' => [
        'classname' => 'mod_onlyofficedocspace\external\unlink_docspace_users',
        'description' => 'Unlink DocSpace users from Moodle',
        'type' => 'write',
        'ajax' => true,
        'capabilities'  => 'moodle/site:config',
        'services' => [],
    ],
    'mod_onlyofficedocspace_update_docspace_user_credentials' => [
        'classname' => 'mod_onlyofficedocspace\external\update_docspace_user_credentials',
        'description' => 'Update DocSpace user credentials',
        'type' => 'write',
        'ajax' => true,
        'services' => [],
    ],
    'mod_onlyofficedocspace_check_docspace_connectivity' => [
        'classname' => 'mod_onlyofficedocspace\external\check_docspace_connectivity',
        'description' => 'Check DocSpace connectivity',
        'type' => 'read',
        'ajax' => true,
        'services' => [],
    ],
    'mod_onlyofficedocspace_connect_docspace' => [
        'classname' => 'mod_onlyofficedocspace\external\connect_docspace',
        'description' => 'Connect DocSpace',
        'type' => 'write',
        'ajax' => true,
        'services' => [],
    ],
    'mod_onlyofficedocspace_disconnect_docspace' => [
        'classname' => 'mod_onlyofficedocspace\external\disconnect_docspace',
        'description' => 'Disconnect DocSpace',
        'type' => 'write',
        'ajax' => true,
        'services' => [],
    ],
    'mod_onlyofficedocspace_fetch_docspace_users' => [
        'classname' => 'mod_onlyofficedocspace\external\fetch_docspace_users',
        'description' => 'Fetch DocSpace users list',
        'type' => 'read',
        'ajax' => true,
        'services' => [],
    ],
];
