<?php
include '../config/config.php';

$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$message = '';
if (isset($_GET['status'])) {
    $message = getMessage($_GET['status']);
}

$params['menu'] = getMenu();

switch ($page) {
    case 'index':
        $params['title'] = 'Главная';
        break;

    case 'catalog':
        $params['title'] = 'Каталог';
        $params['catalog'] = getCatalog();
        break;

    case 'about':
        $params['title'] = 'О нас';
        $params['phone'] = 123456;
        break;

    case 'tasks':
        $params['title'] = 'Задания';
        break;

    case 'gallery':
        if (!empty($_FILES)) {
            $status = uploadImage();
            uploadImage();
            header('Location:' . '/?page=gallery&status=' . $status);
            die();
        }
        $params['title'] = 'Галерея';
        $params['images'] = getGallery(ROOT);
        $params['message'] = $message;
        break;

    default:
        echo "404";
        die();
}

echo render($page, $params);
