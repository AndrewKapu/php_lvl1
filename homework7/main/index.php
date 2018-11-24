<?php
	session_start();
	$link = mysqli_connect('localhost', 'root', '', 'online-store') or die(mysqli_error($link));
	define('LOG', 'kh lkj lkj ');

	$page = empty($_GET['page']) ? 'login' : $_GET['page'];
	$action = empty($_GET['action']) ? 'index' : $_GET['action'];

	if (!file_exists(__DIR__.'/'.$page. '.php')){
		$page = 'login';
	}
	include(__DIR__.'/'.$page . '.php');

	if (!function_exists($action)){
		$action = 'index';
	}
	$content = $action();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<ul style="width: 153px; float: left;">
		<li>Главная</li>
		<li><a href="?page=login">Авторизация</a></li>
		<li><a href="?page=goods">Товары</a></li>
	</ul>
	<div style="width: 500px;float: left;margin-top: 45px;">
		<?= $content; ?>
		<div id="content"></div>			
	</div>
	
</body>
	<script>
	function send(page, action, id) {
		//console.log(page, action, id);
		$.ajax({
			type: "POST",
			url: `?page=${page}&action=${action}&id=${id}`,
			success : function (date) {
				$('#content').html(date);
			}
		})				
	}
	</script>
</html>