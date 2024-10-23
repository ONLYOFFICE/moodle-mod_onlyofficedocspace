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

$string['activityname'] = 'Nom de l’activité';
$string['adminsettings:updated'] = 'Paramètres enregistrés avec succès';
$string['adminsettings:urldescription'] = "Veuillez saisir l’adresse correcte de votre ONLYOFFICE DocSpace.";
$string['adminsettings:urlwarning'] = 'Êtes-vous sûr de vouloir changer le DocSpace actuel pour un autre ? Les identifiants des utilisateurs connectés seront perdus.';
$string['cspwarning'] = '<b>Vérifiez les paramètres du CSP.</b><br/>Avant de vous connecter ici, veuillez vous rendre dans <b>Paramètres de DocSpace - Outils de développement - JavaScript SDK</b> et ajouter l’adresse du portail Moodle à la liste des adresses autorisées - <u class="font-weight-bold">{$a}</u>';
$string['docspaceapperror'] = 'Une erreur s’est produite lors de l’initialisation. Veuillez vérifier vos paramètres DocSpace CSP.';
$string['docspaceautherror'] = 'Le processus d’authentification a échoué.';
$string['docspaceauthinvalidcredentials'] = 'Authentification a échoué. Login/mot de passe est incorrect';
$string['docspaceconfigurationerror'] = 'Veuillez d’abord configurer le plugin sur la page de configuration de ONLYOFFICE DocSpace';
$string['docspacefilenotfound'] = 'Le fichier requis n’a pas été trouvé. Veuillez vérifier si le fichier existe toujours ou contacter l’administrateur.';
$string['docspacelogin'] = 'Login de DocSpace';
$string['docspacepassword'] = 'Mot de passe de DocSpace';
$string['docspacepermissiondenied'] = 'L’utilisateur spécifié n’est pas un administrateur de DocSpace !';
$string['docspacerequestuserserror'] = 'La demande de l’utilisateur de DocSpace a échoué';
$string['docspaceroomnotfound'] = 'La salle demandée n’a pas été trouvée. Veuillez vérifier si la salle existe toujours ou contacter l’administrateur.';
$string['docspaceserverurl'] = 'Adresse du service DocSpace';
$string['docspaceunreachable'] = 'DocSpace n’est pas disponible.';
$string['docspaceuseralreadyexists'] = 'L’utilisateur {$a} existe déjà dans DocSpace !';
$string['docspaceuserinviteerror'] = 'Erreur de création de l’utilisateur {$a} dans DocSpace ! La limite du nombre d’utilisateurs DocSpace payants est peut-être atteinte.';
$string['docspaceusernotfound'] = 'L’utilisateur n’a pas été trouvé dans ONLYOFFICE DocSpace. Veuillez contacter l’administrateur.';
$string['docspaceuserscategory:description'] = 'Pour ajouter de nouveaux utilisateurs à ONLYOFFICE DocSpace et commencer à travailler avec le plugin, veuillez appuyer sur <b>{$a}</b>. Seuls les utilisateurs ayant les rôles de gestionnaire, enseignant et créateur de cours de Moodle peuvent être invités à DocSpace. <br/>Tous les nouveaux utilisateurs seront ajoutés avec le rôle <b>Utilisateur avancé</b>. Vous pouvez modifier le type de rôle dans les paramètres des comptes dans DocSpace. Veuillez noter que le rôle d’ <b>Utilisateur avancé</b> est payant.';
$string['docspaceuserscategory:title'] = 'Utilisateurs de DocSpace';
$string['documentserverurldescription'] = 'L’adresse du service DocSpace spécifie l’adresse du serveur';
$string['enterfullscreen'] = 'Ouvrir en plein écran';
$string['exitfullscreen'] = 'Quitter le plein écran';
$string['failedinvitations'] = 'L’invitation a échoué pour {$a} utilisateur(s). La limite du nombre d’utilisateurs payants de DocSpace a peut-être été atteinte.';
$string['invitetodocspace'] = 'Inviter à DocSpace';
$string['loginmodal:description'] = 'Veuillez saisir votre mot de passe DocSpace';
$string['loginmodal:title'] = 'Moodle demande l’accès à votre ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Se connecter à ONLYOFFICE DocSpace";
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = 'Ce module permet aux utilisateurs de connecter des salles ou des fichiers ONLYOFFICE DocSpace en tant qu’activités dans Moodle pour la collaboration.';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Ajouter une nouvelle activité ONLYOFFICE DocSpace';
$string['onlyofficedocspace:edit'] = 'Modifier l’activité ONLYOFFICE DocSpace';
$string['onlyofficedocspace:view'] = 'Voir l’activité ONLYOFFICE DocSpace';
$string['paramsmissingvalidationerror'] = 'Les paramètres requis sont manquants';
$string['pluginadministration'] = 'Administration de l’activité ONLYOFFICE DocSpace';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['rolewarning'] = 'L’utilisateur Moodle actuel sera ajouté à DocSpace avec le rôle <b>Administrateur de salle</b>';
$string['selecteditemtype:file'] = 'Fichier sélectionné';
$string['selecteditemtype:room'] = 'Salle sélectionnée';
$string['selectelement'] = 'Connecter une salle <span class="text-nowrap">ou un dossier<span> DocSpace existant';
$string['selectelement:room'] = 'Connecter une salle de DocSpace existante';
$string['selectfile'] = 'Sélectionner un fichier';
$string['selectroom'] = 'Sélectionner une salle';
$string['sentinvitations'] = 'Invitation envoyée avec succès à {$a} utilisateur(s)';
$string['settings'] = 'Paramètres de ONLYOFFICE DocSpace';
$string['skippedinvitations'] = 'Invitation ignorée pour {$a} utilisateur(s). Le(s) utilisateur(s) avec le(s) e-mail(s) indiqué(s) existe(nt) peut-être déjà dans DocSpace.';
$string['validationerror:password'] = 'Le mot de passe saisi est incorrect';
