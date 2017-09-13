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
 * Asset manager class definition.
 *
 * @package    tool_themeassets
 * @author     Sam Chaffee
 * @copyright  Copyright (c) 2017 Blackboard Inc. (http://www.blackboard.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tool_themeassets;

defined('MOODLE_INTERNAL') || die();

/**
 * Asset manager class definition.
 *
 * @package    tool_themeassets
 * @copyright  Copyright (c) 2017 Blackboard Inc. (http://www.blackboard.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class asset_manager {

    /**
     * @var \file_storage
     */
    protected $fs;

    /**
     * asset_manager constructor.
     * @param \file_storage|null $fs
     */
    public function __construct(\file_storage $fs = null) {
        if (is_null($fs)) {
            $fs = get_file_storage();
        }
        $this->fs = $fs;
    }

    /**
     * @return array
     */
    public function get_assets() {
        $assets = [];
        $files = $this->fs->get_area_files(\context_system::instance()->id, 'tool_themeassets',
                'assets', false, '', false);
        foreach ($files as $file) {
            $filepath = $file->get_filepath();

            $assets[] = (object) [
                'name' => $file->get_filename(),
                'href' => \moodle_url::make_pluginfile_url($file->get_contextid(), $file->get_component(),
                        $file->get_filearea(), $file->get_itemid(), $filepath, $file->get_filename()),
                'type' => $file->get_mimetype(),
            ];
        }

        return $assets;
    }
}