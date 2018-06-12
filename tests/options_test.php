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
 * Tests for local library.
 *
 * @package   tool_themeassets
 * @copyright Copyright (c) 2018 Blackboard Inc. (http://www.blackboard.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

use tool_themeassets\form\assets_form;

/**
 * Tests for local library.
 *
 * @package   tool_themeassets
 * @copyright Copyright (c) 2018 Blackboard Inc. (http://www.blackboard.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class tool_themeassets_options_testcase extends advanced_testcase {
    /**
     * Test that overriding accepted types omits wildcard file type usage.
     */
    public function test_options_omit_asterisk() {
        global $CFG;

        $this->resetAfterTest();

        $defaultopts = [
            'accepted_types' => [
                'web_file',
                'web_image'
            ],
            'subdirs' => true,
        ];

        $options = assets_form::get_options();
        $this->assertEquals($defaultopts, $options);

        $CFG->tool_themeassets_accepted_types = [
            '*'
        ];

        $options = assets_form::get_options();
        $this->assertEquals($defaultopts, $options);
    }
}