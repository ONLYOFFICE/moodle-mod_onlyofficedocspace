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
$string['adminsettings:urlwarning'] = 'Вы уверены, что хотите изменить текущий DocSpace на другой? Подключенные логины пользователей будут утеряны.';
$string['cspwarning'] = 'Проверьте настройки CSP.</b><br/>Перед подключением перейдите в <b>Настройки DocSpace - Инструменты разработчика - JavaScript SDK</b> и добавьте адрес портала Moodle в список разрешенных - <u class="font-weight-bold">{$a}</u>';
$string['docspaceapperror'] = 'Ошибка при инициализации. Проверьте настройки DocSpace CSP.';
$string['docspaceautherror'] = 'Процесс аутентификации не пройден.';
$string['docspaceauthinvalidcredentials'] = 'Аутентификация не пройдена. Неверный логин/пароль';
$string['docspaceconfigurationerror'] = 'Сначала настройте плагин на странице настроек ONLYOFFICE DocSpace';
$string['docspacefilenotfound'] = 'Требуемый файл не найден. Проверьте, существует ли такой файл, или обратитесь к администратору.';
$string['docspacelogin'] = 'Логин DocSpace';
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
$string['docspaceuserrole:power'] = 'Пользователь';
$string['docspaceuserscategory:title'] = 'Пользователи DocSpace';
$string['docspaceuserstatus'] = 'Статус пользователя DocSpace';
$string['docspaceusertype'] = 'Тип пользователя DocSpace';
$string['documentserverurldescription'] = 'В адресе сервиса DocSpace указывается адрес сервера';
$string['emptyselection'] = 'Ничего не выбрано';
$string['enterfullscreen'] = 'Открыть полный экран';
$string['exitfullscreen'] = 'Выйти из полноэкранного режима';
$string['exportusers'] = 'Экспортировать пользователей';
$string['failedinvitations'] = 'Приглашение не отправлено {$a} пользователям. Возможно, достигнут лимит платных пользователей DocSpace.';
$string['invitetodocspace'] = 'Пригласить в DocSpace';
$string['loginmodal:description'] = 'Введите пароль DocSpace';
$string['loginmodal:title'] = 'Moodle запрашивает доступ к вашему ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Войти в ONLYOFFICE DocSpace";
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Добавить новый элемент ONLYOFFICE DocSpace';
$string['onlyofficedocspace:edit'] = 'Редактировать элемент ONLYOFFICE DocSpace';
$string['onlyofficedocspace:view'] = 'Просмотреть элемент ONLYOFFICE DocSpace';
$string['paramsmissingvalidationerror'] = 'Отсутствуют необходимые учетные данные';
$string['pluginadministration'] = 'Администрирование элемента ONLYOFFICE DocSpace';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = 'Этот плагин сохраняет учетные данные пользователя ONLYOFFICE DocSpace в базе данных Moodle для целей аутентификации.';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = 'Электронная почта пользователя DocSpace, зарегистрированного в сторонней службе.';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'Хешированный пароль пользователя DocSpace, зарегистрированного в сторонней службе.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Этот плагин отправляет электронные письма пользователей во внешнюю службу ONLYOFFICE DocSpace для регистрации и синхронизации.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'Адрес электронной почты пользователя отправляется во внешнюю службу ONLYOFFICE DocSpace для создания учетной записи и синхронизации.';
$string['rolewarning'] = 'Текущий пользователь Moodle будет добавлен в DocSpace с ролью <b>Администратор комнаты</b>';
$string['selecteditemtype:file'] = 'Выбранный файл';
$string['selecteditemtype:room'] = 'Выбранная комната';
$string['selectelement'] = 'Подключить существующую комнату DocSpace <span class="text-nowrap">или файл<span>';
$string['selectelement:room'] = 'Подключить существующую комнату DocSpace';
$string['selectfile'] = 'Выберите файл';
$string['selectroom'] = 'Выберите комнату';
$string['sentinvitations'] = 'Приглашение успешно отправлено {$a} пользователю(ям)';
$string['settings'] = 'Настройки ONLYOFFICE DocSpace';
$string['skippedinvitations'] = 'Приглашение пропущено для {$a} пользователя(ей). Пользователи с указанными адресами электронной почты могут уже существовать в DocSpace.';
$string['validationerror:password'] = 'Введенный вами пароль неверен';
