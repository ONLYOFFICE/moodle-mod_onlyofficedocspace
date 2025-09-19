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

$string['activityname'] = 'Nombre de la actividad';
$string['adminsettings:updated'] = 'Los ajustes se han guardado correctamente';
$string['adminsettings:urldescription'] = 'Enter the URL of your DocSpace in the field above. For example, https://yourcompany.docspace.com.';
$string['adminsettings:urlwarning'] = '¿Está seguro de que desea cambiar el DocSpace actual por otro? Se perderán los inicios de sesión de los usuarios conectados.';
$string['change'] = 'Change';
$string['confirmchange_desc'] = 'If you press the Disconnect button, you will not have access to the currently connected ONLYOFFICE DocSpace. This will remove the connections between Rooms and Activities, and disconnect all users.';
$string['confirmdisconnect_desc'] = 'If you press the Change button, you will have to re-enter the credentials for the currently connected ONLYOFFICE DocSpace. Connections between Rooms and Activities might be lost. Information about optional user export won’t be deleted.';
$string['connect'] = 'Connect';
$string['coursecreator'] = 'Course creator';
$string['createkey'] = 'Create a key';
$string['cspwarning'] = '<b>Compruebe la configuración de CSP.</b><br/>Antes de conectarse aquí, vaya a la página <b>Configuración de DocSpace - Herramientas de desarrollo - SDK de JavaScript</b> y añada la dirección del portal de Moodle a la lista de conexiones permitidas - <u class="font-weight-bold">{$a}</u>';
$string['disconnect'] = 'Disconnect';
$string['docspaceapikey'] = 'ONLYOFFICE DocSpace API key';
$string['docspaceapikey_help'] = 'Before connecting the app, please go to the <b>link</b>, create new API key and insert it here. You can create API key with Permissions = <b>All</b> or create API key with <b>restricted access</b>. In this case, the following Access Scopes should be selected for valid work of this app: (Profile: Read, Contacts: Write, Rooms: Write).';
$string['docspaceapperror'] = 'Error durante la inicialización. Compruebe la configuración de CSP de su DocSpace.';
$string['docspaceautherror'] = 'El proceso de autenticación ha fallado.';
$string['docspaceauthinvalidcredentials'] = 'Error de autenticación. Nombre de usuario/contraseña incorrectos';
$string['docspaceconfigurationerror'] = 'Por favor, configure el plugin primero en la página de configuración de ONLYOFFICE DocSpace';
$string['docspacefilenotfound'] = 'No se ha encontrado el archivo requerido. Por favor, compruebe si el archivo todavía existe o póngase en contacto con el administrador.';
$string['docspacelogin'] = 'Login de DocSpace';
$string['docspacenotfound_desc'] = 'Please ensure that this room is located at the same DocSpace Service Address specified in the Settings.';
$string['docspacepassword'] = 'Contraseña de DocSpace';
$string['docspacepermissiondenied'] = '¡El usuario especificado no es administrador de DocSpace!';
$string['docspacerequestuserserror'] = 'La solicitud de usuario de DocSpace ha fallado';
$string['docspaceroomnotfound'] = 'No se ha encontrado la sala solicitada. Compruebe si la sala todavía existe o póngase en contacto con el administrador.';
$string['docspaceserverurl'] = 'Dirección del servicio DocSpace';
$string['docspaceunreachable'] = 'DocSpace no está disponible.';
$string['docspaceuseralreadyexists'] = '¡El usuario {$a} ya existe en DocSpace!';
$string['docspaceuserinviteerror'] = '¡Error al crear usuario {$a} en DocSpace! Puede que se haya alcanzado el límite de usuarios de pago en DocSpace.';
$string['docspaceusernotfound'] = 'El usuario no se ha encontrado en ONLYOFFICE DocSpace. Por favor, póngase en contacto con el administrador.';
$string['docspaceuserrole:admin'] = 'Administrador de sala';
$string['docspaceuserrole:power'] = 'User';
$string['docspaceuserscategory:description'] = '
To add new users to ONLYOFFICE DocSpace select users and then press <b>Invite to DocSpace</b>.<br/>
All new users will be added with <b>User role</b>, you can change the role in <b>Accounts settings in DocSpace</b>.<br/>
To remove connection between Moodle and DocSpace accounts select user and press <b>Unlink DocSpace Account</b>.';
$string['docspaceuserscategory:title'] = 'DocSpace users';
$string['docspaceuserscategory_desc'] = '
To add new users to ONLYOFFICE DocSpace and start working with the plugin, please press <b>{$a}</b>.<br/>
All new users will be added with User role, you can change the role in Accounts settings in DocSpace.';
$string['docspaceuserstatus'] = 'Estado de usuario de DocSpace';
$string['docspaceusertype'] = 'Tipo de usuario de DocSpace';
$string['documentserverurldescription'] = 'La dirección del servicio DocSpace especifica la dirección del servidor';
$string['editingteacher'] = 'Editing teacher';
$string['emptyselection'] = 'Nada seleccionado';
$string['emptyuserslist'] = 'No users found';
$string['enterfullscreen'] = 'Abrir pantalla completa';
$string['exitfullscreen'] = 'Salir de pantalla completa';
$string['exportusers'] = 'Exportar usuarios';
$string['failedinvitations'] = 'Error de invitación para usuarios {$a}. Puede que se haya alcanzado el límite de usuarios de pago en DocSpace.';
$string['forgotpassword'] = 'Forgot password?';
$string['gotosettings'] = 'Go to Settings';
$string['invalidlink'] = 'Invalid link';
$string['invitetodocspace'] = 'Invitar a DocSpace';
$string['learnmore'] = 'Learn more';
$string['loginmodal:description'] = 'Introduzca su contraseña de DocSpace';
$string['loginmodal:title'] = 'Moodle solicita acceso a su ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Iniciar sesión en ONLYOFFICE DocSpace";
$string['manager'] = 'Manager';
$string['modalloginerror'] = 'Invalid authorization credentials. Please check your Email and password and try to log in again.';
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = '
The ONLYOFFICE module enables the users to create and edit office documents stored locally in Moodle using ONLYOFFICE Document Server, allows multiple users to collaborate in real time and to save back those changes to Moodle

