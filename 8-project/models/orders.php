<?php

function ordersExists()
{
    $userId = (int)$_SESSION['id'];
    $result = getAssocResult("SELECT `user_id` FROM orders WHERE `user_id`='$userId'");
    return ($result->num_rows != 0) ? '' : 'You have placed no orders';
}

function getUsersOrders()
{
    $userId = (int)$_SESSION['id'];
    return getAssocResult("SELECT id, `name`, phone, total, `status` FROM orders WHERE `user_id`='$userId' ORDER BY id DESC");
}

function getAllOrders()
{
    return getAssocResult("SELECT id, `name`, phone, total, `status` FROM orders ORDER BY id DESC");
}

function updateStatus()
{
    $orderId = (int)$_POST['id'];
    $status = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $_POST['status'])));
    executeSql("UPDATE orders SET `status`='$status' WHERE id='$orderId'");
}

function orderExists()
{
    $orderId = (int)$_GET['id'];
    $query = getAssocResult("SELECT id FROM `orders` WHERE id='$orderId'");
    return ($query->num_rows != 0) ? '' : 'Order not found';
}

function getOrder()
{
    $orderId = (int)$_GET['id'];
    return getAssocResult("SELECT cart.qty AS qty, cart.qty * cart.price AS price, `catalog`.id AS good_id, `catalog`.title AS title, `catalog`.`name` AS product_name, orders.name AS order_name, orders.phone AS phone, orders.total AS total, orders.status AS `status` FROM cart, `catalog`, orders WHERE cart.good_id=`catalog`.id AND cart.`session_id`=orders.session_id AND orders.id='$orderId'");
}
