<?php

function add($arg1, $arg2)
{
    return $arg1 + $arg2;
}

function sub($arg1, $arg2)
{
    return $arg1 - $arg2;
}

function mul($arg1, $arg2)
{
    return $arg1 * $arg2;
}

function div($arg1, $arg2)
{
    return ($arg2 != 0) ? $arg1 / $arg2 : 'Division by zero';
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case '+':
            return add($arg1, $arg2);
        case '-':
            return sub($arg1, $arg2);
        case '*':
            return mul($arg1, $arg2);
        case '/':
            return div($arg1, $arg2);
        default:
            return 'error, no operation';
    }
}
