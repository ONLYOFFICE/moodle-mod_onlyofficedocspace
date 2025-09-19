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
$string['adminsettings:urldescription'] = 'Entrez l\'URL de votre DocSpace dans le champ ci-dessus. Par exemple, https://yourcompany.docspace.com.';
$string['adminsettings:urlwarning'] = 'Êtes-vous sûr de vouloir changer DocSpace actuel pour un autre ? Les identifiants des utilisateurs connectés seront perdus.';
$string['change'] = 'Modifier';
$string['confirmchange_desc'] = 'Si vous cliquez sur le bouton Déconnecter, vous n\'aurez plus accès au DocSpace ONLYOFFICE actuellement connecté. Cela supprimera les connexions entre les Salles et les Activités et déconnectera tous les utilisateurs.';
$string['confirmdisconnect_desc'] = 'Si vous cliquez sur le bouton Modifier, vous devrez saisir à nouveau les identifiants pour ONLYOFFICE DocSpace actuellement connecté. Les connexions entre les salles et les activités pourraient être perdues. Les informations relatives à l\'exportation facultative des utilisateurs ne seront pas supprimées.';
$string['connect'] = 'Connecter';
$string['coursecreator'] = 'Créateur de cours';
$string['createkey'] = 'Créer une clé';
$string['cspwarning'] = '<b>Vérifiez les paramètres du CSP.</b><br/>Avant de vous connecter, veuillez vous rendre dans <b>Paramètres de DocSpace - Outils de développement - JavaScript SDK</b> et ajouter l\'adresse du portail Moodle à la liste des adresses autorisées - <u class="font-weight-bold">{$a}</u>';
$string['disconnect'] = 'Déconnecter';
$string['docspaceapikey'] = 'Clé API ONLYOFFICE DocSpace';
$string['docspaceapikey_help'] = 'Avant de connecter l\'application, veuillez vous rendre sur le <b>lien</b>, créer une nouvelle clé API et l\'insérer ici. Vous pouvez créer une clé API avec les autorisations = <b>Toutes</b> ou créer une clé API avec un <b>accès restreint</b>. Dans ce cas, les champs d\'accès suivants doivent être sélectionnés pour que cette application fonctionne correctement : (Profil : lire, Contacts : écrire, Salles : écrire).';
$string['docspaceapperror'] = 'Erreur lors de l\'initialisation. Veuillez vérifier les paramètres CSP de votre DocSpace.';
$string['docspaceautherror'] = 'Le processus d\'authentification a échoué.';
$string['docspaceauthinvalidcredentials'] = 'Échec de l\'authentification. Identifiant/mot de passe incorrect';
$string['docspaceconfigurationerror'] = 'Veuillez d\'abord configurer le plugin sur la page de configuration de ONLYOFFICE DocSpace.';
$string['docspacefilenotfound'] = 'Le fichier requis n\'a pas été trouvé. Veuillez vérifier si le fichier existe toujours ou contacter l\'administrateur.';
$string['docspacelogin'] = 'Login de DocSpace';
$string['docspacenotfound_desc'] = 'Veuillez vous assurer que cette salle se trouve à la même adresse DocSpace Service que celle indiquée dans les paramètres.';
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
$string['docspaceuserrole:power'] = 'Utilisateur';
$string['docspaceuserscategory:title'] = 'Utilisateurs de DocSpace';
$string['docspaceuserscategory:description'] = '
ONLYOFFICE DocSpace, sélectionnez les utilisateurs, puis cliquez sur <b>Inviter à DocSpace</b>.<br/>
Tous les nouveaux utilisateurs seront ajoutés avec le rôle <b>rôle d\'utilisateur</b>. Vous pouvez modifier ce rôle dans les <b>paramètres du compte dans DocSpace</b>.<br/>
Pour supprimer la connexion entre les comptes Moodle et DocSpace, sélectionnez l\'utilisateur et appuyez sur <b>Désassocier le compte DocSpace</b>.';
$string['docspaceuserscategory_desc'] = '
Pour ajouter de nouveaux utilisateurs à ONLYOFFICE DocSpace et commencer à utiliser le plugin, veuillez cliquer sur <b>{$a}</b>.<br/>
Tous les nouveaux utilisateurs seront ajoutés avec le rôle Utilisateur. Vous pouvez modifier ce rôle dans les paramètres de comptes dans DocSpace.';
$string['docspaceuserstatus'] = 'Statut d\'utilisateur de DocSpace';
$string['docspaceusertype'] = 'Type d\'utilisateur DocSpace';
$string['documentserverurldescription'] = 'L\'adresse du service DocSpace spécifie l\'adresse du serveur.';
$string['editingteacher'] = 'Enseignant éditeur';
$string['emptyselection'] = 'Aucun élément sélectionné';
$string['emptyuserslist'] = 'Aucun utilisateur trouvé';
$string['enterfullscreen'] = 'Ouvrir en plein écran';
$string['exitfullscreen'] = 'Quitter le plein écran';
$string['exportusers'] = 'Exporter des utilisateurs';
$string['failedinvitations'] = 'L\'invitation a échoué pour {$a} utilisateur(s). La limite des utilisateurs payés de DocSpace a peut-être été atteinte.';
$string['forgotpassword'] = 'Mot de passe oublié ?';
$string['gotosettings'] = 'Aller aux paramètres';
$string['invalidlink'] = 'Lien invalide';
$string['invitetodocspace'] = 'Inviter à DocSpace';
$string['learnmore'] = 'En savoir plus';
$string['loginmodal:description'] = 'Entrez votre mot de passe DocSpace';
$string['loginmodal:title'] = 'Moodle demande l\'accès à votre ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Se connecter à ONLYOFFICE DocSpace";
$string['manager'] = 'Gestionnaire';
$string['modalloginerror'] = 'Identifiants d\'autorisation non valides. Veuillez vérifier votre adresse e-mail et votre mot de passe, puis réessayez de vous connecter.';
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = '
Le module ONLYOFFICE permet aux utilisateurs de créer et de modifier des documents bureautiques stockés localement dans Moodle à l\'aide d\'ONLYOFFICE Document Server. Il permet à plusieurs utilisateurs de collaborer en temps réel et d\'enregistrer ces modifications dans Moodle

