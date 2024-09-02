<?php
function my_str_reverse(string $string) : string {
    return strrev($string);
}

$test_result = my_str_reverse('Hello') === 'olleH';

if ($test_result) {
    echo "La fonction my_str_reverse fonctionne correctement.";
} else {
    echo "La fonction my_str_reverse ne fonctionne pas comme prévu.";
}
?>
