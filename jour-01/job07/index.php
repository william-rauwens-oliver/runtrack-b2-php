<?php 

function my_closest_to_zero(array $array) : int {
    if (empty($array)) {
        throw new InvalidArgumentException('Le tableau ne peut pas être vide.');
    }

    $closest = $array[0];

    foreach ($array as $num) {
        if (abs($num) < abs($closest) || (abs($num) === abs($closest) && $num < $closest)) {
            $closest = $num;
        }
    }

    return $closest;
}

echo "my_closest_to_zero([2, -1, 5, 23, 21, 9]) === " . my_closest_to_zero([2, -1, 5, 23, 21, 9]) . ";\n";
echo "my_closest_to_zero([234, -142, 512, 1223, 451, -59]) === " . my_closest_to_zero([234, -142, 512, 1223, 451, -59]) . ";\n";

?>
