<?php
require_once 'class/Grade.php';

function getPDO(): PDO {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lp_official', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
        exit;
    }
}

function findOneGrade(int $id): ?Grade {
    $pdo = getPDO();
    return new Grade($pdo, $id);
}
?>
