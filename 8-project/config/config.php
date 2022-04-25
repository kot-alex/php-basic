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

include ROOT . '/src/controller.php';
include ROOT . '/src/render.php';
include ROOT . '/src/db.php';
include ROOT . '/lib/resizer.php';
include ROOT . '/models/menu.php';
include ROOT . '/models/catalog.php';
include ROOT . '/models/product.php';
include ROOT . '/models/install.php';
include ROOT . '/models/gallery.php';
include ROOT . '/models/bigimage.php';
include ROOT . '/models/calc.php';
include ROOT . '/models/feedbacks.php';
include ROOT . '/models/cart.php';
include ROOT . '/models/auth.php';
include ROOT . '/models/orders.php';
