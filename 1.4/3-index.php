<?php
$title = "Главная страница - страница обо мне";
$heading = "Информация обо мне";
$image = "aviation.jpg";
$year = date("Y");

$content = file_get_contents("3-site.html");

$content = str_replace("{{ title }}", $title, $content);
$content = str_replace("{{ heading }}", $heading, $content);
$content = str_replace("{{ image }}", $image, $content);
$content = str_replace("{{ year }}", $year, $content);

echo $content;