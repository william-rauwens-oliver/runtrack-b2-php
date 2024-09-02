<?php
function my_str_search($letter, $string) {
    $count = 0;

    for ($i = 0; $i < strlen($string); $i++) {
        if ($string[$i] == $letter) {
            $count++;
        }
    }
    return $count;
}

$letter = 'a';
$string = 'La Plateforme';

echo "Le nombre de répétition de '$letter' dans '$string' est : " . my_str_search($letter, $string);
?>
