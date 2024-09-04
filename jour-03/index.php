<?php
require_once 'functions.php';

$gradeId = 3;

$grade = findOneGrade($gradeId);

if ($grade && $grade->getName()) {
    echo "<h1>Étudiants de la promotion : " . htmlspecialchars($grade->getName()) . "</h1>";

    $students = $grade->getStudents();

    if ($students) {
        echo "<ul>";
        foreach ($students as $student) {
            echo "<li>";
            echo "Nom : " . htmlspecialchars($student['fullname']) . "<br>";
            echo "Email : " . htmlspecialchars($student['email']) . "<br>";
            echo "Date de naissance : " . htmlspecialchars($student['birthdate']) . "<br>";
            echo "Genre : " . htmlspecialchars($student['gender']);
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucun étudiant trouvé pour cette promotion.</p>";
    }
} else {
    echo "<p>Promotion non trouvée.</p>";
}
?>
