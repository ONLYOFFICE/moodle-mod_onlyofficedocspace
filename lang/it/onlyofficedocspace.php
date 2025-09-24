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
$string['adminsettings:urldescription'] = 'Inserisci l’URL del tuo DocSpace nel campo sopra, ad esempio https://yourcompany.docspace.com.';
$string['adminsettings:urlwarning'] = 'Sicuro di voler cambiare l\'attuale DocSpace con un altro? I login degli utenti andranno persi.';
$string['change'] = 'Cambia';
$string['confirmchange_desc'] = 'Se premi il pulsante Disconnetti, non avrai più accesso all’ONLYOFFICE DocSpace attualmente connesso. Questo rimuoverà i collegamenti tra Stanze e Attività e disconnetterà tutti gli utenti.';
$string['confirmdisconnect_desc'] = 'Se premi il pulsante Cambia, dovrai reinserire le credenziali per l’ONLYOFFICE DocSpace attualmente connesso. I collegamenti tra Stanze e Attività potrebbero andare persi. Le informazioni sull’esportazione opzionale degli utenti non verranno eliminate.';
$string['connect'] = 'Connetti';
$string['coursecreator'] = 'Creatore del corso';
$string['createkey'] = 'Crea una chiave';
$string['cspwarning'] = '<b>Controlla le impostazioni CSP.</b><br/>Prima di connetterti qui, vai su <b>Impostazioni DocSpace - Strumenti per sviluppatori - JavaScript SDK</b> e aggiungi l’indirizzo del portale Moodle alla lista consentita - <u class="font-weight-bold">{$a}</u>';
$string['disconnect'] = 'Disconnetti';
$string['docspaceapikey'] = 'Chiave API ONLYOFFICE DocSpace';
$string['docspaceapikey_help'] = 'Prima di collegare l’app, vai al <b>link</b>, crea una nuova chiave API e inseriscila qui. Puoi creare una chiave API con Permessi = <b>Tutti</b> oppure una chiave API con <b>accesso limitato</b>. In questo caso, i seguenti ambiti di accesso devono essere selezionati per il corretto funzionamento dell’app: (Profilo: Lettura, Contatti: Scrittura, Stanze: Scrittura).';
$string['docspaceapperror'] = 'Errore durante l\'inizializzazione. Controlla le impostazioni CSP del tuo DocSpace CSP.';
$string['docspaceautherror'] = 'Il processo di autenticazione non è andato a buon fine.';
$string['docspaceauthinvalidcredentials'] = 'Autenticazione fallita. Nome utente e/o password incorretti';
$string['docspaceconfigurationerror'] = 'Configura prima il plugin nella pagina delle impostazioni di ONLYOFFICE DocSpace';
$string['docspacefilenotfound'] = 'Il file richiesto non è stato trovato. Controlla se il file è ancora esistente oppure contatta l’amministratore.';
$string['docspacelogin'] = 'Nome utente di DocSpace';
$string['docspacenotfound_desc'] = 'Assicurati che questa stanza si trovi allo stesso Indirizzo del Servizio DocSpace specificato nelle Impostazioni.';
$string['docspacepassword'] = 'Password di DocSpace';
$string['docspacepermissiondenied'] = 'L\'utente specificato non è un amministratore del DocSpace!';
$string['docspacerequestuserserror'] = 'La richiesta dell\'utente DocSpace non è andata a buon fine';
$string['docspaceroomnotfound'] = 'La stanza richiesta non è stata trovata. Controlla se la stanza è ancora esistente o contatta l’amministratore.';
$string['docspaceserverurl'] = 'Indirizzo del servizio DocSpace';
$string['docspaceunreachable'] = 'DocSpace non è disponibile.';
$string['docspaceuseralreadyexists'] = 'L\'utente {$a} esiste già in DocSpace!';
$string['docspaceuserinviteerror'] = 'Errore nella creazione dell\'utente {$a} in DocSpace! Potrebbe essere stato raggiunto il limite degli utenti a pagamento di DocSpace.';
$string['docspaceusernotfound'] = 'L\'utente non è stato trovato in ONLYOFFICE DocSpace. Contatta l\'amministratore.';
$string['docspaceuserrole:admin'] = 'Amministratore della stanza';
$string['docspaceuserrole:power'] = 'Utente';
$string['docspaceuserscategory:description'] = '
Per aggiungere nuovi utenti a ONLYOFFICE DocSpace seleziona gli utenti e poi premi <b>Invita a DocSpace</b>.<br/>
Tutti i nuovi utenti verranno aggiunti con il ruolo <b>Utente</b>, potrai cambiare il ruolo nelle <b>impostazioni Account in DocSpace</b>.<br/>
Per rimuovere il collegamento tra gli account Moodle e DocSpace seleziona l\'utente e premi <b>Scollega Account DocSpace</b>.';
$string['docspaceuserscategory:title'] = 'Utenti di DocSpace';
$string['docspaceuserscategory_desc'] = '
Per aggiungere nuovi utenti a ONLYOFFICE DocSpace e iniziare a lavorare con il plugin, premi <b>{$a}</b>.<br/>
Tutti i nuovi utenti verranno aggiunti con il ruolo Utente, potrai cambiare il ruolo nelle Impostazioni account in DocSpace.';
$string['docspaceuserstatus'] = 'Stato utente DocSpace';
$string['docspaceusertype'] = 'Tipo utente DocSpace';
$string['documentserverurldescription'] = 'L\'indirizzo del servizio DocSpace specifica l\'indirizzo del server';
$string['editingteacher'] = 'Docente con modifica';
$string['emptyselection'] = 'Nessuna selezione';
$string['emptyuserslist'] = 'Nessun utente trovato';
$string['enterfullscreen'] = 'Apri schermo intero';
$string['exitfullscreen'] = 'Chiudi schermo intero';
$string['exportusers'] = 'Esporta utenti';
$string['failedinvitations'] = 'Invito non riuscito per {$a} utente/i. Potrebbe essere stato raggiunto il limite degli utenti a pagamento di DocSpace.';
$string['forgotpassword'] = 'Password dimenticata?';
$string['gotosettings'] = 'Vai alle Impostazioni';
$string['invalidlink'] = 'Link non valido';
$string['invitetodocspace'] = 'Invita su DocSpace';
$string['learnmore'] = 'Scopri di più';
$string['loginmodal:description'] = 'Inserisci la tua password di DocSpace';
$string['loginmodal:title'] = 'Moodle richiede l\'accesso al tuo ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Entra nel tuo ONLYOFFICE DocSpace";
$string['manager'] = 'Manager';
$string['modalloginerror'] = 'Credenziali di autorizzazione non valide. Controlla la tua Email e password e riprova ad accedere.';
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = '
Il modulo ONLYOFFICE consente agli utenti di creare e modificare documenti d’ufficio archiviati localmente in Moodle utilizzando ONLYOFFICE Document Server, permette a più utenti di collaborare in tempo reale e di salvare le modifiche in Moodle

