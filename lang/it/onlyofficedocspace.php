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

$string['activityname'] = 'Nome dell\'attività';
$string['adminsettings:updated'] = 'Impostazioni salvate';
$string['adminsettings:urldescription'] = 'Enter the URL of your DocSpace in the field above. For example, https://yourcompany.docspace.com.';
$string['adminsettings:urlwarning'] = 'Sicuro di voler cambiare l’attuale DocSpace con un altro? I login degli utenti andranno persi.';
$string['change'] = 'Change';
$string['confirmchange_desc'] = 'If you press the Disconnect button, you will not have access to the currently connected ONLYOFFICE DocSpace. This will remove the connections between Rooms and Activities, and disconnect all users.';
$string['confirmdisconnect_desc'] = 'If you press the Change button, you will have to re-enter the credentials for the currently connected ONLYOFFICE DocSpace. Connections between Rooms and Activities might be lost. Information about optional user export won’t be deleted.';
$string['connect'] = 'Connect';
$string['coursecreator'] = 'Course creator';
$string['createkey'] = 'Create a key';
$string['cspwarning'] = '<b>Check the CSP settings.</b><br/>Before connecting here, please go to the <b>DocSpace Settings - Developer tools - JavaScript SDK</b> and add the Moodle portal address to the allow list - <u class="font-weight-bold">{$a}</u>';
$string['disconnect'] = 'Disconnect';
$string['docspaceapikey'] = 'ONLYOFFICE DocSpace API key';
$string['docspaceapikey_help'] = 'Before connecting the app, please go to the <b>link</b>, create new API key and insert it here. You can create API key with Permissions = <b>All</b> or create API key with <b>restricted access</b>. In this case, the following Access Scopes should be selected for valid work of this app: (Profile: Read, Contacts: Write, Rooms: Write).';
$string['docspaceapperror'] = 'Errore durante l\'inizializzazione. Controlla le impostazioni CSP del tuo DocSpace CSP.';
$string['docspaceautherror'] = 'Il processo di autenticazione non è andato a buon fine.';
$string['docspaceauthinvalidcredentials'] = 'Autenticazione fallita. Nome utente e/o password incorretti';
$string['docspaceconfigurationerror'] = 'Configura prima il plugin nella pagina delle impostazioni di ONLYOFFICE DocSpace';
$string['docspacefilenotfound'] = 'Il file richiesto non è stato trovato. Controlla se il file è ancora esistente oppure contatta l’amministratore.';
$string['docspacelogin'] = 'Nome utente di DocSpace';
$string['docspacenotfound_desc'] = 'Please ensure that this room is located at the same DocSpace Service Address specified in the Settings.';
$string['docspacepassword'] = 'Password di DocSpace';
$string['docspacepermissiondenied'] = 'L\'utente specificato non è un amministratore del DocSpace!';
$string['docspacerequestuserserror'] = 'La richiesta dell\'utente DocSpace non è andata a buon fine';
$string['docspaceroomnotfound'] = 'La stanza richiesta non è stata trovata. Controlla se la stanza è ancora esistente o contatta l’amministratore.';
$string['docspaceserverurl'] = 'Indirizzo del servizio DocSpace';
$string['docspaceunreachable'] = 'DocSpace non è disponibile.';
$string['docspaceuseralreadyexists'] = 'User {$a} already exists in DocSpace!';
$string['docspaceuserinviteerror'] = 'Error create user {$a} in DocSpace! The limit of paid DocSpace users may have been reached.';
$string['docspaceusernotfound'] = 'L’utente non è stato trovato in ONLYOFFICE DocSpace. Contatta l\'amministratore.';
$string['docspaceuserrole:admin'] = 'Room admin';
$string['docspaceuserrole:power'] = 'User';
$string['docspaceuserscategory:description'] = '
To add new users to ONLYOFFICE DocSpace select users and then press <b>Invite to DocSpace</b>.<br/>
All new users will be added with <b>User role</b>, you can change the role in <b>Accounts settings in DocSpace</b>.<br/>
To remove connection between Moodle and DocSpace accounts select user and press <b>Unlink DocSpace Account</b>.';
$string['docspaceuserscategory:title'] = 'Utenti di DocSpace';
$string['docspaceuserscategory_desc'] = '
To add new users to ONLYOFFICE DocSpace and start working with the plugin, please press <b>{$a}</b>.<br/>
All new users will be added with User role, you can change the role in Accounts settings in DocSpace.';
$string['docspaceuserstatus'] = 'DocSpace user status';
$string['docspaceusertype'] = 'DocSpace user type';
$string['documentserverurldescription'] = 'L\'indirizzo del servizio DocSpace specifica l\'indirizzo del server';
$string['editingteacher'] = 'Editing teacher';
$string['emptyselection'] = 'Nothing selected';
$string['emptyuserslist'] = 'No users found';
$string['enterfullscreen'] = 'Apri schermo intero';
$string['exitfullscreen'] = 'Chiudi schermo intero';
$string['exportusers'] = 'Export users';
$string['failedinvitations'] = 'Invitation failed for {$a} user(s). The limit of paid DocSpace users may have been reached.';
$string['forgotpassword'] = 'Forgot password?';
$string['gotosettings'] = 'Go to Settings';
$string['invalidlink'] = 'Invalid link';
$string['invitetodocspace'] = 'Invita su DocSpace';
$string['learnmore'] = 'Learn more';
$string['loginmodal:description'] = 'Inserisci la tua password di DocSpace';
$string['loginmodal:title'] = 'Moodle richiede l\'accesso al tuo ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Entra nel tuo ONLYOFFICE DocSpace";
$string['manager'] = 'Manager';
$string['modalloginerror'] = 'Invalid authorization credentials. Please check your Email and password and try to log in again.';
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = '
The ONLYOFFICE module enables the users to create and edit office documents stored locally in Moodle using ONLYOFFICE Document Server, allows multiple users to collaborate in real time and to save back those changes to Moodle

