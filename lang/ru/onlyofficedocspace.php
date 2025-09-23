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
$string['adminsettings:urldescription'] = 'Введите URL-адрес вашего DocSpace в поле выше. Например, https://yourcompany.docspace.com.';
$string['adminsettings:urlwarning'] = 'Вы уверены, что хотите изменить текущий DocSpace на другой? Подключенные логины пользователей будут утеряны.';
$string['change'] = 'Изменить';
$string['confirmchange_desc'] = 'Если вы нажмете кнопку «Отключить», у вас не будет доступа к текущему подключенному ONLYOFFICE DocSpace. Это приведет к разрыву соединений между комнатами и действиями и отключению всех пользователей.';
$string['confirmdisconnect_desc'] = 'При нажатии кнопки «Изменить» нужно будет вновь ввести учетные данные для текущего подключенного ONLYOFFICE DocSpace. Связи между комнатами и действиями могут быть потеряны. Информация об опциональном экспорте пользователей не будет удалена.';
$string['connect'] = 'Подключить';
$string['coursecreator'] = 'Создатель курса';
$string['createkey'] = 'Создать ключ';
$string['cspwarning'] = 'Проверьте настройки CSP.</b><br/>Перед подключением перейдите в <b>Настройки DocSpace - Инструменты разработчика - JavaScript SDK</b> и добавьте адрес портала Moodle в список разрешенных - <u class="font-weight-bold">{$a}</u>';
$string['disconnect'] = 'Отключить';
$string['docspaceapikey'] = 'Ключ API ONLYOFFICE DocSpace';
$string['docspaceapikey_help'] = 'Перед подключением приложения перейдите по <b>ссылке</b>, создайте новый ключ API и вставьте его сюда. Вы можете создать ключ API с разрешениями = <b>Все</b> или с <b>ограниченным доступом</b>. В этом случае для корректной работы приложения необходимо выбрать следующие области доступа: (Профиль: Чтение, Контакты: Запись, Комнаты: Запись).';
$string['docspaceapperror'] = 'Ошибка при инициализации. Проверьте настройки DocSpace CSP.';
$string['docspaceautherror'] = 'Процесс аутентификации не пройден.';
$string['docspaceauthinvalidcredentials'] = 'Аутентификация не пройдена. Неверный логин/пароль';
$string['docspaceconfigurationerror'] = 'Сначала настройте плагин на странице настроек ONLYOFFICE DocSpace';
$string['docspacefilenotfound'] = 'Требуемый файл не найден. Проверьте, существует ли такой файл, или обратитесь к администратору.';
$string['docspacelogin'] = 'Логин DocSpace';
$string['docspacenotfound_desc'] = 'Пожалуйста, убедитесь, что эта комната находится по тому же адресу сервиса DocSpace, который указан в Настройках.';
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
$string['docspaceuserscategory:description'] = '
Чтобы добавить новых пользователей в ONLYOFFICE DocSpace, выберите пользователей и нажмите <b>Пригласить в DocSpace</b>.<br/>
Все новые пользователи будут добавляться с ролью <b>Пользователь</b>. Вы можете изменить роль в <b>Настройках учетных записей в DocSpace</b>.<br/>
Чтобы удалить связь между учетными записями Moodle и DocSpace, выберите пользователя и нажмите <b>Отключить учетную запись DocSpace</b>.';
$string['docspaceuserscategory:title'] = 'Пользователи DocSpace';
$string['docspaceuserscategory_desc'] = '
Чтобы добавить новых пользователей в ONLYOFFICE DocSpace и начать работу с плагином, нажмите<b>{$a}</b>.<br/>
Все новые пользователи будут добавляться с ролью Пользователя. Вы можете изменить роль в настройках учетных записей в DocSpace.';
$string['docspaceuserstatus'] = 'Статус пользователя DocSpace';
$string['docspaceusertype'] = 'Тип пользователя DocSpace';
$string['documentserverurldescription'] = 'В адресе сервиса DocSpace указывается адрес сервера';
$string['editingteacher'] = 'Преподаватель с правами редактирования';
$string['emptyselection'] = 'Ничего не выбрано';
$string['emptyuserslist'] = 'Пользователи не найдены';
$string['enterfullscreen'] = 'Открыть полный экран';
$string['exitfullscreen'] = 'Выйти из полноэкранного режима';
$string['exportusers'] = 'Экспортировать пользователей';
$string['failedinvitations'] = 'Приглашение не отправлено {$a} пользователям. Возможно, достигнут лимит платных пользователей DocSpace.';
$string['forgotpassword'] = 'Забыли пароль?';
$string['gotosettings'] = 'Перейти в Настройки';
$string['invalidlink'] = 'Неверная ссылка';
$string['invitetodocspace'] = 'Пригласить в DocSpace';
$string['learnmore'] = 'Подробнее';
$string['loginmodal:description'] = 'Введите пароль DocSpace';
$string['loginmodal:title'] = 'Moodle запрашивает доступ к вашему ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Войти в ONLYOFFICE DocSpace";
$string['manager'] = 'Менеджер';
$string['modalloginerror'] = 'Неверные учетные данные авторизации. Проверьте адрес электронной почты и пароль и попробуйте войти снова.';
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = '
Модуль ONLYOFFICE позволяет пользователям создавать и редактировать офисные документы, которые хранятся локально, в Moodle с помощью Сервера документов ONLYOFFICE, а также предоставляет возможность нескольким пользователям работать совместно в режиме реального времени и сохранять изменения в Moodle

