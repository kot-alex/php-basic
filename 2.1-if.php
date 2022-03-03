<?php

$a = rand(-10, 10);
$b = rand(-10, 10);

echo "$a, $b <br>\n";

if ($a >= 0 && $b >= 0) {
    echo 'a и b положительные';
} elseif ($a < 0 && $b < 0) {
    echo 'a и b отрицательные';
} else {
    echo 'a и b разных знаков';
}
