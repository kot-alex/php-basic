<?php

function getGallery()
{
    return getAssocResult("SELECT * FROM gallery_img ORDER BY views DESC");
}

function insertImage($name)
{
    return executeSql("INSERT INTO gallery_img (title) VALUES ('$name')");
}

function getMessage($status)
{
    $messages =  [
        '' => 'Upload image.',
        'ok' => 'Image uploaded successfully.',
        'error' => 'Upload error.',
        'nofile' => 'Please select a file.',
        'exist' => 'A File with the same name already exists.',
        'format' => 'Unsupported file format.',
        'size' => 'Size limit for images is 1.0 MB.',
        'extension' => 'File has unsupported extension.'
    ];
    return $messages[$status];
}

function resizeImage($pathBig, $pathSmall)
{
    $image = new SimpleImage();
    $image->load($pathBig);
    $image->resizeToWidth(150);
    $image->save($pathSmall);
}

function uploadImage()
{
    $pathBig = IMG_BIG . basename($_FILES['myfile']['name']);
    $pathSmall = IMG_SMALL . basename($_FILES['myfile']['name']);

    if (is_uploaded_file($_FILES['myfile']['tmp_name']) === false) {
        return header('Location:' . '/gallery/?status=nofile');
    }
    if (file_exists($pathBig)) {
        return header('Location:' . '/gallery/?status=exist');
    }
    if ($_FILES['myfile']['type'] != 'image/jpeg') {
        return header('Location:' . '/gallery/?status=format');
    }
    if ($_FILES['myfile']['size'] > 1 * 1024 * 1024) {
        return header('Location:' . '/gallery/?status=size');
    }
    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if (preg_match("/$item\$/i", $_FILES['myfile']['name'])) {
            return header('Location:' . '/gallery/?status=extension');
        }
    }
    if (move_uploaded_file($_FILES['myfile']['tmp_name'], $pathBig)) {
        resizeImage($pathBig, $pathSmall);
        insertImage($_FILES['myfile']['name']);
        return header('Location:' . '/gallery/?status=ok');
    } else {
        return header('Location:' . '/gallery/?status=error');
    }
}
