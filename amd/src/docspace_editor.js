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
 * @module mod_onlyofficedocspace/docspace_editor
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 **/
/* eslint-disable no-undef */
define([
    'core/str',
    'core/templates',
    'jquery',
    'mod_onlyofficedocspace/docspace_integration_sdk',
], function(Str, Templates, $, DocSpaceIntegrationSDK) {
    const createFullScreenButtons = function() {
        let enterFullScreenText = Str.getString('enterfullscreen', 'onlyofficedocspace');
        let exitFullScreenText = Str.getString('exitfullscreen', 'onlyofficedocspace');
        const navLeftButton = $('.drawertoggle')[1];
        const navRightButton = $('.drawertoggle')[2];
        const editorContainer = $('.ds-editor-container')[0];

        $.when(enterFullScreenText).done(function(localized) {
            enterFullScreenText = localized;
            const enterButton = document.createElement('button');
            const enterIcon = document.createElement('i');
            enterIcon.className = 'icon fa fa-expand fa-fw';
            enterButton.appendChild(enterIcon);
            enterButton.className = 'ds-editor-fs-button';
            enterButton.id = 'ds-editor-enter-fs-button';
            enterButton.innerHTML += enterFullScreenText;

            enterButton.onclick = function() {
                $('header').hide();
                $('footer').hide();
                if (navLeftButton && navLeftButton.getAttribute('data-aria-hidden-tab-index') === null) {
                    $(navLeftButton).click();
                }
                if (navRightButton && navRightButton.getAttribute('data-aria-hidden-tab-index') === null) {
                    $(navRightButton).click();
                }
                if ($('.editmode-switch-form').length > 0 && $('.editmode-switch-form')[0][0].checked) {
                    $(editorContainer).addClass('ds-editor-rightindent');
                }
                $(editorContainer).addClass('ds-editor-fullscreen');
                editorContainer.children[0].style.height = '93vh';
                $('#ds-editor-enter-fs-button').hide();
                $('#ds-editor-exit-fs-button').show();
            };
            document.querySelector("#page-content h2").style.display = "inline-block";
            editorContainer.before(enterButton);
        });
        $.when(exitFullScreenText).done(function(localized) {
            exitFullScreenText = localized;
            const exitButton = document.createElement('button');
            const exitIcon = document.createElement('i');
            exitIcon.className = 'icon fa fa-compress fa-fw';
            exitButton.appendChild(exitIcon);
            exitButton.innerHTML += exitFullScreenText;
            exitButton.className = 'ds-editor-fs-button';
            exitButton.id = 'ds-editor-exit-fs-button';

            exitButton.onclick = function() {
                $(editorContainer).removeClass('ds-editor-fullscreen');
                $(editorContainer).removeClass('ds-editor-rightindent');
                editorContainer.children[0].style.height = '95vh';
                $('header').show();
                $('footer').show();
                $('#ds-editor-enter-fs-button').show();
                $('#ds-editor-exit-fs-button').hide();
            };
            $('#usernavigation')[0].prepend(exitButton);
            $('#ds-editor-exit-fs-button').hide();
        });
    };

    return {
        init: async function(docspaceUrl, config, user, errorTemplateName) {
            config.events = {
                onNotFound: () => {
                    // eslint-disable-next-line promise/catch-or-return
                    Templates.renderForPromise(errorTemplateName, {})
                        .then(({html, js}) => {
                            DocSpace.SDK.frames[config.frameId].destroyFrame();
                            Templates.appendNodeContents('#ds-editor-error', html, js);
                            return;
                        });
                },
            };
            await DocSpaceIntegrationSDK.initScript('oodsp-api-js', docspaceUrl)
                // eslint-disable-next-line promise/always-return
                .then(async() => {
                    DocSpace.SDK.initSystem({
                        src: docspaceUrl,
                        frameId: config.frameId,
                        width: config.width,
                        height: config.height,
                        events: {
                            onAppReady: async function() {
                                const docSpace = DocSpace.SDK.frames[config.frameId];
                                const currentUser = await docSpace.getUserInfo();

                                if ((!user && currentUser) || (currentUser && currentUser.email !== user.email)) {
                                    await docSpace.logout();
                                }

                                if (user && user.hash) {
                                    await docSpace.login(user.email, user.hash);
                                }

                                docSpace.initFrame(config);
                            }
                        }
                    });
                });
            if (config.mode === "editor") {
                createFullScreenButtons();
            }
        }
    };
});
/* eslint-enable no-undef */