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
 * Assets form definition.
 *
 * @package    tool_themeassets
 * @author     Sam Chaffee
 * @copyright  Copyright (c) 2017 Open LMS (https://www.openlms.net)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tool_themeassets\form;

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/../../../../../lib/formslib.php');

/**
 * Assets form definition.
 *
 * @package    tool_themeassets
 * @copyright  Copyright (c) 2017 Open LMS (https://www.openlms.net)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class assets_form extends \moodleform {

    /**
     * @return array
     */
    public static function get_options() {
        global $CFG;

        $acceptedtypes = [
            'web_file',
            'web_image',
        ];

        if (!empty($CFG->tool_themeassets_accepted_types)) {
            $types = $CFG->tool_themeassets_accepted_types;
            if (($key = array_search('*', $types)) !== false) {
                unset($types[$key]);
            }

            if (!empty($types)) {
                $acceptedtypes = $types;
            }
        }

        return [
            'accepted_types' => $acceptedtypes,
            'subdirs' => true,
        ];
    }

    public function definition() {
        $mform = $this->_form;

        $mform->addElement('filemanager', 'assets', get_string('assets', 'tool_themeassets'),
                null, self::get_options());
        $this->add_action_buttons();
    }
}
