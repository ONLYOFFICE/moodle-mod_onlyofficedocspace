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
$string['adminsettings:urldescription'] = '上の欄にDocSpaceのURLを入力してください。例: https://yourcompany.docspace.com';
$string['adminsettings:urlwarning'] = '現在のDocSpaceを別のDocSpaceに変更してもよろしいですか？接続中のユーザーのログイン情報は失われます。';
$string['change'] = '変更';
$string['confirmchange_desc'] = '「切断」を押すと、現在接続中のONLYOFFICE DocSpaceへアクセスできなくなります。ルームとアクティビティ間の接続が削除され、すべてのユーザーが切断されます。';
$string['confirmdisconnect_desc'] = '「変更」を押すと、現在接続中のONLYOFFICE DocSpaceの認証情報を再入力する必要があります。ルームとアクティビティ間の接続が失われる可能性があります。オプションのユーザーエクスポートに関する情報は削除されません。';
$string['connect'] = '接続';
$string['coursecreator'] = 'コース作成者';
$string['createkey'] = 'キーを作成';
$string['cspwarning'] = '<b>CSP設定をご確認ください。</b><br/>ここに接続する前に、<b>DocSpace設定 → 開発者ツール → JavaScript SDK</b>に移動し、許可リストにMoodleポータルアドレスを追加してください - <u class="font-weight-bold">{$a}</u>';
$string['disconnect'] = '切断';
$string['docspaceapikey'] = 'ONLYOFFICE DocSpace APIキー';
$string['docspaceapikey_help'] = 'アプリを接続する前に<b>こちら</b>にアクセスして新しいAPIキーを作成し、ここに入力してください。権限=<b>すべて</b>で作成するか、<b>制限付きアクセス</b>で作成することもできます。その場合、このアプリを正しく動作させるために以下のアクセススコープを選択する必要があります: (プロフィール: 読み取り、連絡先: 書き込み、ルーム: 書き込み)';
$string['docspaceapperror'] = 'E初期化中にエラーが発生しました。DocSpace CSP設定をご確認ください。';
$string['docspaceautherror'] = '認証プロセスに失敗しました。';
$string['docspaceauthinvalidcredentials'] = '認証に失敗しました。ログイン名またはパスワードが正しくないようです。';
$string['docspaceconfigurationerror'] = 'まず、ONLYOFFICE DocSpace設定ページでプラグインを設定してください。';
$string['docspacefilenotfound'] = '必要なファイルが見つかりませんでした。ファイルがまだ存在するか、管理者にお問い合わせください。';
$string['docspacelogin'] = 'DocSpaceログイン';
$string['docspacenotfound_desc'] = 'このルームが設定で指定されたDocSpaceサービスアドレス内にあることを確認してください。';
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
$string['docspaceuserrole:power'] = 'ユーザー';
$string['docspaceuserscategory:description'] = '
新しいユーザーをONLYOFFICE DocSpaceに追加するには、ユーザーを選択して<b>DocSpaceに招待</b>を押してください。<br/>
新しいユーザーはすべて<b>ユーザーロール</b>で追加されます。ロールは<b>DocSpaceのアカウント設定</b>で変更できます。<br/>
MoodleとDocSpaceアカウント間の接続を解除するには、ユーザーを選択して<b>DocSpaceアカウントを解除</b>を押してください。';
$string['docspaceuserscategory:title'] = 'DocSpaceユーザー';
$string['docspaceuserscategory_desc'] = '
新しいユーザーをONLYOFFICE DocSpaceに追加してプラグインを使用するには、<b>{$a}</b>を押してください。<br/>
新しいユーザーはすべてユーザーロールで追加されます。ロールはDocSpaceのアカウント設定で変更できます。';
$string['docspaceuserstatus'] = 'DocSpaceユーザーのステータス';
$string['docspaceusertype'] = 'DocSpaceユーザーのタイプ';
$string['documentserverurldescription'] = 'DocSpaceサービスアドレスは、サーバーのアドレスを指定します';
$string['editingteacher'] = '編集権限付き教師';
$string['emptyselection'] = '何も選択されていません';
$string['emptyuserslist'] = 'ユーザーが見つかりません';
$string['enterfullscreen'] = '全画面表示';
$string['exitfullscreen'] = '全画面表示を終了';
$string['exportusers'] = 'ユーザーのエクスポート';
$string['failedinvitations'] = '{$a}人のユーザーの招待に失敗しました。有料DocSpaceユーザの制限に達した可能性があります。';
$string['forgotpassword'] = 'パスワードをお忘れですか？';
$string['gotosettings'] = '設定へ移動';
$string['invalidlink'] = '無効なリンク';
$string['invitetodocspace'] = 'DocSpaceに招待する';
$string['learnmore'] = '詳しくはこちら';
$string['loginmodal:description'] = 'DocSpaceのパスワードを入力してください';
$string['loginmodal:title'] = 'MoodleがONLYOFFICE DocSpaceへのアクセスを要求しています';
$string['logintodocspace'] = "ONLYOFFICE DocSpaceにログインしてください";
$string['manager'] = 'マネージャー';
$string['modalloginerror'] = '認証情報が正しくありません。メールアドレスとパスワードを確認して、再度ログインしてください。';
$string['modulename'] = 'ONLYOFFICE DocSpace';
$string['modulename_help'] = '
ONLYOFFICEモジュールを使用すると、Moodleに保存されたオフィス文書をONLYOFFICE Document Serverで作成・編集でき、複数のユーザーがリアルタイムで共同編集し、変更をMoodleに保存することができます。

