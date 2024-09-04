<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des Étage, Salles et Promotions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Informations</h1>

    <?php
    require_once 'functions.php';

    function displayFloorInformation(int $floorId) {
        $floor = findOneFloor($floorId);

        if ($floor && $floor->getName()) {
            echo "<h2>Étage : " . htmlspecialchars($floor->getName()) . "</h2>";

            $rooms = $floor->getRooms();

            if ($rooms) {
                echo "<ul>";
                foreach ($rooms as $room) {
                    echo "<li>";
                    echo "Salle : " . htmlspecialchars($room['name']) . "<br>";

                    $roomObj = new Room(getPDO(), $room['id']);
                    $grades = $roomObj->getGrades();

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
    }

    displayFloorInformation(1);
    displayFloorInformation(2);
    ?>
</body>
</html>
