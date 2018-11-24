<?php 
	session_start();
	$link = mysqli_connect('localhost', 'root', '', 'gbphp') or die(mysqli_error($link));
	define('LOG', 'kh lkj lkj ');

	function isAdmin(){
		if ($_SESSION['isAdmin'] != LOG){
			$_SESSION['msg'] = 'Не достаточно прав';
			header('Location: /');
			exit;
		}
	}


	$page = empty($_GET['page']) ? 'login' : $_GET['page'];
	$action = empty($_GET['action']) ? 'index' : $_GET['action'];

	if (!file_exists(__DIR__ . '/'.$page. '.php')){
		$page = 'login';
	}
	include(__DIR__ . '/'.$page . '.php');

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
	<div class="msg">
		<?
			if (!empty($_SESSION['msg'])){
				echo $_SESSION['msg'];
				$_SESSION['msg'] = '';
			}
		?>
	</div>
	<img src="/img/imgres.jpg" alt="">

	<ul style="width: 153px; float: left;">
		<li>Главная</li>
		<li><a href="?page=login">Авторизация</a></li>
		<li><a href="?page=goods">Товары</a></li>
		<?php 
			if ($_SESSION['isAdmin'] == LOG){
				echo '<li><a href="?page=admin">Заказы</a></li>';
			}
		?>
	</ul>
	<div style="width: 500px;float: left;margin-top: 45px;">
		<div style="text-align: right;">
			<a href="?page=goods&action=showCart">
				Корзина 
				<span id="cart"><?= count($_SESSION['cart'])?></span>
			</a>
		</div>
		<?= $content; ?>	
	</div>
	<?php 
		var_dump($_SESSION);
	 ?>

	 <script>
var a = <?= '{"name":"Саня"}'?>

	 	function send(id, action = 'addCart') {
	 		$.ajax({
	 			type: "POST",
	 			url: "?page=goods&action=" + action + "&id=" + id,
	 			success: function(date){
	 				$('#cart').html(date);
	 				console.log(date);
	 			}

	 		})
	 	}
	 </script>	
</body>
</html>