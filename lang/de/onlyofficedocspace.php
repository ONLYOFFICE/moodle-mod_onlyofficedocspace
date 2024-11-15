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

$string['activityname'] = 'Name der Aktivität';
$string['adminsettings:updated'] = 'Einstellungen erfolgreich gespeichert';
$string['adminsettings:urldescription'] = "Bitte geben Sie die korrekte Adresse Ihres ONLYOFFICE DocSpace ein.";
$string['adminsettings:urlwarning'] = 'Sind Sie sicher, dass Sie den aktuellen DocSpace durch einen anderen ersetzen möchten? Verbundene Benutzeranmeldungen gehen dabei verloren.';
$string['cspwarning'] = '<b>Überprüfen Sie die CSP-Einstellungen.</b><br/>Bevor Sie hier eine Verbindung herstellen, gehen Sie bitte zu den <b>DocSpace-Einstellungen - Entwicklungstools - JavaScript SDK</b> und fügen Sie die Adresse von Moodle zur Liste der erlaubten Adressen hinzu - <u class="font-weight-bold">{$a}</u>';
$string['docspaceapperror'] = 'Fehler bei der Initialisierung. Bitte überprüfen Sie Ihre DocSpace CSP-Einstellungen.';
$string['docspaceautherror'] = 'Authentifizierung fehlgeschlagen.';
$string['docspaceauthinvalidcredentials'] = 'Authentifizierung fehlgeschlagen. Falsches Login/Passwort';
$string['docspaceconfigurationerror'] = 'Bitte konfigurieren Sie das Plugin zunächst auf der Einstellungsseite von ONLYOFFICE DocSpace';
$string['docspacefilenotfound'] = 'Die erforderliche Datei wurde nicht gefunden. Bitte prüfen Sie, ob die Datei noch vorhanden ist, oder wenden Sie sich an den Administrator.';
$string['docspacelogin'] = 'DocSpace Login';
$string['docspacepassword'] = 'DocSpace Passwort';
$string['docspacepermissiondenied'] = 'Der angegebene Benutzer ist kein DocSpace-Administrator!';
$string['docspacerequestuserserror'] = 'DocSpace-Benutzeranfrage ist fehlgeschlagen';
$string['docspaceroomnotfound'] = 'Der gewünschte Raum wurde nicht gefunden. Bitte prüfen Sie, ob der Raum noch existiert oder kontaktieren Sie den Administrator.';
$string['docspaceserverurl'] = 'DocSpace Service-Adresse';
$string['docspaceunreachable'] = 'DocSpace ist nicht verfügbar.';
$string['docspaceuseralreadyexists'] = 'Benutzer {$a} existiert bereits in DocSpace!';
$string['docspaceuserinviteerror'] = 'Fehler beim Erstellen des Benutzers/der Benutzerin {$a} in DocSpace! Möglicherweise wurde das Limit der zahlenden DocSpace-Benutzer erreicht.';
$string['docspaceusernotfound'] = 'Benutzer in ONLYOFFICE DocSpace nicht gefunden. Bitte kontaktieren Sie den Administrator.';
$string['docspaceuserrole:admin'] = 'Raumadministrator';
$string['docspaceuserrole:power'] = 'Power-Benutzer';
$string['docspaceuserscategory:description'] = 'Um neue Benutzer zu ONLYOFFICE DocSpace hinzuzufügen und die Arbeit mit dem Plugin zu beginnen, drücken Sie bitte <b>{$a}</b>. Nur Benutzer mit den Rollen Manager/in, Trainer/in und Kursersteller/in von Moodle können zu DocSpace eingeladen werden. <br/> Alle neuen Benutzer werden mit der Rolle <b>Power-Benutzer</b> hinzugefügt. Sie können den Rollentyp in den Kontoeinstellungen in DocSpace ändern. Bitte beachten: Die Rolle <b>Power-Benutzer</b> ist kostenpflichtig.';
$string['docspaceuserscategory:title'] = 'DocSpace-Benutzer';
$string['docspaceuserstatus'] = 'DocSpace-Benutzerstatus';
$string['docspaceusertype'] = 'DocSpace-Benutzertyp';
$string['documentserverurldescription'] = 'Die DocSpace Service-Adresse gibt die Adresse des Servers an';
$string['emptyselection'] = 'Nichts ausgewählt';
$string['enterfullscreen'] = 'Vollbildmodus öffnen';
$string['exitfullscreen'] = 'Vollbildmodus verlassen';
$string['exportusers'] = 'Benutzer exportieren';
$string['failedinvitations'] = 'Einladung für {$a} Benutzer fehlgeschlagen. Möglicherweise wurde das Limit der zahlenden DocSpace-Benutzer erreicht.';
$string['invitetodocspace'] = 'Zu DocSpace einladen';
$string['loginmodal:description'] = 'Bitte geben Sie Ihr DocSpace-Passwort ein';
$string['loginmodal:title'] = 'Moodle verlangt Zugang zu Ihrem ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Bei ONLYOFFICE DocSpace anmelden";
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = 'Dieses Modul ermöglicht es Nutzern, ONLYOFFICE DocSpace-Räume als Aktivitäten in Moodle für die Zusammenarbeit zu verbinden.';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Neue ONLYOFFICE DocSpace-Aktivität hinzufügen';
$string['onlyofficedocspace:edit'] = 'ONLYOFFICE DocSpace-Aktivität bearbeiten';
$string['onlyofficedocspace:view'] = 'ONLYOFFICE DocSpace-Aktivität anzeigen';
$string['paramsmissingvalidationerror'] = 'Erforderliche Anmeldeinformationen fehlen';
$string['pluginadministration'] = 'ONLYOFFICE DocSpace Aktivitätsverwaltung';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['rolewarning'] = 'Der/die aktuelle Moodle-Benutzer/in wird mit der Rolle <b>Raumadministrator</b> zu DocSpace hinzugefügt';
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
