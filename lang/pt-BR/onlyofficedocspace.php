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
$string['adminsettings:urldescription'] = 'Insira a URL do seu DocSpace no campo acima. Por exemplo, https://suaempresa.docspace.com.';
$string['adminsettings:urlwarning'] = 'Tem certeza de que deseja alterar o DocSpace atual para outro? Os logins de usuários conectados serão perdidos.';
$string['change'] = 'Mudar';
$string['confirmchange_desc'] = 'Se você pressionar o botão Desconectar, não terá acesso ao DocSpace do ONLYOFFICE conectado no momento. Isso removerá as conexões entre Salas e Atividades e desconectará todos os usuários.';
$string['confirmdisconnect_desc'] = 'Se você clicar no botão Alterar, terá que inserir novamente as credenciais do DocSpace do ONLYOFFICE conectado no momento. As conexões entre Salas e Atividades podem ser perdidas. As informações sobre a exportação opcional de usuários não serão excluídas.';
$string['connect'] = 'Conectar';
$string['coursecreator'] = 'Criador do curso';
$string['createkey'] = 'Criar uma chave';
$string['cspwarning'] = '<b>Verifique as configurações do CSP.</b><br/>Antes de conectar-se aqui, acesse <b>Configurações do DocSpace - Ferramentas do Desenvolvedor - SDK JavaScript</b> e adicione o endereço do portal Moodle à lista de permissões - <u class="font-weight-bold">{$a}</u>';
$string['disconnect'] = 'Desconectar';
$string['docspaceapikey'] = 'Chave de API do ONLYOFFICE DocSpace';
$string['docspaceapikey_help'] = 'Antes de conectar o aplicativo, acesse o <b>link</b>, crie uma nova chave de API e insira-a aqui. Você pode criar uma chave de API com Permissões = <b>Todos</b> ou criar uma chave de API com <b>acesso restrito</b>. Nesse caso, os seguintes Escopos de Acesso devem ser selecionados para o funcionamento válido deste aplicativo: (Perfil: Leitura, Contatos: Escrita, Salas: Escrita).';
$string['docspaceapperror'] = 'Erro durante a inicialização. Verifique as configurações do CSP do DocSpace.';
$string['docspaceautherror'] = 'O processo de autenticação falhou.';
$string['docspaceauthinvalidcredentials'] = 'Falha na autenticação. Login/senha incorretos';
$string['docspaceconfigurationerror'] = 'Configure o plugin primeiro na página de configurações do DocSpace do ONLYOFFICE';
$string['docspacefilenotfound'] = 'O arquivo necessário não foi encontrado. Verifique se o arquivo ainda existe ou entre em contato com o administrador.';
$string['docspacelogin'] = 'Login do DocSpace';
$string['docspacenotfound_desc'] = 'Certifique-se de que esta sala esteja localizada no mesmo Endereço de Serviço DocSpace especificado nas Configurações.';
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
$string['docspaceuserrole:power'] = 'Usuário';
$string['docspaceuserscategory:description'] = '
Para adicionar novos usuários ao ONLYOFFICE DocSpace, selecione usuários e pressione <b>Convidar para o DocSpace</b>.<br/>
Todos os novos usuários serão adicionados com função de <b>Usuário</b>. Você pode alterar a função em <b>Configurações de contas no DocSpace</b>.<br/>
Para remover a conexão entre as contas Moodle e DocSpace, selecione o usuário e pressione <b>Desvincular conta DocSpace</b>.';
$string['docspaceuserscategory:title'] = 'Usuários do DocSpace';
$string['docspaceuserscategory_desc'] = '
Para adicionar novos usuários ao ONLYOFFICE DocSpace e começar a trabalhar com o plugin, pressione <b>{$a}</b>.<br/>
Todos os novos usuários serão adicionados com a função de Usuário. Você pode alterar a função nas configurações de Contas no DocSpace.';
$string['docspaceuserstatus'] = 'Status do usuário do DocSpace';
$string['docspaceusertype'] = 'Tipo de usuário do DocSpace';
$string['documentserverurldescription'] = 'O Endereço de Serviço do DocSpace especifica o endereço do servidor';
$string['editingteacher'] = 'Professor de edição';
$string['emptyselection'] = 'Nada selecionado';
$string['emptyuserslist'] = 'Nenhum usuário encontrado';
$string['enterfullscreen'] = 'Abrir em tela cheia';
$string['exitfullscreen'] = 'Sair da tela cheia';
$string['exportusers'] = 'Exportar usuários';
$string['failedinvitations'] = 'Falha no convite para {$a} usuário(s). O limite de usuários pagos do DocSpace pode ter sido atingido.';
$string['forgotpassword'] = 'Esqueceu a senh?';
$string['gotosettings'] = 'Ir para Configurações';
$string['invalidlink'] = 'Link inválido';
$string['invitetodocspace'] = 'Convidar para o DocSpace';
$string['learnmore'] = 'Saiba mais';
$string['loginmodal:description'] = 'Digite sua senha do DocSpace';
$string['loginmodal:title'] = 'O Moodle solicita acesso ao seu DocSpace do ONLYOFFICE';
$string['logintodocspace'] = "Entrar no DocSpace do ONLYOFFICE";
$string['manager'] = 'Gerente';
$string['modalloginerror'] = 'Credenciais de autorização inválidas. Verifique seu e-mail e senha e tente efetuar login novamente.';
$string['modulename'] = 'DocSpace do ONLYOFFICE';
$string['modulename_help'] = '
O módulo ONLYOFFICE permite que os usuários criem e editem documentos de escritório armazenados localmente no Moodle usando o ONLYOFFICE Document Server, permite que vários usuários colaborem em tempo real e salvem essas alterações no Moodle

