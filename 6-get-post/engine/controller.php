<?php

function prepareVariables($page)
{
    $params['menu'] = getMenu();
    $params['layout'] = 'main';

    switch ($page) {
        case 'install';
            insertImages();
            die();

        case 'index':
            $params['title'] = 'Main';
            break;

        case 'catalog':
            $params['layout'] = 'catalog';
            $params['title'] = 'Catalog';
            $params['products'] = getProducts();
            break;

        case 'feedback':
            break;

        case 'product':
            $params['layout'] = 'catalog';
            $params['title'] = 'Product';
            $params['action'] = 'add';
            $params['buttonText'] = 'Send';
            $status = $_GET['status'] ?? '';
            $prodId = (int)$_GET['id'];
            if (!empty($_POST)) {
                $feedData = doFeedbackAction($_POST['action'], $prodId);
                $params['row'] = $feedData['row'];
                $params['action'] = $feedData['action'];
                $params['buttonText'] = $feedData['buttonText'];
            }
            $params['message'] = productExists($prodId);
            $params['product'] = getProduct($prodId);
            $params['feedbacks'] = getAllFeedbacks();
            $params['status'] = getReviewMessage($status);
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
                header('Location:' . '/gallery/?status=' . $status);
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

        default:
            echo "404";
            die();
    }
    return $params;
}
