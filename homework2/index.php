<?php
//Задание 1
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
//Задание 2
$c = rand(0, 15);
echo $c . "<br/>";
switch ($c) {
    case 0:
        $c = 0;
        echo $c;
    case 1:
        $c = 1;
        echo $c;
    case 2:
        $c = 2;
        echo $c;
    case 3:
        $c = 3;
        echo $c;
    case 4:
        $c = 4;
        echo $c;
    case 5:
        $c = 5;
        echo $c;
    case 6:
        $c = 6;
        echo $c;
    case 7:
        $c = 7;
        echo $c;
    case 8:
        $c = 8;
        echo $c;
    case 9:
        $c = 9;
        echo $c;
    case 10:
        $c = 10;
        echo $c;
    case 11:
        $c = 11;
        echo $c;
    case 12:
        $c = 12;
        echo $c;
    case 13:
        $c = 13;
        echo $c;
    case 14:
        $c = 14;
        echo $c;
    case 15:
        $c = 15;
        echo $c;


}
//Задание 3, 4
echo "<br/>";
function sum($a, $b)
{
    return $a + $b;
}

function diff($a, $b)
{
    return $a - $b;
}

function mult($a, $b)
{
    return $a * $b;
}

function div($a, $b)
{
    return $a / $b;
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case 'сумма':
            echo sum($arg1, $arg2);
            break;
        case 'разность':
            echo diff($arg1, $arg2);
            break;
        case 'умножение':
            echo mult($arg1, $arg2);
            break;
        case 'деление':
            echo div($arg1, $arg2);
            break;
    }
}
mathOperation(100, 50, деление);

?>