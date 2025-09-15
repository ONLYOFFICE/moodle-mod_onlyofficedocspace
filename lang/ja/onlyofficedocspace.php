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

$string['activityname'] = 'アクティビティ名';
$string['adminsettings:updated'] = '設定が正常に保存されました';
$string['adminsettings:urlwarning'] = '現在のDocSpaceを別のDocSpaceに変更してもよろしいですか？接続中のユーザーのログイン情報は失われます。';
$string['cspwarning'] = '<b>CSP設定をご確認ください。</b><br/>ここに接続する前に、<b>DocSpace設定 → 開発者ツール → JavaScript SDK</b>に移動し、許可リストにMoodleポータルアドレスを追加してください - <u class="font-weight-bold">{$a}</u>';
$string['docspaceapperror'] = 'E初期化中にエラーが発生しました。DocSpace CSP設定をご確認ください。';
$string['docspaceautherror'] = '認証プロセスに失敗しました。';
$string['docspaceauthinvalidcredentials'] = '認証に失敗しました。ログイン名またはパスワードが正しくないようです。';
$string['docspaceconfigurationerror'] = 'まず、ONLYOFFICE DocSpace設定ページでプラグインを設定してください。';
$string['docspacefilenotfound'] = '必要なファイルが見つかりませんでした。ファイルがまだ存在するか、管理者にお問い合わせください。';
$string['docspacelogin'] = 'DocSpaceログイン';
$string['docspacepassword'] = 'DocSpaceパスワード';
$string['docspacepermissiondenied'] = '指定されたユーザーはDocSpace管理者ではありません！';
$string['docspacerequestuserserror'] = 'DocSpaceユーザーのリクエストに失敗しました。';
$string['docspaceroomnotfound'] = '必要なルームが見つかりませんでした。ルームがまだ存在するか確認するか、管理者にお問い合わせください。';
$string['docspaceserverurl'] = 'DocSpaceサービスアドレス';
$string['docspaceunreachable'] = 'DocSpaceは現在ご利用いただけません。';
$string['docspaceuseralreadyexists'] = '{$a} というユーザーは DocSpaceにすでに存在します。';
$string['docspaceuserinviteerror'] = 'DocSpaceでユーザー {$a} を作成できませんでした。有料DocSpaceユーザーの制限に達している可能性があります。';
$string['docspaceusernotfound'] = 'ONLYOFFICE DocSpaceでユーザーが見つかりませんでした。管理者にお問い合わせください。';
$string['docspaceuserrole:admin'] = 'ルーム管理者';
$string['docspaceuserscategory:title'] = 'DocSpaceユーザー';
$string['docspaceuserstatus'] = 'DocSpaceユーザーのステータス';
$string['docspaceusertype'] = 'DocSpaceユーザーのタイプ';
$string['documentserverurldescription'] = 'DocSpaceサービスアドレスは、サーバーのアドレスを指定します';
$string['emptyselection'] = '何も選択されていません';
$string['enterfullscreen'] = '全画面表示';
$string['exitfullscreen'] = '全画面表示を終了';
$string['exportusers'] = 'ユーザーのエクスポート';
$string['failedinvitations'] = '{$a}人のユーザーの招待に失敗しました。有料DocSpaceユーザの制限に達した可能性があります。';
$string['invitetodocspace'] = 'DocSpaceに招待する';
$string['loginmodal:description'] = 'DocSpaceのパスワードを入力してください';
$string['loginmodal:title'] = 'MoodleがONLYOFFICE DocSpaceへのアクセスを要求しています';
$string['logintodocspace'] = "ONLYOFFICE DocSpaceにログインしてください";
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulenameplural'] = 'ONLYOFFICE DocSpace';
$string['onlyofficedocspace:addinstance'] = '新しい ONLYOFFICE DocSpace アクティビティを追加してください';
$string['onlyofficedocspace:edit'] = 'ONLYOFFICE DocSpaceアクティビティを編集';
$string['onlyofficedocspace:view'] = 'ONLYOFFICE DocSpaceアクティビティを表示';
$string['paramsmissingvalidationerror'] = '必要な認証情報が不足しています';
$string['pluginadministration'] = 'ONLYOFFICE DocSpaceアクティビティの管理';
$string['pluginname'] = 'ONLYOFFICE DocSpace';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = 'このプラグインは、認証のためにONLYOFFICE DocSpaceユーザーの認証情報をMoodleデータベースに保存します。';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = '第三者サービスに登録されたDocSpaceユーザーのメールアドレスです。';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = '第三者サービスに登録されているDocSpaceユーザーのハッシュ化されたパスワードです。';
$string['privacy:metadata:onlyofficedocspace_users'] = 'このプラグインは、登録と同期のためにユーザーメールアドレスを外部サービスONLYOFFICE DocSpaceに送信します。';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'ユーザーのメールアドレスは、アカウント作成と同期のために外部サービスONLYOFFICE DocSpaceに送信されます。';
$string['rolewarning'] = '現在のMoodleユーザーは、<b>ルーム管理者</b>の役割でDocSpaceに追加されます。';
$string['selecteditemtype:file'] = '選択されたファイル';
$string['selecteditemtype:room'] = '選択されたルーム';
$string['selectelement'] = '既存のDocSpaceルーム<span class="text-nowrap">またはファイル<span>';
$string['selectelement:room'] = '既存のDocSpaceルームに接続する';
$string['selectfile'] = 'ファイルの選択';
$string['sentinvitations'] = '{$a}人のユーザーに招待が正常に送信されました';
$string['settings'] = 'ONLYOFFICE DocSpaceの設定';
$string['skippedinvitations'] = '{$a}人のユーザーへの招待はスキップされました。指定のメールアドレスを持つユーザーは、DocSpace にすでに存在している可能性があります。';
$string['validationerror:password'] = '入力したパスワードが正しくありません';
