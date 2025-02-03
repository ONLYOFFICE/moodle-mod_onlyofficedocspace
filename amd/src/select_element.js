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
 * @module mod_onlyofficedocspace/select_element
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 **/
/* eslint-disable no-undef, capitalized-comments */
define(
    [
        'jquery',
        'core/modal_events',
        'mod_onlyofficedocspace/docspace_integration_sdk',
        'mod_onlyofficedocspace/select_modal',
        'mod_onlyofficedocspace/login_modal',
        'core/str',
        'mod_onlyofficedocspace/repository'
    ],
    function($, ModalEvents, DocspaceIntegrationSDK, DocSpaceSelectModal, DocSpaceLogInModal, Str, Repository) {
        const frames = {
            system: "ds-system-frame",
            login: "ds-login-frame",
            select: "ds-select-frame",
        };

        let logged = false;
        let user;
        let docspaceUrl;

        const showLoginForm = function() {
            const loginForm = document.getElementById("ds-login-form");
            loginForm.classList.remove("d-none");
        };

        const hideLoginForm = function() {
            const loginForm = document.getElementById("ds-login-form");
            loginForm.classList.add("d-none");
        };

        const showSelectButtons = function() {
            const selectForm = document.getElementById("ds-select-buttons");
            selectForm.classList.remove("d-none");
        };

        const hideSelectButtons = function() {
            const selectForm = document.getElementById("ds-select-buttons");
            selectForm.classList.add("d-none");
        };

        const showSelectedItem = function() {
            const loginForm = document.getElementById("ds-selected-item");
            loginForm.classList.remove("d-none");
        };

        const hideSelectedItem = function() {
            const loginForm = document.getElementById("ds-selected-item");
            loginForm.classList.add("d-none");
        };

        const selectItem = async function(id, type, requestToken, name, icon) {
            document.getElementsByName("docspaceitemid")[0].value = id;
            document.getElementsByName("docspaceitemtype")[0].value = type;
            document.getElementsByName("docspacerequesttoken")[0].value = requestToken;
            document.getElementsByName("docspaceitemname")[0].value = name;
            document.getElementsByName("docspaceitemicon")[0].value = icon;

            const selectedItemType = document.getElementById("ds-selected-item-type");
            selectedItemType
                .querySelector("p")
                .textContent = await Str.getString("selecteditemtype:" + type, 'mod_onlyofficedocspace');
            const selectedItemInfo = document.getElementById("ds-selected-item-info");
            selectedItemInfo.querySelector("img").src = icon;
            selectedItemInfo.querySelector("p").textContent = name;
        };

        const setState = function(state = '') {
            if (state === 'login') {
                showLoginForm();
                hideSelectButtons();
                hideSelectedItem();
            } else if (state === 'selectors') {
                showSelectButtons();
                hideLoginForm();
                hideSelectedItem();
            } else if (state === 'item') {
                showSelectedItem();
                hideLoginForm();
                hideSelectButtons();
            } else {
                hideLoginForm();
                hideSelectedItem();
                hideSelectButtons();
            }
        };

        const displayLoginModal = async function() {
            await DocSpaceLogInModal.create({
                templateContext: {
                    email: user.email,
                    url: docspaceUrl,
                },
                removeOnClose: true
            })
                // eslint-disable-next-line promise/always-return
                .then((modal) => {
                    modal.getRoot().on(ModalEvents.hidden, async() => {
                        await DocSpace.SDK.frames[frames.login].destroyFrame();
                    });
                    modal.getRoot().on(ModalEvents.cancel, () => {
                        modal.destroy();
                    });
                    modal.modal[0].classList.add("modal-dialog-centered");
                    modal.modal[0].style = "width: 440px;";
                    modal.show();
                    const docSpace = DocSpace.SDK.initSystem({
                        frameId: frames.login,
                        width: 0,
                        height: 0,
                    });
                    document.querySelector('button[data-action="ds-login-submit"]')
                        .addEventListener("click", async function() {
                            const password = document.getElementById("ds-login-password").value;

                            const hashSettings = await docSpace.getHashSettings();
                            const passwordHash = await docSpace.createHash(password.trim(), hashSettings);

                            // eslint-disable-next-line promise/catch-or-return, promise/no-nesting
                            docSpace.login(user.email, passwordHash)
                                .then(async function(response) {
                                    // eslint-disable-next-line promise/always-return
                                    if (response.status && response.status !== 200) {
                                        document.getElementById("ds-login-error").style.display = "block";
                                    } else {
                                        // eslint-disable-next-line promise/no-nesting
                                        await Repository.updateUserPassword(user.email, passwordHash)
                                            .catch((error) => {
                                                // eslint-disable-next-line no-console
                                                console.log(error);
                                            });

                                        modal.destroy();
                                        setState('selectors');
                                    }
                                });
                        });
                    document.querySelector('button[data-action="ds-login-cancel"]')
                        .addEventListener("click", function() {
                            modal.destroy();
                        });
                });
        };

        const displaySelectorModal = async function(event) {
            const button = event.target;
            const selectorType = button.dataset.selectorType;
            const titleText = selectorType === "room"
                ? await Str.getString('selectroom', 'mod_onlyofficedocspace')
                : await Str.getString('selectfile', 'mod_onlyofficedocspace');

            const modal = await DocSpaceSelectModal.create({
                templateContext: {
                    titleText: titleText
                },
                removeOnClose: true
            });
            modal.body[0].classList.add("p-0", "py-2");
            modal.modal[0].classList.add("modal-dialog-centered");
            modal.modal[0].querySelector(".modal-content").style = "width:480px;border-radius: 0";
            modal.getRoot().on(ModalEvents.hidden, async() => {
                await DocSpace.SDK.frames[frames.select].destroyFrame();
            });
            modal.show();

            const config = {
                frameId: frames.select,
                width: "100%",
                height: "538px",
                showSelectorCancel: true,
                roomType: 6,
                events: {
                    onSelectCallback: async function(event) {
                        const data = selectorType === "room" ? event[0] : event;
                        const name = selectorType === "room" ? data.label : data.title + data.fileExst;
                        const icon = URL.parse(data.icon) ?? new URL(data.icon, docspaceUrl);
                        const requestToken = data.requestTokens[0].requestToken;
                        selectItem(data.id, selectorType, requestToken, name, icon.href);
                        setState('item');
                        modal.destroy();
                    },
                    onCloseCallback: function() {
                        clearSelectedItem();
                        modal.destroy();
                    }
                },
            };

            if (selectorType === "room") {
                config.mode = "room-selector";
            } else if (selectorType === "file") {
                config.mode = "file-selector";
                config.rootPath = "/rooms/share";
                config.selectorType = "roomsOnly";
            }

            DocSpace.SDK.initFrame(config);
        };

        const clearSelectedItem = function() {
            selectItem('', '', '', '', '');
            setState();
            if (logged) {
                setState('selectors');
            } else {
                loginToDocSpace();
            }
        };

        const loginToDocSpace = async function() {
            DocSpace.SDK.initSystem({
                frameId: frames.system,
                width: "100%",
                height: "100%",
                events: {
                    onAppReady: async function() {
                        const docSpace = DocSpace.SDK.frames[frames.system];
                        const docSpaceUser = await docSpace.getUserInfo();

                        if (docSpaceUser && docSpaceUser.email === user.email) {
                            logged = true;
                            setState('selectors');
                        } else {
                            if (docSpaceUser) {
                                await docSpace.logout();
                            }
                            logged = false;

                            if (user.hash) {
                                await docSpace.login(user.email, user.hash)
                                    .then(function(response) {
                                        // eslint-disable-next-line promise/always-return
                                        if (response && response.status && response.status !== 200) {
                                            setState('login');
                                        } else {
                                            logged = true;
                                            setState('selectors');
                                        }
                                    });
                            } else {
                                setState('login');
                            }
                        }

                        await docSpace.destroyFrame();
                    }
                }
            });
        };

        return {
            init: async function(url, currentUser, activity) {
                user = currentUser;
                docspaceUrl = url;

                await DocspaceIntegrationSDK.initScript("oodsp-api-js", docspaceUrl);

                if (activity) {
                    selectItem(
                        activity.docspaceitemid,
                        activity.docspaceitemtype,
                        activity.docspacerequesttoken,
                        activity.docspaceitemname,
                        activity.docspaceitemicon
                    );
                    setState('item');
                } else {
                    loginToDocSpace();
                }

                const selectRoomButton = document.getElementById("ds-select-room");
                // const selectFileButton = document.getElementById("ds-select-file");
                const removeSelectedItemButton = document.getElementById("remove-selected-item");
                const loginButton = document.getElementById("ds-login-button");

                selectRoomButton.addEventListener("click", displaySelectorModal);
                // selectFileButton.addEventListener("click", displaySelectorModal);
                removeSelectedItemButton.addEventListener("click", clearSelectedItem);
                loginButton.addEventListener("click", displayLoginModal);
            }
        };
    });
/* eslint-enable no-undef, capitalized-comments */