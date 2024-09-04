<?php
require_once 'class/Grade.php';
require_once 'class/Room.php';
require_once 'class/Floor.php';

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

function findOneRoom(int $id): ?Room {
    $pdo = getPDO();
    return new Room($pdo, $id);
}

function findOneFloor(int $id): ?Floor {
    $pdo = getPDO();
    return new Floor($pdo, $id);
}
?>
