<?php
//Задание 3, 4

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
mathOperation(100, 50, 'деление');