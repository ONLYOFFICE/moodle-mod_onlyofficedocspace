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

$string['activityname'] = 'アクティビティ名';
$string['adminsettings:updated'] = '設定が正常に保存されました';
$string['adminsettings:urldescription'] = "ONLYOFFICE DocSpaceの正しいアドレスを入力してください。";
$string['adminsettings:urlwarning'] = '現在のDocSpaceを別のものに変更してもよろしいですか？接続中のユーザーのログインは失われます。';
$string['cspwarning:body'] = '接続する前に、<b>DocSpace設定→開発者ツール→JavaScript SDK</b>に移動し、Moodleポータルのアドレスを許可リストに追加してください。';
$string['cspwarning:head'] = 'CSPの設定を確認してください。';
$string['docspaceapperror'] = '初期化中にエラーが発生しました。DocSpace CSPの設定をご確認ください。';
$string['docspaceautherror'] = '認証プロセスに失敗しました。';
$string['docspaceauthinvalidcredentials'] = '認証に失敗しました。ログイン名/パスワードが間違っています。';
$string['docspaceconfigurationerror'] = 'ONLYOFFICE DocSpaceの設定ページで、まずプラグインを設定してください。';
$string['docspacefilenotfound'] = '必要なファイルが見つかりませんでした。ファイルがまだ存在しているか確認するか、管理者に連絡してください。';
$string['docspacelogin'] = 'DocSpace ログイン';
$string['docspacepassword'] = 'DocSpace パスワード';
$string['docspacepermissiondenied'] = '指定されたユーザーはDocSpaceの管理者ではありません。';
$string['docspacerequestuserserror'] = 'DocSpaceユーザーのリクエストは失敗しました。';
$string['docspaceroomnotfound'] = '必要なルームが見つかりませんでした。ルームがまだ存在しているか確認するか、管理者に連絡してください。';
$string['docspaceserverurl'] = 'DocSpaceサービスアドレス';
$string['docspaceunreachable'] = 'DocSpaceはご利用いただけません。';
$string['docspaceuserinviteerror'] = '招待プロセスに失敗しました。';
$string['docspaceusernotfound'] = 'ユーザーはONLYOFFICE DocSpaceで見つかりませんでした。管理者に連絡してください。';
$string['docspaceuserscategory:description'] = 'ONLYOFFICE DocSpaceに新しいユーザーを追加し、プラグインでの作業を開始するには、<b>{$a}</b>を押してください。DocSpaceに招待できるのは、Moodleの役割がマネージャー、教師、コース作成者のユーザーのみです。すべての新規ユーザーは、<b>パワーユーザー</b>の役割で追加されます。DocSpaceのアカウント設定で役割の種類を変更できます。ご注意：<b>パワーユーザー</b>の役割は有料です。';
$string['docspaceuserscategory:title'] = 'DocSpace ユーザー';
$string['documentserverurldescription'] = 'DocSpaceサービスアドレスは、サーバーのアドレスを指定します。';
$string['enterfullscreen'] = '全画面表示';
$string['exitfullscreen'] = '全画面表示を終了';
$string['failedinvitations'] = '{$a}ユーザーの招待に失敗しました。';
$string['invitetodocspace'] = 'DocSpaceへの招待';
$string['loginmodal:description'] = 'DocSpaceのパスワードを入力してください。';
$string['loginmodal:title'] = 'MoodleはONLYOFFICE DocSpaceへのアクセスを要求します。';
$string['logintodocspace'] = "ONLYOFFICE DocSpacにログインする";
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = 'このモジュールを使用すると、ユーザーはONLYOFFICE DocSpaceのルームまたはファイルをコラボレーション用の活動としてMoodleに接続することができます。';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = '新しいONLYOFFICE DocSpaceアクティビティを追加する';
$string['onlyofficedocspace:edit'] = 'ONLYOFFICE DocSpaceアクティビティの編集';
$string['onlyofficedocspace:view'] = 'ONLYOFFICE DocSpaceアクティビティを表示';
$string['paramsmissingvalidationerror'] = '必要なパラメータが欠落しています。';
$string['pluginadministration'] = 'ONLYOFFICE DocSpaceアクティビティ管理';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['selecteditemtype:file'] = '選択されたファイル';
$string['selecteditemtype:room'] = '選択されたルーム';
$string['selectelement'] = '既存のDocSpaceルームに接続する<span class="text-nowrap">か、ファイル<span>に接続する';
$string['selectelement:room'] = '既存のDocSpaceルームに接続する';
$string['selectfile'] = 'ファイルの選択';
$string['selectroom'] = 'ルームの選択';
$string['sentinvitations'] = '招待状は{$a}ユーザーに正常に送信されました。';
$string['settings'] = 'ONLYOFFICE DocSpace 設定';
$string['skippedinvitations'] = '{$a}ユーザーへの招待状は省略されました。指定されたメールアドレスを持つユーザーは、DocSpaceにすでに存在している可能性があります。';
$string['validationerror:password'] = '入力されたパスワードが正しくありません';
