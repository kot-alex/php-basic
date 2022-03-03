<?php

$arg1 = rand(-10, 10);
$arg2 = rand(-10, 10);
$operation = array('+', '-', '*', '/', ' ');
$randOperation = $operation[rand(0, 4)];

echo "$arg1, $arg2, $randOperation <br>\n";
echo mathOperation($arg1, $arg2, $randOperation);

function add($arg1, $arg2)
{
    return 'sum = ' . ($arg1 + $arg2);
}

function sub($arg1, $arg2)
{
    return 'diff = ' . ($arg1 - $arg2);
}

function mul($arg1, $arg2)
{
    return 'product = ' . ($arg1 * $arg2);
}

function div($arg1, $arg2)
{
    return ($arg2 === 0) ? 'error, division by zero' : 'quotient = ' . round(($arg1 / $arg2), 2);
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
