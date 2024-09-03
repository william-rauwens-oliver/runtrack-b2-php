<?php
function find_all_students() {
    $dsn = 'mysql:host=localhost;dbname=lp_official;charset=utf8';
    $username = 'root';
    $password = 'root';
    
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo->prepare("SELECT * FROM student");
        $stmt->execute();
        
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $students;
        
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return [];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
</head>
<body>

<h1>Liste des étudiants</h1>

<?php
$students = find_all_students();

if (!empty($students)) {
    echo "<table border='1'>";
    echo "<tr>";
    foreach ($students[0] as $column => $value) {
        echo "<th>" . htmlspecialchars($column) . "</th>";
    }
    echo "</tr>";
    
    foreach ($students as $student) {
        echo "<tr>";
        foreach ($student as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Aucun étudiant trouvé.</p>";
}
?>

</body>
</html>
