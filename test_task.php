<?php

/**
 * Задача 1: лесенка
 * Нужно вывести лесенкой числа от 1 до 100.
 * 1
 * 2 3
 * 4 5 6
 * ...
 */

$k = $j = 1;
for ($i = 1; $i <= 100; $i++) {
    echo $i;
    if ($k === $j) {
        echo "\n";

        $k++;
        $j = 1;

        continue;
    }
    $j++;
}

/**
 * Задача 2: массивы
 * Нужно заполнить массив 5 на 7 случайными уникальными числами от 1 до 1000.
 * Вывести получившийся массив и суммы по строкам и по столбцам.
 */

$arrSize = [5, 7];
$arrLengthNeedle = $arrSize[0] * $arrSize[1];
$rang = [0, 1000];


$arr = makeRandomlyFilledArray($arrLengthNeedle, $rang[0], $rang[1]);
while (true) {
    $arrLength = count($arr);
    if ($arrLength < $arrLengthNeedle) {
        $arr = array_unique(array_merge($arr,
            makeRandomlyFilledArray($arrLengthNeedle - $arrLength, $rang[0], $rang[1])));
        continue;
    }

    break;
}

echo buildHTMLTable($arr, $arrSize[0]);


function makeRandomlyFilledArray(int $length, int $minVal, int $maxVal)
{
    return array_unique(array_map(function () use ($minVal, $maxVal) {
        return random_int($minVal, $maxVal);
    }, array_fill(0, $length, null)));
}

function buildHTMLTable(array $arr, int $columnsAmount)
{
    $table = '';
    $i = 1;

    $table .= "<table>";
    foreach ($arr as $item) {
        if ($i === 1) {
            $table .= "<tr>";
        }

        $table .= "<td>{$item}</td>";

        if ($i === $columnsAmount) {
            $table .= "</tr>";
            $i = 1;

            continue;
        }

        $i++;
    }
    $table .= "</table>";

    return $table;
}

/**
 * Задача 3: фронт
 * Вы работаете в компании, присутствующей в нескольких городах РФ. На сайте компании есть страница с контактной информацией.
 * Маркетолог поставил задачу и уехал, к его приезду задача должна быть реализована.
 * На страницу контактов заходят люди из разных городов, нужно чтобы они видели телефон из своего города.
 * По умолчанию, в HTML-страницы прописан телефон 8-800-DIGITS. Телефон размещен вверху и внизу страницы.
 * Вот и все что рассказал маркетолог прежде чем уехать.
 */

/**
 * 1) Дать маркетологу по шее
 * 2) Выяснить какие номера телефонов и в каких городах это будет работать
 * 3) Интегрировать решение на сайте
 */

