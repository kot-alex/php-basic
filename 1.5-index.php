<?php
$a = 1;
$b = 2; 

$tmp = $a;  // tmp = 1
$a = $b;    // a = 2
$b = $tmp;  // b = 1

$a = $a + $b;  // a = 3, b = 2
$b = $a - $b;  // a = 3, b = 1
$a = $a - $b;  // a = 2, b = 1

[$a, $b] = [$b, $a];

$a ^= $b ^= $a ^= $b;

/* from right to left
a = 1  01
b = 2  10
       ^
a = 3  11
b = 2  10
       ^
b = 1  01
a = 3  11
       ^
a = 2  10 */

echo "a = $a <br> b = $b";