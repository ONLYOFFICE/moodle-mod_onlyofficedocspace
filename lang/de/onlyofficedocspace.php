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
$string['adminsettings:urldescription'] = 'Geben Sie die URL Ihres DocSpace in das Feld oben ein. Zum Beispiel https://yourcompany.docspace.com.';
$string['adminsettings:urlwarning'] = 'Möchten Sie den aktuellen DocSpace wirklich ändern? Verbundene Benutzeranmeldungen gehen verloren.';
$string['change'] = 'Ändern';
$string['confirmchange_desc'] = 'Wenn Sie die Schaltfläche Trennen drücken, haben Sie keinen Zugriff mehr auf den aktuell verbundenen ONLYOFFICE DocSpace. Dadurch werden die Verbindungen zwischen Räumen und Aktivitäten entfernt und alle Benutzer getrennt.';
$string['confirmdisconnect_desc'] = 'Wenn Sie die Schaltfläche Ändern drücken, müssen Sie die Anmeldeinformationen für den aktuell verbundenen ONLYOFFICE DocSpace erneut eingeben. Verbindungen zwischen Räumen und Aktivitäten können verloren gehen. Informationen zum optionalen Benutzerexport werden nicht gelöscht.';
$string['connect'] = 'Verbinden';
$string['coursecreator'] = 'Kursersteller';
$string['createkey'] = 'Schlüssel erstellen';
$string['cspwarning'] = '<b>Überprüfen Sie die CSP-Einstellungen.</b><br/>Bevor Sie sich hier verbinden, gehen Sie bitte zu <b>DocSpace-Einstellungen – Entwicklertools – JavaScript SDK</b> und fügen Sie die Moodle-Portaladresse zur Zulassungsliste hinzu. - <u class="font-weight-bold">{$a}</u>';
$string['disconnect'] = 'Trennen';
$string['docspaceapikey'] = 'ONLYOFFICE DocSpace API-Schlüssel';
$string['docspaceapikey_help'] = 'Bevor Sie die App verbinden, rufen Sie bitte den <b>Link</b> auf, erstellen Sie einen neuen API-Schlüssel und fügen Sie ihn hier ein. Sie können einen API-Schlüssel mit Berechtigungen = <b>Alle</b> oder mit <b>eingeschränktem Zugriff</b> erstellen. In diesem Fall sollten für die gültige Funktion der App folgende Zugriffsbereiche ausgewählt werden: (Profil: Lesen, Kontakte: Schreiben, Räume: Schreiben).';
$string['docspaceapperror'] = 'Fehler bei der Initialisierung. Bitte überprüfen Sie Ihre DocSpace CSP-Einstellungen.';
$string['docspaceautherror'] = 'Der Authentifizierungsprozess ist fehlgeschlagen.';
$string['docspaceauthinvalidcredentials'] = 'Authentifizierung fehlgeschlagen. Falscher Login/Passwort';
$string['docspaceconfigurationerror'] = 'Bitte konfigurieren Sie das Plugin zuerst auf der ONLYOFFICE DocSpace-Einstellungsseite';
$string['docspacefilenotfound'] = 'Die gewünschte Datei wurde nicht gefunden. Bitte überprüfen Sie, ob die Datei noch vorhanden ist oder wenden Sie sich an den Administrator.';
$string['docspacelogin'] = 'DocSpace Login';
$string['docspacenotfound_desc'] = 'Bitte stellen Sie sicher, dass sich dieser Raum an der gleichen DocSpace-Serviceadresse befindet, die in den Einstellungen angegeben ist.';
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
$string['docspaceuserscategory:description'] = '
Um neue Benutzer zu ONLYOFFICE DocSpace hinzuzufügen, wählen Sie Benutzer aus und drücken Sie dann auf <b>Zu DocSpace einladen</b>.<br/>
Alle neuen Benutzer werden mit der <b>Benutzerrolle</b> hinzugefügt. Sie können die Rolle in den <b>Kontoeinstellungen in DocSpace</b> ändern.<br/>
Um die Verbindung zwischen Moodle- und DocSpace-Konten zu entfernen, wählen Sie den Benutzer aus und drücken Sie <b>DocSpace-Konto trennen</b>.';
$string['docspaceuserscategory:title'] = 'DocSpace-Benutzer';
$string['docspaceuserscategory_desc'] = '
Um neue Benutzer zu ONLYOFFICE DocSpace hinzuzufügen und mit dem Plugin zu arbeiten, drücken Sie bitte <b>{$a}</b>.<br/>
Alle neuen Benutzer werden mit der Benutzerrolle hinzugefügt. Sie können die Rolle in den Kontoeinstellungen in DocSpace ändern.';
$string['docspaceuserstatus'] = 'DocSpace-Benutzerstatus';
$string['docspaceusertype'] = 'DocSpace-Benutzertyp';
$string['documentserverurldescription'] = 'Die DocSpace-Serviceadresse gibt die Adresse des Servers an';
$string['editingteacher'] = 'Lehrer-Editor';
$string['emptyselection'] = 'Nichts ausgewählt';
$string['emptyuserslist'] = 'Keine Benutzer gefunden';
$string['enterfullscreen'] = 'Vollbildmodus öffnen';
$string['exitfullscreen'] = 'Vollbildmodus beenden';
$string['exportusers'] = 'Benutzer exportieren';
$string['failedinvitations'] = 'Einladung für {$a} Benutzer fehlgeschlagen. Das Limit der zahlenden DocSpace-Benutzer wurde möglicherweise erreicht.';
$string['forgotpassword'] = 'Passwort vergessen?';
$string['gotosettings'] = 'Zu den Einstellungen';
$string['invalidlink'] = 'Ungültiger Link';
$string['invitetodocspace'] = 'Zu DocSpace einladen';
$string['learnmore'] = 'Mehr erfahren';
$string['loginmodal:description'] = 'Bitte geben Sie Ihr DocSpace-Passwort ein';
$string['loginmodal:title'] = 'Moodle fordert Zugriff auf Ihren ONLYOFFICE DocSpace an';
$string['logintodocspace'] = "Melden Sie sich bei ONLYOFFICE DocSpace an";
$string['manager'] = 'Manager';
$string['modalloginerror'] = 'Ungültige Autorisierungsinformationen. Bitte überprüfen Sie Ihre E-Mail-Adresse und Ihr Passwort und versuchen Sie erneut, sich anzumelden.';
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = '
Das ONLYOFFICE-Modul ermöglicht es den Benutzern, lokal in Moodle gespeicherte Office-Dokumente mit dem ONLYOFFICE Document Server zu erstellen und zu bearbeiten, ermöglicht mehreren Benutzern die Zusammenarbeit in Echtzeit und das Zurückspeichern dieser Änderungen in Moodle

