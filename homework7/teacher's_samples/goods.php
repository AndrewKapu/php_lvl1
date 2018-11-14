<?
function index($link){
	$content = '';
	$res = mysqli_query($link, "SELECT id, name, category_id FROM gods");
	while($row = mysqli_fetch_assoc($res)){
	    $content .= "<a href='?page=goods&action=show&id={$row['id']}'>{$row['name']}</a> <br>";
	}

	return $content;
}

function show($link){
	$content = '';
	$id = (int)$_GET['id'];
	$sql = "SELECT id, name, category_id, info FROM gods WHERE id = $id";
	$res = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($res);
	$content =<<<php
		<h1>{$row['name']}</h1>
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

function addComment($link){
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

