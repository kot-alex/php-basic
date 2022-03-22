<?php

function insertImages()
{
    $titles = array_diff(scandir(IMG_SMALL), array('..', '.', '.DS_Store'));
    $query = executeSql("INSERT INTO gallery_img (title) VALUES ('" . implode("'), ('", array_values($titles)) . "')");
    return $query;
}
