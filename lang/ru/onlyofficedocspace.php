<?php
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
 * Languages configuration for the mod_onlyofficedocspace plugin.
 *
 * @package   mod_onlyofficedocspace
 * @copyright 2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['activityname'] = 'Название элемента';
$string['adminsettings:updated'] = 'Настройки успешно сохранены';
$string['adminsettings:urldescription'] = 'Enter the URL of your DocSpace in the field above. For example, https://yourcompany.docspace.com.';
$string['adminsettings:urlwarning'] = 'Вы уверены, что хотите изменить текущий DocSpace на другой? Подключенные логины пользователей будут утеряны.';
$string['change'] = 'Change';
$string['confirmchange_desc'] = 'If you press the Disconnect button, you will not have access to the currently connected ONLYOFFICE DocSpace. This will remove the connections between Rooms and Activities, and disconnect all users.';
$string['confirmdisconnect_desc'] = 'If you press the Change button, you will have to re-enter the credentials for the currently connected ONLYOFFICE DocSpace. Connections between Rooms and Activities might be lost. Information about optional user export won’t be deleted.';
$string['connect'] = 'Connect';
$string['coursecreator'] = 'Course creator';
$string['createkey'] = 'Create a key';
$string['cspwarning'] = 'Проверьте настройки CSP.</b><br/>Перед подключением перейдите в <b>Настройки DocSpace - Инструменты разработчика - JavaScript SDK</b> и добавьте адрес портала Moodle в список разрешенных - <u class="font-weight-bold">{$a}</u>';
$string['disconnect'] = 'Disconnect';
$string['docspaceapikey'] = 'ONLYOFFICE DocSpace API key';
$string['docspaceapikey_help'] = 'Before connecting the app, please go to the <b>link</b>, create new API key and insert it here. You can create API key with Permissions = <b>All</b> or create API key with <b>restricted access</b>. In this case, the following Access Scopes should be selected for valid work of this app: (Profile: Read, Contacts: Write, Rooms: Write).';
$string['docspaceapperror'] = 'Ошибка при инициализации. Проверьте настройки DocSpace CSP.';
$string['docspaceautherror'] = 'Процесс аутентификации не пройден.';
$string['docspaceauthinvalidcredentials'] = 'Аутентификация не пройдена. Неверный логин/пароль';
$string['docspaceconfigurationerror'] = 'Сначала настройте плагин на странице настроек ONLYOFFICE DocSpace';
$string['docspacefilenotfound'] = 'Требуемый файл не найден. Проверьте, существует ли такой файл, или обратитесь к администратору.';
$string['docspacelogin'] = 'Логин DocSpace';
$string['docspacenotfound_desc'] = 'Please ensure that this room is located at the same DocSpace Service Address specified in the Settings.';
$string['docspacepassword'] = 'Пароль DocSpace';
$string['docspacepermissiondenied'] = 'Указанный пользователь не является администратором DocSpace!';
$string['docspacerequestuserserror'] = 'Запрос пользователя DocSpace не выполнен';
$string['docspaceroomnotfound'] = 'Требуемая комната не найдена. Проверьте, существует ли такая комната, или обратитесь к администратору.';
$string['docspaceserverurl'] = 'Адрес сервиса DocSpace';
$string['docspaceunreachable'] = 'DocSpace недоступен.';
$string['docspaceuseralreadyexists'] = 'Пользователь {$a} уже существует в DocSpace!';
$string['docspaceuserinviteerror'] = 'Ошибка создания пользователя {$a} в DocSpace! Возможно, достигнут лимит платных пользователей DocSpace.';
$string['docspaceusernotfound'] = 'Пользователь не найден в ONLYOFFICE DocSpace. Обратитесь к администратору.';
$string['docspaceuserrole:admin'] = 'Администратор комнаты';
$string['docspaceuserrole:power'] = 'User';
$string['docspaceuserscategory:description'] = '
To add new users to ONLYOFFICE DocSpace select users and then press <b>Invite to DocSpace</b>.<br/>
All new users will be added with <b>User role</b>, you can change the role in <b>Accounts settings in DocSpace</b>.<br/>
To remove connection between Moodle and DocSpace accounts select user and press <b>Unlink DocSpace Account</b>.';
$string['docspaceuserscategory:title'] = 'Пользователи DocSpace';
$string['docspaceuserscategory_desc'] = '
To add new users to ONLYOFFICE DocSpace and start working with the plugin, please press <b>{$a}</b>.<br/>
All new users will be added with User role, you can change the role in Accounts settings in DocSpace.';
$string['docspaceuserstatus'] = 'Статус пользователя DocSpace';
$string['docspaceusertype'] = 'Тип пользователя DocSpace';
$string['documentserverurldescription'] = 'В адресе сервиса DocSpace указывается адрес сервера';
$string['editingteacher'] = 'Editing teacher';
$string['emptyselection'] = 'Ничего не выбрано';
$string['emptyuserslist'] = 'No users found';
$string['enterfullscreen'] = 'Открыть полный экран';
$string['exitfullscreen'] = 'Выйти из полноэкранного режима';
$string['exportusers'] = 'Экспортировать пользователей';
$string['failedinvitations'] = 'Приглашение не отправлено {$a} пользователям. Возможно, достигнут лимит платных пользователей DocSpace.';
$string['forgotpassword'] = 'Forgot password?';
$string['gotosettings'] = 'Go to Settings';
$string['invalidlink'] = 'Invalid link';
$string['invitetodocspace'] = 'Пригласить в DocSpace';
$string['learnmore'] = 'Learn more';
$string['loginmodal:description'] = 'Введите пароль DocSpace';
$string['loginmodal:title'] = 'Moodle запрашивает доступ к вашему ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Войти в ONLYOFFICE DocSpace";
$string['manager'] = 'Manager';
$string['modalloginerror'] = 'Invalid authorization credentials. Please check your Email and password and try to log in again.';
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = '
The ONLYOFFICE module enables the users to create and edit office documents stored locally in Moodle using ONLYOFFICE Document Server, allows multiple users to collaborate in real time and to save back those changes to Moodle