ONLYOFFICEプラグインの改善にご協力ください - <a href="https://feedback.onlyoffice.com/forums/966080-your-voice-matters?category_id=519288" target="_blank">フィードバックを共有</a>。
詳細は<a href="https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx" target="_blank">ヘルプセンター</a>をご覧ください。
';
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
$string['privacy:metadata:onlyofficedocspace_settings'] = 'このプラグインは認証のためにDocSpace APIキーをONLYOFFICE DocSpace外部サービスへ送信します。';
$string['privacy:metadata:onlyofficedocspace_settings:api_key'] = 'APIリクエストを認証するために、APIキーが外部サービスへ送信されます。';
$string['privacy:metadata:onlyofficedocspace_users'] = 'このプラグインは、登録と同期のためにユーザーメールアドレスを外部サービスONLYOFFICE DocSpaceに送信します。';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'ユーザーのメールアドレスは、アカウント作成と同期のために外部サービスONLYOFFICE DocSpaceに送信されます。';
$string['rolewarning'] = '現在のMoodleユーザーは、<b>ルーム管理者</b>の役割でDocSpaceに追加されます。';
$string['roomunavailable'] = '部屋は利用できません。';
$string['selecteditemtype:file'] = '選択されたファイル';
$string['selecteditemtype:room'] = '選択されたルーム';
$string['selectelement'] = '既存のDocSpaceルーム<span class="text-nowrap">またはファイル<span>';
$string['selectelement:room'] = '既存のDocSpaceルームに接続する';
$string['selectelement:room_help'] = 'このアクティビティは既存のONLYOFFICE DocSpace公開ルームに接続し、学生がそこにあるすべての文書を閲覧できるようにします。';
$string['selectfile'] = 'ファイルの選択';
$string['selectroom'] = 'DocSpaceルームを参照';
$string['sentinvitations'] = '{$a}人のユーザーに招待が正常に送信されました';
$string['settings'] = 'ONLYOFFICE DocSpaceの設定';
$string['settingsintro'] = 'DocSpaceの公開ルームをMoodleコースに埋め込み、教師やマネージャーが学生とオフィスファイルを作成・編集・共有できるようにします。';
$string['siteadmin'] = 'サイト管理者';
$string['skippeddisable'] = '{$a}人のユーザーのアカウント無効化をスキップしました。指定されたメールアドレスのユーザーはすでにDocSpaceから解除されている可能性があります。';
$string['skippedinvitations'] = '{$a}人のユーザーへの招待はスキップされました。指定のメールアドレスを持つユーザーは、DocSpace にすでに存在している可能性があります。';
$string['somethingwentwrong'] = 'エラーが発生しました';
$string['successfulconnection'] = 'DocSpaceへの接続が正常に完了しました！';
$string['successfuldisable'] = '選択したDocSpaceアカウントを正常に無効化しました';
$string['suggestfeature'] = '機能を提案';
$string['teacher'] = '教師';
$string['unexpectederror:connectdocspace'] = 'DocSpaceとMoodleの接続中に予期せぬエラーが発生しました';
$string['unexpectederror:docspaceurl'] = 'DocSpace URLの確認中に予期せぬエラーが発生しました';
$string['unexpectederror:inviteusers'] = 'DocSpaceへのユーザー招待中に予期せぬエラーが発生しました';
$string['unexpectederror:unlinkusers'] = 'DocSpaceユーザーの解除中に予期せぬエラーが発生しました';
$string['unlinkdocspaceaccount'] = 'DocSpaceアカウントを解除';
$string['unlinkwarningmessage'] = '選択したDocSpaceアカウントを無効化してもよろしいですか？';
$string['validationerror:emptyapikey'] = 'APIキーを入力してください。';
$string['validationerror:emptyurl'] = 'URLを入力してください。';
$string['validationerror:invalidapikey'] = '無効なDocSpace APIキーです。';
$string['validationerror:invalidurl'] = '無効なURL形式です。';
$string['validationerror:password'] = '入力したパスワードが正しくありません';
$string['warning'] = '警告';
