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

$string['activityname'] = 'Activity Name';
$string['adminsettings:updated'] = 'Settings saved successfully';
$string['adminsettings:urldescription'] = 'Enter the URL of your DocSpace in the field above. For example, https://yourcompany.docspace.com.';
$string['adminsettings:urlwarning'] = 'Are you sure you want to change the current DocSpace to another one? Connected user logins will be lost.';
$string['cspwarning'] = '<b>Check the CSP settings.</b><br/>Before connecting here, please go to the <b>DocSpace Settings - Developer tools - JavaScript SDK</b> and add the Moodle portal address to the allow list - <u class="font-weight-bold">{$a}</u>';
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
$string['docspaceuserrole:admin'] = 'Room admin';
$string['docspaceuserrole:power'] = 'Power user';
$string['docspaceuserscategory:description'] = 'To add new users to ONLYOFFICE DocSpace and start working with the plugin, please press <b>{$a}</b>. Only users with the roles of Manager, Teacher, and Course creator from Moodle can be invited to DocSpace. <br/> All new users will be added with <b>Power user</b> role. You can change the role type in the Accounts settings in DocSpace. Please note: <b>Power user</b> role is paid.';
$string['docspaceuserscategory:title'] = 'DocSpace users';
$string['docspaceuserstatus'] = 'DocSpace user status';
$string['docspaceusertype'] = 'DocSpace user type';
$string['documentserverurldescription'] = 'The DocSpace Service Address specifies the address of the server ';
$string['emptyselection'] = 'Nothing selected';
$string['enterfullscreen'] = 'Open full screen';
$string['exitfullscreen'] = 'Exit full screen';
$string['exportusers'] = 'Export users';
$string['failedinvitations'] = 'Invitation failed for {$a} user(s). The limit of paid DocSpace users may have been reached.';
$string['invitetodocspace'] = 'Invite to DocSpace';
$string['loginmodal:description'] = 'Please enter your DocSpace password';
$string['loginmodal:title'] = 'Moodle requests access to your ONLYOFFICE DocSpace';
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
$string['privacy:metadata:onlyofficedocspace_settings'] = 'This plugin sends DocSpace API key to the external service ONLYOFFICE DocSpace for authentication.';
$string['privacy:metadata:onlyofficedocspace_settings:api_key'] = 'The API key is sent to the external service to authenticate API requests.';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = 'This plugin stores ONLYOFFICE DocSpace user credentials in the Moodle database for authentication purposes.';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = 'The email of a DocSpace user as registered in the third-party service.';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'The hashed password of a DocSpace user as registered in the third-party service.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'This plugin sends user emails to the external service ONLYOFFICE DocSpace for registration and synchronization purposes.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'The user’s email address is sent to the external service ONLYOFFICE DocSpace for account creation and synchronization.';
$string['rolewarning'] = 'The current Moodle user will be added to DocSpace with the <b>Room admin</b> role';
$string['selecteditemtype:file'] = 'Selected file';
$string['selecteditemtype:room'] = 'Selected room';
$string['selectelement'] = 'Connect existing DocSpace room <span class="text-nowrap">or file<span>';
$string['selectelement:room'] = 'Connect existing DocSpace room';
$string['selectfile'] = 'Select file';
$string['selectroom'] = 'Select room';
$string['sentinvitations'] = 'Invitation successfully sent to {$a} user(s)';
$string['settings'] = 'ONLYOFFICE DocSpace Settings';
$string['skippedinvitations'] = 'Invitation skipped for {$a} user(s). User(s) with the indicated email(s) may already exist in DocSpace.';
$string['validationerror:password'] = 'Password you entered is incorrect';
$string['settingsintro'] = 'Embed public rooms from your DocSpace into Moodle courses, enabling teachers and managers to create, edit, and share office files with students.';
$string['learnmore'] = 'Learn more';
$string['suggestfeature'] = 'Suggest a feature';
$string['validationerror:emptyurl'] = 'URL cannot be empty';
$string['validationerror:invalidurl'] = 'Invalid URL format';
$string['warning'] = 'Warning';
$string['unlinkwarningmessage'] = 'Are you sure you want to disable the selected DocSpace account?';
$string['connect'] = 'Connect';
$string['change'] = 'Change';
$string['disconnect'] = 'Disconnect';
$string['confirmchange_desc'] = 'If you press the Disconnect button, you will not have access to the currently connected ONLYOFFICE DocSpace. This will remove the connections between Rooms and Activities, and disconnect all users.';
$string['confirmdisconnect_desc'] = 'If you press the Change button, you will have to re-enter the credentials for the currently connected ONLYOFFICE DocSpace. Connections between Rooms and Activities might be lost. Information about optional user export won’t be deleted.';
$string['docspaceapikey'] = 'ONLYOFFICE DocSpace API key';
$string['validationerror:invalidapikey'] = 'Invalid DocSpace API key';
$string['validationerror:emptyapikey'] = 'API Key value cannot be empty.';