Help us improve ONLYOFFICE plugin - <a href="https://feedback.onlyoffice.com/forums/966080-your-voice-matters?category_id=519288" target="_blank">Share feedback</a>.
For more information visit <a href="https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx" target="_blank">Help Center</a>.
';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Añadir una nueva actividad de ONLYOFFICE DocSpace';
$string['onlyofficedocspace:edit'] = 'Editar actividad de ONLYOFFICE DocSpace';
$string['onlyofficedocspace:view'] = 'Ver actividad de ONLYOFFICE DocSpace';
$string['paramsmissingvalidationerror'] = 'Faltan las credenciales requeridas';
$string['pluginadministration'] = 'Administración de la actividad de ONLYOFFICE DocSpace';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = 'Este plugin almacena las credenciales de usuario de ONLYOFFICE DocSpace en la base de datroomunavailableos de Moodle con fines de autenticación.';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = 'El correo electrónico de un usuario de DocSpace registrado en el servicio de terceros.';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'La contraseña cifrada de un usuario de DocSpace registrado en el servicio de terceros.';
$string['privacy:metadata:onlyofficedocspace_settings'] = 'This plugin sends DocSpace API key to the external service ONLYOFFICE DocSpace for authentication.';
$string['privacy:metadata:onlyofficedocspace_settings:api_key'] = 'The API key is sent to the external service to authenticate API requests.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Este plugin envía correos electrónicos de los usuarios al servicio externo ONLYOFFICE DocSpace con fines de registro y sincronización.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'La dirección de correo electrónico del usuario se envía al servicio externo ONLYOFFICE DocSpace para la creación y sincronización de la cuenta.';
$string['rolewarning'] = 'El usuario actual de Moodle se añadirá a DocSpace con el rol <b>Administrador de sala</b>.';
$string['roomunavailable'] = 'Room unavailable.';
$string['selecteditemtype:file'] = 'Archivo seleccionado';
$string['selecteditemtype:room'] = 'Sala seleccionada';
$string['selectelement'] = 'Conectar la sala de DocSpace existente <span class="text-nowrap">o archivo<span>';
$string['selectelement:room'] = 'Conectar la sala de DocSpace existente';
$string['selectelement:room_help'] = 'This activity connects with an existing ONLYOFFICE DocSpace public room, giving students access to view all documents there.';
$string['selectfile'] = 'Seleccionar archivo';
string['selectroom'] = 'Browse DocSpace rooms';
$string['sentinvitations'] = 'Invitación enviada correctamente a usuario(s) {$a}';
$string['settings'] = 'Configuración de ONLYOFFICE DocSpace';
$string['settingsintro'] = 'Embed public rooms from your DocSpace into Moodle courses, enabling teachers and managers to create, edit, and share office files with students.';
$string['siteadmin'] = 'Site administrator';
$string['skippeddisable'] = 'Account disabling skipped for {$a} user(s). User(s) with the specified email(s) addresses may already be unlinked from DocSpace.';
$string['skippedinvitations'] = 'Invitación omitida para usuario(s) {$a}. Puede que ya existan en DocSpace usuarios con los correos electrónicos indicados.';
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
$string['validationerror:password'] = 'La contraseña introducida es incorrecta';
$string['warning'] = 'Warning';
