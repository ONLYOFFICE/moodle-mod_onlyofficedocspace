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
$string['adminsettings:urldescription'] = 'Establezca la URL de su DocSpace en el campo superior. Por ejemplo, https://yourcompany.docspace.com.';
$string['adminsettings:urlwarning'] = '¿Está seguro de que desea cambiar el DocSpace actual por otro? Se perderán los inicios de sesión de los usuarios conectados.';
$string['change'] = 'Cambiar';
$string['confirmchange_desc'] = 'Si haga clic en el botón Cambiar, deberá que volver a ingresar las credenciales del ONLYOFFICE DocSpace actualmente conectado. Las conexiones entre Salas y Actividades podrían perderse. La infromación sobre la exportación opcional de usuarios no se eliminará.';
$string['confirmdisconnect_desc'] = 'Si haga clic en el botón Desconectar, ya no tendrá acceso al ONLYOFFICE DocSpace actualmente conectado. Esto eliminará las conexiones entre Salas y Actividades, y desconectará a todos los usuraios.';
$string['connect'] = 'Conectar';
$string['coursecreator'] = 'Creador de cursos';
$string['createkey'] = 'Crear una clave';
$string['cspwarning'] = '<b>Compruebe la configuración de CSP.</b><br/>Antes de conectarse aquí, vaya a la página <b>Configuración de DocSpace - Herramientas de desarrollo - SDK de JavaScript</b> y añada la dirección del portal de Moodle a la lista de conexiones permitidas - <u class="font-weight-bold">{$a}</u>';
$string['disconnect'] = 'Disconectar';
$string['docspaceapikey'] = 'Clave de la API de ONLYOFFICE DocSpace';
$string['docspaceapikey_help'] = 'Antes de conectar la aplicación, por favor acceda al <b>enlace</b>, cree una nueva clave de la API e introdúzcala aquí. Puede crear una clave de la API con Permisos = <b>Todos</b> o crear una clave de la API con <b>acceso restringido</b>. Si este es el caso, se deben seleccionar los siguientes ámbitos de acceso para que esta aplicación funcione correctamente: (Perfil: Leer, Contactos: Escribir, Salas: Escribir).';
$string['docspaceapperror'] = 'Error durante la inicialización. Compruebe la configuración de CSP de su DocSpace.';
$string['docspaceautherror'] = 'El proceso de autenticación ha fallado.';
$string['docspaceauthinvalidcredentials'] = 'Error de autenticación. Nombre de usuario/contraseña incorrectos';
$string['docspaceconfigurationerror'] = 'Por favor, configure el plugin primero en la página de configuración de ONLYOFFICE DocSpace';
$string['docspacefilenotfound'] = 'No se ha encontrado el archivo requerido. Por favor, compruebe si el archivo todavía existe o póngase en contacto con el administrador.';
$string['docspacelogin'] = 'Login de DocSpace';
$string['docspacenotfound_desc'] = 'Por favor, asegúrese de que esta sala se encuentra en la misma Dirección del servicio DocSpace especificada en la Configuración.';
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
$string['docspaceuserrole:power'] = 'Usario';
$string['docspaceuserscategory:description'] = '
Para añadir nuevos usuarios a ONLYOFFICE DocSpace, seleccione usuarios y luego pulse <b>Invitar a DocSpace</b>.<br/>
Todos los nuevos usuarios se añadirán con el rol <b>Usuario</b>, puede cambiar el rol en la <b>Configuración de cuentas de DocSpace</b>.<br/>
Para eliminar la conexión entre las cuentas de Moodle y DocSpace, seleccione el usuario y pulse <b>Desvincular cuenta de DocSpace</b>.';
$string['docspaceuserscategory:title'] = 'Usuarios de DocSpace';
$string['docspaceuserscategory_desc'] = '
Para añadir nuevos usuarios a ONLYOFFICE DocSpace y empezar a trabajar con el plugin, por favor pulse <b>{$a}</b>.<br/>
Todos los nuevos usuarios se añadirán con el rol Usuario, puede cambiar el rol en la Configuración de cuentas de DocSpace.';
$string['docspaceuserstatus'] = 'Estado de usuario de DocSpace';
$string['docspaceusertype'] = 'Tipo de usuario de DocSpace';
$string['documentserverurldescription'] = 'La dirección del servicio DocSpace especifica la dirección del servidor';
$string['editingteacher'] = 'Profesor de edición';
$string['emptyselection'] = 'Nada seleccionado';
$string['emptyuserslist'] = 'No se han encontrado usuarios';
$string['enterfullscreen'] = 'Abrir pantalla completa';
$string['exitfullscreen'] = 'Salir de pantalla completa';
$string['exportusers'] = 'Exportar usuarios';
$string['failedinvitations'] = 'Error de invitación para usuarios {$a}. Puede que se haya alcanzado el límite de usuarios de pago en DocSpace.';
$string['forgotpassword'] = '¿Ha olvidado su contraseña?';
$string['gotosettings'] = 'Ir a Ajustes';
$string['invalidlink'] = 'Enlace no válido';
$string['invitetodocspace'] = 'Invitar a DocSpace';
$string['learnmore'] = 'Más información';
$string['loginmodal:description'] = 'Introduzca su contraseña de DocSpace';
$string['loginmodal:title'] = 'Moodle solicita acceso a su ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Iniciar sesión en ONLYOFFICE DocSpace";
$string['manager'] = 'Gerente';
$string['modalloginerror'] = 'Credenciales de autorización no válidas. Por favor, compruebe su correo electrónico y contraseña e intente acceder de nuevo.';
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = '
El módulo ONLYOFFICE permite a los usuarios crear y editar documentos ofimáticos almacenados localmente en Moodle utilizando el Servidor de documentos ONLYOFFICE, permite a múltiples usuarios colaborar en tiempo real y guardar los cambios en Moodle

