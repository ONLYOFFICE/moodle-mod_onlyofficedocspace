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
 * @module mod_onlyofficedocspace/admin_settings
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
        'core/str'
    ],
    function($, DocspaceIntegrationSdk, PasswordGenerator, Notification, Str) {
        const systemFrameId = "oodsp-system-frame";
        const scriptId = 'oodsp-api-js';
        let submitButton;

        const updateSettings = async function() {
            const url = document.getElementById("id_s_onlyofficedocspace_docspace_server_url")
                .value
                .trim()
                .replace(/\/+$/g, '');
            const email = document.getElementById("id_s_onlyofficedocspace_docspace_login").value;
            const password = document.getElementsByName("s_onlyofficedocspace_docspace_password")[0].value;
            const hashSettings = await DocSpace.SDK.frames[systemFrameId].getHashSettings();
            const passwordHash = await DocSpace
                .SDK
                .frames[systemFrameId]
                .createHash(password.trim(), hashSettings);
            const randomPasswordHash = await DocSpace
                .SDK
                .frames[systemFrameId]
                .createHash(PasswordGenerator.generate(), hashSettings);
            const updateSettingsUrl = M.cfg.wwwroot +
                '/mod/onlyofficedocspace/api/updateadminsettings.php';
            let data = {
                url: url,
                email: email,
                password: passwordHash,
                randomPassword: randomPasswordHash
            };
            await $.ajax({
                headers: {
                    Accept: "application/json",
                },
                type: 'POST',
                url: updateSettingsUrl,
                dataType: 'json',
                data: data,
            }).done(async function(response) {
                if (response.status === 201) {
                    window.location.reload();
                }
            }).fail(function(jqXHR) {
                submitButton.removeAttribute("disabled");
                const status = jqXHR.status;
                if (status === 500 || status === 422) {
                    const error = jqXHR.responseJSON.error;
                    Notification.display(error, 'error');
                }
            });
            submitButton.removeAttribute("disabled");
        };

        return {
            init: async function(urls) {
                const settingsForm = document.getElementById("adminsettings");
                const warningMessage = await Str.getString("adminsettings:urlwarning", "onlyofficedocspace");

                if (settingsForm) {
                    submitButton = settingsForm.querySelector("[type='submit']");
                    const systemFrameContainer = document.createElement("div");
                    systemFrameContainer.classList.add("d-none");
                    const systemFrame = document.createElement("div");
                    systemFrame.id = systemFrameId;
                    systemFrameContainer.appendChild(systemFrame);
                    settingsForm.appendChild(systemFrameContainer);

                    settingsForm.addEventListener("submit", async function(event) {
                        event.preventDefault();
                        submitButton.setAttribute("disabled", "");
                        const url = document.getElementById("id_s_onlyofficedocspace_docspace_server_url")
                            .value
                            .trim()
                            .replace(/\/+$/g, '');

                        // eslint-disable-next-line no-alert
                        if (urls.current && url !== urls.current && url !== urls.default && confirm(warningMessage) !== true) {
                            submitButton.removeAttribute("disabled");
                            return;
                        }

                        let script = document.getElementById(scriptId);

                        if (script && script.src !== url + "/" + DocspaceIntegrationSdk.apiUrl) {
                            if (typeof DocSpace !== "undefined" && DocSpace !== null) {
                                await DocSpace.SDK.frames[systemFrameId].destroyFrame();
                            }
                            script.remove();
                            script = null;
                            window.DocSpace = null;
                        }

                        if (!script) {
                            await DocspaceIntegrationSdk.initScript(scriptId, url)
                                .catch(async() => {
                                    Notification.display(await Str.getString('docspaceunreachable', 'onlyofficedocspace'), 'error');
                                });
                        }

                        if (typeof DocSpace === "undefined" || DocSpace === null) {
                            submitButton.removeAttribute("disabled");
                            return;
                        }

                        if (DocSpace.SDK.frames[systemFrameId]) {
                            updateSettings();
                        } else {
                            DocSpace.SDK.initSystem(
                                {
                                    frameId: systemFrameId,
                                    events: {
                                        "onAppReady": async function() {
                                            updateSettings();
                                        },
                                        "onAppError": async function(error) {
                                            console.log(error);
                                            Notification.display(
                                                await Str.getString('docspaceapperror', 'onlyofficedocspace'), 'error'
                                            );
                                            submitButton.removeAttribute("disabled");
                                        }
                                    }
                                }
                            );
                        }
                    });
                }
            }
        };
    });
/* eslint-enable no-undef, no-console */