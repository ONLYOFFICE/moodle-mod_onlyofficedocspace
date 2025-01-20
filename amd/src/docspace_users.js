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
 * @copyright  2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 **/
/* eslint-disable no-undef, no-console */
define(
    [
        'jquery',
        'mod_onlyofficedocspace/docspace_integration_sdk',
        'mod_onlyofficedocspace/password_generator',
        'mod_onlyofficedocspace/notification',
        'core/str',
        'core_form/changechecker',
        'mod_onlyofficedocspace/repository'
    ],
    function($, DocSpaceIntegrationSDK, PasswordGenerator, Notification, Str, ChangeChecker, Repository) {
        const selectors = {
            inviteButton: "button[data-action='invite-to-docspace']",
            usersTable: "table[id='ds-invite-users-table']",
            selectAllUsers: "input[data-action='select-all-users']",
            systemFrameId: "ds-system-frame",
        };

        const disableInviteButton = function() {
            document.querySelector(selectors.inviteButton).setAttribute("disabled", "");
        };

        const enableInviteButton = function() {
            inviteButton.removeAttribute("disabled");
        };

        const toggle = function(event) {
            const checked = event.target.checked;
            const checkboxes = document.querySelector(selectors.usersTable).querySelectorAll('input[name="users"]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = checked;
            }
        };

        const sendInvitations = async function(users) {
            const docSpace = DocSpace.SDK.frames[selectors.systemFrameId];
            const hashSettings = await docSpace.getHashSettings();

            for (let user of users) {
                const hash = await docSpace.createHash(PasswordGenerator.generate(), hashSettings);
                user.hash = hash;
            }

            await Repository.inviteUsers(users)
                // eslint-disable-next-line promise/always-return
                .then(() => {
                    window.location.reload();
                })
                .catch((error) => {
                    console.log(error);
                    enableInviteButton();
                });
        };

        const inviteUsers = async function() {
            if (!DocSpaceIntegrationSDK.initialized()) {
                Notification.display(await Str.getString("docspaceunreachable", "onlyofficedocspace"), "error");
                return;
            }

            disableInviteButton();
            const checkboxes = document.getElementsByName("users");
            let users = [];

            for (var i = 0, n = checkboxes.length; i < n; i++) {
                if (checkboxes[i].checked) {
                    users.push({id: checkboxes[i].value});
                }
            }

            if (DocSpace.SDK.frames[selectors.systemFrameId]) {
                sendInvitations(users);
            } else {
                DocSpace.SDK.initSystem({
                    frameId: selectors.systemFrameId,
                    events: {
                        onAppReady: async function() {
                            sendInvitations(users);
                        },
                        onAppError: function() {
                            console.log("An error occured while initialising DocSpace Frame.");
                            DocSpace.SDK.frames[selectors.systemFrameId].destroyFrame();
                        }
                    }
                });
            }
        };

        return {
            init: async function(url) {
                ChangeChecker.disableAllChecks();
                await DocSpaceIntegrationSDK.initScript("oodsp-api-js", url);
                const toggler = document.querySelector(selectors.selectAllUsers);
                toggler.addEventListener("click", toggle);
                inviteButton = document.querySelector(selectors.inviteButton);
                inviteButton.addEventListener("click", inviteUsers);
            }
        };
    });
/* eslint-enable no-undef, no-console */