<?php

echo declensionHour(date('h'));
echo declensionMinute(date('i'));

function declensionHour(int $hour)
{
    if ($hour > 10 && $hour < 15) {
        return $hour . ' часов ';
    }
    switch ($hour % 10) {
        case 1:
            return $hour . ' час ';
        case 2:
        case 3:
        case 4:
            return $hour . ' часа ';
        default:
            return $hour . ' часов ';
    }
}

function declensionMinute(int $minute)
{
    if ($minute > 10 && $minute < 15) {
        return $minute . ' минут';
    }
    switch ($minute % 10) {
        case 1:
            return $minute . ' минута';
        case 2:
        case 3:
        case 4:
            return $minute . ' минуты';
        default:
            return $minute . ' минут';
    }
}

/*
0 часов	минут	10 часов минут 20 часов минут	30 минут  40 минут
1 час	минута	11 часов минут 21 час	минута	31 минута 41 минута
2 часа	минуты	12 часов минут 22 часа	минуты	32 минуты 42 минуты
3 часа	минуты	13 часов минут 23 часа	минуты	33 минуты 43 минуты
4 часа	минуты	14 часов минут 24 часа	минуты	34 минуты 44 минуты
5 часов	минут	15 часов минут 25		минут	35 минут  45 минут
6 часов	минут	16 часов минут 26		минут	36 минут  46 минут 
7 часов минут	17 часов минут 27		минут	37 минут  47 минут
8 часов	минут	18 часов минут 28		минут	38 минут  48 минут 
9 часов минут	19 часов минут 29		минут	39 минут  49 минут
*/