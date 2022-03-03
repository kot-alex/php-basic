<?php

$about = renderTemplate("about", 1234);
$menu = renderTemplate("menu");

echo renderTemplate("layout", $phone, $about, $menu,);

function renderTemplate($page, $phone = '', $about = '', $menu = '')
{
    ob_start();
    include $page . ".php";
    return  ob_get_clean();
}
