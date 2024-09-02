<?php

function my_array_sort(array $arrayToSort, string $order) : array {
    if ($order !== 'ASC' && $order !== 'DESC') {
        throw new InvalidArgumentException("l'ordre doit être 'ASC' ou 'DESC'.");
    }

    $isNumeric = true;
    foreach ($arrayToSort as $item) {
        if (!is_numeric($item)) {
            $isNumeric = false;
            break;
        }
    }

    if ($isNumeric) {
        if ($order === 'ASC') {
            sort($arrayToSort, SORT_NUMERIC);
        } elseif ($order === 'DESC') {
            rsort($arrayToSort, SORT_NUMERIC);
        }
    } else {
        if ($order === 'ASC') {
            sort($arrayToSort, SORT_STRING);
        } elseif ($order === 'DESC') {
            rsort($arrayToSort, SORT_STRING);
        }
    }

    return $arrayToSort;
}

function display_result(array $sortedArray, array $expectedArray) {
    $formattedSorted = '{' . implode(',', $sortedArray) . '}';
    $formattedExpected = '{' . implode(',', $expectedArray) . '}';
    echo "$formattedSorted === $formattedExpected;\n";
}

display_result(my_array_sort([2, 24, 12, 7, 34], 'ASC'), [2, 7, 12, 24, 34]);
display_result(my_array_sort([8, 5, 23, 89, 6, 10], 'DESC'), [89, 23, 10, 8, 6, 5]);
display_result(my_array_sort(['pomme', 'banane', 'cerise', 'ananas', 'kiwi'], 'ASC'), ['ananas', 'banane', 'cerise', 'kiwi', 'pomme']);
display_result(my_array_sort(['pomme', 'banane', 'cerise', 'ananas', 'kiwi'], 'DESC'), ['pomme', 'kiwi', 'cerise', 'banane', 'ananas']);

?>
