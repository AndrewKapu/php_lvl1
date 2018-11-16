<?php 
	session_start();
	$link = mysqli_connect('localhost', 'root', '', 'online-store') or die(mysqli_error($link));
	define('LOG', 'kh lkj lkj ');

	$page = empty($_GET['page']) ? 'login' : $_GET['page'];
	$action = empty($_GET['action']) ? 'index' : $_GET['action'];

	if (!file_exists($page. '.php')){
		$page = 'login';
	}
	include($page . '.php');

	if (!function_exists($action)){
		$action = 'index';
	}
	$content = $action($link);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<ul style="width: 153px; float: left;">
		<li>Главная</li>
		<li><a href="?page=login">Авторизация</a></li>
		<li><a href="?page=goods">Товары</a></li>
	</ul>
	<div style="width: 500px;float: left;margin-top: 45px;">
		<?= $content; ?>	
	</div>
	
</body>
</html>