Help us improve ONLYOFFICE plugin - <a href="https://feedback.onlyoffice.com/forums/966080-your-voice-matters?category_id=519288" target="_blank">Share feedback</a>.
For more information visit <a href="https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx" target="_blank">Help Center</a>.
';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Добавить новый элемент ONLYOFFICE DocSpace';
$string['onlyofficedocspace:edit'] = 'Редактировать элемент ONLYOFFICE DocSpace';
$string['onlyofficedocspace:view'] = 'Просмотреть элемент ONLYOFFICE DocSpace';
$string['paramsmissingvalidationerror'] = 'Отсутствуют необходимые учетные данные';
$string['pluginadministration'] = 'Администрирование элемента ONLYOFFICE DocSpace';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = 'Этот плагин сохраняет учетные данные пользователя ONLYOFFICE DocSpace в базе данных Moodle для целей аутентификации.';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = 'Электронная почта пользователя DocSpace, зарегистрированного в сторонней службе.';
$string['privacy:metadata:onlyofficedocspace_settings'] = 'This plugin sends DocSpace API key to the external service ONLYOFFICE DocSpace for authentication.';
$string['privacy:metadata:onlyofficedocspace_settings:api_key'] = 'The API key is sent to the external service to authenticate API requests.';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'Хешированный пароль пользователя DocSpace, зарегистрированного в сторонней службе.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Этот плагин отправляет электронные письма пользователей во внешнюю службу ONLYOFFICE DocSpace для регистрации и синхронизации.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'Адрес электронной почты пользователя отправляется во внешнюю службу ONLYOFFICE DocSpace для создания учетной записи и синхронизации.';
$string['rolewarning'] = 'Текущий пользователь Moodle будет добавлен в DocSpace с ролью <b>Администратор комнаты</b>';
$string['roomunavailable'] = 'Room unavailable.';
$string['selecteditemtype:file'] = 'Выбранный файл';
$string['selecteditemtype:room'] = 'Выбранная комната';
$string['selectelement'] = 'Подключить существующую комнату DocSpace <span class="text-nowrap">или файл<span>';
$string['selectelement:room_help'] = 'This activity connects with an existing ONLYOFFICE DocSpace public room, giving students access to view all documents there.';
$string['selectelement:room'] = 'Подключить существующую комнату DocSpace';
$string['selectfile'] = 'Выберите файл';
$string['selectroom'] = 'Browse DocSpace rooms';
$string['sentinvitations'] = 'Приглашение успешно отправлено {$a} пользователю(ям)';
$string['settings'] = 'Настройки ONLYOFFICE DocSpace';
$string['settingsintro'] = 'Embed public rooms from your DocSpace into Moodle courses, enabling teachers and managers to create, edit, and share office files with students.';
$string['siteadmin'] = 'Site administrator';
$string['skippeddisable'] = 'Account disabling skipped for {$a} user(s). User(s) with the specified email(s) addresses may already be unlinked from DocSpace.';
$string['skippedinvitations'] = 'Приглашение пропущено для {$a} пользователя(ей). Пользователи с указанными адресами электронной почты могут уже существовать в DocSpace.';
$string['somethingwentwrong'] = 'Something went wrong';
$string['successfulconnection'] = 'Your DocSpace has been successfully connected!';
$string['successfuldisable'] = 'The selected DocSpace account has been successfully disabled';
$string['suggestfeature'] = 'Suggest a feature';
$string['teacher'] = 'Teacher';
$string['unexpectederror:connectdocspace'] = 'Unexpected error happened while connecting DocSpace with Moodle';
$string['unexpectederror:docspaceurl'] = 'Unexpected error happened while checking DocSpace URL';
$string['unexpectederror:inviteusers'] = 'Unexpected error happened while attempting to invite users to DocSpace';
$string['unexpectederror:unlinkusers'] = 'Unexpected error happened while attempting to unlink DocSpace users';
$string['unlinkdocspaceaccount'] = 'Unlink DocSpace Account';
$string['unlinkwarningmessage'] = 'Are you sure you want to disable the selected DocSpace account?';
$string['validationerror:emptyapikey'] = 'API Key value cannot be empty.';
$string['validationerror:emptyurl'] = 'URL cannot be empty';
$string['validationerror:invalidapikey'] = 'Invalid DocSpace API key';
$string['validationerror:invalidurl'] = 'Invalid URL format';
$string['validationerror:password'] = 'Введенный вами пароль неверен';
$string['warning'] = 'Warning';