Ajude-nos a melhorar o plugin ONLYOFFICE - <a href="https://feedback.onlyoffice.com/forums/966080-your-voice-matters?category_id=519288" target="_blank">Compartilhe seu feedback</a>.
Para mais informações, visite <a href="https://helpcenter.onlyoffice.com/integration/moodle-docspace.aspx" target="_blank">Central de Ajuda</a>.
';
$string['modulenameplural'] = 'DocSpace do ONLYOFFICE';
$string['onlyofficedocspace:addinstance'] = 'Adicionar uma nova atividade do DocSpace do ONLYOFFICE';
$string['onlyofficedocspace:edit'] = 'Editar atividade do ONLYOFFICE DocSpace';
$string['onlyofficedocspace:view'] = 'Visualizar atividade do ONLYOFFICE DocSpace';
$string['paramsmissingvalidationerror'] = 'Credenciais necessárias ausentes';
$string['pluginadministration'] = 'Administração da atividade do ONLYOFFICE DocSpace';
$string['pluginname'] = 'DocSpace do ONLYOFFICE';
$string['privacy:metadata:onlyofficedocspace_dsuser'] = 'Este plugin armazena as credenciais do usuário do ONLYOFFICE DocSpace no banco de dados do Moodle para fins de autenticação.';
$string['privacy:metadata:onlyofficedocspace_dsuser:email'] = 'O e-mail de um usuário do DocSpace registrado no serviço de terceiros.';
$string['privacy:metadata:onlyofficedocspace_settings'] = 'Este plugin envia a chave da API do DocSpace para o serviço externo ONLYOFFICE DocSpace para autenticação..';
$string['privacy:metadata:onlyofficedocspace_settings:api_key'] = 'A chave de API é enviada ao serviço externo para autenticar solicitações de API..';
$string['privacy:metadata:onlyofficedocspace_dsuser:password'] = 'A senha com hash de um usuário do DocSpace registrado no serviço de terceiros.';
$string['privacy:metadata:onlyofficedocspace_users'] = 'Este plugin envia e-mails de usuários para o serviço externo ONLYOFFICE DocSpace para fins de registro e sincronização.';
$string['privacy:metadata:onlyofficedocspace_users:email'] = 'O endereço de e-mail do usuário é enviado ao serviço externo ONLYOFFICE DocSpace para criação e sincronização da conta.';
$string['rolewarning'] = 'O usuário atual do Moodle será adicionado ao DocSpace com a função <b>Administrador da sala</b>';
$string['roomunavailable'] = 'Sala indisponível.';
$string['selecteditemtype:file'] = 'Arquivo selecionado';
$string['selecteditemtype:room'] = 'Sala selecionada';
$string['selectelement'] = 'Conectar sala <span class="text-nowrap">ou arquivo<span> existente no DocSpace.';
$string['selectelement:room_help'] = 'Esta atividade se conecta a uma sala pública existente do ONLYOFFICE DocSpace, dando aos alunos acesso para visualizar todos os documentos ali.';
$string['selectelement:room'] = 'Conectar sala DocSpace existente.';
$string['selectfile'] = 'Selecionar arquivo';
$string['selectroom'] = 'Browse DocSpace rooms';
$string['sentinvitations'] = 'Convite enviado com sucesso para {$a} usuário(s)';
$string['settings'] = 'Configurações do ONLYOFFICE DocSpace';
$string['settingsintro'] = 'Incorpore salas públicas do seu DocSpace nos cursos do Moodle, permitindo que professores e gerentes criem, editem e compartilhem arquivos do Office com os alunos.';
$string['siteadmin'] = 'Administrador do site';
$string['skippeddisable'] = 'Desativação de conta ignorada para {$a} usuário(s). Usuário(s) com o(s) endereço(s) de e-mail especificado(s) podem já estar desvinculados do DocSpace..';
$string['skippedinvitations'] = 'Convite ignorado para {$a} usuário(s). Usuário(s) com o(s) e-mail(s) indicado(s) podem já existir no DocSpace.';
$string['somethingwentwrong'] = 'Algo deu errado';
$string['successfulconnection'] = 'Seu DocSpace foi conectado com sucesso!';
$string['successfuldisable'] = 'A conta DocSpace selecionada foi desabilitada com sucesso';
$string['suggestfeature'] = 'Sugerir um recurso';
$string['teacher'] = 'Professor';
$string['unexpectederror:connectdocspace'] = 'Ocorreu um erro inesperado ao conectar o DocSpace com o Moodle';
$string['unexpectederror:docspaceurl'] = 'Ocorreu um erro inesperado ao verificar a URL do DocSpace';
$string['unexpectederror:inviteusers'] = 'Ocorreu um erro inesperado ao tentar convidar usuários para o DocSpace';
$string['unexpectederror:unlinkusers'] = 'Ocorreu um erro inesperado ao tentar desvincular usuários do DocSpace';
$string['unlinkdocspaceaccount'] = 'Desvincular conta DocSpace';
$string['unlinkwarningmessage'] = 'Tem certeza de que deseja desabilitar a conta DocSpace selecionada?';
$string['validationerror:emptyapikey'] = 'O valor da chave da API não pode estar vazio.';
$string['validationerror:emptyurl'] = 'URL não pode estar vazia';
$string['validationerror:invalidapikey'] = 'Chave de API do DocSpace inválida';
$string['validationerror:invalidurl'] = 'Formato de URL inválido';
$string['validationerror:password'] = 'A senha digitada está incorreta';
$string['warning'] = 'Aviso';
