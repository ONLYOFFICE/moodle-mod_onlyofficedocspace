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
 * @module     mod_onlyofficedocspace/admin_settings
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 **/
define([
    'core_form/changechecker',
    'core/notification',
    'core/str',
    'mod_onlyofficedocspace/repository',
], function(ChangeChecker, Notification, Str, Repository) {

    const selectors = {
        notifications: '#user-notifications',
        fieldRows: {
            url: '#admin-docspace_server_url',
            apiKey: '#admin-docspace_api_key',
        },
        icons: {
            rightArrow: ".right-arrow",
            spinner: ".spinner-border",
            checkMark: ".ds-check-icon",
        },
        buttons: {
            checkUrl: "#check-docspace-url-btn",
            connect: "#connect-docspace-btn",
            change: "#change-docspace-btn",
            disconnect: "#disconnect-docspace-btn",
        },
        inputs: {
            url: '#id_s_onlyofficedocspace_docspace_server_url',
            apiKey: '#id_s_onlyofficedocspace_docspace_api_key',
        },
        errors: {
            url: '#id_s_onlyofficedocspace_docspace_server_url-error',
            apiKey: '#id_s_onlyofficedocspace_docspace_api_key-error',
        }
    };

    const STEPS = {
        CONNECTED: 'connected',
        CHECK_URL: 'check_url',
        CHECK_API_KEY: 'check_api_key',
    };

    const state = {
        step: STEPS.CONNECTED,
        isUrlValid: false,
    };

    const setState = function(newState) {
        render({...state, ...newState});
    };

    const render = async function(state) {
        const isCheckingUrl = Boolean(state.isCheckingUrl);
        const isConnecting = Boolean(state.isConnecting);

        document.querySelector(selectors.notifications).innerHTML = '';

        document.querySelector(selectors.fieldRows.url).classList.toggle('disabled', state.step === STEPS.CONNECTED);
        document.querySelector(selectors.fieldRows.apiKey).classList.toggle('disabled', state.step !== STEPS.CHECK_API_KEY);

        document.querySelector(selectors.buttons.checkUrl).classList.toggle('hidden', state.step === STEPS.CONNECTED);
        document.querySelector(selectors.buttons.connect).classList.toggle('hidden', state.step === STEPS.CONNECTED);
        document.querySelector(selectors.buttons.change).classList.toggle('hidden', state.step !== STEPS.CONNECTED);
        document.querySelector(selectors.buttons.disconnect).classList.toggle('hidden', state.step !== STEPS.CONNECTED);

        document.querySelector(selectors.icons.spinner).classList.toggle('hidden', !isCheckingUrl);
        document.querySelector(selectors.icons.rightArrow).classList.toggle('hidden', isCheckingUrl);
        document.querySelector(selectors.inputs.url).classList
            .toggle('pr-5', state.isUrlValid);
        document.querySelector(selectors.icons.checkMark).classList
            .toggle('hidden', !state.isUrlValid);

        document.querySelector(selectors.buttons.connect).disabled = state.step !== STEPS.CHECK_API_KEY || isConnecting;
        document.querySelector(selectors.buttons.checkUrl).disabled = isCheckingUrl;

        document.querySelector(selectors.errors.url).classList.toggle('hidden', !(state.errors && state.errors.url));
        document.querySelector(selectors.errors.apiKey).classList.toggle('hidden', !(state.errors && state.errors.apiKey));

        document.querySelectorAll('.ds-create-key-link').forEach(link => {
            const url = document.querySelector(selectors.inputs.url).value;
            link.href = state.isUrlValid ? url : '#';
        });

        if (state.success) {
            await Notification.addNotification({
                message: state.success,
                type: 'success',
            });
        }

        if (state.errors) {
            const errorMessages = [];
            if (state.errors.url) {
                document.querySelector(selectors.errors.url).textContent = state.errors.url;
                errorMessages.push(state.errors.url);
            }

            if (state.errors.apiKey) {
                document.querySelector(selectors.errors.apiKey).textContent = state.errors.apiKey;
                errorMessages.push(state.errors.apiKey);
            }

            if (state.errors.general) {
                errorMessages.push(state.errors.general);
            }

            errorMessages.forEach(async(error) => {
                await Notification.addNotification({
                    message: error,
                    type: 'error'
                });
            });
        }
    };

    const handleCheckUrl = async function() {
        state.step = STEPS.CHECK_URL;
        state.isUrlValid = false;
        setState({isCheckingUrl: true});

        const url = document.querySelector(selectors.inputs.url).value.trim();

        // Check if the URL is empty.
        if (url.length === 0) {
            setState({errors: {
                url: await Str.getString('validationerror:emptyurl', 'onlyofficedocspace')
            }});
            return;
        }

        // Check if the URL is valid.
        try {
            new URL(url);
        } catch (TypeError) {
            setState({errors: {
                url: await Str.getString('validationerror:invalidurl', 'onlyofficedocspace')
            }});
            return;
        }

        try {
            const result = await Repository.checkDocSpaceConnectivity(url);

            if (result.status && result.status === 'success') {
                state.isUrlValid = true;
                state.step = STEPS.CHECK_API_KEY;
                setState({});
                return;
            }

            if (result.errors) {
                setState({errors: {url: result.errors[0]}});
            }
        } catch (error) {
            // eslint-disable-next-line no-console
            console.log(error);
            setState({errors: {
                general: await Str.getString('unexpectederror:docspaceurl', 'onlyofficedocspace')
            }});
        }
    };

    const handleConnect = async function(event) {
        const connectButton = event.target;
        connectButton.disabled = true;

        const url = document.querySelector(selectors.inputs.url).value.trim();
        const apiKey = document.querySelector(selectors.inputs.apiKey).value.trim();

        if (apiKey.length === 0) {
            setState({errors: {
                apiKey: await Str.getString('validationerror:emptyapikey', 'onlyofficedocspace')
            }});
            return;
        }

        try {
            const result = await Repository.connectDocSpace(url, apiKey);

            if (result.status && result.status === 'success') {
                state.step = STEPS.CONNECTED;
                state.isUrlValid = true;
                setState({success: await Str.getString('successfulconnection', 'onlyofficedocspace')});
            } else if (result.errors) {
                setState({errors: {apiKey: result.errors[0]}});
            }
        } catch (error) {
            // eslint-disable-next-line no-console
            console.log(error);
            setState({errors: {
                general: await Str.getString('unexpectederror:connectdocspace', 'onlyofficedocspace')
            }});
        }

        ChangeChecker.disableAllChecks();
        connectButton.disabled = false;
    };

    const handleChangeDocSpace = async function() {
        await Notification.saveCancel(
            Str.getString('warning', 'onlyofficedocspace'),
            Str.getString('confirmchange_desc', 'onlyofficedocspace'),
            Str.getString('change', 'onlyofficedocspace'),
            async() => {
                state.step = STEPS.CHECK_URL;
                state.isUrlValid = false;
                setState({});
            },
            null,
        );
    };

    const handleDisconnectDocSpace = async function() {
        await Notification.saveCancel(
            Str.getString('warning', 'onlyofficedocspace'),
            Str.getString('confirmdisconnect_desc', 'onlyofficedocspace'),
            Str.getString('disconnect', 'onlyofficedocspace'),
            async() => {
                const result = await Repository.disconnectDocSpace();

                if (result.status && result.status === 'success') {
                    ChangeChecker.disableAllChecks();
                    window.location.reload();
                    return;
                }

                if (result.errors) {
                    setState({errors: {general: result.errors}});
                }
            },
            null,
        );
    };

    const resetStepToCheckUrl = function() {
        state.step = STEPS.CHECK_URL;
        state.isUrlValid = false;
        setState({});
    };

    const updateClearButton = function(event) {
        const input = event.target;
        const wrapper = input.closest(".ds-input-wrapper");
        const clearButton = wrapper.querySelector('.ds-clear-btn');
        const focusedAndNonEmpty = input.value && document.activeElement === input;
        input.classList.toggle('pr-5', focusedAndNonEmpty);
        clearButton.classList.toggle('hidden', !focusedAndNonEmpty);
    };

    const resetInputValue = function(event) {
        if (event.target.closest(".ds-clear-btn")) {
            const wrapper = event.target.closest(".ds-input-wrapper");
            const input = wrapper.querySelector("input");
            input.value = "";
            input.dispatchEvent(new Event("input", {bubbles: true}));
            input.focus();
        }
    };

    return {
        init: async function(connected) {
            // Bind event handlers.
            document.querySelector(selectors.buttons.checkUrl).addEventListener('click', handleCheckUrl);
            document.querySelector(selectors.buttons.connect).addEventListener('click', handleConnect);
            document.querySelector(selectors.buttons.change).addEventListener('click', handleChangeDocSpace);
            document.querySelector(selectors.buttons.disconnect).addEventListener('click', handleDisconnectDocSpace);

            document.querySelector(selectors.inputs.url).addEventListener('input', resetStepToCheckUrl);
            document.querySelector(selectors.inputs.url).addEventListener('focus', resetStepToCheckUrl);
            document.querySelector(selectors.inputs.url).addEventListener('input', updateClearButton);
            document.querySelector(selectors.inputs.url).addEventListener('focus', updateClearButton);
            document.querySelector(selectors.inputs.url).addEventListener('blur', e => {
                setTimeout(() => {
                    updateClearButton(e);
                }, 200);
            });

            document.querySelector(selectors.inputs.apiKey).addEventListener('input', updateClearButton);
            document.querySelector(selectors.inputs.apiKey).addEventListener('focus', updateClearButton);
            document.querySelector(selectors.inputs.apiKey).addEventListener('blur', e => {
                setTimeout(() => {
                    updateClearButton(e);
                }, 200);
            });

            document.addEventListener("click", resetInputValue);

            // Set initial state.
            state.step = connected ? STEPS.CONNECTED : STEPS.CHECK_URL;
            state.isUrlValid = connected;
            setState({});
        }
    };
});