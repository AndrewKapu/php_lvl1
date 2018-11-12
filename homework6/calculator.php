<?php
    if (!empty($_GET)) {
        $param1 = $_GET['value1'];
        $param2 = $_GET['value2'];
        $operation = $_GET['mathOperation'];
        $result = calc($param1, $param2, $operation);
        
    }

    function calc($param1, $param2, $operation) {
        $param1 = (int)$param1;
        $param2 = (int)$param2;
        if ($operation === 'Сложение') {
            return $result = $param1 + $param2;
        } elseif ($operation === 'Вычетание') {
            return $result = $param1 - $param2;
        }
        elseif ($operation === 'Умножение') {
            return $result = $param1 * $param2;
        } elseif ($operation === 'Деление') {
            if ($param2 == 0) {
                return $result = 'На ноль делить нельзя';
            } else {
                return $result = $param1 / $param2;
            }
        }
    }
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Калькулятор</h2>
    <form action="">
        <input type="number" name="value1" placeholder="10">
        <input type="number" name="value2" placeholder="5">
        <select name="mathOperation">
            <option value="Сложение">Сложение</option>
            <option value="Вычетание">Вычетание</option>
            <option value="Умножение">Умножение</option>
            <option value="Деление">Деление</option>
        </select>
        <button type="submit">Посчитать</button>
    </form>
<h2>Результат операции - <?echo $result?></h2>
</body>
</html>