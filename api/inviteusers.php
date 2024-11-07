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
 * Return json-encoded response.
 *
 * @package     mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');

use mod_onlyofficedocspace\errors\docspace_error;
use mod_onlyofficedocspace\errors\validation_error;
use mod_onlyofficedocspace\http\requests\invite_users_request;

defined('AJAX_SCRIPT') || define('AJAX_SCRIPT', true);

require_admin();

$result = [];

try {
    $request = new invite_users_request();
    $request->__invoke();
    http_response_code(201);
} catch (docspace_error $e) {
    $result['error'] = $e->getMessage();
    http_response_code(500);
} catch (validation_error $e) {
    $result['error'] = $e->getMessage();
    http_response_code(422);
}

echo json_encode($result);
die();
