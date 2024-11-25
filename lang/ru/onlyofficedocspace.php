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
 * @copyright 2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['activityname'] = 'Наименование действия';
$string['adminsettings:updated'] = 'Настройки успешно сохранены';
$string['adminsettings:urldescription'] = "Пожалуйста, введите верный адрес вашего ONLYOFFICE DocSpace.";
$string['adminsettings:urlwarning'] = 'Вы уверены, что хотите изменить текущий DocSpace на другой? Логины подключенных пользователей будут утеряны.';
$string['cspwarning'] = '<b>Проверьте настройки CSP.</b><br/>Перед подключением, пожалуйста, перейдите в <b>Настройки DocSpace – Инструменты разработчика - JavaScript SDK</b> и добавьте адрес портала Moodle в список разрешениЙ - <u class="font-weight-bold">{$a}</u>';
$string['docspaceapperror'] = 'Ошибка в ходе запуска. Пожалуйста, проверьте настройки DocSpace CSP.';
$string['docspaceautherror'] = 'Не удалось выполнить процесс аутентификации.';
$string['docspaceauthinvalidcredentials'] = 'Аутентификация не удалась. Неверный логин/пароль';
$string['docspaceconfigurationerror'] = 'Пожалуйста, сначала настройте плагин на странице настроек ONLYOFFICE DocSpace';
$string['docspacefilenotfound'] = 'Нужный файл не найден. Пожалуйста, проверьте, существует ли данный файл, или свяжитесь с администратором.';
$string['docspacelogin'] = 'Логин DocSpace';
$string['docspacepassword'] = 'Пароль DocSpace';
$string['docspacepermissiondenied'] = 'Указанный пользователь не является администратором DocSpace!';
$string['docspacerequestuserserror'] = 'Не удалось выполнить запрос пользователя DocSpace';
$string['docspaceroomnotfound'] = 'Нужная комната не найдена. Пожалуйста, проверьте, существует ли данная комната, или свяжитесь с администратором.';
$string['docspaceserverurl'] = 'Адрес службы DocSpace';
$string['docspaceunreachable'] = 'DocSpace недоступен.';
$string['docspaceuseralreadyexists'] = 'Пользователь {$a} уже существует в DocSpace!';
$string['docspaceuserinviteerror'] = 'Ошибка создания пользователя {$a} в DocSpace! Возможно, достигнут лимит платных пользователей DocSpace.';
$string['docspaceusernotfound'] = 'Пользователь не найден в ONLYOFFICE DocSpace. Пожалуйста, свяжитесь с администратором.';
$string['docspaceuserrole:admin'] = 'Администратор комнаты';
$string['docspaceuserrole:power'] = 'Опытный пользователь';
$string['docspaceuserscategory:description'] = 'Чтобы добавить новых пользователей в ONLYOFFICE DocSpace и начать работу с плагином, пожалуйста, нажмите <b>{$a}</b>. В DocSpace могут быть приглашены только пользователи с ролями “Менеджер”, “Учитель” и “Создатель курса” из Moodle. <br/> Все новые пользователи добавляются с ролью <b>Опытный пользователь</b>. Вы можете изменить тип роли в Настройках учетной записи в DocSpace. Обратите внимание: роль <b>Опытного пользователя</b> является платной.';
$string['docspaceuserscategory:title'] = 'Пользователи DocSpace';
$string['docspaceuserstatus'] = 'Статус пользователя DocSpace';
$string['docspaceusertype'] = 'Тип пользователя DocSpace';
$string['documentserverurldescription'] = 'Адрес службы DocSpace Service указывает адрес сервера';
$string['emptyselection'] = 'Ничего не выбрано';
$string['enterfullscreen'] = 'Открыть полный экран';
$string['exitfullscreen'] = 'Закрыть полный экран';
$string['exportusers'] = 'Экспортировать пользователей';
$string['failedinvitations'] = 'Не удалось пригласить пользователя(ей) {$a}. Возможно, достигнут лимит платных пользователей DocSpace.';
$string['invitetodocspace'] = 'Пригласить в DocSpace';
$string['loginmodal:description'] = 'Пожалуйста, введите пароль для DocSpace';
$string['loginmodal:title'] = 'Moodle запрашивает доступ к вашему ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Войти в ONLYOFFICE DocSpace";
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = 'Этот модуль позволяет пользователям подключать комнаты или файлы ONLYOFFICE DocSpace в качестве действий в Moodle для совместной работы.';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Добавить новое действие ONLYOFFICE DocSpace';
$string['onlyofficedocspace:edit'] = 'Редактировать действие ONLYOFFICE DocSpace';
$string['onlyofficedocspace:view'] = 'Просмотреть действие ONLYOFFICE DocSpace';
$string['paramsmissingvalidationerror'] = 'Отсутствуют требуемые параметры';
$string['pluginadministration'] = 'Управление действием ONLYOFFICE DocSpace';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['privacy:metadata:onlyofficedocspace_admin'] = 'Информация об администраторе DocSpace.';
$string['privacy:metadata:onlyofficedocspace_admin:login'] = 'Вход в систему администратора DocSpace.';
$string['privacy:metadata:onlyofficedocspace_admin:password'] = 'Пароль администратора DocSpace.';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = 'Информация о пользователе DocSpace, хранящаяся в базе данных.';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = 'Электронная почта пользователя DocSpace.';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'Хэш пароля пользователя DocSpace.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Информация о пользователе, используемая при регистрации в DocSpace.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'Электронная почта пользователя Moodle';
$string['rolewarning'] = 'Текущий пользователь Moodle будет добавлен в DocSpace с ролью <b>Администратор комнаты</b>';
$string['selecteditemtype:file'] = 'Выбранный файл';
$string['selecteditemtype:room'] = 'Выбранная комната';
$string['selectelement'] = 'Подключить существующую комнату <span class="text-nowrap">или существующий файл<span> DocSpace';
$string['selectelement:room'] = 'Подключить существующую комнату DocSpace';
$string['selectfile'] = 'Выбрать файл';
$string['selectroom'] = 'Выбрать комнату';
$string['sentinvitations'] = 'Приглашение успешно отправлено пользователю(ям) {$a}';
$string['settings'] = 'Настройки ONLYOFFICE DocSpace';
$string['skippedinvitations'] = 'Пропущено приглашение для пользователя(ей) {$a}. Пользователь(и) с указанным(и) адресом(ами) электронной почты могут уже существовать в DocSpace';
$string['validationerror:password'] = 'Введен неверный пароль';
