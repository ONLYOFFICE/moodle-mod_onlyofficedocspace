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

$string['activityname'] = 'Nom de l\'activité';
$string['adminsettings:updated'] = 'Paramètres enregistrés avec succès';
$string['adminsettings:urldescription'] = 'Enter the URL of your DocSpace in the field above. For example, https://yourcompany.docspace.com.';
$string['adminsettings:urlwarning'] = 'Êtes-vous sûr de vouloir changer DocSpace actuel pour un autre ? Les identifiants des utilisateurs connectés seront perdus.';
$string['change'] = 'Change';
$string['confirmchange_desc'] = 'If you press the Disconnect button, you will not have access to the currently connected ONLYOFFICE DocSpace. This will remove the connections between Rooms and Activities, and disconnect all users.';
$string['confirmdisconnect_desc'] = 'If you press the Change button, you will have to re-enter the credentials for the currently connected ONLYOFFICE DocSpace. Connections between Rooms and Activities might be lost. Information about optional user export won’t be deleted.';
$string['connect'] = 'Connect';
$string['coursecreator'] = 'Course creator';
$string['createkey'] = 'Create a key';
$string['cspwarning'] = '<b>Vérifiez les paramètres du CSP.</b><br/>Avant de vous connecter, veuillez vous rendre dans <b>Paramètres de DocSpace - Outils de développement - JavaScript SDK</b> et ajouter l\'adresse du portail Moodle à la liste des adresses autorisées - <u class="font-weight-bold">{$a}</u>';
$string['disconnect'] = 'Disconnect';
$string['docspaceapikey'] = 'ONLYOFFICE DocSpace API key';
$string['docspaceapikey_help'] = 'Before connecting the app, please go to the <b>link</b>, create new API key and insert it here. You can create API key with Permissions = <b>All</b> or create API key with <b>restricted access</b>. In this case, the following Access Scopes should be selected for valid work of this app: (Profile: Read, Contacts: Write, Rooms: Write).';
$string['docspaceapperror'] = 'Erreur lors de l\'initialisation. Veuillez vérifier les paramètres CSP de votre DocSpace.';
$string['docspaceautherror'] = 'Le processus d\'authentification a échoué.';
$string['docspaceauthinvalidcredentials'] = 'Échec de l\'authentification. Identifiant/mot de passe incorrect';
$string['docspaceconfigurationerror'] = 'Veuillez d\'abord configurer le plugin sur la page de configuration de ONLYOFFICE DocSpace.';
$string['docspacefilenotfound'] = 'Le fichier requis n\'a pas été trouvé. Veuillez vérifier si le fichier existe toujours ou contacter l\'administrateur.';
$string['docspacelogin'] = 'Login de DocSpace';
$string['docspacenotfound_desc'] = 'Please ensure that this room is located at the same DocSpace Service Address specified in the Settings.';
$string['docspacepassword'] = 'Mot de passe de DocSpace';
$string['docspacepermissiondenied'] = 'L\'utilisateur spécifié n\'est pas un administrateur DocSpace !';
$string['docspacerequestuserserror'] = 'La demande de l\'utilisateur de DocSpace a échoué';
$string['docspaceroomnotfound'] = 'La salle demandée n\'a pas été trouvée. Veuillez vérifier si la salle existe toujours ou contacter l\'administrateur.';
$string['docspaceserverurl'] = 'Adresse du service DocSpace';
$string['docspaceunreachable'] = 'DocSpace n\'est pas disponible.';
$string['docspaceuseralreadyexists'] = 'L\'utilisateur {$a} existe déjà dans DocSpace !';
$string['docspaceuserinviteerror'] = 'Erreur lors de la création de l\'utilisateur {$a} dans DocSpace ! La limite du nombre d\'utilisateurs DocSpace payants a peut-être été atteinte.';
$string['docspaceusernotfound'] = 'L\'utilisateur n\'a pas été trouvé dans ONLYOFFICE DocSpace. Veuillez contacter l\'administrateur.';
$string['docspaceuserrole:admin'] = 'Administrateur de la salle';
$string['docspaceuserrole:power'] = 'User';
$string['docspaceuserscategory:title'] = 'Utilisateurs de DocSpace';
$string['docspaceuserscategory:description'] = '
To add new users to ONLYOFFICE DocSpace select users and then press <b>Invite to DocSpace</b>.<br/>
All new users will be added with <b>User role</b>, you can change the role in <b>Accounts settings in DocSpace</b>.<br/>
To remove connection between Moodle and DocSpace accounts select user and press <b>Unlink DocSpace Account</b>.';
$string['docspaceuserscategory_desc'] = '
To add new users to ONLYOFFICE DocSpace and start working with the plugin, please press <b>{$a}</b>.<br/>
All new users will be added with User role, you can change the role in Accounts settings in DocSpace.';
$string['docspaceuserstatus'] = 'Statut d\'utilisateur de DocSpace';
$string['docspaceusertype'] = 'Type d\'utilisateur DocSpace';
$string['documentserverurldescription'] = 'L\'adresse du service DocSpace spécifie l\'adresse du serveur.';
$string['editingteacher'] = 'Editing teacher';
$string['emptyselection'] = 'Aucun élément sélectionné';
$string['emptyuserslist'] = 'No users found';
$string['enterfullscreen'] = 'Ouvrir en plein écran';
$string['exitfullscreen'] = 'Quitter le plein écran';
$string['exportusers'] = 'Exporter des utilisateurs';
$string['failedinvitations'] = 'L\'invitation a échoué pour {$a} utilisateur(s). La limite des utilisateurs payés de DocSpace a peut-être été atteinte.';
$string['forgotpassword'] = 'Forgot password?';
$string['gotosettings'] = 'Go to Settings';
$string['invalidlink'] = 'Invalid link';
$string['invitetodocspace'] = 'Inviter à DocSpace';
$string['learnmore'] = 'Learn more';
$string['loginmodal:description'] = 'Entrez votre mot de passe DocSpace';
$string['loginmodal:title'] = 'Moodle demande l\'accès à votre ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Se connecter à ONLYOFFICE DocSpace";
$string['manager'] = 'Manager';
$string['modalloginerror'] = 'Invalid authorization credentials. Please check your Email and password and try to log in again.';
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = '
The ONLYOFFICE module enables the users to create and edit office documents stored locally in Moodle using ONLYOFFICE Document Server, allows multiple users to collaborate in real time and to save back those changes to Moodle

