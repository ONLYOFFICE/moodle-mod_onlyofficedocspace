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
$string['adminsettings:urlwarning'] = '¿Está seguro de que desea cambiar el DocSpace actual por otro? Se perderán los inicios de sesión de los usuarios conectados.';
$string['cspwarning'] = '<b>Compruebe la configuración de CSP.</b><br/>Antes de conectarse aquí, vaya a la página <b>Configuración de DocSpace - Herramientas de desarrollo - SDK de JavaScript</b> y añada la dirección del portal de Moodle a la lista de conexiones permitidas - <u class="font-weight-bold">{$a}</u>';
$string['docspaceapperror'] = 'Error durante la inicialización. Compruebe la configuración de CSP de su DocSpace.';
$string['docspaceautherror'] = 'El proceso de autenticación ha fallado.';
$string['docspaceauthinvalidcredentials'] = 'Error de autenticación. Nombre de usuario/contraseña incorrectos';
$string['docspaceconfigurationerror'] = 'Por favor, configure el plugin primero en la página de configuración de ONLYOFFICE DocSpace';
$string['docspacefilenotfound'] = 'No se ha encontrado el archivo requerido. Por favor, compruebe si el archivo todavía existe o póngase en contacto con el administrador.';
$string['docspacelogin'] = 'Login de DocSpace';
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
$string['docspaceuserrole:power'] = 'Usuario';
$string['docspaceuserscategory:title'] = 'Usuarios de DocSpace';
$string['docspaceuserstatus'] = 'Estado de usuario de DocSpace';
$string['docspaceusertype'] = 'Tipo de usuario de DocSpace';
$string['documentserverurldescription'] = 'La dirección del servicio DocSpace especifica la dirección del servidor';
$string['emptyselection'] = 'Nada seleccionado';
$string['enterfullscreen'] = 'Abrir pantalla completa';
$string['exitfullscreen'] = 'Salir de pantalla completa';
$string['exportusers'] = 'Exportar usuarios';
$string['failedinvitations'] = 'Error de invitación para usuarios {$a}. Puede que se haya alcanzado el límite de usuarios de pago en DocSpace.';
$string['invitetodocspace'] = 'Invitar a DocSpace';
$string['loginmodal:description'] = 'Introduzca su contraseña de DocSpace';
$string['loginmodal:title'] = 'Moodle solicita acceso a su ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Iniciar sesión en ONLYOFFICE DocSpace";
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Añadir una nueva actividad de ONLYOFFICE DocSpace';
$string['onlyofficedocspace:edit'] = 'Editar actividad de ONLYOFFICE DocSpace';
$string['onlyofficedocspace:view'] = 'Ver actividad de ONLYOFFICE DocSpace';
$string['paramsmissingvalidationerror'] = 'Faltan las credenciales requeridas';
$string['pluginadministration'] = 'Administración de la actividad de ONLYOFFICE DocSpace';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = 'Este plugin almacena las credenciales de usuario de ONLYOFFICE DocSpace en la base de datos de Moodle con fines de autenticación.';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = 'El correo electrónico de un usuario de DocSpace registrado en el servicio de terceros.';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'La contraseña cifrada de un usuario de DocSpace registrado en el servicio de terceros.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Este plugin envía correos electrónicos de los usuarios al servicio externo ONLYOFFICE DocSpace con fines de registro y sincronización.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'La dirección de correo electrónico del usuario se envía al servicio externo ONLYOFFICE DocSpace para la creación y sincronización de la cuenta.';
$string['rolewarning'] = 'El usuario actual de Moodle se añadirá a DocSpace con el rol <b>Administrador de sala</b>.';
$string['selecteditemtype:file'] = 'Archivo seleccionado';
$string['selecteditemtype:room'] = 'Sala seleccionada';
$string['selectelement'] = 'Conectar la sala de DocSpace existente <span class="text-nowrap">o archivo<span>';
$string['selectelement:room'] = 'Conectar la sala de DocSpace existente';
$string['selectfile'] = 'Seleccionar archivo';
$string['selectroom'] = 'Seleccionar sala';
$string['sentinvitations'] = 'Invitación enviada correctamente a usuario(s) {$a}';
$string['settings'] = 'Configuración de ONLYOFFICE DocSpace';
$string['skippedinvitations'] = 'Invitación omitida para usuario(s) {$a}. Puede que ya existan en DocSpace usuarios con los correos electrónicos indicados.';
$string['validationerror:password'] = 'La contraseña introducida es incorrecta';
