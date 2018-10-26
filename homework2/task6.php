<?php
///Задание 6
function power($val, $pow)
{
    if ($pow == 0) {
        return 1;
    }
    if ($pow < 0) {
        return power(1/$val, -$pow);
    }

    return $val * power($val, $pow - 1);//2 * 2 * 2 * 2 * 2 * 1
}

echo power(2, 5);