<?php
$file = file_get_contents('task5.html');
$file = str_replace('currentTime', date('d. m. Y'), $file);
echo $file;