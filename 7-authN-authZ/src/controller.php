<?php

function prepareVariables($page)
{
    $session = session_id();
    $action = $_POST['action'] ?? '';
    $allow = 'false';
    $params['menu'] = getMenu(getCount($session));
    $params['layout'] = 'main';
    $params['name'] = getUser();
    $params['auth'] = isAuth();

    switch ($page) {
        case 'install':
            insertImages();
            die();

        case 'login':
            if ($action == 'login') {
                $login = $_POST['login'];
                $pass = $_POST['pass'];
                if (auth($login, $pass)) {
                    header('Location: /');
                    die();
                } else {
                    die('wrong login/pass');
                }
            }
            break;

        case 'logout':
            break;

        case 'index':
            $params['title'] = 'Main';
            break;

        case 'catalog':
            $id = $_POST['id'] ?? '';
            $price = $_POST['price'] ?? '';
            $params['title'] = 'Catalog';
            $params['products'] = getProducts();
            if ($action == 'add') {
                addToCart($id, $session, $price);
                header('Location: /catalog');
                die();
            };
            break;

        case 'product':
            $id = (int)$_GET['id'];
            $price = $_POST['price'] ?? '';
            $params['title'] = 'Product';
            $params['message'] = productExists($id);
            $params['product'] = getProduct($id);
            if ($action == 'add') {
                addToCart($id, $session, $price);
                header('Location: /product/?id=' . $id);
                die();
            };
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
                $status = uploadImage();
                uploadImage();
                header('Location: /gallery/?status=' . $status);
                die();
            }
            $params['layout'] = 'gallery';
            $params['title'] = 'Gallery';
            $params['images'] = getGallery();
            $params['message'] = getGalleryMessage($_GET['status'] ?? 'upload');
            break;

        case 'bigimage':
            $id = (int)$_GET['id'];
            updateViews($id);
            $params['layout'] = 'gallery';
            $params['title'] = 'Image';
            $params['message'] = imageExists($id);
            $params['image'] = getBigImage($id);
            break;

        case 'calc':
            $params['title'] = 'Calculator';
            $params['arg1'] = $_GET['arg1'] ?? 0;
            $params['arg2'] = $_GET['arg2'] ?? 0;
            $params['operation'] = $_GET['operation'] ?? '';
            $params['result'] = $_GET['result'] ?? 0;
            if (!empty($_GET)) {
                $arg1 = $_GET['arg1'] ?? 0;
                $arg2 = $_GET['arg2'] ?? 0;
                $operation = $_GET['operation'] ?? '';
                $params['result'] = mathOperation($arg1, $arg2, $operation);
            }
            break;

        case 'feedbacks':
            $status = $_GET['status'] ?? '';
            $id = $_POST['id'] ?? '';
            $author = $_POST['author'] ?? '';
            $feedback = $_POST['feedback'] ?? '';
            if (!empty($_POST)) {
                $feedData = doFeedbackAction($action, $id, $author, $feedback);
                $params['row'] = $feedData['row'];
                $params['action'] = $feedData['action'];
                $params['buttonText'] = $feedData['buttonText'];
            }
            $params['title'] = 'Feedbacks';
            $params['feedbacks'] = getAllFeedbacks();
            $params['message'] = getReviewMessage($status);
            break;

        case 'cart':
            $id = $_POST['id'] ?? '';
            $params['title'] = 'Cart';
            $params['message'] = cartExists($session);
            $params['cart'] = getCart($session);
            if ($action == 'delete') {
                deleteFromCart($id, $session);
                header('Location: /cart');
                die();
            };
            break;

        default:
            echo "404";
            die();
    }
    return $params;
}
