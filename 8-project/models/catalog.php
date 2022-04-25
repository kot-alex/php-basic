<?php

function getProducts()
{
    return getAssocResult("SELECT * FROM `catalog`");
}

function addToCart($session)
{
    $id = (int)$_POST['id'];
    $userId = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $_SESSION['id'])));
    $price = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $_POST['price'])));
    $result = executeSql("SELECT good_id FROM cart WHERE good_id='$id' AND `session_id`='$session'");
    if ($result != 0) {
        executeSql("UPDATE cart SET qty = qty + 1 WHERE good_id='$id' AND `session_id`='$session'");
    } else {
        executeSql("INSERT INTO cart (`session_id`, `user_id`, good_id, price) VALUES ('$session', '$userId', '$id', '$price')");
    }
}
