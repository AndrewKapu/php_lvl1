<?php
function spaceToUnderline($str) {
    return str_replace(' ', '_', $str);
}
echo spaceToUnderline('Через терни к звёздам');