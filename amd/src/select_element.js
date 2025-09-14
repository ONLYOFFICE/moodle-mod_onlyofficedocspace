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
/* eslint-disable no-undef */
define(
    [
        'core/modal_events',
        'core/str',
        'mod_onlyofficedocspace/docspace_integration_sdk',
        'mod_onlyofficedocspace/select_modal',
        'mod_onlyofficedocspace/login_modal',
        'mod_onlyofficedocspace/repository'
    ],
    function(ModalEvents, Str, DocspaceIntegrationSDK, DocSpaceSelectModal, DocSpaceLogInModal, Repository) {
        const STEPS = {
            LOADING: 'loading',
            LOGIN: 'login',
            SELECT_ITEM: 'select_item',
            DOCSPACE_ITEM: 'docspace_item',
            ERROR: 'error',
        };

        const selectors = {
            frames: {
                system: "ds-system-frame",
                select: "ds-select-frame",
                container: "ds-frame-container",
            },
            modal: {
                ids: {
                    email: 'ds-login-email',
                    password: 'ds-login-password',
                    submit: 'ds-login-submit',
                    cancel: 'ds-login-cancel',
                }
            },
            select: {
                ids: {
                    containers: {
                        login: 'ds-login-container',
                        item: 'ds-item-container',
                        itemInfo: 'ds-item-info',
                        itemType: 'ds-item-type',
                        select: 'ds-select-container',
                        error: 'ds-error',
                    },
                    buttons: {
                        login: 'ds-show-login-modal',
                        selectRoom: 'ds-select-room',
                        selectFile: 'ds-select-file',
                        remove: 'ds-item-remove',
                    }
                }
            }
        };

        const data = {
            url: '',
            user: null,
            item: null,
        };

        let state = {step: STEPS.LOADING};

        const setState = function(newState) {
            state = {...state, ...newState};
            render();
        };

        const render = async function() {
            document.getElementById(selectors.select.ids.containers.item)
                .classList.toggle('d-none', state.step !== STEPS.DOCSPACE_ITEM);
            document.getElementById(selectors.select.ids.containers.login)
                .classList.toggle('d-none', state.step !== STEPS.LOGIN);
            document.getElementById(selectors.select.ids.containers.error)
                .classList.toggle('d-none', state.step !== STEPS.ERROR);
            document.getElementById(selectors.select.ids.containers.select)
                .classList.toggle('d-none', state.step !== STEPS.SELECT_ITEM);
            document.getElementById(selectors.frames.container)
                .classList.toggle('d-none', state.step !== STEPS.LOADING);

            if (state.step === STEPS.LOADING) {
                initDocSpace();
            }
            if (state.step === STEPS.DOCSPACE_ITEM) {
                document.getElementById(selectors.select.ids.containers.itemType)
                    .querySelector("p").textContent = await Str.getString(
                        'selecteditemtype:' + data.item.docspaceitemtype,
                        'onlyofficedocspace'
                    );
                document.getElementById(selectors.select.ids.containers.itemInfo)
                    .querySelector("img").src = data.item.docspaceitemicon;
                document.getElementById(selectors.select.ids.containers.itemInfo)
                    .querySelector("p").textContent = data.item.docspaceitemname;
            }
        };

        const initDocSpace = async function() {
            await DocspaceIntegrationSDK.initScript("oodsp-api-js", data.url)
                .then(async() => {
                    DocSpace.SDK.initSystem({
                        frameId: selectors.frames.system,
                        src: data.url,
                        events: {
                            async onAppReady() {
                                if (data.user && data.user.email && data.user.passwordHash) {
                                    await authenticateWithDocSpace(
                                        data.user.email,
                                        data.user.passwordHash,
                                        () => {
                                            setState({
                                                step: data.item ? STEPS.DOCSPACE_ITEM : STEPS.SELECT_ITEM
                                            });
                                        },
                                        () => {
                                            setState({step: STEPS.LOGIN});
                                        }
                                    );
                                } else {
                                    setState({step: STEPS.LOGIN});
                                }
                            },
                            onAppError() {
                                setState({step: STEPS.ERROR});
                            }
                        }
                    });
                    return;
                }).catch(() => {
                    setState({step: STEPS.ERROR});
                });
        };

        const showLoginModal = async function() {
            await DocSpaceLogInModal.create({
                templateContext: {
                    email: data.user ? data.user.email : '',
                    url: data.url,
                },
                removeOnClose: true
            })
            .then((modal) => {
                modal.getRoot().on(ModalEvents.cancel, () => {
                    modal.destroy();
                });
                modal.modal[0].classList.add("modal-dialog-centered");
                modal.modal[0].style = "width: 440px;";
                modal.show();
                document.getElementById(selectors.modal.ids.submit)
                    .addEventListener("click", async function(event) {
                        const submitButton = event.target;
                        submitButton.disabled = true;

                        const email = document.getElementById(selectors.modal.ids.email).value.trim();
                        const password = document.getElementById(selectors.modal.ids.password).value.trim();

                        const docspace = DocSpace.SDK.frames[selectors.frames.system];
                        const hashSettings = await docspace.getHashSettings();
                        const passwordHash = await docspace.createHash(password.trim(), hashSettings);

                        await authenticateWithDocSpace(
                            email,
                            passwordHash,
                            async() => {
                                // eslint-disable-next-line promise/no-nesting
                                await Repository.updateUserPassword(email, passwordHash)
                                    .catch((error) => {
                                        // eslint-disable-next-line no-console
                                        console.log(error);
                                    });

                                modal.destroy();
                                setState({step: data.item ? STEPS.DOCSPACE_ITEM : STEPS.SELECT_ITEM});
                            },
                            () => {
                                document.getElementById("ds-login-error").style.display = "block";
                            },
                        );
                        submitButton.disabled = false;
                    });
                document.getElementById(selectors.modal.ids.cancel)
                    .addEventListener("click", function() {
                        modal.destroy();
                    });
                return;
            });
        };

        const showSelectModal = async function(event) {
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
            modal.modal[0].querySelector(".modal-content").style = "max-width:480px;border-radius: 0";
            modal.getRoot().on(ModalEvents.hidden, async() => {
                await DocSpace.SDK.frames[selectors.frames.select].destroyFrame();
            });
            modal.show();

            const config = {
                frameId: selectors.frames.select,
                src: data.url,
                width: "100%",
                height: "538px",
                showSelectorCancel: true,
                theme: "Base",
                roomType: 6,
                events: {
                    onSelectCallback: async function(event) {
                        const itemInfo = selectorType === "room" ? event[0] : event;
                        const name = selectorType === "room" ? itemInfo.label : itemInfo.title + itemInfo.fileExst;
                        const icon = URL.parse(itemInfo.icon) ?? new URL(itemInfo.icon, data.url);
                        const requestToken = itemInfo.requestTokens[0].requestToken;
                        data.item = {
                            docspaceitemtype: selectorType,
                            docspaceitemname: name,
                            docspaceitemicon: icon.href,
                        };
                        selectItem(itemInfo.id, selectorType, requestToken, name, icon.href);
                        setState({step: STEPS.DOCSPACE_ITEM});
                        modal.destroy();
                    },
                    onCloseCallback: function() {
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

        const authenticateWithDocSpace = async function(email, passwordHash, onSuccess = null, onFail = null) {
            const docspace = DocSpace.SDK.frames[selectors.frames.system];
            const docspaceUser = await docspace.getUserInfo();

            if (docspaceUser && docspaceUser.email !== email) {
                await docspace.logout();
            }

            await docspace.login(email, passwordHash)
                .then(result => {
                    const name = result.name ?? '';
                    if (name.toLowerCase() === 'error') {
                        if (onFail) {
                            onFail();
                        }
                    } else {
                        if (onSuccess) {
                            onSuccess();
                        }
                    }
                    return;
                }).catch(() => {
                    if (onFail) {
                        onFail();
                    }
                });
        };

        const selectItem = async function(id, type, requestToken, name, icon) {
            document.getElementsByName("docspaceitemid")[0].value = id;
            document.getElementsByName("docspaceitemtype")[0].value = type;
            document.getElementsByName("docspacerequesttoken")[0].value = requestToken;
            document.getElementsByName("docspaceitemname")[0].value = name;
            document.getElementsByName("docspaceitemicon")[0].value = icon;
        };

        const removeItem = async function() {
            selectItem('', '', '', '', '');
            setState({step: STEPS.SELECT_ITEM});
        };

        return {
            init: async function(url, user, item) {
                data.url = url;
                data.user = user;
                data.item = item;

                // Bind event handlers.
                document.getElementById(selectors.select.ids.buttons.login).addEventListener('click', showLoginModal);
                document.getElementById(selectors.select.ids.buttons.selectRoom).addEventListener('click', showSelectModal);
                document.getElementById(selectors.select.ids.buttons.remove).addEventListener('click', removeItem);

                setState({step: STEPS.LOADING});
            }
        };
    });
/* eslint-enable no-undef*/