Help us improve ONLYOFFICE plugin - <a href="https://feedback.onlyoffice.com/forums/966080-your-voice-matters?category_id=519288" target="_blank">Share feedback</a>.
For more information visit <a href="https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx" target="_blank">Help Center</a>.
';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Aggiungi una nuova attività ONLYOFFICE DocSpace';
$string['onlyofficedocspace:edit'] = 'Modifica l\'attività ONLYOFFICE DocSpace';
$string['onlyofficedocspace:view'] = 'Visualizza l\'attività ONLYOFFICE DocSpace';
$string['paramsmissingvalidationerror'] = 'I parametri richiesti non sono presenti';
$string['pluginadministration'] = 'Amministratore dell’attività di ONLYOFFICE DocSpace';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = 'This plugin stores ONLYOFFICE DocSpace user credentials in the Moodle database for authentication purposes.';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = 'The email of a DocSpace user as registered in the third-party service.';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'The hashed password of a DocSpace user as registered in the third-party service.';
$string['privacy:metadata:onlyofficedocspace_settings'] = 'This plugin sends DocSpace API key to the external service ONLYOFFICE DocSpace for authentication.';
$string['privacy:metadata:onlyofficedocspace_settings:api_key'] = 'The API key is sent to the external service to authenticate API requests.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'This plugin sends user emails to the external service ONLYOFFICE DocSpace for registration and synchronization purposes.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'The user’s email address is sent to the external service ONLYOFFICE DocSpace for account creation and synchronization.';
$string['rolewarning'] = 'The current Moodle user will be added to DocSpace with the <b>Room admin</b> role';
$string['roomunavailable'] = 'Room unavailable.';
$string['selecteditemtype:file'] = 'File selezionato';
$string['selecteditemtype:room'] = 'Stanza selezionata';
$string['selectelement'] = 'Connetti la stanza DocSpace esistente <span class="text-nowrap">o il file<span>';
$string['selectelement:room'] = 'Connect existing DocSpace room';
$string['selectelement:room_help'] = 'This activity connects with an existing ONLYOFFICE DocSpace public room, giving students access to view all documents there.';
$string['selectfile'] = 'Seleziona file';
$string['selectroom'] = 'Browse DocSpace rooms';
$string['sentinvitations'] = 'Invito inviato con successo a {$a} utente(i)';
$string['settings'] = 'Impostazioni di ONLYOFFICE DocSpace';
$string['settingsintro'] = 'Embed public rooms from your DocSpace into Moodle courses, enabling teachers and managers to create, edit, and share office files with students.';
$string['siteadmin'] = 'Site administrator';
$string['skippeddisable'] = 'Account disabling skipped for {$a} user(s). User(s) with the specified email(s) addresses may already be unlinked from DocSpace.';
$string['skippedinvitations'] = 'Invito non mandato per {$a} utente(i). L\'utente (gli utenti) con l’indirizzo email (gli indirizzi) potrebbe(ro) già esistere nel DocSpace.';
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
$string['validationerror:password'] = 'La password inserita non è corretta';
$string['warning'] = 'Warning';
