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

$string['activityname'] = 'Aktivitätsname';
$string['adminsettings:updated'] = 'Einstellungen erfolgreich gespeichert';
$string['adminsettings:urldescription'] = 'Enter the URL of your DocSpace in the field above. For example, https://yourcompany.docspace.com.';
$string['adminsettings:urlwarning'] = 'Möchten Sie den aktuellen DocSpace wirklich ändern? Verbundene Benutzeranmeldungen gehen verloren.';
$string['change'] = 'Change';
$string['confirmchange_desc'] = 'If you press the Disconnect button, you will not have access to the currently connected ONLYOFFICE DocSpace. This will remove the connections between Rooms and Activities, and disconnect all users.';
$string['confirmdisconnect_desc'] = 'If you press the Change button, you will have to re-enter the credentials for the currently connected ONLYOFFICE DocSpace. Connections between Rooms and Activities might be lost. Information about optional user export won’t be deleted.';
$string['connect'] = 'Connect';
$string['coursecreator'] = 'Course creator';
$string['createkey'] = 'Create a key';
$string['cspwarning'] = '<b>Überprüfen Sie die CSP-Einstellungen.</b><br/>Bevor Sie sich hier verbinden, gehen Sie bitte zu <b>DocSpace-Einstellungen – Entwicklertools – JavaScript SDK</b> und fügen Sie die Moodle-Portaladresse zur Zulassungsliste hinzu. - <u class="font-weight-bold">{$a}</u>';
$string['disconnect'] = 'Disconnect';
$string['docspaceapikey'] = 'ONLYOFFICE DocSpace API key';
$string['docspaceapikey_help'] = 'Before connecting the app, please go to the <b>link</b>, create new API key and insert it here. You can create API key with Permissions = <b>All</b> or create API key with <b>restricted access</b>. In this case, the following Access Scopes should be selected for valid work of this app: (Profile: Read, Contacts: Write, Rooms: Write).';
$string['docspaceapperror'] = 'Fehler bei der Initialisierung. Bitte überprüfen Sie Ihre DocSpace CSP-Einstellungen.';
$string['docspaceautherror'] = 'Der Authentifizierungsprozess ist fehlgeschlagen.';
$string['docspaceauthinvalidcredentials'] = 'Authentifizierung fehlgeschlagen. Falscher Login/Passwort';
$string['docspaceconfigurationerror'] = 'Bitte konfigurieren Sie das Plugin zuerst auf der ONLYOFFICE DocSpace-Einstellungsseite';
$string['docspacefilenotfound'] = 'Die gewünschte Datei wurde nicht gefunden. Bitte überprüfen Sie, ob die Datei noch vorhanden ist oder wenden Sie sich an den Administrator.';
$string['docspacelogin'] = 'DocSpace Login';
$string['docspacenotfound_desc'] = 'Please ensure that this room is located at the same DocSpace Service Address specified in the Settings.';
$string['docspacepassword'] = 'DocSpace Passwort';
$string['docspacepermissiondenied'] = 'Der angegebene Benutzer ist kein DocSpace-Administrator!';
$string['docspacerequestuserserror'] = 'Die DocSpace-Benutzeranforderung ist fehlgeschlagen';
$string['docspaceroomnotfound'] = 'Der gewünschte Raum wurde nicht gefunden. Bitte prüfen Sie, ob der Raum noch existiert oder kontaktieren Sie den Administrator.';
$string['docspaceserverurl'] = 'DocSpace-Serviceadresse';
$string['docspaceunreachable'] = 'DocSpace ist nicht verfügbar.';
$string['docspaceuseralreadyexists'] = 'Benutzer {$a} existiert bereits in DocSpace!';
$string['docspaceuserinviteerror'] = 'Fehler beim Erstellen des Benutzers {$a} in DocSpace! Das Limit der zahlenden DocSpace-Benutzer wurde möglicherweise erreicht.';
$string['docspaceusernotfound'] = 'Der Benutzer wurde in ONLYOFFICE DocSpace nicht gefunden. Bitte wenden Sie sich an den Administrator.';
$string['docspaceuserrole:admin'] = 'Raumadministrator';
$string['docspaceuserrole:power'] = 'User';
$string['docspaceuserscategory:description'] = '
To add new users to ONLYOFFICE DocSpace select users and then press <b>Invite to DocSpace</b>.<br/>
All new users will be added with <b>User role</b>, you can change the role in <b>Accounts settings in DocSpace</b>.<br/>
To remove connection between Moodle and DocSpace accounts select user and press <b>Unlink DocSpace Account</b>.';
$string['docspaceuserscategory:title'] = 'DocSpace-Benutzer';
$string['docspaceuserscategory_desc'] = '
To add new users to ONLYOFFICE DocSpace and start working with the plugin, please press <b>{$a}</b>.<br/>
All new users will be added with User role, you can change the role in Accounts settings in DocSpace.';
$string['docspaceuserstatus'] = 'DocSpace-Benutzerstatus';
$string['docspaceusertype'] = 'DocSpace-Benutzertyp';
$string['documentserverurldescription'] = 'Die DocSpace-Serviceadresse gibt die Adresse des Servers an';
$string['editingteacher'] = 'Editing teacher';
$string['emptyselection'] = 'Nichts ausgewählt';
$string['emptyuserslist'] = 'No users found';
$string['enterfullscreen'] = 'Vollbildmodus öffnen';
$string['exitfullscreen'] = 'Vollbildmodus beenden';
$string['exportusers'] = 'Benutzer exportieren';
$string['failedinvitations'] = 'Einladung für {$a} Benutzer fehlgeschlagen. Das Limit der zahlenden DocSpace-Benutzer wurde möglicherweise erreicht.';
$string['forgotpassword'] = 'Forgot password?';
$string['gotosettings'] = 'Go to Settings';
$string['invalidlink'] = 'Invalid link';
$string['invitetodocspace'] = 'Zu DocSpace einladen';
$string['learnmore'] = 'Learn more';
$string['loginmodal:description'] = 'Bitte geben Sie Ihr DocSpace-Passwort ein';
$string['loginmodal:title'] = 'Moodle fordert Zugriff auf Ihren ONLYOFFICE DocSpace an';
$string['logintodocspace'] = "Melden Sie sich bei ONLYOFFICE DocSpace an";
$string['manager'] = 'Manager';
$string['modalloginerror'] = 'Invalid authorization credentials. Please check your Email and password and try to log in again.';
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = '
The ONLYOFFICE module enables the users to create and edit office documents stored locally in Moodle using ONLYOFFICE Document Server, allows multiple users to collaborate in real time and to save back those changes to Moodle

