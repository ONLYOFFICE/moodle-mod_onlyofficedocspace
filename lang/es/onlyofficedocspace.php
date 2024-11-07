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

$string['activityname'] = 'Nombre de la actividad';
$string['adminsettings:updated'] = 'La configuración se ha guardado correctamente';
$string['adminsettings:urldescription'] = "Por favor, introduzca la dirección correcta de su ONLYOFFICE DocSpace.";
$string['adminsettings:urlwarning'] = '¿Está seguro de que desea cambiar el DocSpace actual por otro? Se perderán los inicios de sesión de los usuarios conectados.';
$string['cspwarning'] = '<b>Compruebe la configuración CSP.</b><br/>Antes de conectarse aquí, por favor, vaya a la <b>Configuración de DocSpace - Herramientas para desarrolladores - SDK de JavaScript</b> y añada la dirección del portal Moodle a la lista de permitidos - <u class="font-weight-bold">{$a}</u>';
$string['docspaceapperror'] = 'Error durante la inicialización. Por favor, compruebe la configuración CSP de DocSpace.';
$string['docspaceautherror'] = 'El proceso de autenticación ha fallado.';
$string['docspaceauthinvalidcredentials'] = 'Error de autenticación. Nombre de usuario/contraseña incorrectos';
$string['docspaceconfigurationerror'] = 'Por favor, configure primero el plugin en la página de configuración de ONLYOFFICE DocSpace';
$string['docspacefilenotfound'] = 'No se ha encontrado el archivo requerido. Por favor, compruebe si el archivo todavía existe o póngase en contacto con el administrador.';
$string['docspacelogin'] = 'Inicio de sesión en DocSpace';
$string['docspacepassword'] = 'Contraseña de DocSpace';
$string['docspacepermissiondenied'] = '¡El usuario especificado no es administrador de DocSpace!';
$string['docspacerequestuserserror'] = 'La solicitud de usuario de DocSpace ha fallado';
$string['docspaceroomnotfound'] = 'No se ha encontrado la sala requerida. Por favor, compruebe si la sala todavía existe o póngase en contacto con el administrador.';
$string['docspaceserverurl'] = 'Dirección del servicio DocSpace';
$string['docspaceunreachable'] = 'DocSpace no está disponible.';
$string['docspaceuseralreadyexists'] = '¡El usuario {$a} ya existe en DocSpace!';
$string['docspaceuserinviteerror'] = '¡Error al crear usuario {$a} en DocSpace! Puede que se haya alcanzado el límite de usuarios de pago de DocSpace.';
$string['docspaceusernotfound'] = 'El usuario no se ha encontrado en ONLYOFFICE DocSpace. Por favor, póngase en contacto con el administrador.';
$string['docspaceuserrole:admin'] = 'Administrador de sala';
$string['docspaceuserrole:power'] = 'Usuario avanzado';
$string['docspaceuserscategory:description'] = 'Para añadir nuevos usuarios a ONLYOFFICE DocSpace y empezar a trabajar con el plugin, por favor, pulse <b>{$a}</b>. Solo los usuarios con los roles Administrador, Profesor y Creador de cursos de Moodle pueden ser invitados a DocSpace. <br/> Todos los nuevos usuarios se añadirán con el rol <b>Usuario avanzado</b>. Puede cambiar el tipo de rol en la configuración de cuentas en DocSpace. Por favor, tenga en cuenta: el rol <b>Usuario avanzado</b> es de pago.';
$string['docspaceuserscategory:title'] = 'Usuarios de DocSpace';
$string['docspaceuserstatus'] = 'Estado del usuario de DocSpace';
$string['docspaceusertype'] = 'Tipo del usuario de DocSpace';
$string['documentserverurldescription'] = 'La dirección del servicio DocSpace especifica la dirección del servidor ';
$string['enterfullscreen'] = 'Abrir pantalla completa';
$string['exitfullscreen'] = 'Salir de pantalla completa';
$string['failedinvitations'] = 'La invitación ha fallado para {$a} usuario(s). Puede que se haya alcanzado el límite de usuarios de pago de DocSpace.';
$string['invitetodocspace'] = 'Invitar a DocSpace';
$string['loginmodal:description'] = 'Por favor, introduzca su contraseña para DocSpace';
$string['loginmodal:title'] = 'Moodle solicita acceso a su ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Iniciar sesión en ONLYOFFICE DocSpace";
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = 'Este módulo permite a los usuarios conectar salas o archivos de ONLYOFFICE DocSpace como actividades en Moodle para colaboración.';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Añadir una nueva actividad de ONLYOFFICE DocSpace';
$string['onlyofficedocspace:edit'] = 'Editar la actividad de ONLYOFFICE DocSpace';
$string['onlyofficedocspace:view'] = 'Visualizar la actividad de ONLYOFFICE DocSpace';
$string['paramsmissingvalidationerror'] = 'Faltan los parámetros requeridos';
$string['pluginadministration'] = 'Gestión de actividades de ONLYOFFICE DocSpace';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['rolewarning'] = 'El usuario actual de Moodle se añadirá a DocSpace con el rol <b>Administrador de sala</b>';
$string['selecteditemtype:file'] = 'Archivo seleccionado';
$string['selecteditemtype:room'] = 'Sala seleccionada';
$string['selectelement'] = 'Conectar sala de DocSpace existente <span class="text-nowrap">o archivo<span>';
$string['selectelement:room'] = 'Conectar una sala de DocSpace existente';
$string['selectfile'] = 'Seleccionar archivo';
$string['selectroom'] = 'Seleccionar sala';
$string['sentinvitations'] = 'La invitación se ha enviado correctamente a {$a} usuario(s)';
$string['settings'] = 'Configuración de ONLYOFFICE DocSpace';
$string['skippedinvitations'] = 'La invitación se ha omitido para {$a} usuario(s). Es posible que ya existan usuarios con los correos electrónicos indicados en DocSpace.';
$string['validationerror:password'] = 'La contraseña introducida es incorrecta';
