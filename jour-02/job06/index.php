<?php
function find_ordered_students() {
    $root = 'root';
    
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lp_official', $root, $root);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "
            SELECT
                g.name AS promotion_name,
                s.fullname,
                s.birthdate,
                s.email
            FROM
                student s
            JOIN
                grade g ON s.grade_id = g.id
            ORDER BY
                g.name, s.fullname
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();

        $grades = [];
        foreach ($rows as $row) {
            $promotionName = $row['promotion_name'];
            if (!isset($grades[$promotionName])) {
                $grades[$promotionName] = [];
            }
            $grades[$promotionName][] = [
                'fullname' => $row['fullname'],
                'birthdate' => $row['birthdate'],
                'email' => $row['email']
            ];
        }

        uasort($grades, function($a, $b) {
            return count($b) - count($a);
        });

        return $grades;

    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

$grades = find_ordered_students();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants par promotion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .promotion-name {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Liste des étudiants par promotion</h1>

    <?php foreach ($grades as $promotionName => $students): ?>
        <div class="promotion">
            <div class="promotion-name"><?php echo htmlspecialchars($promotionName); ?></div>
            <table>
                <thead>
                    <tr>
                        <th>Nom complet</th>
                        <th>Date de naissance</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($student['fullname']); ?></td>
                            <td><?php echo htmlspecialchars($student['birthdate']); ?></td>
                            <td><?php echo htmlspecialchars($student['email']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endforeach; ?>

</body>
</html>
