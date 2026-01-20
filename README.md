# Theme assets Tool
Theme assets is a plugin that enables Admins to add several types of
files to the platform. These files are not linked to a specific theme, course, or category.

This plugin was contributed by the Open LMS Product Development team. Open LMS is an education technology company
dedicated to bringing excellent online teaching to institutions across the globe. We serve colleges and universities,
schools and organizations by supporting the software that educators use to manage and deliver instructional content to
learners in virtual classrooms.

## Installation
Extract the contents of the plugin into _/wwwroot/admin/tool_ then visit `admin/upgrade.php` or use the CLI script to upgrade your site.

### Usage
You can access the Theme assets tool page through *Administration > Appearance > Theme Assets* or via URL _/admin/tool/themeassets/index.php_

## Use cases for Admins:
* You can upload your own CSS style sheets and font files, and call them via URL in the Additional HTML site settings that can be found in _/admin/settings.php?section=additionalhtml_,
in order to customize your theme and user experience.
* You can upload images and gif animations to create unique content and link it to your courses or sites in general.
* You can add HTML files and with it, create a custom site on your platform.

## Example:
1. Go to Site Theme assets tool page previously mentioned.
2. Add any file of the following type:
    * Fonts: .fonts
    * Image files used on the web: .gif .ico .jpe .jpeg .jpg .png .svg .svgz
    * Web files: .css .eot .htm .html .js .otf .scss .ttf .woff .woff2 .xhtml
3. Select, upload, and save your files.
4. This will create a unique URL in your platform for each file.
5. Copy the URL to embed the file in diverse use cases.

## Flags
You can configure which are the accepted file types with a flag,
 
```
     // tool_themeassets accepted types.
     $CFG->tool_themeassets_accepted_types = [
         '*',
     ];
```

To select a specific file type,

```
     // tool_themeassets accepted types.
     $ CFG-> tool_themeassets_accepted_types = [
         'web_image',
         'web_file',
         'fonts',
     ];
 ```

Or you even can override the accepted types with *$CFG->customfiletypes* flag,
for example adding a font group, we need to add it to *$CFG->tool_themeassets_accepted_types* if it doesn't exist.

```
     // Custom types.
     $CFG->customfiletypes = [
         (object) [
             'extension' => 'otf',
             'icon' => 'document',
             'type' => 'application/x-font-opentype',
             'customdescription' => 'OpenType font',
             'groups' => ['fonts']
         ]
     ];

     // tool_themeassets accepted types.
     $CFG->tool_themeassets_accepted_types = [    
         'fonts'
     ];
 ```

## License
Copyright (c) 2021 Open LMS (https://www.openlms.net)

This program is free software: you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program.  If not, see <http://www.gnu.org/licenses/>.
