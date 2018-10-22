<?php
$currentDate = date("d.m.y");
$h1 = "Гость, добро пожаловать к нам на сайт!";
$p = "Сегодня $currentDate" ;
echo <<<text
<h1>$h1</h1>
<p>$p</p>
text;

$a = 1;
$b = 2;
list($a, $b) = array($b, $a);
echo $a;
echo $b;
?>