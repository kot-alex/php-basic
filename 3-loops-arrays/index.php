<?php
define('TEMPLATES_DIR', 'templates/');
define('LAYOUTS_DIR', 'layouts/');

$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
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

    default:
        echo "404";
        die();
}

echo render($page, $params);

function getMenu()
{
    return [
        'Главная' => '?page=index',
        'Каталог' => '?page=catalog',
        'О нас' => '?page=about',
        'Задания' => '?page=tasks',
    ];
}

function getCatalog()
{
    return [
        [
            'name' => 'Яблоко',
            'price' => 24,
            'image' => 'apple.jpg'
        ],
        [
            'name' => 'Пицца',
            'price' => 1,
            'image' => 'pizza.jpeg'
        ],
        [
            'name' => 'Чай',
            'price' => 12,
            'image' => 'tea.png'
        ],
    ];
}

function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'title' => $params['title'],
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params)
    ]);
}

function renderTemplate($page, $params = [])
{
    extract($params);
    ob_start();
    include TEMPLATES_DIR . $page . ".php";
    return ob_get_clean();
}
