<?php

function getProducts()
{
    return getAssocResult("SELECT * FROM `catalog`");
}

function addToCart($id, $session, $price)
{
    $result = executeSql("SELECT good_id FROM cart WHERE good_id='$id' AND session_id='$session'");
    if ($result != 0) {
        executeSql("UPDATE cart SET qty = qty + 1 WHERE good_id='$id' AND session_id='$session'");
    } else {
        executeSql("INSERT INTO cart (good_id, session_id, price) VALUES ('$id', '$session', '$price')");
    }
}
