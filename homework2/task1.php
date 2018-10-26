<?php
//Задание 1
echo 'Задание 1 <br/>';
$a = rand(0, 10);
$b = rand(0, 10);

echo "a = $a <br/>";
echo "b = $b <br/>";

if ($a >= 0 && $b >= 0) {
    echo $a - $b . "<br/>";
} else if ($a <= 0 && $b <= 0) {
    echo $a * $b . "<br/>";
} else {
    echo $a + $b . "<br/>";
}