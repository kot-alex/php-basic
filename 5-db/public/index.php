<?php

include '../config/config.php';

$urlArray = explode('/', $_SERVER['REQUEST_URI']);

if ($urlArray[1] == "") {
    $page = 'index';
} else {
    $page = $urlArray[1];
}

$params['menu'] = getMenu();
$layout = 'main';

switch ($page) {
    case 'install';
        insertImages();
        die();

    case 'index':
        $params['title'] = 'Main';
        break;

    case 'catalog':
        $params['title'] = 'Catalog';
        $params['catalog'] = getCatalog();
        break;

    case 'about':
        $params['title'] = 'About';
        $params['phone'] = 123456;
        break;

    case 'tasks':
        $params['title'] = 'Tasks';
        break;

    case 'gallery':
        if (!empty($_FILES)) {
            uploadImage();
            die();
        }
        $layout = 'gallery';
        $params['title'] = 'Gallery';
        $params['images'] = getGallery();
        $params['message'] = getMessage($_GET['status'] ?? '');
        break;

    case 'bigimage':
        $layout = 'gallery';
        $id = (int)$_GET['id'];
        updateViews($id);
        $params['title'] = 'Image';
        $params['image'] = getBigImage($id);
        break;

    default:
        echo "404";
        die();
}

echo render($page, $params, $layout);