Help us improve ONLYOFFICE plugin - <a href="https://feedback.onlyoffice.com/forums/966080-your-voice-matters?category_id=519288" target="_blank">Share feedback</a>.
For more information visit <a href="https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx" target="_blank">Help Center</a>.
';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Fügen Sie eine neue ONLYOFFICE DocSpace-Aktivität hinzu';
$string['onlyofficedocspace:edit'] = 'ONLYOFFICE DocSpace-Aktivität bearbeiten';
$string['onlyofficedocspace:view'] = 'ONLYOFFICE DocSpace-Aktivität anzeigen';
$string['paramsmissingvalidationerror'] = 'Erforderliche Anmeldeinformationen fehlen';
$string['pluginadministration'] = 'ONLYOFFICE DocSpace-Aktivitätsverwaltung';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = 'Dieses Plugin speichert ONLYOFFICE DocSpace-Benutzeranmeldeinformationen zur Authentifizierung in der Moodle-Datenbank.';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = 'Die E-Mail eines DocSpace-Benutzers, wie er/sie im Drittanbieterdienst registriert ist.';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'Das gehashte Passwort eines DocSpace-Benutzers, wie er/sie im Drittanbieterdienst registriert ist.';
$string['privacy:metadata:onlyofficedocspace_settings'] = 'This plugin sends DocSpace API key to the external service ONLYOFFICE DocSpace for authentication.';
$string['privacy:metadata:onlyofficedocspace_settings:api_key'] = 'The API key is sent to the external service to authenticate API requests.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Dieses Plugin sendet Benutzer-E-Mails an den externen Dienst ONLYOFFICE DocSpace für Registrierungs- und Synchronisierungszwecke.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'Die E-Mail-Adresse des Benutzers wird zur Kontoerstellung und -synchronisierung an den externen Dienst ONLYOFFICE DocSpace gesendet.';
$string['rolewarning'] = 'Der aktuelle Moodle-Benutzer wird mit der Rolle <b>Raumadministrator</b> zu DocSpace hinzugefügt.';
$string['roomunavailable'] = 'Room unavailable.';
$string['selecteditemtype:file'] = 'Ausgewählte Datei';
$string['selecteditemtype:room'] = 'Ausgewählter Raum';
$string['selectelement'] = 'Vorhandenen DocSpace-Raum <span class="text-nowrap">oder Datei<span> verbinden';
$string['selectelement:room_help'] = 'This activity connects with an existing ONLYOFFICE DocSpace public room, giving students access to view all documents there.';
$string['selectelement:room'] = 'Vorhandenen DocSpace-Raum verbinden';
$string['selectfile'] = 'Datei auswählen';
$string['selectroom'] = 'Browse DocSpace rooms';
$string['sentinvitations'] = 'Einladung erfolgreich an {$a} Benutzer gesendet';
$string['settings'] = 'ONLYOFFICE DocSpace-Einstellungen';
$string['settingsintro'] = 'Embed public rooms from your DocSpace into Moodle courses, enabling teachers and managers to create, edit, and share office files with students.';
$string['siteadmin'] = 'Site administrator';
$string['skippeddisable'] = 'Account disabling skipped for {$a} user(s). User(s) with the specified email(s) addresses may already be unlinked from DocSpace.';
$string['skippedinvitations'] = 'Einladung für {$a} Benutzer übersprungen. Benutzer mit den angegebenen E-Mail-Adressen sind möglicherweise bereits in DocSpace vorhanden.';
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
$string['validationerror:password'] = 'Das eingegebene Passwort ist falsch';
$string['warning'] = 'Warning';
