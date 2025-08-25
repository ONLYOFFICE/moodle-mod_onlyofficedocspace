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
 * @module mod_onlyofficedocspace/docspace_users
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 **/

define([
    'core/str',
    'core/notification',
    'core_form/changechecker',
    'mod_onlyofficedocspace/repository',
], function(Str, Notification, ChangeChecker, Repository) {
        let selectedUsers = [];

        const selectors = {
            usersTable: "table[id='ds-invite-users-table']",
            checkers: 'input[name="users"]',
            checkAll: 'input[id="check-all-users"]',
            buttons: {
                invite: "#invite-to-docspace",
                unlink: "#unlink-docspace-account"
            }
        };

        const toggle = function(event) {
            const checked = event.target.checked;
            const checkboxes = document.querySelector(selectors.usersTable).querySelectorAll(selectors.checkers);
            checkboxes.forEach(checkbox => {
                checkbox.checked = checked;
            });
            selectedUsers = checked ? [...checkboxes].map(checkbox => checkbox.value) : [];
            toggleActionButtons();
        };

        const toggleActionButtons = function() {
            const buttons = document.querySelectorAll(".action-buttons");
            buttons.forEach(button => {
                button.disabled = selectedUsers.length < 1;
            });
        };

        const handleUnlinkDocspaceUser = async function(event) {
            const unlinkButton = event.target;
            unlinkButton.disabled = true;

            await Notification.saveCancel(
                Str.getString('warning', 'onlyofficedocspace'),
                Str.getString('unlinkwarningmessage', 'onlyofficedocspace'),
                Str.getString('unlinkdocspaceaccount', 'onlyofficedocspace'),
                async() => {
                    const result = await Repository.unlinkDocSpaceUsers(selectedUsers);

                    if (result.unlinkedcount > 0) {
                        Notification.addNotification({
                            message: await Str.getString(
                                'successfuldisable',
                                'onlyofficedocspace',
                                `${result.unlinkedcount}/${result.totalcount}`
                            ),
                            type: 'success',
                        });
                    }
                    if (result.skippedcount > 0) {
                        Notification.addNotification({
                            message: await Str.getString(
                                'skippeddisable',
                                'onlyofficedocspace',
                                `${result.skippedcount}/${result.totalcount}`
                            ),
                            type: 'warning',
                        });
                    }
                },
                null,
            );

            unlinkButton.disabled = false;
        };

        const handleInviteToDocspace = async function(event) {
            const inviteButton = event.target;
            inviteButton.disabled = true;

            const result = await Repository.inviteUsersToDocSpace(selectedUsers);

            if (result.status && result.status === 'success') {
                if (result.invitedcount > 0) {
                    Notification.addNotification({
                        message: await Str.getString(
                            'sentinvitations',
                            'onlyofficedocspace',
                            `${result.invitedcount}/${result.totalcount}`
                        ),
                        type: 'success',
                    });
                }
                if (result.skippedcount > 0) {
                    Notification.addNotification({
                        message: await Str.getString(
                            'skippedinvitations',
                            'onlyofficedocspace',
                            `${result.skippedcount}/${result.totalcount}`
                        ),
                        type: 'warning',
                    });
                }
                if (result.failedcount > 0) {
                    Notification.addNotification({
                        message: await Str.getString(
                            'failedinvitations',
                            'onlyofficedocspace',
                            `${result.failedcount}/${result.totalcount}`
                        ),
                        type: 'error',
                    });
                }
            }

            inviteButton.disabled = false;
        };

        const handleSelectUser = function(event) {
            if (event.target.matches(selectors.checkers)) {
                const checkbox = event.target;
                const userValue = checkbox.value;
                const isChecked = checkbox.checked;

                if (isChecked) {
                    selectedUsers.push(userValue);
                } else {
                    selectedUsers = selectedUsers.filter(user => user !== userValue);
                }

                toggleActionButtons();
            }
        };

        return {
            init: async function() {
                ChangeChecker.disableAllChecks();

                document.addEventListener("click", handleSelectUser);
                const toggler = document.querySelector(selectors.checkAll);
                toggler.addEventListener("click", toggle);
                const unlinkbutton = document.querySelector(selectors.buttons.unlink);
                unlinkbutton.addEventListener("click", handleUnlinkDocspaceUser);
                const inviteButton = document.querySelector(selectors.buttons.invite);
                inviteButton.addEventListener("click", handleInviteToDocspace);
            }
        };
    });