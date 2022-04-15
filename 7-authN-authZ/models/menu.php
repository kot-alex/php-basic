<?php

function getMenu($count)
{
    return [
        [
            "url" => "/",
            "name" => "Main"
        ],
        [
            "url" => "/catalog",
            "name" => "Catalog"
        ],
        [
            "url" => "/about",
            "name" => "About"
        ],
        [
            "url" => "/tasks",
            "name" => "Tasks"
        ],
        [
            "url" => "/gallery",
            "name" => "Gallery"
        ],
        [
            "url" => "/calc",
            "name" => "Calculator"
        ],
        [
            "url" => "/feedbacks",
            "name" => "Feedbacks"
        ],
        [
            "url" => "/cart",
            "name" => "Cart ($count)"
        ],
    ];
}

function getCount($session)
{
    return getOneResult("SELECT SUM(qty) as count FROM cart WHERE session_id='$session'")['count'];
}
