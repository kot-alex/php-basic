<?php

function linkDb()
{
    static $db = null;
    if (is_null($db)) {
        $db = mysqli_connect(HOST, USER, PASS, DB) or die('Could not connect: ' . mysqli_connect_error());
    }
    return $db;
}

function getAssocResult($sql)
{
    $result = mysqli_query(linkDb(), $sql) or die(mysqli_error(linkDb()));
    $result->fetch_all();
    return $result;
}

function getOneResult($sql)
{
    $result = mysqli_query(linkDb(), $sql) or die(mysqli_error(linkDb()));
    return mysqli_fetch_assoc($result);
}

function executeSql($sql)
{
    mysqli_query(linkDb(), $sql) or die(mysqli_error(linkDb()));
    return mysqli_affected_rows(linkDb());
}
