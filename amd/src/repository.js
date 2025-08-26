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
 * @param   {object} userids User ids
 * @returns {Promise}
 */
export const inviteUsersToDocSpace = (userids) => {
    const args = {
        userids
    };

    return fetchMany([{methodname: 'mod_onlyofficedocspace_invite_users_to_docspace', args}])[0];
};

/**
 * Unlink DocSpace users from Moodle
 *
 * @param   {object} userids User ids
 * @returns {Promise}
 */
export const unlinkDocSpaceUsers = (userids) => {
    const args = {
        userids
    };

    return fetchMany([{methodname: 'mod_onlyofficedocspace_unlink_docspace_users', args}])[0];
};

/**
 * Update DocSpace user credentials
 *
 * @param   {string} email DocSpace admin email
 * @param   {string} password DocSpace admin password hash
 * @returns {Promise}
 */
export const updateUserPassword = (
    email,
    password,
) => {
    const args = {
        email,
        password,
    };

    return fetchMany([{methodname: 'mod_onlyofficedocspace_update_docspace_user_credentials', args}])[0];
};

/**
 * Check DocSpace connectivity
 *
 * @param   {string} url DocSpace url
 * @returns {Promise}
 */
export const checkDocSpaceConnectivity = (url) => {
    const args = {
        url,
    };

    return fetchMany([{methodname: 'mod_onlyofficedocspace_check_docspace_connectivity', args}])[0];
};

/**
 * Connect DocSpace
 *
 * @param   {string} url DocSpace url
 * @param   {string} apikey DocSpace API Key
 * @returns {Promise}
 */
export const connectDocSpace = (url, apikey) => {
    const args = {
        url,
        apikey,
    };

    return fetchMany([{methodname: 'mod_onlyofficedocspace_connect_docspace', args}])[0];
};

/**
 * Disconnect DocSpace
 *
 * @returns {Promise}
 */
export const disconnectDocSpace = () => {
    const args = {};

    return fetchMany([{methodname: 'mod_onlyofficedocspace_disconnect_docspace', args}])[0];
};

/**
 * Fetch DocSpace users list
 *
 * @param   {Number} page Page number
 * @param   {Number} limit Per page number
 * @returns {Promise}
 */
export const fetchDocSpaceUsers = (page = 1, limit = 10) => {
    const args = { page, limit };

    return fetchMany([{methodname: 'mod_onlyofficedocspace_fetch_docspace_users', args}])[0];
};
