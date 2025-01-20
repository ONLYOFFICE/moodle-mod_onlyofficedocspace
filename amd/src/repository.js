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
 * Repository to perform WS calls for mod_onlyofficedocspace.
 *
 * @module mod_onlyofficedocspace/repository
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import {call as fetchMany} from 'core/ajax';

/**
 * Invite users to OnlyOffice DocSpace
 *
 * @param   {object} users Users list
 * @returns {Promise}
 */
export const inviteUsers = (users) => {
    const args = {
        users
    };

    return fetchMany([{methodname: 'mod_onlyofficedocspace_invite_users', args}])[0];
};
