<?php

define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');
define('ROOT', dirname(__DIR__));
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('IMG_GALLERY_BIG', '/img/gallery/big/');
define('IMG_GALLERY_SMALL', '/img/gallery/small/');
define('IMG_CATALOG_BIG', '/img/catalog/big/');
define('IMG_CATALOG_SMALL', '/img/catalog/small/');

define('HOST', 'localhost:8889');
define('USER', 'user');
define('PASS', '12345');
define('DB', 'db_php');

include ROOT . '/engine/controller.php';
include ROOT . '/engine/render.php';
include ROOT . '/engine/db.php';
include ROOT . '/lib/resizer.php';
include ROOT . '/src/menu.php';
include ROOT . '/src/catalog.php';
include ROOT . '/src/product.php';
include ROOT . '/src/install.php';
include ROOT . '/src/gallery.php';
include ROOT . '/src/bigimage.php';
include ROOT . '/src/calc.php';
