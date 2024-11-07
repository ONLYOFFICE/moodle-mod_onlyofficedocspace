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
 * Define http response class
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\common;

/**
 * http response class
 */
class http_response {

    /**
     * __construct
     * @param mixed $response
     * @param int $status
     * @param int $errno
     * @param string $error
     *
     * @return void
     */
    public function __construct(
        /**
         * @var mixed $response
         */
        private mixed $response,
        /**
         * @var int $status
         */
        private int $status,
        /**
         * @var int $errno
         */
        private int $errno,
        /**
         * @var string $error
         */
        private string $error,
    ) {
    }

    /**
     * response
     *
     * @return mixed
     */
    public function response(): mixed {
        return $this->response;
    }

    /**
     * jsonresponse
     *
     * @return mixed
     */
    public function jsonresponse(): mixed {
        return json_decode($this->response, true);
    }

    /**
     * status
     *
     * @return int
     */
    public function status(): int {
        return $this->status;
    }

    /**
     * haserrors
     *
     * @return bool
     */
    public function haserrors(): bool {
        return $this->errno !== 0 || $this->status >= 400;
    }

    /**
     * geterror
     *
     * @return string
     */
    public function geterror(): string {
        return $this->error;
    }
}
