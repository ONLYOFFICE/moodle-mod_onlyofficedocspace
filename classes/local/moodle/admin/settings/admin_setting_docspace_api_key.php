<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin DocSpace API key admin setting class.
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_onlyofficedocspace\local\moodle\admin\settings;

use admin_setting_configtext;

/**
 * Plugin DocSpace api key admin setting class.
 *
 * @package    mod_onlyofficedocspace
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class admin_setting_docspace_api_key extends admin_setting_configtext {
    /**
     * Constructor.
     *
     * @param bool $clearusers Flag to clear users in the database after validation
     */
    public function __construct(
        string $name,
        string $visiblename,
        string $description,
        string $defaultsetting,
        $paramtype = PARAM_RAW,
        int $size = 0
    ) {
        $this->nosave = true;
        parent::__construct($name, $visiblename, $description, $defaultsetting, $paramtype, $size);
    }

    /**
     * Output HTML.
     *
     * @param string $data Data to output
     * @param string $query Query string
     * @return string HTML output
     */
    public function output_html($data, $query='') {
        global $OUTPUT;

        $createkeylink = $OUTPUT->render_from_template(
            'onlyofficedocspace/create_key_link',
            ['url' => '#']
        );

        $context = (object) [
            'size' => $this->size,
            'title' => $this->visiblename,
            'rowid' => "admin-$this->name",
            'settingname' => "$this->plugin | $this->name",
            'description' => $this->description,
            'id' => $this->get_id(),
            'name' => $this->get_full_name(),
            'value' => $data,
            'createkeylink' => $createkeylink,
        ];

        $context->helpbutton = $OUTPUT->help_icon('docspaceapikey', 'onlyofficedocspace', '', [
            'createkeylink' => $createkeylink,
        ]);

        return $OUTPUT->render_from_template('onlyofficedocspace/settings/docspace_api_key', $context);
    }
}
