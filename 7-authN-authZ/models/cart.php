<?php
function cartExists($session)
{
    $result = getAssocResult("SELECT session_id FROM cart WHERE session_id='$session'");
    return ($result->num_rows != 0) ? '' : 'Cart is empty';
}

function getCart($session)
{
    return getAssocResult("SELECT cart.id as cart_id, cart.qty as qty, catalog.id as good_id, catalog.title as title, catalog.name as name, cart.price as price FROM cart, catalog WHERE cart.good_id=catalog.id AND session_id='$session'");
}

function deleteFromCart($id, $session)
{
    $result = executeSql("SELECT good_id FROM cart WHERE id='$id' AND session_id='$session' AND qty > 1");
    if ($result != 0) {
        executeSql("UPDATE cart SET qty = qty - 1 WHERE id='$id' AND session_id='$session'");
    } else {
        executeSql("DELETE FROM cart WHERE id='$id' AND session_id='$session'");
    }
}
