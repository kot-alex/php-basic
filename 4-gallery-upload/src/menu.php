<?php

function getMenu()
{
    return [
        [
            'url' => '/',
            'name' => 'Главная'
        ],
        [
            'url' => '?page=catalog',
            'name' => 'Каталог'
        ],
        [
            'url' => '?page=about',
            'name' => 'О Нас'
        ],
        [
            'url' => '?page=tasks',
            'name' => 'Задания'
        ],
        [
            'url' => '?page=gallery',
            'name' => 'Галерея'
        ],
    ];
}
