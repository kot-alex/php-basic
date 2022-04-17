<?php

function imageExists($id)
{
    $query = getAssocResult("SELECT id FROM gallery_img WHERE id='$id'");
    return ($query->num_rows != 0) ? '' : 'Image not found';
}

function getBigImage($id)
{
    return getOneResult("SELECT title, views FROM gallery_img WHERE id='$id'");
}

function updateViews($id)
{
    executeSql("UPDATE gallery_img SET views = views + 1 WHERE id='$id'");
}
