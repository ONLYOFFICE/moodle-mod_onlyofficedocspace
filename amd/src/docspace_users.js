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
    'core/templates',
    'mod_onlyofficedocspace/repository',
    'mod_onlyofficedocspace/pagination',
], function(Str, Notification, ChangeChecker, Templates, Repository, Pagination) {
        const data = {
            users: [],
            selectedUsers: [],
            pagination: {
                currentPage: 1,
                total: 0,
                limit: 10,
            },
        };

        const selectors = {
            usersTable: "table[id='ds-invite-users-table']",
            checkers: 'input[name="users"]',
            checkAll: 'input[id="check-all-users"]',
            actionsButtons: '.action-buttons',
            buttons: {
                invite: "#invite-to-docspace",
                unlink: "#unlink-docspace-account"
            },
            pagination: "#pagination",
        };

        const iconTemplates = {};

        const toggle = function(event) {
            const checked = event.target.checked;
            const checkboxes = document.querySelector(selectors.usersTable).querySelectorAll(selectors.checkers);
            checkboxes.forEach(checkbox => {
                checkbox.checked = checked;
            });
            data.selectedUsers = checked ? [...checkboxes].map(checkbox => checkbox.value) : [];
            toggleActionButtons();
        };

        const toggleActionButtons = function() {
            const buttons = document.querySelectorAll(".action-buttons button");
            buttons.forEach(button => {
                button.disabled = data.selectedUsers.length < 1;
            });

            if (data.selectedUsers.length < 1) {
                ChangeChecker.disableAllChecks();
            }
        };

        const handleUnlinkDocspaceUser = async function(event) {
            const unlinkButton = event.target;
            unlinkButton.disabled = true;

            await Notification.saveCancel(
                Str.getString('warning', 'onlyofficedocspace'),
                Str.getString('unlinkwarningmessage', 'onlyofficedocspace'),
                Str.getString('unlinkdocspaceaccount', 'onlyofficedocspace'),
                async() => {
                    clearNotificationsSection();
                    try {
                        const result = await Repository.unlinkDocSpaceUsers(data.selectedUsers);

                        if (result.status === "success") {
                            if (result.unlinkedcount > 0) {
                                Notification.addNotification({
                                    message: await Str.getString(
                                        'successfuldisable',
                                        'onlyofficedocspace',
                                        `${result.unlinkedcount}/${result.totalcount}`
                                    ),
                                    type: 'success',
                                });
                                await updateUsersList();
                                updateUsersTable();
                                ChangeChecker.disableAllChecks();
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
                        }
                    } catch (error) {
                        // eslint-disable-next-line no-console
                        console.log(error);
                        Notification.addNotification({
                            message: await Str.getString(
                                'unexpectederror:unlinkusers',
                                'onlyofficedocspace',
                            ),
                            type: 'error',
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

            try {
                const result = await Repository.inviteUsersToDocSpace(data.selectedUsers);

                if (result.status && result.status === 'success') {
                    clearNotificationsSection();
                    if (result.invitedcount > 0) {
                        Notification.addNotification({
                            message: await Str.getString(
                                'sentinvitations',
                                'onlyofficedocspace',
                                `${result.invitedcount}/${result.totalcount}`
                            ),
                            type: 'success',
                        });
                        await updateUsersList();
                        updateUsersTable();
                        ChangeChecker.disableAllChecks();
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
            } catch (error) {
                // eslint-disable-next-line no-console
                console.log(error);
                Notification.addNotification({
                    message: await Str.getString(
                        'unexpectederror:inviteusers',
                        'onlyofficedocspace',
                    ),
                    type: 'error',
                });
            }

            inviteButton.disabled = false;
        };

        const handleSelectUser = function(event) {
            if (event.target.matches(selectors.checkers)) {
                const checkbox = event.target;
                const userValue = checkbox.value;
                const isChecked = checkbox.checked;

                if (isChecked) {
                    data.selectedUsers.push(userValue);
                } else {
                    data.selectedUsers = data.selectedUsers.filter(user => user !== userValue);
                }

                toggleActionButtons();
            }
        };

        const updateUsersList = async function() {
            try {
                const response = await Repository.fetchDocSpaceUsers(data.pagination.currentPage, data.pagination.limit);
                data.users = response.users;
                data.pagination.total = response.pagination.total;
            } catch (error) {
                // eslint-disable-next-line no-console
                console.log(error);
                data.users = [];
                data.pagination.total = 0;
            }
        };

        const updateUsersTable = async function() {
            const table = document.querySelector("#ds-invite-users-table");
            const tbody = table.querySelector("tbody");
            const checkAllInput = table.querySelector(selectors.checkAll);
            const selectButtons = document.querySelector(selectors.actionsButtons);

            tbody.innerHTML = "";
            checkAllInput.checked = false;
            data.selectedUsers = [];
            selectButtons.classList.toggle("hidden", !(data.users && data.users.length > 0));

            if (data.users.length < 1) {
                const tr = document.createElement("tr");
                const td = document.createElement("td");
                td.textContent = await Str.getString("emptyuserslist", "onlyofficedocspace");
                td.colSpan = 6;
                td.classList.add("text-center");
                tr.appendChild(td);
                tbody.appendChild(tr);
                return;
            }

            const fragment = document.createDocumentFragment();

            data.users.forEach(user => {
                fragment.appendChild(generateUsersTableRow(user));
            });

            tbody.appendChild(fragment);

            const totalPages = Math.ceil(data.pagination.total / data.pagination.limit);
            Pagination.render(selectors.pagination, totalPages, data.pagination.currentPage, async(page) => {
                data.pagination.currentPage = page;
                await updateUsersList();
                updateUsersTable();
            });
        };

        const generateUsersTableRow = function(user) {
            const tr = document.createElement("tr");

            // Add checkbox column
            let td = document.createElement("td");
            const checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.name = "users";
            checkbox.value = user.id;
            td.appendChild(checkbox);
            tr.appendChild(td);

            // Add fullname column
            td = document.createElement("td");
            td.textContent = `${user.firstname} ${user.lastname}`;
            tr.appendChild(td);

            // Add email column
            td = document.createElement("td");
            td.textContent = user.email;
            tr.appendChild(td);

            // Add role column
            td = document.createElement("td");
            td.textContent = user.role;
            tr.appendChild(td);

            // Add status column
            td = document.createElement("td");
            td.innerHTML = getStatusTemplate(user.status);
            tr.appendChild(td);

            // Add type column
            td = document.createElement("td");
            td.textContent = user.type;
            tr.appendChild(td);

            return tr;
        };

        const sortUsersTable = function(event) {
            const button = event.target;
            const sortProperty = button.dataset.sortProperty;
            const table = document.querySelector(selectors.usersTable);
            const headers = table.querySelectorAll("th button");

            const currentSort = button.getAttribute("aria-sort");
            const newSort = currentSort === "ascending" ? "descending": "ascending";

            headers.forEach(h => {
                h.setAttribute("aria-sort", "none");
                h.classList.remove("asc");
                h.classList.remove("desc");
            });

            button.setAttribute("aria-sort", newSort);
            button.classList.add(newSort === "ascending" ? "asc" : "desc");

            data.users.sort((a, b) => {
                return newSort === "ascending"
                    ? a[sortProperty].localeCompare(b[sortProperty])
                    : b[sortProperty].localeCompare(a[sortProperty]);
            });

            updateUsersTable();
        };

        const getStatusTemplate = function(status) {
            switch (status) {
                case "active":
                    return iconTemplates.checkMark;
                case "exists":
                    return iconTemplates.hourglass;
                default:
                    return "";
            }
        };

        const clearNotificationsSection = function() {
            const notificationsSection = document.getElementById("user-notifications");
            notificationsSection.innerHTML = "";
        };

        return {
            init: async function() {
                document.addEventListener("click", handleSelectUser);
                const toggler = document.querySelector(selectors.checkAll);
                toggler.addEventListener("click", toggle);
                const unlinkbutton = document.querySelector(selectors.buttons.unlink);
                unlinkbutton.addEventListener("click", handleUnlinkDocspaceUser);
                const inviteButton = document.querySelector(selectors.buttons.invite);
                inviteButton.addEventListener("click", handleInviteToDocspace);
                const buttons = document.querySelectorAll(selectors.usersTable + " th button");
                buttons.forEach(button => button.addEventListener("click", sortUsersTable));

                let template = await Templates.renderForPromise("mod_onlyofficedocspace/icons/hourglass", {});
                iconTemplates.hourglass = template.html;
                template = await Templates.renderForPromise("mod_onlyofficedocspace/icons/check_mark", {});
                iconTemplates.checkMark = template.html;

                await updateUsersList();
                updateUsersTable();
            }
        };
    });