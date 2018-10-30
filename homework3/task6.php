<?php
function menuGenerate() {
    $file = file_get_contents('index.html');
    $menuElems = [['menu' => 'Главная', 'subMenu' => null],
        ['menu' => 'Новости', 'subMenu' => ['Новости спорта', 'Новости о политике', 'Новости науки',]],
        ['menu' => 'О нас', 'subMenu' => null], ['menu' => 'Контакты', 'subMenu' => null]];
    $menuHtml = null;
    foreach ($menuElems as $menuValues) {
        if ($menuValues['subMenu'] != null) {
            $menuHtml .= "<div><a><span>$menuValues[menu]</span></a><div>";
            foreach ($menuValues['subMenu'] as $value) {
                $menuHtml .= "<a>$value</a>";
            }
            $menuHtml .= "</div></div>";
        } else {
            $menuHtml .= "<div><a><span>$menuValues[menu]</span></a></div>";
        }
    }

    $file = str_replace('{menu}', $menuHtml, $file);
    return $file;
}


echo menuGenerate();

