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
 * Define DocSpace client error class
 *
 * @package    mod_onlyofficedocspace
 * @copyright   2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\errors;
use Exception;

/**
 * DocSpace client error class
 */
class docspace_client_error extends Exception {
    /**
     * Client error status code
     * @var int
     */
    protected int $statuscode;
    /**
     * Constructor
     *
     * @param int $statuscode
     * @param string $message
     * @return void
     */
    public function __construct(int $statuscode = 0, string $message = '') {
        parent::__construct($message, $statuscode);
        $this->statuscode = $statuscode;
    }

    /**
     * Get client error status code
     * @return int
     */
    public function get_statuscode(): int {
        return $this->statuscode;
    }
}
