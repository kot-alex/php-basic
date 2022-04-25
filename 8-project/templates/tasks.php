<h2>Tasks</h2>
<?php

$i = 0;

while ($i <= 100) {
    if ($i % 3 === 0) {
        echo $i . ' ';
    }
    $i++;
}

//==================================================
echo '<br><br>';
//==================================================

$i = 0;

do {
    if ($i === 0) {
        echo $i . ' - zero.<br>';
    } elseif ($i & 1 === 1) {
        echo $i . ' - odd number.<br>';
    } else {
        echo $i . ' - even number.<br>';
    }
    $i++;
} while ($i <= 10);

//==================================================
echo '<br>';
//==================================================

$regions = [
    'Île-de-France' => ['Paris', 'Hauts-de-Seine', 'Seine-Saint-Denis'],
    'Auvergne-Rhône-Alpes' => ['Lyon', 'Grenoble', 'Saint-Étienne'],
    'Nouvelle-Aquitaine' => ['Bordeaux', 'Bayonne', 'Limoges'],
];

foreach ($regions as $region => $cities) {
    // echo $region . ':<br>';
    echo "{$region}:<br>";
    // echo sprintf('%s.<br>', implode(', ', $cities));
    echo implode(', ', $cities) . '.<br>';
}

//==================================================
echo '<br>';
//==================================================

const ALPHABET = [
    'а' => 'a',   'б' => 'b',   'в' => 'v',
    'г' => 'g',   'д' => 'd',   'е' => 'e',
    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
    'и' => 'i',   'й' => 'y',   'к' => 'k',
    'л' => 'l',   'м' => 'm',   'н' => 'n',
    'о' => 'o',   'п' => 'p',   'р' => 'r',
    'с' => 's',   'т' => 't',   'у' => 'u',
    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
    'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
];

$text = "Привет мир!";

function translit($text, $letters = ALPHABET)
{
    $translate = '';
    for ($i = 0; $i < mb_strlen($text); $i++) {
        $letter = mb_substr($text, $i, 1);
        $lowercaseLetter = mb_strtolower($letter);
        if (isset($letters[$letter])) {
            $translate .= $letters[$letter];
        } elseif (isset($letters[$lowercaseLetter])) {
            $translate .= ucfirst($letters[$lowercaseLetter]);
        } else {
            $translate .= $letter;
        }
    }
    return $translate;
}

echo translit($text);

//==================================================
echo '<br><br>';
//==================================================

function spaceToUnderscore($text)
{
    return str_replace(' ', '_', $text);
}

echo spaceToUnderscore($text);

//==================================================
echo '<br><br>';
//==================================================

for ($i = 0; $i <= 9; print $i . ' ', $i++);

//==================================================
echo '<br><br>';
//==================================================

$regions = [
    'Île-de-France' => ['Paris', 'Hauts-de-Seine', 'Seine-Saint-Denis'],
    'Auvergne-Rhône-Alpes' => ['Lyon', 'Grenoble', 'Saint-Étienne'],
    'Nouvelle-Aquitaine' => ['Bordeaux', 'Bayonne', 'Limoges'],
];

foreach ($regions as $region => $cities) {
    $citiesList = '';
    echo $region . ':<br>';
    foreach ($cities as $city) {
        if (mb_substr($city, 0, 1) === 'L') {
            $citiesList .= $city . ', ';
        }
    }
    if (!empty($citiesList)) {
        $citiesList = substr_replace($citiesList, '.<br>', strrpos($citiesList, ','), 1);
        echo $citiesList;
    }
}

//==================================================
echo '<br>';
//==================================================

function modifyText($text)
{
    return translit(spaceToUnderscore($text));
}

echo modifyText($text);
