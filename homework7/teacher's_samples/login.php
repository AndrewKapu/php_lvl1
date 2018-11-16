<?php 
function index($link){
	
	$content = <<<php
	<form method="post" action="?page=login&action=login">
		<input type="text" name="login">
		<input type="text" name="password">
		<input type="submit">
	</form>
php;
	if ($_SESSION['isAdmin'] == LOG){
		$content = '<a href="?page=login&action=logout">Выход</a>';
		$content .= '<a href="?page=user&action=render">Ваш личный кабинет</a>';
	}

	return $content;
}

function login($link){

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (empty($_POST['login']) || empty($_POST['password'])){
			header('Location: /');
			exit;
		}
	
		$login = $_POST['login'];

		$sql = "SELECT name, id, login, password FROM users WHERE login = '$login' ";
		$res = mysqli_query($link, $sql);
    	$row = mysqli_fetch_assoc($res);
		$password = md5($_POST['password']);
		if ($password == $row['password']){
			$_SESSION = [
				'isAdmin' => LOG,
				'name' => $row['name'],
				'login' => $row['login'],
				'id' => $row['id'],
			];
		}
	}
	header('Location: /');
	exit;
}

function logout($link){
	session_destroy();
	header('Location: /');
	exit;

}


	