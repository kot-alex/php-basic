<?php
function getUser()
{
    return $_SESSION['login'];
}

function isAdmin()
{
    return $_SESSION['login'] == 'admin';
}

function isAuth()
{
    return isset($_SESSION['login']);
}

function auth($login, $pass)
{
    $login = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $login)));
    $result = getOneResult("SELECT * FROM users WHERE login='$login'");
    if ($pass == $result['pass']) {
        $_SESSION['login'] = 'login';
        $_SESSION['id'] = $result['id'];
        return true;
    } else {
        return false;
    }
}
