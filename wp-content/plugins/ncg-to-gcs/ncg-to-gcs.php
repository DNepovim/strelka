<?php
/*
Plugin Name: Use Google Cloud Storage with NextCellent Gallery
Description: Require NextCellent Gallery and Google Cloud Storage plugins
Version:     0.1.0
Author:      Dominik Bláha
Author URI:  http://www.dominikblaha.cz
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: gcp
Domain Path: /languages

Copyright 2017 Google Inc.

This program is free software; you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation; either version 2 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
details.

You should have received a copy of the GNU General Public License along with
this program; if not, write to the Free Software Foundation, Inc., 51 Franklin
Street, Fifth Floor, Boston, MA 02110-1301, USA.
*/

namespace Google\Cloud\Storage\WordPress;

require_once __DIR__ . '/../gcs/vendor/autoload.php';

$storageClient = new \Google\Cloud\Storage\StorageClient();
$storageClient->registerStreamWrapper();

require_once(__DIR__ . '/Uploads/Uploads.php');
