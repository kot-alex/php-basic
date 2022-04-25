<?php

function cartExists($session)
{
    $result = getAssocResult("SELECT `session_id` FROM cart WHERE `session_id`='$session'");
    return ($result->num_rows != 0) ? '' : 'Cart is empty';
}

function getCart($session)
{
    return getAssocResult("SELECT cart.id AS cart_id, cart.qty AS qty, `catalog`.id AS good_id, `catalog`.title AS title, `catalog`.`name` AS `name`, cart.price AS price FROM cart, `catalog` WHERE cart.good_id=`catalog`.id AND `session_id`='$session'");
}

function getTotal($session)
{
    return getOneResult("SELECT SUM(qty * price) AS total FROM cart WHERE `session_id`='$session'")['total'];
}

function deleteFromCart($session)
{
    $cartId = (int)$_POST['cart_id'];
    $result = executeSql("SELECT good_id FROM cart WHERE id='$cartId' AND `session_id`='$session' AND qty > 1");
    if ($result != 0) {
        executeSql("UPDATE cart SET qty = qty - 1 WHERE id='$cartId' AND `session_id`='$session'");
    } else {
        executeSql("DELETE FROM cart WHERE id='$cartId' AND `session_id`='$session'");
    }
}

function addOrder($session)
{
    $userId = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $_SESSION['id'])));
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $_POST['name'])));
    $phone = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $_POST['phone'])));
    $total = getTotal($session);
    executeSql("INSERT INTO orders (`session_id`, `user_id`, `name`, phone, total) VALUES ('$session', '$userId', '$name', '$phone', '$total')");
}
