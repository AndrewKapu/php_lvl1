<?
function index(){
	global $link;
	isAdmin();

	$content = '';

	$res = mysqli_query($link, "SELECT id, name, zakaz, status FROM zakaz");
	while($row = mysqli_fetch_assoc($res)){
	    //$zakaz = json_decode($row['zakaz'], true);
	    $content .=<<<php
	    {$row['name']} <a href="?page=admin&action=showZakaz&id={$row['id']}">Просмотр</a>
	    <hr>
php;
	}

	return $content;
}