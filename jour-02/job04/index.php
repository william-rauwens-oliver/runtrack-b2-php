<?php
function find_all_students_grades() : array {
    $root = 'root';

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lp_official', $root, $root);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "
            SELECT student.email, student.fullname, grade.name AS grade_name
            FROM student
            JOIN grade ON student.grade_id = grade.id
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
        return [];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants et de leurs promotions</title>
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
    <h1>Liste des étudiants et de leurs promotions</h1>
    <?php
    $students_grades = find_all_students_grades();
    ?>

    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Nom complet</th>
                <th>Nom de la promotion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students_grades as $student_grade): ?>
                <tr>
                    <td><?php echo htmlspecialchars($student_grade['email']); ?></td>
                    <td><?php echo htmlspecialchars($student_grade['fullname']); ?></td>
                    <td><?php echo htmlspecialchars($student_grade['grade_name']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
