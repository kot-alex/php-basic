<?php

function getBigImage($id)
{
    return getOneResult("SELECT title, views FROM gallery_img WHERE id = {$id}");
}

function updateViews($id)
{
    return executeSql("UPDATE gallery_img SET views = views + 1 WHERE id = {$id}");
}
