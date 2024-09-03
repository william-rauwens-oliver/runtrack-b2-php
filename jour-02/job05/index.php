<?php
function find_full_rooms() : array {
    $root = 'root';

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lp_official', $root, $root);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "
            SELECT 
                r.name AS name, 
                r.capacity AS capacity, 
                COUNT(s.id) AS students_count
            FROM room r
            LEFT JOIN grade g ON r.id = g.room_id
            LEFT JOIN student s ON g.id = s.grade_id
            GROUP BY r.id
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($rooms as $room) {
            $is_full = $room['students_count'] >= $room['capacity'] ? 'Oui' : 'Non';
            $result[] = [
                'name' => $room['name'],
                'capacity' => $room['capacity'],
                'is_full' => $is_full
            ];
        }

        return $result;

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        return [];
    }
}

$rooms = find_full_rooms();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Salles</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Liste des Salles</h1>
    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>capacity</th>
                <th>is_full</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($rooms)): ?>
                <?php foreach ($rooms as $room): ?>
                    <tr>
                        <td><?= htmlspecialchars($room['name']) ?></td>
                        <td><?= htmlspecialchars($room['capacity']) ?></td>
                        <td><?= htmlspecialchars($room['is_full']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Aucune salle trouvée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
