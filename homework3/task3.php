<?php
$array = [
    'Московская область' => [
        'Москва',
        'Зеленоград',
        'Клин',
    ],
    'Ленинградская область' => [
        'Санкт-Петербург',
        'Всеволожск',
        'Павловск',
        'Кронштадт'
    ],
];

foreach ($array as $index => $value) {
    /*echo "<br>$index:<br>";
    foreach ($value as $key => $box) {
        echo "$box, ";
    }*/
    echo "$index:<br>";
    echo implode(', ', $value) . '<br>';

}

?>

