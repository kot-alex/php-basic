<?php

function getGallery()
{
    return getAssocResult("SELECT * FROM gallery_img ORDER BY views DESC");
}

function insertImage($name)
{
    $filename = mysqli_real_escape_string(linkDb(), $name);
    executeSql("INSERT INTO gallery_img (title) VALUES ('$filename')");
}

function getGalleryMessage($status)
{
    $messages =  [
        'upload' => 'Upload image.',
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
    $pathBig = DOCUMENT_ROOT . IMG_GALLERY_BIG . basename($_FILES['myfile']['name']);
    $pathSmall = DOCUMENT_ROOT . IMG_GALLERY_SMALL . basename($_FILES['myfile']['name']);

    if (is_uploaded_file($_FILES['myfile']['tmp_name']) === false) {
        $status = 'nofile';
        return $status;
    }
    if (file_exists($pathBig)) {
        $status = 'exist';
        return $status;
    }
    if ($_FILES['myfile']['type'] != 'image/jpeg') {
        $status = 'format';
        return $status;
    }
    if ($_FILES['myfile']['size'] > 1 * 1024 * 1024) {
        $status = 'size';
        return $status;
    }
    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if (preg_match("/$item\$/i", $_FILES['myfile']['name'])) {
            $status = 'extension';
            return $status;
        }
    }
    if (move_uploaded_file($_FILES['myfile']['tmp_name'], $pathBig)) {
        insertImage($_FILES['myfile']['name']);
        resizeImage($pathBig, $pathSmall);
        $status = 'ok';
        return $status;
    } else {
        $status = 'error';
        return $status;
    }
}
