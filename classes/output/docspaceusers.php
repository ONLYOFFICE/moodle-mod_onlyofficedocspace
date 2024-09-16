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
 * Contains class mod_onlyofficedocspace\output\docspaceusers.
 *
 * @package     mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\output;

use mod_onlyofficedocspace\common\flash_message;
use mod_onlyofficedocspace\docspace\enums\docspace_user_status;
use mod_onlyofficedocspace\docspace\enums\docspace_user_type;
use mod_onlyofficedocspace\http\requests\get_users_request;
use mod_onlyofficedocspace\moodle\moodle_user_manager;
use renderable;
use templatable;
use renderer_base;
use stdClass;

/**
 * Class containing data form instance display.
 *
 * @package     mod_onlyofficedocspace
 * @copyright   2024 Ascensio System SIA <integration@onlyoffice.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class docspaceusers implements renderable, templatable {

    /**
     * __construct
     *
     * @param mixed $params
     * @return void
     */
    public function __construct(
        /**
         * @var stdClass $params
         */
        public stdClass $params
    ) {
    }

    /**
     * export data for mustache template
     * @param renderer_base $output
     * @return stdClass
     */
    public function export_for_template(renderer_base $output) {
        global $OUTPUT;

        $data = new stdClass();
        $moodleusermanager = new moodle_user_manager();
        $moodleuserscount = $moodleusermanager->count();
        $flash = new flash_message();

        $users = (new get_users_request())
            ->__invoke($this->params->sort, $this->params->dir, $this->params->page, $this->params->perpage);

        $currentpageurl = '/admin/settings.php?section=manageonlyofficedocspaceusers';

        $urls = [];

        $columns = [
            'firstname',
            'lastname',
            'email',
        ];

        foreach ($columns as $column) {
            $columndir = $column === $this->params->sort && $this->params->dir === 'ASC' ? 'DESC' : 'ASC';
            $url = "$currentpageurl&sort=$column&dir=$columndir&page=" . $this->params->page;
            $urls[$column] = $url;
        }

        $paginator = [];
        $maxpage = $moodleuserscount / $this->params->perpage;

        $paginator[] = $this->params->page <= 1
            ? "<a class=\"btn disabled\" role=\"button\" href=\"#\"><</a>"
            : "<a class=\"btn btn-primary\" role=\"button\" href=\"$currentpageurl&sort="
            . $this->params->sort
            . "&dir=" . $this->params->dir . "&page=" . ($this->params->page - 1) . "\"><</a>";

        for ($current = 1; $current <= $maxpage; $current++) {
            $link = $current === $this->params->page
                ? "<a class=\"btn disabled\" role=\"button\" href=\"$currentpageurl&sort="
                . $this->params->sort . "&dir=" . $this->params->dir . "&page=$current\">$current</a>"
                : "<a class=\"btn btn-secondary\" role=\"button\" href=\"$currentpageurl&sort="
                . $this->params->sort . "&dir=" . $this->params->dir . "&page=$current\">$current</a>";
            $paginator[] = $link;
        }

        $paginator[] = $this->params->page >= $maxpage
            ? "<a class=\"btn disabled\" role=\"button\" href=\"#\">></a>"
            : "<a class=\"btn btn-primary\" role=\"button\" href=\"$currentpageurl&sort="
            . $this->params->sort . "&dir=" . $this->params->dir . "&page=" . ($this->params->page + 1) . "\">></a>";

        foreach ($users as &$user) {
            if ($user['status'] === docspace_user_status::ACTIVE) {
                $user['status'] = $OUTPUT->image_url('check', 'onlyofficedocspace')->get_path();
            } else if ($user['status'] === docspace_user_status::EXIST) {
                $user['status'] = $OUTPUT->image_url('sandclock', 'onlyofficedocspace')->get_path();
            } else {
                $user['status'] = "";
            }

            if ($user['type'] === docspace_user_type::ROOM_ADMIN) {
                $user['type'] = "Room admin";
            } else {
                $user['type'] = "Power user";
            }
        }

        $invitations = [];

        $sentinvitations = $flash->get('sent_invitations');
        $skippedinvitations = $flash->get('skipped_invitations');
        $failedinvitations = $flash->get('failed_invitations');

        if ($sentinvitations) {
            $invitations[] = $OUTPUT->notification($sentinvitations, 'success');
        }
        if ($skippedinvitations) {
            $invitations[] = $OUTPUT->notification($skippedinvitations, 'warning');
        }
        if ($failedinvitations) {
            $invitations[] = $OUTPUT->notification($failedinvitations, 'error');
        }

        $data->urls = $urls;
        $data->paginator = count($paginator) > 2 ? $paginator : [];
        $data->users = $users;
        $data->invitations = $invitations;

        return $data;
    }
}
