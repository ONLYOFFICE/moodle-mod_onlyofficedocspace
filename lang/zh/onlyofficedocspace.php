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

$string['activityname'] = '活动名称';
$string['adminsettings:updated'] = '设置已成功保存';
$string['adminsettings:urlwarning'] = '您确定要将当前的协作空间更改为其他协作空间吗？已连接的用户登录信息将会丢失。';
$string['cspwarning'] = '<b>检查 CSP 设置。</b><br/>在此连接之前，请前往 <b>协作空间设置 - 开发者工具 - JavaScript SDK</b>，并将 Moodle 门户地址添加到允许列表 - <u class="font-weight-bold">{$a}</u>';
$string['docspaceapperror'] = '初始化过程中出错。请检查您的协作空间 CSP 设置。';
$string['docspaceautherror'] = '身份验证过程失败。';
$string['docspaceauthinvalidcredentials'] = '身份验证失败。登录名/密码不正确。';
$string['docspaceconfigurationerror'] = '请先在 ONLYOFFICE 协作空间设置页面配置插件';
$string['docspacefilenotfound'] = '未找到所需文件。请检查该文件是否仍然存在或联系管理员。';
$string['docspacelogin'] = '协作空间登录';
$string['docspacepassword'] = '协作空间密码';
$string['docspacepermissiondenied'] = '指定的用户不是协作空间管理员！';
$string['docspacerequestuserserror'] = '协作空间用户请求失败';
$string['docspaceroomnotfound'] = '未找到所需的房间。请检查房间是否仍然存在或联系管理员。';
$string['docspaceserverurl'] = '协作空间服务地址';
$string['docspaceunreachable'] = '协作空间不可用。';
$string['docspaceuseralreadyexists'] = '协作空间中已存在用户 {$a}！';
$string['docspaceuserinviteerror'] = '在协作空间中创建用户 {$a} 时出错！可能已达到协作空间付费用户数量上限。';
$string['docspaceusernotfound'] = '在 ONLYOFFICE 协作空间中未找到该用户。请联系管理员。';
$string['docspaceuserrole:admin'] = '房间管理员';
$string['docspaceuserscategory:title'] = '协作空间用户';
$string['docspaceuserstatus'] = '协作空间用户状态';
$string['docspaceusertype'] = '协作空间用户类型';
$string['documentserverurldescription'] = '协作空间服务地址指定服务器地址';
$string['emptyselection'] = '未选择任何内容';
$string['enterfullscreen'] = '打开全屏';
$string['exitfullscreen'] = '退出全屏';
$string['exportusers'] = '导出用户';
$string['failedinvitations'] = '邀请 {$a} 位用户失败。协作空间付费用户数量可能已达上限。';
$string['invitetodocspace'] = '邀请加入协作空间';
$string['loginmodal:description'] = '请输入协作空间密码';
$string['loginmodal:title'] = 'Moodle 请求访问您的 ONLYOFFICE 协作空间';
$string['logintodocspace'] = "登录 ONLYOFFICE 协作空间";
$string['modulename'] = 'ONLYOFFICE 协作空间';
$string['modulenameplural'] = 'ONLYOFFICE 协作空间';
$string['onlyofficedocspace:addinstance'] = '添加新的 ONLYOFFICE 协作空间活动';
$string['onlyofficedocspace:edit'] = '编辑 ONLYOFFICE 协作空间活动';
$string['onlyofficedocspace:view'] = '查看 ONLYOFFICE 协作空间活动';
$string['paramsmissingvalidationerror'] = '缺少必需的凭据';
$string['pluginadministration'] = 'ONLYOFFICE 协作空间活动管理';
$string['pluginname'] = 'ONLYOFFICE 协作空间';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = '此插件将 ONLYOFFICE 协作空间用户凭据存储在 Moodle 数据库中以用于身份验证。';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = '在第三方服务中注册的协作空间用户的电子邮件地址。';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = '在第三方服务中注册的协作空间用户的哈希密码。';
$string['privacy:metadata:onlyofficedocspace_users'] = '此插件将用户电子邮件发送到外部服务 ONLYOFFICE 协作空间，用于注册和同步。';
$string['privacy:metadata:onlyofficedocspace_users:email'] = '用户的电子邮件地址将发送到外部服务 ONLYOFFICE 协作空间，用于帐户创建和同步。';
$string['rolewarning'] = '当前 Moodle 用户将以<b>房间管理员</b>角色添加到协作空间。';
$string['selecteditemtype:file'] = '选定文件';
$string['selecteditemtype:room'] = '选定房间';
$string['selectelement'] = '连接现有协作空间房间<span class="text-nowrap">或文件<span>';
$string['selectelement:room'] = '连接现有协作空间房间';
$string['selectfile'] = '选择文件';
$string['sentinvitations'] = '已成功向 {$a} 位用户发送邀请';
$string['settings'] = 'ONLYOFFICE 协作空间设置';
$string['skippedinvitations'] = '已跳过对 {$a} 位用户的邀请。具有指定电子邮件的用户可能已存在于协作空间中。';
$string['validationerror:password'] = '您输入的密码不正确';