Help us improve ONLYOFFICE plugin - <a href="https://feedback.onlyoffice.com/forums/966080-your-voice-matters?category_id=519288" target="_blank">Partager vos retours</a>.
Pour plus d\'informations, visitez<a href="https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx" target="_blank">le Centre d\'aide</a>.
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
$string['privacy:metadata:onlyofficedocspace_settings'] = 'Ce plugin envoie la clé API DocSpace au service externe ONLYOFFICE DocSpace à des fins d\'authentification.';
$string['privacy:metadata:onlyofficedocspace_settings:api_key'] = 'La clé API est envoyée au service externe pour authentifier les requêtes API.';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'Le mot de passe haché d\'un utilisateur DocSpace tel qu\'il est enregistré dans le service tiers.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Ce plugin envoie les e-mails des utilisateurs au service externe ONLYOFFICE DocSpace à des fins d\'enregistrement et de synchronisation.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'L\'adresse e-mail de l\'utilisateur est envoyée au service externe ONLYOFFICE DocSpace pour la création du compte et la synchronisation.';
$string['rolewarning'] = 'L\'utilisateur Moodle actuel sera ajouté à DocSpace avec le rôle <b>Administrateur de salle</b>.';
$string['roomunavailable'] = 'Room unavailable.';
$string['selecteditemtype:file'] = 'Fichier sélectionné';
$string['selecteditemtype:room'] = 'Salle sélectionnée';
$string['selectelement'] = 'Connectez une salle DocSpace existante <span class="text-nowrap">ou un fichier<span>';
$string['selectelement:room_help'] = 'Cette activité est reliée à une salle publique ONLYOFFICE DocSpace existante, permettant aux étudiants d\'accéder à tous les documents qui s\'y trouvent.';
$string['selectelement:room'] = 'Connecter une salle DocSpace existante';
$string['selectfile'] = 'Sélectionner un fichier';
$string['selectroom'] = 'Parcourir les salles DocSpace';
$string['sentinvitations'] = 'Invitation envoyée avec succès à {$a} utilisateur(s)';
$string['settings'] = 'Paramètres de ONLYOFFICE DocSpace';
$string['settingsintro'] = 'Intégrez les salles publiques de votre DocSpace dans les cours Moodle, permettant ainsi aux enseignants et aux gestionnaires de créer, modifier et partager des fichiers Office avec les étudiants.';
$string['siteadmin'] = 'Administrateur';
$string['skippeddisable'] = 'La désactivation du compte a été ignorée pour {$a} utilisateur(s). Les utilisateurs dont les adresses e-mail sont spécifiées sont peut-être déjà dissociés de DocSpace.';
$string['skippedinvitations'] = 'Invitation ignorée pour {$a} utilisateur(s). Le(s) utilisateur(s) avec le(s) e-mail(s) indiqué(s) existe(nt) peut-être déjà dans DocSpace.';
$string['somethingwentwrong'] = 'Une erreur est survenue';
$string['successfulconnection'] = 'Votre DocSpace a été connecté avec succès !';
$string['successfuldisable'] = 'Le compte DocSpace sélectionné a été désactivé avec succès';
$string['suggestfeature'] = 'Suggérer une fonctionnalité';
$string['teacher'] = 'Enseignant';
$string['unexpectederror:connectdocspace'] = 'Une erreur inattendue est survenue lors de la connexion de DocSpace avec Moodle';
$string['unexpectederror:docspaceurl'] = 'Une erreur inattendue est survenue lors de la vérification de l\'URL DocSpace';
$string['unexpectederror:inviteusers'] = 'Une erreur inattendue est survenue lors de la tentative d\'invitation des utilisateurs dans DocSpace';
$string['unexpectederror:unlinkusers'] = 'Une erreur inattendue est survenue lors de la tentative de dissociation des utilisateurs DocSpace';
$string['unlinkdocspaceaccount'] = 'Dissocier le compte DocSpace';
$string['unlinkwarningmessage'] = 'Voulez-vous vraiment désactiver le compte DocSpace sélectionné ?';
$string['validationerror:emptyapikey'] = 'La valeur de la clé API ne peut pas être vide.';
$string['validationerror:emptyurl'] = 'L\'URL ne peut pas être vide.';
$string['validationerror:invalidapikey'] = 'Clé API DocSpace non valide';
$string['validationerror:invalidurl'] = 'Format d\'URL non valide';
$string['validationerror:password'] = 'Le mot de passe saisi est incorrect';
$string['warning'] = 'Attention';