Aiutaci a migliorare il plugin ONLYOFFICE - <a href="https://feedback.onlyoffice.com/forums/966080-your-voice-matters?category_id=519288" target="_blank">Lascia un feedback</a>.
Per maggiori informazioni visita il <a href="https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx" target="_blank">Centro assistenza</a>.
';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Aggiungi una nuova attività ONLYOFFICE DocSpace';
$string['onlyofficedocspace:edit'] = 'Modifica l\'attività ONLYOFFICE DocSpace';
$string['onlyofficedocspace:view'] = 'Visualizza l\'attività ONLYOFFICE DocSpace';
$string['paramsmissingvalidationerror'] = 'I parametri richiesti non sono presenti';
$string['pluginadministration'] = 'Amministratore dell\'attività di ONLYOFFICE DocSpace';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = 'Questo plugin memorizza le credenziali utente di ONLYOFFICE DocSpace nel database di Moodle per scopi di autenticazione.';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = 'L\'email di un utente DocSpace registrata nel servizio di terze parti.';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'La password con hash di un utente DocSpace registrata nel servizio di terze parti';
$string['privacy:metadata:onlyofficedocspace_settings'] = 'Questo plugin invia la chiave API di DocSpace al servizio esterno ONLYOFFICE DocSpace per l\'autenticazione.';
$string['privacy:metadata:onlyofficedocspace_settings:api_key'] = 'La chiave API viene inviata al servizio esterno per autenticare le richieste API.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Questo plugin invia le email degli utenti al servizio esterno ONLYOFFICE DocSpace per scopi di registrazione e sincronizzazione.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'L\'indirizzo email dell\'utente viene inviato al servizio esterno ONLYOFFICE DocSpace per la creazione e la sincronizzazione dell\'account.';
$string['rolewarning'] = 'L\'attuale utente Moodle verrà aggiunto a DocSpace con il ruolo di <b>Amministratore della stanza</b>';
$string['roomunavailable'] = 'Stanza non disponibile.';
$string['selecteditemtype:file'] = 'File selezionato';
$string['selecteditemtype:room'] = 'Stanza selezionata';
$string['selectelement'] = 'Connetti la stanza DocSpace esistente <span class="text-nowrap">o il file<span>';
$string['selectelement:room'] = 'Connetti una stanza DocSpace esistente';
$string['selectelement:room_help'] = 'Questa attività si connette a una stanza pubblica esistente di ONLYOFFICE DocSpace, dando agli studenti accesso per visualizzare tutti i documenti presenti.';
$string['selectfile'] = 'Seleziona file';
$string['selectroom'] = 'Sfoglia stanze DocSpace';
$string['sentinvitations'] = 'Invito inviato con successo a {$a} utente(i)';
$string['settings'] = 'Impostazioni di ONLYOFFICE DocSpace';
$string['settingsintro'] = 'Incorpora stanze pubbliche dal tuo DocSpace nei corsi Moodle, consentendo a docenti e manager di creare, modificare e condividere file d’ufficio con gli studenti.';
$string['siteadmin'] = 'Amministratore del sito';
$string['skippeddisable'] = 'Disattivazione account saltata per {$a} utente/i. Gli utenti con gli indirizzi email specificati potrebbero essere già scollegati da DocSpace.';
$string['skippedinvitations'] = 'Invito non mandato per {$a} utente(i). L\'utente (gli utenti) con l\'indirizzo email (gli indirizzi) potrebbe(ro) già esistere nel DocSpace.';
$string['somethingwentwrong'] = 'Qualcosa è andato storto';
$string['successfulconnection'] = 'Il tuo DocSpace è stato connesso con successo!';
$string['successfuldisable'] = 'L\'account DocSpace selezionato è stato disattivato con successo';
$string['suggestfeature'] = 'Suggerisci una funzionalità';
$string['teacher'] = 'Docente';
$string['unexpectederror:connectdocspace'] = 'Si è verificato un errore imprevisto durante la connessione di DocSpace con Moodle';
$string['unexpectederror:docspaceurl'] = 'Si è verificato un errore imprevisto durante il controllo dell\'URL di DocSpace';
$string['unexpectederror:inviteusers'] = 'Si è verificato un errore imprevisto durante il tentativo di invitare utenti a DocSpace';
$string['unexpectederror:unlinkusers'] = 'Si è verificato un errore imprevisto durante il tentativo di scollegare utenti da DocSpace';
$string['unlinkdocspaceaccount'] = 'Scollega Account DocSpace';
$string['unlinkwarningmessage'] = 'Sei sicuro di voler disattivare l\'account DocSpace selezionato?';
$string['validationerror:emptyapikey'] = 'Il valore della chiave API non può essere vuoto.';
$string['validationerror:emptyurl'] = 'L\'URL non può essere vuoto';
$string['validationerror:invalidapikey'] = 'Chiave API DocSpace non valida';
$string['validationerror:invalidurl'] = 'Formato URL non valido';
$string['validationerror:password'] = 'La password inserita non è corretta';
$string['warning'] = 'Avviso';
