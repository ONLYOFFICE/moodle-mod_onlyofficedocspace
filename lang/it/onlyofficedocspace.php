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

$string['activityname'] = 'Nome dell’attività';
$string['adminsettings:updated'] = 'Impostazioni salvate';
$string['adminsettings:urldescription'] = "Inserisci l’indirizzo corretto del tuo ONLYOFFICE DocSpace.";
$string['adminsettings:urlwarning'] = 'Sicuro di voler cambiare l’attuale DocSpace con un altro? I login degli utenti andranno persi.';
$string['cspwarning'] = '<b>Controlla le impostazioni CSP.</b><br/>Prima di connettersi qui, vai sulle impostazioni del <b>DocSpace - Strumenti per sviluppatori - JavaScript SDK</b> e aggiungi l’indirizzo del portale di Moodle alla lista dei permessi - <u class="font-weight-bold">{$a}</u>';
$string['docspaceapperror'] = 'Errore durante l’inizializzazione. Controlla le impostazioni CSP del tuo DocSpace CSP.';
$string['docspaceautherror'] = 'Il processo di autenticazione non è andato a buon fine.';
$string['docspaceauthinvalidcredentials'] = 'Autenticazione fallita. Nome utente e/o password incorretti';
$string['docspaceconfigurationerror'] = 'Configura prima il plugin nella pagina delle impostazioni di ONLYOFFICE DocSpace';
$string['docspacefilenotfound'] = 'Il file richiesto non è stato trovato. Controlla se il file è ancora esistente oppure contatta l’amministratore.';
$string['docspacelogin'] = 'Nome utente di DocSpace';
$string['docspacepassword'] = 'Password di DocSpace';
$string['docspacepermissiondenied'] = 'L’utente specificato non è un amministratore del DocSpace!';
$string['docspacerequestuserserror'] = 'La richiesta dell’utente DocSpace non è andata a buon fine';
$string['docspaceroomnotfound'] = 'La stanza richiesta non è stata trovata. Controlla se la stanza è ancora esistente o contatta l’amministratore.';
$string['docspaceserverurl'] = 'Indirizzo del servizio DocSpace';
$string['docspaceunreachable'] = 'DocSpace non è disponibile.';
$string['docspaceuseralreadyexists'] = 'L’utente {$a} già esiste in DocSpace!';
$string['docspaceuserinviteerror'] = 'Errore di creazione dell’utente {$a} in DocSpace! Il limite di utenti a pagamento di DocSpace potrebbe essere stato raggiunto.';
$string['docspaceusernotfound'] = 'L’utente non è stato trovato in ONLYOFFICE DocSpace. Contatta l’amministratore.';
$string['docspaceuserrole:admin'] = 'Amministratore della stanza';
$string['docspaceuserrole:power'] = 'Utente esperto';
$string['docspaceuserscategory:description'] = 'Per aggiungere nuovi utenti a ONLYOFFICE DocSpace e cominciare a lavorare con il plugin, premi <b>{$a}</b>. Solo gli utenti con i ruoli di Manager, Insegnante e Creatore di corso possono essere invitati su DocSpace da Moodle. <br/> Tutti i nuovi utenti verranno aggiunti con il ruolo di  <b>Power user</b>. Puoi cambiare il tipo di ruolo nelle impostazioni dell’account nel DocSpace. Nota bene: il ruolo di <b>Power user</b> è a pagamento.';
$string['docspaceuserscategory:title'] = 'Utenti di DocSpace';
$string['docspaceuserstatus'] = 'Stato utente DocSpace';
$string['docspaceusertype'] = 'Tipo utente DocSpace';
$string['documentserverurldescription'] = 'L’indirizzo del servizio DocSpace specifica l’indirizzo del server';
$string['emptyselection'] = 'Nessun elemento selezionato';
$string['enterfullscreen'] = 'Apri schermo intero';
$string['exitfullscreen'] = 'Chiudi schermo intero';
$string['exportusers'] = 'Esporta utenti';
$string['failedinvitations'] = 'Invito non riuscito per {$a} utente(i). Il limite di utenti a pagamento di DocSpace potrebbe essere stato raggiunto.';
$string['invitetodocspace'] = 'Invita su DocSpace';
$string['loginmodal:description'] = 'Inserisci la tua password di DocSpace';
$string['loginmodal:title'] = 'Moodle richiede l’accesso al tuo ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Entra nel tuo ONLYOFFICE DocSpace";
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = 'Questo modulo consente agli utenti di collegare le stanze o i file di ONLYOFFICE DocSpace come attività in Moodle per la collaborazione.';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Aggiungi una nuova attività ONLYOFFICE DocSpace';
$string['onlyofficedocspace:edit'] = 'Modifica l’attività ONLYOFFICE DocSpace activity';
$string['onlyofficedocspace:view'] = 'Visualizza l’attività ONLYOFFICE DocSpace';
$string['paramsmissingvalidationerror'] = 'I parametri richiesti non sono presenti';
$string['pluginadministration'] = 'Amministratore dell’attività di ONLYOFFICE DocSpace';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['rolewarning'] = 'L’utente Moodle corrente verrà aggiunto a DocSpace con il ruolo di <b>Amministratore della stanza</b>';
$string['selecteditemtype:file'] = 'File selezionato';
$string['selecteditemtype:room'] = 'Stanza selezionata';
$string['selectelement'] = 'Connetti la stanza DocSpace esistente <span class="text-nowrap">o il file<span>';
$string['selectelement:room'] = 'Connetti la stanza DocSpace esistente';
$string['selectfile'] = 'Seleziona file';
$string['selectroom'] = 'Seleziona stanza';
$string['sentinvitations'] = 'Invito inviato con successo a {$a} utente(i)';
$string['settings'] = 'Impostazioni di ONLYOFFICE DocSpace';
$string['skippedinvitations'] = 'Invito non mandato per {$a} utente(i). L’utente (gli utenti) con l’indirizzo email (gli indirizzi) potrebbe(ro) già esistere nel DocSpace.';
$string['validationerror:password'] = 'La password inserita non è corretta';
