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

$string['activityname'] = 'Nome da Atividade';
$string['adminsettings:updated'] = 'Configurações salvas com sucesso';
$string['adminsettings:urldescription'] = "Digite o endereço correto do seu DocSpace do ONLYOFFICE.";
$string['adminsettings:urlwarning'] = 'Tem certeza de que deseja alterar o DocSpace atual para outro? Os logins de usuários conectados serão perdidos.';
$string['cspwarning'] = '<b>Verifique as configurações do CSP.</b><br/>Antes de conectar-se aqui, acesse <b>Configurações do DocSpace - Ferramentas do Desenvolvedor - SDK JavaScript</b> e adicione o endereço do portal Moodle à lista de permissões - <u class="font-weight-bold">{$a}</u>';
$string['docspaceapperror'] = 'Erro durante a inicialização. Verifique as configurações do CSP do DocSpace.';
$string['docspaceautherror'] = 'O processo de autenticação falhou.';
$string['docspaceauthinvalidcredentials'] = 'Falha na autenticação. Login/senha incorretos';
$string['docspaceconfigurationerror'] = 'Configure o plugin primeiro na página de configurações do DocSpace do ONLYOFFICE';
$string['docspacefilenotfound'] = 'O arquivo necessário não foi encontrado. Verifique se o arquivo ainda existe ou entre em contato com o administrador.';
$string['docspacelogin'] = 'Login do DocSpace';
$string['docspacepassword'] = 'Senha do DocSpace';
$string['docspacepermissiondenied'] = 'O usuário especificado não é um administrador do DocSpace!';
$string['docspacerequestuserserror'] = 'A solicitação de usuário do DocSpace falhou.';
$string['docspaceroomnotfound'] = 'A sala necessária não foi encontrada. Verifique se a sala ainda existe ou entre em contato com o administrador.';
$string['docspaceserverurl'] = 'Endereço de Serviço do DocSpace';
$string['docspaceunreachable'] = 'O DocSpace não está disponível.';
$string['docspaceuseralreadyexists'] = 'O usuário {$a} já existe no DocSpace!';
$string['docspaceuserinviteerror'] = 'Erro ao criar o usuário {$a} no DocSpace! O limite de usuários pagos do DocSpace pode ter sido atingido.';
$string['docspaceusernotfound'] = 'O usuário não foi encontrado no ONLYOFFICE DocSpace. Entre em contato com o administrador.';
$string['docspaceuserrole:admin'] = 'Administrador da sala';
$string['docspaceuserrole:power'] = 'Usuário avançado';
$string['docspaceuserscategory:description'] = 'Para adicionar novos usuários ao ONLYOFFICE DocSpace e começar a trabalhar com o plugin, pressione <b>{$a}</b>. Somente usuários com as funções de Gerente, Professor e Criador de curso do Moodle podem ser convidados para o DocSpace. <br/> Todos os novos usuários serão adicionados com a função de <b>Usuário avançado</b>. Você pode alterar o tipo de função nas configurações de Contas no DocSpace. Observação: a função de <b>Usuário avançado</b> é paga.';
$string['docspaceuserscategory:title'] = 'Usuários do DocSpace';
$string['docspaceuserstatus'] = 'Status do usuário do DocSpace';
$string['docspaceusertype'] = 'Tipo de usuário do DocSpace';
$string['documentserverurldescription'] = 'O Endereço de Serviço do DocSpace especifica o endereço do servidor';
$string['emptyselection'] = 'Nada selecionado';
$string['enterfullscreen'] = 'Abrir em tela cheia';
$string['exitfullscreen'] = 'Sair da tela cheia';
$string['exportusers'] = 'Exportar usuários';
$string['failedinvitations'] = 'Falha no convite para {$a} usuário(s). O limite de usuários pagos do DocSpace pode ter sido atingido.';
$string['invitetodocspace'] = 'Convidar para o DocSpace';
$string['loginmodal:description'] = 'Digite sua senha do DocSpace';
$string['loginmodal:title'] = 'O Moodle solicita acesso ao seu DocSpace do ONLYOFFICE';
$string['logintodocspace'] = "Entrar no DocSpace do ONLYOFFICE";
$string['modulename'] = 'DocSpace do ONLYOFFICE';
$string['modulename_help'] = 'Este módulo permite que os usuários conectem salas do DocSpace do ONLYOFFICE como atividades no Moodle para colaboração.';
$string['modulenameplural'] = 'DocSpace do ONLYOFFICE';
$string['onlyofficedocspace:addinstance'] = 'Adicionar uma nova atividade do DocSpace do ONLYOFFICE';
$string['onlyofficedocspace:edit'] = 'Editar atividade do ONLYOFFICE DocSpace';
$string['onlyofficedocspace:view'] = 'Visualizar atividade do ONLYOFFICE DocSpace';
$string['paramsmissingvalidationerror'] = 'Credenciais necessárias ausentes';
$string['pluginadministration'] = 'Administração da atividade do ONLYOFFICE DocSpace';
$string['pluginname'] = 'DocSpace do ONLYOFFICE';
$string['privacy:metadata:onlyofficedocspace_admin'] = 'Este plugin envia credenciais de administrador do DocSpace para o serviço externo ONLYOFFICE DocSpace para autenticação.';
$string['privacy:metadata:onlyofficedocspace_admin:login'] = 'O nome de usuário do administrador é enviado ao serviço externo para autenticar solicitações de API.';
$string['privacy:metadata:onlyofficedocspace_admin:password'] = 'A senha do administrador é enviada ao serviço de terceiros para autenticação. Ela nunca é armazenada no Moodle e é usada apenas durante a comunicação segura da API.';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = 'Este plugin armazena as credenciais do usuário do ONLYOFFICE DocSpace no banco de dados do Moodle para fins de autenticação.';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = 'O e-mail de um usuário do DocSpace registrado no serviço de terceiros.';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'A senha com hash de um usuário do DocSpace registrado no serviço de terceiros.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Este plugin envia e-mails de usuários para o serviço externo ONLYOFFICE DocSpace para fins de registro e sincronização.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'O endereço de e-mail do usuário é enviado ao serviço externo ONLYOFFICE DocSpace para criação e sincronização da conta.';
$string['rolewarning'] = 'O usuário atual do Moodle será adicionado ao DocSpace com a função <b>Administrador da sala</b>';
$string['selecteditemtype:file'] = 'Arquivo selecionado';
$string['selecteditemtype:room'] = 'Sala selecionada';
$string['selectelement'] = 'Conectar sala <span class="text-nowrap">ou arquivo<span> existente no DocSpace.';
$string['selectelement:room'] = 'Conectar sala DocSpace existente.';
$string['selectfile'] = 'Selecionar arquivo';
$string['selectroom'] = 'Selecionar sala';
$string['sentinvitations'] = 'Convite enviado com sucesso para {$a} usuário(s)';
$string['settings'] = 'Configurações do ONLYOFFICE DocSpace';
$string['skippedinvitations'] = 'Convite ignorado para {$a} usuário(s). Usuário(s) com o(s) e-mail(s) indicado(s) podem já existir no DocSpace.';
$string['validationerror:password'] = 'A senha digitada está incorreta';
