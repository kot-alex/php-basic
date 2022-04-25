<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';

$urlArray = explode('/', $_SERVER['REQUEST_URI']);

if ($urlArray[1] == "") {
    $page = 'index';
} else {
    $page = $urlArray[1];
}

session_start();

$params = prepareVariables($page);

echo render($page, $params);
