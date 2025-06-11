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
define(['core/str', 'core/notification'], function(Str, Notification) {
    return {
        init: async function(urls) {
            const settingsForm = document.getElementById("adminsettings");
            const warningMessage = await Str.getString("adminsettings:urlwarning", "onlyofficedocspace");
            const confirmStr = await Str.getString("confirm", "onlyofficedocspace");
            const confirmchangesStr = await Str.getString("confirmchanges", "onlyofficedocspace");

            if (settingsForm) {
                settingsForm.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    const url = document.getElementById("id_s_onlyofficedocspace_docspace_server_url")
                        .value
                        .trim()
                        .replace(/\/+$/g, '');

                    if (urls.current && url !== urls.current && url !== urls.default) {
                        const clearUsers = document.getElementById("id_s_onlyofficedocspace_clear_users");

                        await Notification.saveCancelPromise(
                            confirmchangesStr,
                            warningMessage,
                            confirmStr,
                        ).then(() => {
                            clearUsers.checked = true;
                            return;
                        }).catch(() => {
                            clearUsers.checked = false;
                        });

                        if (!clearUsers.checked) {
                            return;
                        }
                    }

                    event.target.submit();
                });
            }
        }
    };
});