<?php
require_once 'functions.php';

$floorId = 2;

$floor = findOneFloor($floorId);

if ($floor && $floor->getName()) {
    echo "<h1>Étage : " . htmlspecialchars($floor->getName()) . "</h1>";

    $rooms = $floor->getRooms();

    if ($rooms) {
        echo "<ul>";
        foreach ($rooms as $room) {
            echo "<li>";
            echo "Salle : " . htmlspecialchars($room['name']) . "<br>";

            $roomObj = new Room(getPDO(), $room['id']);
            $grades = $roomObj->getGrades();

            echo "<pre>";
            echo "</pre>";

            if ($grades) {
                echo "<ul>";
                foreach ($grades as $grade) {
                    echo "<li>";
                    echo "Promotion : " . htmlspecialchars($grade['name']) . "<br>";
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Aucune promotion trouvée pour cette salle.</p>";
            }
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucune salle trouvée pour cet étage.</p>";
    }
} else {
    echo "<p>Étage non trouvé.</p>";
}
?>
