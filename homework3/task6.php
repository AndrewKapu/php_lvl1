<?php
function menuGenerate() {
    $file = file_get_contents('index.html');
    $menuElems = ['<div><a><span>Главная</span></a></div>',
        '<div><a><span>Новости</span></a></div>',
        '<div><a><span>О нас</span></a></div>',
        '<div><a><span>Контакты</span></a></div>',];
    $menuForHtml = '';
    for ($i = 0; $i < count($menuElems); $i++) {
        $menuForHtml .= $menuElems[$i];
    }
    $file = str_replace('{menu}', $menuForHtml, $file);
    return $file;
}
echo menuGenerate();
