<?php

define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');
define('ROOT', dirname(__DIR__));
define('IMG_BIG', $_SERVER['DOCUMENT_ROOT'] . '/img/gallery/big/');
define('IMG_SMALL', $_SERVER['DOCUMENT_ROOT'] . '/img/gallery/small/');

define('HOST', 'localhost:8889');
define('USER', 'user');
define('PASS', '12345');
define('DB', 'db_php');

include ROOT . '/src/render.php';
include ROOT . '/src/menu.php';
include ROOT . '/src/db.php';
include ROOT . '/src/catalog.php';
include ROOT . '/src/gallery.php';
include ROOT . '/src/install.php';
include ROOT . '/src/bigimage.php';
include ROOT . '/libraries/resizer.php';
