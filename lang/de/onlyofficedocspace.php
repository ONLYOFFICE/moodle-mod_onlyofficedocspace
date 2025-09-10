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
$string['adminsettings:urlwarning'] = 'Möchten Sie den aktuellen DocSpace wirklich ändern? Verbundene Benutzeranmeldungen gehen verloren.';
$string['cspwarning'] = '<b>Überprüfen Sie die CSP-Einstellungen.</b><br/>Bevor Sie sich hier verbinden, gehen Sie bitte zu <b>DocSpace-Einstellungen – Entwicklertools – JavaScript SDK</b> und fügen Sie die Moodle-Portaladresse zur Zulassungsliste hinzu. - <u class="font-weight-bold">{$a}</u>';
$string['docspaceapperror'] = 'Fehler bei der Initialisierung. Bitte überprüfen Sie Ihre DocSpace CSP-Einstellungen.';
$string['docspaceautherror'] = 'Der Authentifizierungsprozess ist fehlgeschlagen.';
$string['docspaceauthinvalidcredentials'] = 'Authentifizierung fehlgeschlagen. Falscher Login/Passwort';
$string['docspaceconfigurationerror'] = 'Bitte konfigurieren Sie das Plugin zuerst auf der ONLYOFFICE DocSpace-Einstellungsseite';
$string['docspacefilenotfound'] = 'Die gewünschte Datei wurde nicht gefunden. Bitte überprüfen Sie, ob die Datei noch vorhanden ist oder wenden Sie sich an den Administrator.';
$string['docspacelogin'] = 'DocSpace Login';
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
$string['docspaceuserrole:power'] = 'Benutzer';
$string['docspaceuserscategory:title'] = 'DocSpace-Benutzer';
$string['docspaceuserstatus'] = 'DocSpace-Benutzerstatus';
$string['docspaceusertype'] = 'DocSpace-Benutzertyp';
$string['documentserverurldescription'] = 'Die DocSpace-Serviceadresse gibt die Adresse des Servers an';
$string['emptyselection'] = 'Nichts ausgewählt';
$string['enterfullscreen'] = 'Vollbildmodus öffnen';
$string['exitfullscreen'] = 'Vollbildmodus beenden';
$string['exportusers'] = 'Benutzer exportieren';
$string['failedinvitations'] = 'Einladung für {$a} Benutzer fehlgeschlagen. Das Limit der zahlenden DocSpace-Benutzer wurde möglicherweise erreicht.';
$string['invitetodocspace'] = 'Zu DocSpace einladen';
$string['loginmodal:description'] = 'Bitte geben Sie Ihr DocSpace-Passwort ein';
$string['loginmodal:title'] = 'Moodle fordert Zugriff auf Ihren ONLYOFFICE DocSpace an';
$string['logintodocspace'] = "Melden Sie sich bei ONLYOFFICE DocSpace an";
$string['modulename'] = 'ONLYOFFICE DocSpace';
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
$string['privacy:metadata:onlyofficedocspace_users'] = 'Dieses Plugin sendet Benutzer-E-Mails an den externen Dienst ONLYOFFICE DocSpace für Registrierungs- und Synchronisierungszwecke.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'Die E-Mail-Adresse des Benutzers wird zur Kontoerstellung und -synchronisierung an den externen Dienst ONLYOFFICE DocSpace gesendet.';
$string['rolewarning'] = 'Der aktuelle Moodle-Benutzer wird mit der Rolle <b>Raumadministrator</b> zu DocSpace hinzugefügt.';
$string['selecteditemtype:file'] = 'Ausgewählte Datei';
$string['selecteditemtype:room'] = 'Ausgewählter Raum';
$string['selectelement'] = 'Vorhandenen DocSpace-Raum <span class="text-nowrap">oder Datei<span> verbinden';
$string['selectelement:room'] = 'Vorhandenen DocSpace-Raum verbinden';
$string['selectfile'] = 'Datei auswählen';
$string['selectroom'] = 'Raum auswählen';
$string['sentinvitations'] = 'Einladung erfolgreich an {$a} Benutzer gesendet';
$string['settings'] = 'ONLYOFFICE DocSpace-Einstellungen';
$string['skippedinvitations'] = 'Einladung für {$a} Benutzer übersprungen. Benutzer mit den angegebenen E-Mail-Adressen sind möglicherweise bereits in DocSpace vorhanden.';
$string['validationerror:password'] = 'Das eingegebene Passwort ist falsch';
