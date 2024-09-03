<?php
function insert_student(string $email, string $fullname, string $gender, DateTime $birthdate, int $gradeId): void {
    $root = 'root';

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lp_official', $root, $root);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $checkGradeSql = "SELECT COUNT(*) FROM grade WHERE id = :grade_id";
        $checkStmt = $pdo->prepare($checkGradeSql);
        $checkStmt->bindValue(':grade_id', $gradeId, PDO::PARAM_INT);
        $checkStmt->execute();

        if ($checkStmt->fetchColumn() == 0) {
            echo "Erreur : ID de la classe invalide.";
            return;
        }

        $sql = "INSERT INTO student (email, fullname, gender, birthdate, grade_id) VALUES (:email, :fullname, :gender, :birthdate, :grade_id)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':fullname', $fullname, PDO::PARAM_STR);
        $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
        $stmt->bindValue(':birthdate', $birthdate->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':grade_id', $gradeId, PDO::PARAM_INT);

        $stmt->execute();
        
        echo "L'étudiant a été ajouté avec succès.";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['input-email'];
    $fullname = $_POST['input-fullname'];
    $gender = $_POST['input-gender'];
    $birthdate = new DateTime($_POST['input-birthdate']);
    $gradeId = (int)$_POST['input-grade_id'];

    insert_student($email, $fullname, $gender, $birthdate, $gradeId);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'ajout d'étudiant</title>
</head>
<body>
    <h1>Ajouter un étudiant</h1>
    <form action="" method="post">
        <label for="input-email">Email :</label>
        <input type="email" id="input-email" name="input-email" required><br>

        <label for="input-fullname">Nom complet :</label>
        <input type="text" id="input-fullname" name="input-fullname" required><br>

        <label for="input-gender">Genre :</label>
        <select id="input-gender" name="input-gender" required>
            <option value="male">Homme</option>
            <option value="female">Femme</option>
        </select><br>

        <label for="input-birthdate">Date de naissance :</label>
        <input type="date" id="input-birthdate" name="input-birthdate" required><br>

        <label for="input-grade_id">ID de la classe :</label>
        <input type="number" id="input-grade_id" name="input-grade_id" required><br>

        <input type="submit" value="Ajouter l'étudiant">
    </form>
</body>
</html>
