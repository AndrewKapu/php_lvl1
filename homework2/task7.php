<?php
//Задание 7
echo "<br/>";

echo date('G') . ' ' . correctHour() . ' ' . date('i') . ' '. correctMin();
function correctHour ()
{
    $x = date('G');
    if ($x === 11) {
        return 'Часов';
    } else if ($x === 1 || $x === 21) {
        return 'Час';
    } else if ($x === 0 || ($x > 4 && $x < 21)) {
        return 'Часов';
    } else {return 'Часа';}

}

function correctMin ()
{
    $x = date('i');
    if ($x === 11) {
        return 'Минут';
    } else if ($x % 10 === 1) {
        return 'Минута';
    } else if ($x % 5 === 0 || ($x % 10 > 4 && $x % 10 < 19)) {
        return 'Минут';
    } else {return 'Минуты';}

}
