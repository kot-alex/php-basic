<?php

function getGallery($root)
{
    $dir = $root . '/img/gallery/small';
    return array_diff(scandir($dir), array('..', '.', '.DS_Store'));
}

function getMessage($status)
{
    $messages = [
        'ok' => 'Файл загружен.',
        'error' => 'Ошибка загрузки, файл не выбран.',
        'exist' => 'Файл с таким именем уже существует, выберите другое имя файла.',
        'format' => 'Неверный формат.',
        'size' => 'Файл слишком большой для обработки на сервере.',
        'extension' => 'Неверное расширение файла.'
    ];
    return $messages[$status];
}

function resizeImage($bigImagePath, $smallImagePath)
{
    $image = new SimpleImage();
    $image->load($bigImagePath);
    $image->resizeToWidth(150);
    $image->save($smallImagePath);
}

function uploadImage()
{
    $bigImagePath = ROOT . '/img/gallery/big/' . basename($_FILES['myfile']['name']);
    $smallImagePath = ROOT . '/img/gallery/small/' . $_FILES['myfile']['name'];
    $blacklist = array(".php", ".phtml", ".php3", ".php4");

    if (is_uploaded_file($_FILES['myfile']['tmp_name']) === false) {
        $status = 'error';
        goto end;
    }
    if (file_exists($bigImagePath)) {
        $status = 'exist';
        goto end;
    }
    if ($_FILES['myfile']['type'] != 'image/jpeg') {
        $status = 'format';
        goto end;
    }
    if ($_FILES['myfile']['size'] > 1024 * 1 * 1024) {
        $status = 'size';
        goto end;
    }
    foreach ($blacklist as $item) {
        if (preg_match("/$item\$/i", $_FILES['myfile']['name'])) {
            $status = 'extension';
            goto end;
        }
    }
    if (move_uploaded_file($_FILES['myfile']['tmp_name'], $bigImagePath)) {
        $status = 'ok';
        resizeImage($bigImagePath, $smallImagePath);
    } else {
        $status = 'error';
    }
    end:
    return $status;
}
