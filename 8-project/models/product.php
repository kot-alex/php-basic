<?php

function productExists($id)
{
    $query = getAssocResult("SELECT id FROM `catalog` WHERE id='$id'");
    return ($query->num_rows != 0) ? '' : 'Product not found';
}

function getProduct($id)
{
    return getOneResult("SELECT * FROM `catalog` WHERE id='$id'");
}
