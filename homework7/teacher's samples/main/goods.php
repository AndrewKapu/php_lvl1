<?
function index(){
	global $link;

	$content = '';
	$res = mysqli_query($link, "SELECT id, name, category_id FROM gods");
	while($row = mysqli_fetch_assoc($res)){
	    $content .=<<<php
	    <a href='?page=goods&action=show&id={$row['id']}'>{$row['name']}</a> 
	    <a href='#' onclick="send({$row['id']})">Добавить в корзину</a><br>
php;
	}

	return $content;
}

function show(){
	global $link;

	$content = '';
	$id = (int)$_GET['id'];
	$sql = "SELECT id, name, category_id, info FROM gods WHERE id = $id";
	$res = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($res);
	$content =<<<php
		<h1>{$row['name']}</h1>
		<p align="right"><a href='#' onclick="send({$row['id']})">Добавить в корзину</a><br></p>
		<p>{$row['info']}</p>
php;

	$content .= "<h2>Комментарий</h2>";

	$content .=<<<php
		<form action="?page=goods&action=addComment&id=$id" method="post">
			<textarea name="text"></textarea>
			<input type="submit">
		</form>
php;

	$sql = "SELECT id, god_id, text FROM comment WHERE god_id =  $id";
	$res = mysqli_query($link, $sql);
	while($row = mysqli_fetch_assoc($res)){
	    $content .= "{$row['text']}<br>";
	}

	return $content;
}

function addComment(){
	global $link;

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (empty($_POST['text'])){
			header('Location: /');
			exit;
		}
		$id = (int)$_GET['id'];

		$sql = "INSERT INTO comment (god_id, text) VALUES ('$id', '{$_POST['text']}')";
		mysqli_query($link, $sql);
		header('Location: ?page=goods&action=show&id='. $id);
			exit;
	}
}

function addCart(){
	$id = (int)$_GET['id'];
	$_SESSION['cart'][$id] = isset($_SESSION['cart'][$id]) 
		? $_SESSION['cart'][$id] + 1
		: 1;
	echo count($_SESSION['cart']);

	exit;
}

function showCart(){
	global $link;

	if (empty($_SESSION['cart'])){
		return 'Нет товаров';
	}


	$content = '';
	$sql = "SELECT id, name, category_id FROM gods WHERE id IN (" 
			. implode(',', array_keys($_SESSION['cart'])) . ")";
	
	$res = mysqli_query($link, $sql) or die(mysqli_error($link));
	while($row = mysqli_fetch_assoc($res)){
	    $id = $row['id'];
	    $content .=<<<php
	    {$row['name']} - {$_SESSION['cart'][$id]}шт.<br>
php;
	}
	$content .=<<<php
		<h2>Заказать</h2>
	   <form action="?page=goods&action=addZakaz" method="post">
		<input name="name" placeholder="Введите ваше имя">
		<input type="submit">
	   </form>
php;



	return $content;
}

function addZakaz(){
	global $link;

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (empty($_POST['name'])){
			$_SESSION['msg'] = 'Что-то пошло не так';
			header('Location: ?page=goods&action=showCart');
			exit;
		}

		$name = $_POST['name'];
		$zakaz = json_encode($_SESSION['cart']);

		$sql = "INSERT INTO zakaz(name, zakaz) VALUES ('$name', '$zakaz')";
		mysqli_query($link, $sql) or die(mysqli_error($link));

		$_SESSION['cart'] = [];
		$_SESSION['msg'] = 'Ваш заказ ожидает оплаты';
	}
	header('Location: ?page=goods&action=showCart');
	exit;
}