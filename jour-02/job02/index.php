<?php
function find_one_student(string $email): array {
    $root = 'root';

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lp_official', $root, $root);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM student WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $student = $stmt->fetch(PDO::FETCH_ASSOC);
        return $student ? $student : [];
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
        return [];
    }
}

if (isset($_GET['input-email-student']) && !empty($_GET['input-email-student'])) {
    $email = $_GET['input-email-student'];
    $student = find_one_student($email);
    
    if (!empty($student)) {
        echo '<h2>Informations de l\'étudiant :</h2>';
        echo '<ul>';
        foreach ($student as $key => $value) {
            echo '<li>' . htmlspecialchars($key) . ': ' . htmlspecialchars($value) . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Aucun étudiant trouvé pour cet email.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'un étudiant</title>
</head>
<body>
    <h1>Rechercher un étudiant</h1>
    <form method="get" action="">
        <label for="input-email-student">Email de l'étudiant :</label>
        <input type="text" id="input-email-student" name="input-email-student" required>
        <button type="submit">Rechercher</button>
    </form>
</body>
</html>
