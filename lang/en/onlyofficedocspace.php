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

$string['activityname'] = 'Activity Name';
$string['adminsettings:updated'] = 'Settings saved successfully';
$string['adminsettings:urldescription'] = "Please enter the correct address of your ONLYOFFICE DocSpace.";
$string['adminsettings:urlwarning'] = 'Are you sure you want to change the current DocSpace to another one? Connected user logins will be lost.';
$string['cspwarning:body'] = 'Before connecting here, please go to the <b>DocSpace Settings - Developer tools - JavaScript SDK</b> and add the Moodle portal address to the allow list';
$string['cspwarning:head'] = 'Check the CSP settings.';
$string['docspaceapperror'] = 'Error during initialization. Please check your DocSpace CSP settings.';
$string['docspaceautherror'] = 'The authentication process has failed.';
$string['docspaceauthinvalidcredentials'] = 'Authentication failed. Incorrect login/password';
$string['docspaceconfigurationerror'] = 'Please configure the plugin first on the ONLYOFFICE DocSpace settings page';
$string['docspacefilenotfound'] = 'The required file was not found. Please check if the file still exist or contact the administrator.';
$string['docspacelogin'] = 'DocSpace Login';
$string['docspacepassword'] = 'DocSpace Password';
$string['docspacepermissiondenied'] = 'The specified user is not a DocSpace administrator!';
$string['docspacerequestuserserror'] = 'DocSpace user request has failed';
$string['docspaceroomnotfound'] = 'The required room was not found. Please check if the room still exist or contact the administrator.';
$string['docspaceserverurl'] = 'DocSpace Service Address';
$string['docspaceunreachable'] = 'DocSpace is unavailable.';
$string['docspaceuseralreadyexists'] = 'User {$a} already exists in DocSpace!';
$string['docspaceuserinviteerror'] = 'Error create user {$a} in DocSpace! The limit of paid DocSpace users may have been reached.';
$string['docspaceusernotfound'] = 'The user was not found in ONLYOFFICE DocSpace. Please, contact the administrator.';
$string['docspaceuserscategory:description'] = 'To add new users to ONLYOFFICE DocSpace and start working with the plugin, please press <b>{$a}</b>. Only users with the roles of Manager, Teacher, and Course creator from Moodle can be invited to DocSpace. <br/> All new users will be added with <b>Power user</b> role. You can change the role type in the Accounts settings in DocSpace. Please note: <b>Power user</b> role is paid.';
$string['docspaceuserscategory:title'] = 'DocSpace users';
$string['documentserverurldescription'] = 'The DocSpace Service Address specifies the address of the server ';
$string['enterfullscreen'] = 'Open full screen';
$string['exitfullscreen'] = 'Exit full screen';
$string['failedinvitations'] = 'Invitation failed for {$a} user(s). The limit of paid DocSpace users may have been reached.';
$string['invitetodocspace'] = 'Invite to DocSpace';
$string['loginmodal:description'] = 'Please enter your DocSpace password';
$string['loginmodal:title'] = 'Moodle requests access to your ONLYOFFICE DocSpace';
$string['logintodocspace'] = "Log in to ONLYOFFICE DocSpace";
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = 'This module enables users to connect ONLYOFFICE DocSpace rooms as activities in Moodle for collaboration.';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = 'Add a new ONLYOFFICE DocSpace activity';
$string['onlyofficedocspace:edit'] = 'Edit ONLYOFFICE DocSpace activity';
$string['onlyofficedocspace:view'] = 'View ONLYOFFICE DocSpace activity';
$string['paramsmissingvalidationerror'] = 'Required credentials are missing';
$string['pluginadministration'] = 'ONLYOFFICE DocSpace activity administration';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['selecteditemtype:file'] = 'Selected file';
$string['selecteditemtype:room'] = 'Selected room';
$string['selectelement'] = 'Connect existing DocSpace room <span class="text-nowrap">or file<span>';
$string['selectelement:room'] = 'Connect existing DocSpace room';
$string['selectfile'] = 'Select file';
$string['selectroom'] = 'Select room';
$string['sentinvitations'] = 'Invitation successfully sent to {$a} user(s)';
$string['settings'] = 'ONLYOFFICE DocSpace Settings';
$string['skippedinvitations'] = 'Invitation skipped for {$a} user(s). User(s) with the indicated email(s) may already exist in DocSpace.';
$string['rolewarning'] = 'The current Moodle user will be added to DocSpace with the <b>Room admin</b> role';
$string['validationerror:password'] = 'Password you entered is incorrect';
