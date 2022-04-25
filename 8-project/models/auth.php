<?php

function getUser()
{
    return $_SESSION['login'] ?? '';
}

function isAdmin()
{
    return $_SESSION['login'] == 'admin';
}

function isAuth()
{
    if (isset($_COOKIE['hash']) && !isset($_SESSION['login'])) {
        $hash = $_COOKIE['hash'];
        $result = getOneResult("SELECT id, `login` FROM users WHERE session_hash='$hash'");
        if ($result) {
            $_SESSION['id'] = $result['id'];
            $_SESSION['login'] = $result['login'];
        }
    }
    return isset($_SESSION['login']);
}

function auth($login, $pass)
{
    $login = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $login)));
    $result = getOneResult("SELECT * FROM users WHERE `login`='$login'");
    if ($result && password_verify($pass, $result['pass_hash'])) {
        $_SESSION['id'] = $result['id'];
        $_SESSION['login'] = $login;
        return true;
    } else {
        return false;
    }
}

function updateSessionHash($hash)
{
    $id = (int)$_SESSION['id'];
    executeSql("UPDATE users SET session_hash='$hash' WHERE id='$id'");
}