Помогите нам улучшить плагин ONLYOFFICE- <a href="https://feedback.onlyoffice.com/forums/966080-your-voice-matters?category_id=519288" target="_blank">Поделитесь отзывом</a>.
Для получения дополнительной информации обратитесь в <a href="https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx" target="_blank">Справочный центр</a>.
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
$string['privacy:metadata:onlyofficedocspace_settings'] = 'Этот плагин отправляет ключ API DocSpace в сторонний сервис ONLYOFFICE DocSpace для аутентификации.';
$string['privacy:metadata:onlyofficedocspace_settings:api_key'] = 'Ключ API отправляется в сторонний сервис для аутентификации запросов API.';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'Хешированный пароль пользователя DocSpace, зарегистрированного в сторонней службе.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Этот плагин отправляет электронные письма пользователей во внешнюю службу ONLYOFFICE DocSpace для регистрации и синхронизации.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'Адрес электронной почты пользователя отправляется во внешнюю службу ONLYOFFICE DocSpace для создания учетной записи и синхронизации.';
$string['rolewarning'] = 'Текущий пользователь Moodle будет добавлен в DocSpace с ролью <b>Администратор комнаты</b>';
$string['roomunavailable'] = 'Комната недоступна.';
$string['selecteditemtype:file'] = 'Выбранный файл';
$string['selecteditemtype:room'] = 'Выбранная комната';
$string['selectelement'] = 'Подключить существующую комнату DocSpace <span class="text-nowrap">или файл<span>';
$string['selectelement:room_help'] = 'Это действие подключается к существующей публичной комнате ONLYOFFICE DocSpace и предоставляет студентам доступ к просмотру всех находящихся там документов.';
$string['selectelement:room'] = 'Подключить существующую комнату DocSpace';
$string['selectfile'] = 'Выберите файл';
$string['selectroom'] = 'Просмотр комнат DocSpace';
$string['sentinvitations'] = 'Приглашение успешно отправлено {$a} пользователю(ям)';
$string['settings'] = 'Настройки ONLYOFFICE DocSpace';
$string['settingsintro'] = 'Встраивайте публичные комнаты из вашего аккаунта DocSpace в курсы Moodle, чтобы преподаватели и менеджеры могли создавать, редактировать офисные файлы и делиться ими со студентами.';
$string['siteadmin'] = 'Администратор сайта';
$string['skippeddisable'] = 'Отключение учетных записей пропущено для {$a} пользователя(ей). Пользователи с указанными адресами электронной почты, возможно, уже отключены от DocSpace.';
$string['skippedinvitations'] = 'Приглашение пропущено для {$a} пользователя(ей). Пользователи с указанными адресами электронной почты могут уже существовать в DocSpace.';
$string['somethingwentwrong'] = 'Что-то пошло не так';
$string['successfulconnection'] = 'Ваш DocSpace успешно подключен!';
$string['successfuldisable'] = 'Выбранная учетная запись DocSpace успешно отключена';
$string['suggestfeature'] = 'Предложить функцию';
$string['teacher'] = 'Преподаватель';
$string['unexpectederror:connectdocspace'] = 'Произошла непредвиденная ошибка при подключении DocSpace к Moodle';
$string['unexpectederror:docspaceurl'] = 'Произошла непредвиденная ошибка при проверке URL DocSpace';
$string['unexpectederror:inviteusers'] = 'Произошла непредвиденная ошибка при попытке пригласить пользователей в DocSpace';
$string['unexpectederror:unlinkusers'] = 'Произошла непредвиденная ошибка при попытке отключить пользователей DocSpace';
$string['unlinkdocspaceaccount'] = 'Отключить учетную запись DocSpace';
$string['unlinkwarningmessage'] = 'Вы уверены, что хотите отключить выбранную учетную запись DocSpace?';
$string['validationerror:emptyapikey'] = 'Значение ключа API не может быть пустым.';
$string['validationerror:emptyurl'] = 'URL не может быть пустым';
$string['validationerror:invalidapikey'] = 'Неверный ключ API DocSpace';
$string['validationerror:invalidurl'] = 'Неверный формат URL';
$string['validationerror:password'] = 'Введенный вами пароль неверен';
$string['warning'] = 'Предупреждение';