Helfen Sie uns, das ONLYOFFICE-Plugin zu verbessern - <a href="https://feedback.onlyoffice.com/forums/966080-your-voice-matters?category_id=519288" target="_blank">Feedback teilen</a>.
Weitere Informationen finden Sie im <a href="https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx" target="_blank">Hilfe-Center</a>.
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
$string['privacy:metadata:onlyofficedocspace_settings'] = 'Dieses Plugin sendet den DocSpace-API-Schlüssel zur Authentifizierung an den externen Dienst ONLYOFFICE DocSpace.';
$string['privacy:metadata:onlyofficedocspace_settings:api_key'] = 'Der API-Schlüssel wird an den externen Dienst gesendet, um API-Anfragen zu authentifizieren.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Dieses Plugin sendet Benutzer-E-Mails an den externen Dienst ONLYOFFICE DocSpace für Registrierungs- und Synchronisierungszwecke.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'Die E-Mail-Adresse des Benutzers wird zur Kontoerstellung und -synchronisierung an den externen Dienst ONLYOFFICE DocSpace gesendet.';
$string['rolewarning'] = 'Der aktuelle Moodle-Benutzer wird mit der Rolle <b>Raumadministrator</b> zu DocSpace hinzugefügt.';
$string['roomunavailable'] = 'Raum nicht verfügbar.';
$string['selecteditemtype:file'] = 'Ausgewählte Datei';
$string['selecteditemtype:room'] = 'Ausgewählter Raum';
$string['selectelement'] = 'Vorhandenen DocSpace-Raum <span class="text-nowrap">oder Datei<span> verbinden';
$string['selectelement:room'] = 'Vorhandenen DocSpace-Raum verbinden';
$string['selectelement:room_help'] = 'Diese Aktivität stellt eine Verbindung zu einem vorhandenen öffentlichen ONLYOFFICE DocSpace-Raum her und ermöglicht den Studierenden den Zugriff auf alle dort vorhandenen Dokumente.';
$string['selectfile'] = 'Datei auswählen';
$string['selectroom'] = 'DocSpace-Räume öffnen';
$string['sentinvitations'] = 'Einladung erfolgreich an {$a} Benutzer gesendet';
$string['settings'] = 'ONLYOFFICE DocSpace-Einstellungen';
$string['settingsintro'] = 'Betten Sie öffentliche Räume aus Ihrem DocSpace in Moodle-Kurse ein, sodass Lehrer und Manager Office-Dateien erstellen, bearbeiten und mit Schülern teilen können.';
$string['siteadmin'] = 'Site-Administrator';
$string['skippeddisable'] = 'Die Kontodeaktivierung für {$a} Benutzer wurde übersprungen. Benutzer mit den angegebenen E-Mail-Adressen sind möglicherweise bereits von DocSpace getrennt.';
$string['skippedinvitations'] = 'Einladung für {$a} Benutzer übersprungen. Benutzer mit den angegebenen E-Mail-Adressen sind möglicherweise bereits in DocSpace vorhanden.';
$string['somethingwentwrong'] = 'Da ist etwas schiefgelaufen';
$string['successfulconnection'] = 'Ihr DocSpace wurde erfolgreich verbunden!';
$string['successfuldisable'] = 'Das ausgewählte DocSpace-Konto wurde erfolgreich deaktiviert';
$string['suggestfeature'] = 'Funktion vorschlagen';
$string['teacher'] = 'Lehrer';
$string['unexpectederror:connectdocspace'] = 'Beim Verbinden von DocSpace mit Moodle ist ein unerwarteter Fehler aufgetreten';
$string['unexpectederror:docspaceurl'] = 'Beim Überprüfen der DocSpace-URL ist ein unerwarteter Fehler aufgetreten';
$string['unexpectederror:inviteusers'] = 'Beim Versuch, Benutzer zu DocSpace einzuladen, ist ein unerwarteter Fehler aufgetreten';
$string['unexpectederror:unlinkusers'] = 'Beim Versuch, die Verknüpfung von DocSpace-Benutzern aufzuheben, ist ein unerwarteter Fehler aufgetreten';
$string['unlinkdocspaceaccount'] = 'DocSpace-Konto trennen';
$string['unlinkwarningmessage'] = 'Möchten Sie das ausgewählte DocSpace-Konto wirklich deaktivieren?';
$string['validationerror:emptyapikey'] = 'Der API-Schlüsselwert darf nicht leer sein.';
$string['validationerror:emptyurl'] = 'Die URL darf nicht leer sein';
$string['validationerror:invalidapikey'] = 'Ungültiger DocSpace-API-Schlüssel';
$string['validationerror:invalidurl'] = 'Ungültiges URL-Format';
$string['validationerror:password'] = 'Das eingegebene Passwort ist falsch';
$string['warning'] = 'Warnung';
