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
$string['adminsettings:urlwarning'] = 'Êtes-vous sûr de vouloir changer DocSpace actuel pour un autre ? Les identifiants des utilisateurs connectés seront perdus.';
$string['cspwarning'] = '<b>Vérifiez les paramètres du CSP.</b><br/>Avant de vous connecter, veuillez vous rendre dans <b>Paramètres de DocSpace - Outils de développement - JavaScript SDK</b> et ajouter l\'adresse du portail Moodle à la liste des adresses autorisées - <u class="font-weight-bold">{$a}</u>';
$string['docspaceapperror'] = 'Erreur lors de l\'initialisation. Veuillez vérifier les paramètres CSP de votre DocSpace.';
$string['docspaceautherror'] = 'Le processus d\'authentification a échoué.';
$string['docspaceauthinvalidcredentials'] = 'Échec de l\'authentification. Identifiant/mot de passe incorrect';
$string['docspaceconfigurationerror'] = 'Veuillez d\'abord configurer le plugin sur la page de configuration de ONLYOFFICE DocSpace.';
$string['docspacefilenotfound'] = 'Le fichier requis n\'a pas été trouvé. Veuillez vérifier si le fichier existe toujours ou contacter l\'administrateur.';
$string['docspacelogin'] = 'Login de DocSpace';
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
$string['docspaceuserscategory:title'] = 'Utilisateurs de DocSpace';
$string['docspaceuserstatus'] = 'Statut d\'utilisateur de DocSpace';
$string['docspaceusertype'] = 'Type d\'utilisateur DocSpace';
$string['documentserverurldescription'] = 'L\'adresse du service DocSpace spécifie l\'adresse du serveur.';
$string['emptyselection'] = 'Aucun élément sélectionné';
$string['enterfullscreen'] = 'Ouvrir en plein écran';
$string['exitfullscreen'] = 'Quitter le plein écran';
$string['exportusers'] = 'Exporter des utilisateurs';
$string['failedinvitations'] = 'L\'invitation a échoué pour {$a} utilisateur(s). La limite des utilisateurs payés de DocSpace a peut-être été atteinte.';
$string['invitetodocspace'] = 'Inviter à DocSpace';
$string['loginmodal:description'] = 'Entrez votre mot de passe DocSpace';
$string['loginmodal:title'] = 'Moodle demande l\'accès à votre ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Se connecter à ONLYOFFICE DocSpace";
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Ajouter une nouvelle activité ONLYOFFICE DocSpace';
$string['onlyofficedocspace:edit'] = 'Modifier l\'activité de ONLYOFFICE DocSpace';
$string['onlyofficedocspace:view'] = 'Afficher l\'activité de ONLYOFFICE DocSpace';
$string['paramsmissingvalidationerror'] = 'Les identifiants requis sont manquants';
$string['pluginadministration'] = 'Administration de l\'activité de ONLYOFFICE DocSpace';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = 'Ce plugin stocke les identifiants des utilisateurs de ONLYOFFICE DocSpace dans la base de données Moodle à des fins d\'authentification.';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = 'L\'adresse e-mail d\'un utilisateur de DocSpace tel qu\'il est enregistré dans le service tiers.';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'Le mot de passe haché d\'un utilisateur DocSpace tel qu\'il est enregistré dans le service tiers.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Ce plugin envoie les e-mails des utilisateurs au service externe ONLYOFFICE DocSpace à des fins d\'enregistrement et de synchronisation.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'L\'adresse e-mail de l\'utilisateur est envoyée au service externe ONLYOFFICE DocSpace pour la création du compte et la synchronisation.';
$string['rolewarning'] = 'L\'utilisateur Moodle actuel sera ajouté à DocSpace avec le rôle <b>Administrateur de salle</b>.';
$string['selecteditemtype:file'] = 'Fichier sélectionné';
$string['selecteditemtype:room'] = 'Salle sélectionnée';
$string['selectelement'] = 'Connectez une salle DocSpace existante <span class="text-nowrap">ou un fichier<span>';
$string['selectelement:room'] = 'Connecter une salle DocSpace existante';
$string['selectfile'] = 'Sélectionner un fichier';
$string['sentinvitations'] = 'Invitation envoyée avec succès à {$a} utilisateur(s)';
$string['settings'] = 'Paramètres de ONLYOFFICE DocSpace';
$string['skippedinvitations'] = 'Invitation ignorée pour {$a} utilisateur(s). Le(s) utilisateur(s) avec le(s) e-mail(s) indiqué(s) existe(nt) peut-être déjà dans DocSpace.';
$string['validationerror:password'] = 'Le mot de passe saisi est incorrect';
