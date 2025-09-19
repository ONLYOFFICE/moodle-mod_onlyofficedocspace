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
$string['adminsettings:urldescription'] = '请在上面的字段中输入协作空间 URL。例如，https://yourcompany.docspace.com。';
$string['adminsettings:urlwarning'] = '您确定要将当前的协作空间更改为其他协作空间吗？已连接的用户登录信息将会丢失。';
$string['change'] = '更改';
$string['confirmchange_desc'] = '如果您点击“断开连接”按钮，您将无法访问当前连接的 ONLYOFFICE 协作空间。这将删除房间和活动之间的连接，并断开所有用户的连接。';
$string['confirmdisconnect_desc'] = '如果您点击“更改”按钮，必须重新输入当前连接的 ONLYOFFICE 协作空间凭据。房间和活动之间的连接可能会丢失。有关可选用户导出的信息不会被删除。';
$string['connect'] = '连接';
$string['coursecreator'] = '课程创建者';
$string['createkey'] = '创建密钥';
$string['cspwarning'] = '<b>检查 CSP 设置。</b><br/>在此连接之前，请前往 <b>协作空间设置 - 开发者工具 - JavaScript SDK</b>，并将 Moodle 门户地址添加到允许列表 - <u class="font-weight-bold">{$a}</u>';
$string['disconnect'] = '断开连接';
$string['docspaceapikey'] = 'ONLYOFFICE 协作空间 API 密钥';
$string['docspaceapikey_help'] = '连接应用前，请前往<b>链接</b>，创建新的 API 密钥并在此处插入。您可以创建权限为<b>全部</b>的 API 密钥，也可以创建权限为<b>受限</b>的 API 密钥。在这种情况下，应选择以下访问范围以确保此应用有效运行：（个人资料：读取，联系人：写入，房间：写入）。';
$string['docspaceapperror'] = '初始化过程中出错。请检查您的协作空间 CSP 设置。';
$string['docspaceautherror'] = '身份验证过程失败。';
$string['docspaceauthinvalidcredentials'] = '身份验证失败。登录名/密码不正确。';
$string['docspaceconfigurationerror'] = '请先在 ONLYOFFICE 协作空间设置页面配置插件';
$string['docspacefilenotfound'] = '未找到所需文件。请检查该文件是否仍然存在或联系管理员。';
$string['docspacelogin'] = '协作空间登录';
$string['docspacenotfound_desc'] = '请确保此房间与设置中指定的协作空间服务地址相同。';
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
$string['docspaceuserrole:power'] = '用户';
$string['docspaceuserscategory:description'] = '
要将新用户添加到 ONLYOFFICE 协作空间，请选择用户，然后按<b>邀请到协作空间</b>。<br/>
所有新用户都将添加为<b>用户角色</b>，您可以在<b>协作空间中的帐户设置</b>中更改角色。<br/>
要删除 Moodle 和协作空间帐户之间的连接，请选择用户，然后按<b>取消链接协作空间帐户</b>。';
$string['docspaceuserscategory:title'] = '协作空间用户';
$string['docspaceuserscategory_desc'] = '
要将新用户添加到 ONLYOFFICE 协作空间并开始使用插件，请按<b>{$a}</b>。<br/>
所有新用户都将添加为用户角色，您可以在协作空间中的帐户设置中更改角色。';
$string['docspaceuserstatus'] = '协作空间用户状态';
$string['docspaceusertype'] = '协作空间用户类型';
$string['documentserverurldescription'] = '协作空间服务地址指定服务器地址';
$string['emptyselection'] = '未选择任何内容';
$string['editingteacher'] = '编辑教师';
$string['enterfullscreen'] = '打开全屏';
$string['emptyuserslist'] = '未找到用户';
$string['exitfullscreen'] = '退出全屏';
$string['exportusers'] = '导出用户';
$string['failedinvitations'] = '邀请 {$a} 位用户失败。协作空间付费用户数量可能已达上限。';
$string['forgotpassword'] = '忘记密码？';
$string['gotosettings'] = '转到设置';
$string['invalidlink'] = '链接无效';
$string['invitetodocspace'] = '邀请加入协作空间';
$string['learnmore'] = '了解更多';
$string['loginmodal:description'] = '请输入协作空间密码';
$string['loginmodal:title'] = 'Moodle 请求访问您的 ONLYOFFICE 协作空间';
$string['logintodocspace'] = "登录 ONLYOFFICE 协作空间";
$string['manager'] = '管理员';
$string['modalloginerror'] = '授权凭证无效。请检查您的邮箱和密码，重新登录。';
$string['modulename'] = 'ONLYOFFICE 协作空间';
$string['modulename_help'] = '
ONLYOFFICE 模块允许用户使用 ONLYOFFICE 文档服务器创建和编辑存储在 Moodle 本地的办公文档，允许多个用户实时协作并将更改保存回 Moodle。

