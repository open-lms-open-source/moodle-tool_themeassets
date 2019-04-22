# This file is part of Moodle - http://moodle.org/
#
# Moodle is free software: you can redistribute it and/or toolify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# Moodle is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
#
# Theme assets upload assets feature
#
# @package   tool_themeassets
# @copyright Copyright (c) 2017 Blackboard Inc. (http://www.blackboard.com)
# @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later

@tool @tool_themeassets @_file_upload @javascript
Feature: Upload assets for use in theme customization.
  In order to support theme customization
  As an administrator
  I need to upload assets

  Background:
    Given I log in as "admin"
    And I am on site homepage
    When I navigate to "Appearance > Theme assets" in site administration
    And I should see "No assets"

  Scenario: Upload a CSS file
    Given I upload "admin/tool/themeassets/tests/fixtures/test.css" file to "Assets" filemanager
    And I press "Save"
    Then I should see "Assets updated"
    And I should not see "No assets"
    And I should see "test.css" in the "#tool_themeassets-assets .asset-name" "css_element"

  Scenario: Upload an image
    Given I upload "admin/tool/themeassets/tests/fixtures/test.jpg" file to "Assets" filemanager
    And I press "Save"
    Then I should see "Assets updated"
    And I should not see "No assets"
    And I should see "test.jpg" in the "#tool_themeassets-assets .asset-name" "css_element"

  Scenario: Upload a JavaScript file
    Given I upload "admin/tool/themeassets/tests/fixtures/test.js" file to "Assets" filemanager
    And I press "Save"
    Then I should see "Assets updated"
    And I should not see "No assets"
    And I should see "test.js" in the "#tool_themeassets-assets .asset-name" "css_element"
