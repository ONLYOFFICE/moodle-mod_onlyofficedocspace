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
 * Define docspace settings class
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\docspace;

use mod_onlyofficedocspace\common\http_request;
use mod_onlyofficedocspace\errors\docspace_error;

/**
 * Docspace settings class
 */
class docspace_settings {

    /**
     * Docspace default url
     */
    const DOCSPACE_DEFAULT_URL = 'https://docspaceserver.url';
    /**
     * Docspace url setting key
     */
    const DOCSPACE_URL = 'docspace_server_url';
    /**
     * Docspace admin login setting key
     */
    const DOCSPACE_LOGIN = 'docspace_login';
    /**
     * Docspace admin password hash setting key
     */
    const DOCSPACE_PASSWORD = 'docspace_password';
    /**
     * Docspace admin auth token setting key
     */
    const DOCSPACE_TOKEN = 'docspace_token';

    /**
     * @var string $url docspace url
     */
    private string $url;
    /**
     * @var string $login docspace admin login
     */
    private string $login;
    /**
     * @var string $password docspace admin password hash
     */
    private string $password;
    /**
     * @var string $token docspace auth token
     */
    private string $token;

    /**
     * DocSpace settings class constructor.
     */
    public function __construct(
        ?string $url = null,
        ?string $login = null,
        ?string $password = null,
        ?string $token = null
    ) {
        $this->url = $url ?? $this->get(self::DOCSPACE_URL);
        $this->login = $login ?? $this->get(self::DOCSPACE_LOGIN);
        $this->password = $password ?? $this->get(self::DOCSPACE_PASSWORD);
        $this->token = $token ?? $this->get(self::DOCSPACE_TOKEN);
    }

    /**
     * Update docspace settings
     */
    public function update(): void {
        $this->set(self::DOCSPACE_URL, $this->url);
        $this->set(self::DOCSPACE_LOGIN, $this->login);
        $this->set(self::DOCSPACE_PASSWORD, $this->password);
        $this->set(self::DOCSPACE_TOKEN, $this->token);
    }

    /**
     * Return docspace url
     */
    public function url(): string {
        return $this->url;
    }

    /**
     * Return docspace login
     */
    public function login(): string {
        return $this->login;
    }

    /**
     * Return docspace password hash
     */
    public function password(): string {
        return $this->password;
    }

    /**
     * Return docspace auth token
     */
    public function token(): string {
        return $this->token;
    }

    /**
     * Replace auth token
     * @param string $token auth token
     */
    public function replacetoken(string $token): void {
        $this->token = $token;
    }

    /**
     * Health check docspace
     * @throws docspace_error
     */
    public function healthcheck(): void {
        $response = http_request::head($this->url);

        if ($response->hasErrors() || $response->status() !== 200) {
            throw new docspace_error(get_string('docspaceunreachable', 'onlyofficedocspace'));
        }
    }

    /**
     * Ensure integrity of docspace settings
     * @throws docspace_error
     */
    public function ensureintegrity(): void {
        $this->checkIntegrity();
        $this->update();
    }

    /**
     * Check integrity of docspace settings
     * @throws docspace_error
     */
    public function checkintegrity(): void {
        $this->healthCheck();
        $this->authenticate();
        $this->ensureIsAdmin();
    }

    /**
     * Login to docspace with credentials
     * @throws docspace_error
     */
    private function authenticate(): void {
        $docspaceauthmanager = new docspace_auth_manager($this->url);

        $token = $docspaceauthmanager->authenticate($this->login, $this->password);

        $this->replaceToken($token);
    }

    /**
     * Ensure the user is docspace admin
     * @throws docspace_error
     */
    private function ensureisadmin(): void {
        $docspaceusermanager = new docspace_user_manager($this->url, $this->token);

        $user = $docspaceusermanager->get($this->login);

        if (!$user['isAdmin']) {
            throw new docspace_error(get_string('docspacepermissiondenied', 'onlyofficedocspace'));
        }
    }

    /**
     * Get setting by key
     * @param string $key setting key
     * @param string $def default value
     * @return string setting value
     */
    private function get(string $key, string $def = ''): string {
        $option = get_config('onlyofficedocspace', $key);

        if ($option !== false) {
            return $option;
        }

        return $def;
    }

    /**
     * Set setting value by key
     * @param string $key setting key
     * @param mixed $value setting value
     */
    private function set(string $key, mixed $value): void {
        set_config($key, $value, 'onlyofficedocspace');
    }
}