帮助我们改进 ONLYOFFICE 插件 - <a href="https://feedback.onlyoffice.com/forums/966080-your-voice-matters?category_id=519288" target="_blank">分享反馈</a>。
更多信息请访问 <a href="https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx" target="_blank">帮助中心</a>。
';
$string['modulenameplural'] = 'ONLYOFFICE 协作空间';
$string['onlyofficedocspace:addinstance'] = '添加新的 ONLYOFFICE 协作空间活动';
$string['onlyofficedocspace:edit'] = '编辑 ONLYOFFICE 协作空间活动';
$string['onlyofficedocspace:view'] = '查看 ONLYOFFICE 协作空间活动';
$string['paramsmissingvalidationerror'] = '缺少必需的凭据';
$string['pluginadministration'] = 'ONLYOFFICE 协作空间活动管理';
$string['pluginname'] = 'ONLYOFFICE 协作空间';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = '此插件将 ONLYOFFICE 协作空间用户凭据存储在 Moodle 数据库中以用于身份验证。';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = '在第三方服务中注册的协作空间用户的电子邮件地址。';
$string['privacy:metadata:onlyofficedocspace_settings'] = '此插件将协作空间 API 密钥发送到外部服务 ONLYOFFICE 协作空间进行身份验证。';
$string['privacy:metadata:onlyofficedocspace_settings:api_key'] = 'API 密钥已发送到外部服务以验证 API 请求。';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = '在第三方服务中注册的协作空间用户的哈希密码。';
$string['privacy:metadata:onlyofficedocspace_users'] = '此插件将用户电子邮件发送到外部服务 ONLYOFFICE 协作空间，用于注册和同步。';
$string['privacy:metadata:onlyofficedocspace_users:email'] = '用户的电子邮件地址将发送到外部服务 ONLYOFFICE 协作空间，用于帐户创建和同步。';
$string['rolewarning'] = '当前 Moodle 用户将以<b>房间管理员</b>角色添加到协作空间。';
$string['roomunavailable'] = '房间不可用。';
$string['selecteditemtype:file'] = '选定文件';
$string['selecteditemtype:room'] = '选定房间';
$string['selectelement'] = '连接现有协作空间房间<span class="text-nowrap">或文件<span>';
$string['selectelement:room_help'] = '此活动连接到现有的 ONLYOFFICE 协作空间公共房间，支持学生查看文档。';
$string['selectelement:room'] = '连接现有协作空间房间';
$string['selectfile'] = '选择文件';
$string['selectroom'] = '浏览协作空间房间';
$string['sentinvitations'] = '已成功向 {$a} 位用户发送邀请';
$string['settings'] = 'ONLYOFFICE 协作空间设置';
$string['settingsintro'] = '将协作空间中的房间嵌入到 Moodle 课程中，使教师和管理人员能够创建、编辑和与学生共享办公文件。';
$string['siteadmin'] = '站点管理员';
$string['skippeddisable'] = '已跳过 {$a} 个用户的账户禁用操作，这些用户的邮箱地址可能已与协作空间解除关联。';
$string['skippedinvitations'] = '已跳过对 {$a} 位用户的邀请。具有指定电子邮件的用户可能已存在于协作空间中。';
$string['somethingwentwrong'] = '出现问题';
$string['successfulconnection'] = '您的协作空间已成功连接！';
$string['successfuldisable'] = '所选协作空间帐户已成功禁用';
$string['suggestfeature'] = '建议功能';
$string['teacher'] = '教师';
$string['unexpectederror:connectdocspace'] = '协作空间与 Moodle 连接时发生意外错误';
$string['unexpectederror:docspaceurl'] = '检查协作空间 URL 时发生意外错误';
$string['unexpectederror:inviteusers'] = '尝试邀请用户加入协作空间时发生意外错误';
$string['unexpectederror:unlinkusers'] = '尝试取消链接协作空间用户时发生意外错误';
$string['unlinkdocspaceaccount'] = '取消链接协作空间帐户';
$string['unlinkwarningmessage'] = '您确定要禁用所选协作空间帐户吗？';
$string['validationerror:emptyapikey'] = 'API 密钥值不能为空。';
$string['validationerror:emptyurl'] = 'URL 不能为空';
$string['validationerror:invalidapikey'] = '无效的协作空间 API 密钥';
$string['validationerror:invalidurl'] = '无效的 URL 格式';
$string['validationerror:password'] = '您输入的密码不正确';
$string['warning'] = '警告';
