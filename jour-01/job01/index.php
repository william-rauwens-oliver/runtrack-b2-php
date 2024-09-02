<?php
function my_str_search(string $haystack, string $needle) : int {
    $count = 0;
    $needleLength = strlen($needle);
    $haystackLength = strlen($haystack);

    for ($i = 0; $i <= $haystackLength - $needleLength; $i++) {
        if (substr($haystack, $i, $needleLength) === $needle) {
            $count++;
        }
    }
    return $count;
}

if (my_str_search('La Plateforme', 'a') === 2) {
    echo "Le nombre d'occurrences de 'a' dans 'La Plateforme' est bien 2.";
} else {
    echo "Le nombre d'occurrences de 'a' dans 'La Plateforme' n'est pas 2.";
}
?>
