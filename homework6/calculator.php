<?php
if (!empty($_GET)) {
    $param1 = $_GET['value1'];
    $param2 = $_GET['value2'];
    $operation = $_GET['mathOperation'];
    $result = null;

    switch($operation){
        case 'Сложение':
            return $result = $param1 + $param2;
            break;
        case 'Вычетание':
            return $result = $param1 - $param2;
            break;
        case 'Умножение':
            return $result = $param1 * $param2;
            break;
        case 'Деление':
            return $result = $param1 / $param2;
            break;
    }
   var_dump ($result);
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
    <input type="number" name="value1" placeholder="значение №1">
    <input type="number" name="value2" placeholder="значение №2">
    <select name="mathOperation">
    <option value="Сложение">Сложение</option>
    <option value="Вычетание">Вычетание</option>
    <option value="Умножение">Умножение</option>
    <option value="Деление">Деление</option>
    </select>
    <input type="submit">
</form>
</body>
</html>