<?php

function insertImages()
{
    $result = mysqli_query(linkDb(), "SELECT id FROM gallery_img");
    if ($result->num_rows == 0) {
        echo 'The table is empty, data has been uploaded.';
        $titles = array_diff(scandir(DOCUMENT_ROOT . IMG_GALLERY_SMALL), ['..', '.', '.DS_Store']);
        executeSql("INSERT INTO gallery_img (title) VALUES ('" . implode("'), ('", array_values($titles)) . "')");
    } else {
        echo 'The table is already filled';
    }
}
