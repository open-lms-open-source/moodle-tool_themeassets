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
 * Theme assets landing page.
 *
 * @package    tool_themeassets
 * @author     Sam Chaffee
 * @copyright  Copyright (c) 2017 Open LMS (https://www.openlms.net)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use tool_themeassets\form\assets_form;
use tool_themeassets\asset_manager;
use core\notification;

require_once(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/adminlib.php');

admin_externalpage_setup('toolthemeassets');

$options = assets_form::get_options();
$filecontext = \context_system::instance();
$component = 'tool_themeassets';
$filearea = 'assets';

$draftitemid = file_get_submitted_draft_itemid('assets');
file_prepare_draft_area($draftitemid, $filecontext->id, $component, $filearea, 0, $options);

$mform = new assets_form();
$mform->set_data(['assets' => $draftitemid]);

$mgr = new asset_manager();

if ($data = $mform->get_data()) {
    require_sesskey();

    file_save_draft_area_files($data->assets, $filecontext->id, $component, $filearea, 0, $options);
    notification::add(get_string('uploadsuccess', 'tool_themeassets'), notification::SUCCESS);
    redirect(new moodle_url('/admin/tool/themeassets/index.php'));
}

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('pluginname', 'tool_themeassets'));
echo $OUTPUT->render_from_template('tool_themeassets/assets', ['assets' => $mgr->get_assets()]);
$mform->display();
echo $OUTPUT->footer();