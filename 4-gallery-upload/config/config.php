<?php
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

include '../src/render.php';
include '../src/menu.php';
include '../src/catalog.php';
include '../src/gallery.php';
include '../libraries/resizer.php';
