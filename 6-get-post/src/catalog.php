<?php

function getProducts()
{
    return getAssocResult("SELECT * FROM `catalog`");
}