Ayúdenos a mejorar el plugin ONLYOFFICE - <a href="https://feedback.onlyoffice.com/forums/966080-your-voice-matters?category_id=519288" target="_blank">Compartir comentarios</a>.
Para más información, visite el <a href="https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx" target="_blank">Centro de ayuda</a>.
';
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
$string['privacy:metadata:onlyofficedocspace_settings'] = 'Este plugin envía la clave de la API de DocSpace al servicio externo ONLYOFFICE DocSpace para su autenticación.';
$string['privacy:metadata:onlyofficedocspace_settings:api_key'] = 'La clave de la API se envía al servicio externo para autenticar las solicitudes de la API.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Este plugin envía correos electrónicos de los usuarios al servicio externo ONLYOFFICE DocSpace con fines de registro y sincronización.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'La dirección de correo electrónico del usuario se envía al servicio externo ONLYOFFICE DocSpace para la creación y sincronización de la cuenta.';
$string['rolewarning'] = 'El usuario actual de Moodle se añadirá a DocSpace con el rol <b>Administrador de sala</b>.';
$string['roomunavailable'] = 'Sala no está disponible.';
$string['selecteditemtype:file'] = 'Archivo seleccionado';
$string['selecteditemtype:room'] = 'Sala seleccionada';
$string['selectelement'] = 'Conectar la sala de DocSpace existente <span class="text-nowrap">o archivo<span>';
$string['selectelement:room'] = 'Conectar la sala de DocSpace existente';
$string['selectelement:room_help'] = 'Esta actividad se conecta a una sala pública existente de ONLYOFFICE DocSpace, permitiendo a los estudiantes ver todos los documentos que se encuentran allí.';
$string['selectfile'] = 'Seleccionar archivo';
$string['selectroom'] = 'Explorar las salas de DocSpace';
$string['sentinvitations'] = 'Invitación enviada correctamente a usuario(s) {$a}';
$string['settings'] = 'Configuración de ONLYOFFICE DocSpace';
$string['settingsintro'] = 'Incruste las salas públicas de su DocSpace en los cursos de Moodle, lo que permitirá a profesores y administradores crear, editar y compartir archivos ofimáticos con los estudiantes.';
$string['siteadmin'] = 'Administrador del sitio';
$string['skippeddisable'] = 'Deshabilitación de cuenta omitida para {$a} usuario(s). Es posible que los usuarios con las direcciones de correo electrónico especificadas ya estén desvinculados de DocSpace';
$string['skippedinvitations'] = 'Invitación omitida para usuario(s) {$a}. Puede que ya existan en DocSpace usuarios con los correos electrónicos indicados.';
$string['somethingwentwrong'] = 'Algo salió mal';
$string['successfulconnection'] = '¡Su DocSpace se ha conectado correctamente!';
$string['successfuldisable'] = 'La cuenta DocSpace seleccionada se ha desactivado correctamente';
$string['suggestfeature'] = 'Sugerir una función';
$string['teacher'] = 'Profesor';
$string['unexpectederror:connectdocspace'] = 'Se ha producido un error inesperado al conectar DocSpace a Moodle';
$string['unexpectederror:docspaceurl'] = 'Se ha producido un error inesperado al comprobar la URL de DocSpace';
$string['unexpectederror:inviteusers'] = 'Se ha producido un error inesperado al intentar invitar a usuarios a DocSpace';
$string['unexpectederror:unlinkusers'] = 'Se ha producido un error inesperado al intentar desvincular usuarios de DocSpace';
$string['unlinkdocspaceaccount'] = 'Desvincular cuenta de DocSpace';
$string['unlinkwarningmessage'] = '¿Está seguro de que desea desactivar la cuenta de DocSpace seleccionada?';
$string['validationerror:emptyapikey'] = 'El valor de la clave de la API no puede estar vacío.';
$string['validationerror:emptyurl'] = 'URL no puede estar vacía';
$string['validationerror:invalidapikey'] = 'Clave de la API de DocSpace no válida';
$string['validationerror:invalidurl'] = 'Formato de URL no válido';
$string['validationerror:password'] = 'La contraseña introducida es incorrecta';
$string['warning'] = 'Advertencia';
