<?php

function prepareVariables($page)
{
    $session = session_id();
    $action = $_POST['action'] ?? '';
    $params['menu'] = getMenu(getCount($session));
    $params['layout'] = 'main';
    $params['auth'] = isAuth();
    $params['name'] = getUser();

    switch ($page) {
        case 'install':
            insertImages();
            die();

        case 'login':
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            if (auth($login, $pass)) {
                if (isset($_POST['save'])) {
                    $hash = uniqid(rand(), true);
                    updateSessionHash($hash);
                    setcookie('hash', $hash, time() + 3600, '/');
                }
                header('Location:' . $_SERVER['HTTP_REFERER']);
                die();
            } else {
                die('Wrong login/password.');
            }
            break;

        case 'logout':
            setcookie('hash', '', time() - 1, '/');
            session_regenerate_id();
            session_destroy();
            header('Location:' . '/');
            break;

        case 'index':
            $params['title'] = 'Main';
            break;

        case ($action == 'addToCart'):
            addToCart($session);
            header('Location:' . $_SERVER['HTTP_REFERER']);
            die();

        case 'catalog':
            $params['title'] = 'Catalog';
            $params['products'] = getProducts();
            break;

        case 'product':
            $id = (int)$_GET['id'];
            $params['title'] = 'Product';
            $params['message'] = productExists($id);
            $params['product'] = getProduct($id);
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
            $params['title'] = 'Gallery';
            $params['images'] = getGallery();
            $params['message'] = getGalleryMessage($_GET['status'] ?? 'upload');
            break;

        case 'bigimage':
            $id = (int)$_GET['id'];
            updateViews($id);
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
            $author = $_POST['author'] ?? '';
            $feedback = $_POST['feedback'] ?? '';
            if (!empty($_POST)) {
                $feedData = doFeedbackAction($action, $_POST['id'], $author, $feedback);
                $params['row'] = $feedData['row'];
                $params['action'] = $feedData['action'];
                $params['buttonText'] = $feedData['buttonText'];
            }
            $params['title'] = 'Feedbacks';
            $params['feedbacks'] = getAllFeedbacks();
            $params['message'] = getReviewMessage($status);
            break;

        case 'cart':
            $params['title'] = 'Cart';
            $params['message'] = cartExists($session);
            $params['cart'] = getCart($session);
            $params['total'] = getTotal($session);
            if ($action == 'order') {
                addOrder($session);
                session_regenerate_id();
                header('Location: /catalog');
                die();
            };
            if ($action == 'delete') {
                deleteFromCart($session);
                header('Location: /cart');
                die();
            };
            break;

        case 'orders':
            $params['message'] = ordersExists();
            if (isset($_SESSION['id'])) {
                $params['title'] = 'My orders';
                $params['orders'] = getUsersOrders();
                if (isAdmin()) {
                    $params['title'] = 'Admin';
                    $params['orders'] = getAllOrders();
                    if ($action == 'changeStatus') {
                        updateStatus();
                        header('Location:' . $_SERVER['HTTP_REFERER']);
                        die();
                    }
                }
            } else {
                die('You must be logged in.');
            }
            break;

        case 'order':
            $params['title'] = 'Order ' . (int)$_GET['id'];
            $params['message'] = orderExists();
            $params['order'] = getOrder();
            break;

        default:
            echo "404";
            die();
    }
    return $params;
}