Help us improve ONLYOFFICE plugin - <a href="https://feedback.onlyoffice.com/forums/966080-your-voice-matters?category_id=519288" target="_blank">Share feedback</a>.
For more information visit <a href="https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx" target="_blank">Help Center</a>.
';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Ajouter une nouvelle activité ONLYOFFICE DocSpace';
$string['onlyofficedocspace:edit'] = 'Modifier l\'activité de ONLYOFFICE DocSpace';
$string['onlyofficedocspace:view'] = 'Afficher l\'activité de ONLYOFFICE DocSpace';
$string['paramsmissingvalidationerror'] = 'Les identifiants requis sont manquants';
$string['pluginadministration'] = 'Administration de l\'activité de ONLYOFFICE DocSpace';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = 'Ce plugin stocke les identifiants des utilisateurs de ONLYOFFICE DocSpace dans la base de données Moodle à des fins d\'authentification.';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = 'L\'adresse e-mail d\'un utilisateur de DocSpace tel qu\'il est enregistré dans le service tiers.';
$string['privacy:metadata:onlyofficedocspace_settings'] = 'This plugin sends DocSpace API key to the external service ONLYOFFICE DocSpace for authentication.';
$string['privacy:metadata:onlyofficedocspace_settings:api_key'] = 'The API key is sent to the external service to authenticate API requests.';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'Le mot de passe haché d\'un utilisateur DocSpace tel qu\'il est enregistré dans le service tiers.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Ce plugin envoie les e-mails des utilisateurs au service externe ONLYOFFICE DocSpace à des fins d\'enregistrement et de synchronisation.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'L\'adresse e-mail de l\'utilisateur est envoyée au service externe ONLYOFFICE DocSpace pour la création du compte et la synchronisation.';
$string['rolewarning'] = 'L\'utilisateur Moodle actuel sera ajouté à DocSpace avec le rôle <b>Administrateur de salle</b>.';
$string['roomunavailable'] = 'Room unavailable.';
$string['selecteditemtype:file'] = 'Fichier sélectionné';
$string['selecteditemtype:room'] = 'Salle sélectionnée';
$string['selectelement'] = 'Connectez une salle DocSpace existante <span class="text-nowrap">ou un fichier<span>';
$string['selectelement:room_help'] = 'This activity connects with an existing ONLYOFFICE DocSpace public room, giving students access to view all documents there.';
$string['selectelement:room'] = 'Connecter une salle DocSpace existante';
$string['selectfile'] = 'Sélectionner un fichier';
$string['selectroom'] = 'Browse DocSpace rooms';
$string['sentinvitations'] = 'Invitation envoyée avec succès à {$a} utilisateur(s)';
$string['settings'] = 'Paramètres de ONLYOFFICE DocSpace';
$string['settingsintro'] = 'Embed public rooms from your DocSpace into Moodle courses, enabling teachers and managers to create, edit, and share office files with students.';
$string['siteadmin'] = 'Site administrator';
$string['skippeddisable'] = 'Account disabling skipped for {$a} user(s). User(s) with the specified email(s) addresses may already be unlinked from DocSpace.';
$string['skippedinvitations'] = 'Invitation ignorée pour {$a} utilisateur(s). Le(s) utilisateur(s) avec le(s) e-mail(s) indiqué(s) existe(nt) peut-être déjà dans DocSpace.';
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
$string['validationerror:password'] = 'Le mot de passe saisi est incorrect';
$string['warning'] = 'Warning';
