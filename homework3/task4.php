<?php

/**
 * Проводит транслитерацию строки
 * @param {string} $string Строка на русском языке
 * @return {string} обработанная строка
 */
function transliteration($string) {
   /* $array = [
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'yo',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'j',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'x',
        'ц' => 'cz',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'shh',
        'ы' => 'y`',
        'э' => 'e`',
        'ю' => 'yu',
        'я' => 'ya',
    ];
    $letters = str_split($string);
    /*foreach ($array as $russianLetter => $englishLetter) {
        foreach ($letters as $j => $letter) {
            if ($russianLetter === $letter) {
                $letters[$j] = $englishLetter;
            }
        }
    }*/
    /*foreach ($letters as $j => $letter) {
        echo 'Привет <br>';
        foreach ($array as $russianLetter => $englishLetter) {
            if ($letter === $russianLetter) {
                $letters[$j] = $englishLetter;
            }
        }

    }
    $letters = implode('', $letters);
    return $letters;*/
    $rus = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'];
    $lat = ['A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya'];
    return str_replace($rus, $lat, $string);
}

echo transliteration('пока');

