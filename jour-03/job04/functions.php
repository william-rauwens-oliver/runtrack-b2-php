<?php

require_once 'class/Student.php';
require_once 'class/Grade.php';
require_once 'class/Floor.php';
require_once 'class/Room.php';

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

function findOneStudent(int $id): ?Student {
    $pdo = getPDO();
    try {
        $stmt = $pdo->prepare("SELECT * FROM student WHERE id = ?");
        $stmt->execute([$id]);
        $student = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($student) {
            return new Student(
                $student['id'],
                $student['grade_id'],
                $student['email'],
                $student['fullname'],
                new DateTime($student['birthdate']),
                $student['gender']
            );
        }
        return null;
    } catch (PDOException $e) {
        echo "Erreur de requête SQL : " . $e->getMessage();
        return null;
    }
}

function findOneGrade(int $id): ?Grade {
    $pdo = getPDO();
    try {
        $stmt = $pdo->prepare("SELECT * FROM grade WHERE id = ?");
        $stmt->execute([$id]);
        $grade = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($grade) {
            return new Grade($pdo, $id);
        }
        return null;
    } catch (PDOException $e) {
        echo "Erreur de requête SQL : " . $e->getMessage();
        return null;
    }
}

function findOneFloor(int $id): ?Floor {
    $pdo = getPDO();
    try {
        $stmt = $pdo->prepare("SELECT * FROM floor WHERE id = ?");
        $stmt->execute([$id]);
        $floor = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($floor) {
            return new Floor($pdo, $id);
        }
        return null;
    } catch (PDOException $e) {
        echo "Erreur de requête SQL : " . $e->getMessage();
        return null;
    }
}

function findOneRoom(int $id): ?Room {
    $pdo = getPDO();
    try {
        $stmt = $pdo->prepare("SELECT * FROM room WHERE id = ?");
        $stmt->execute([$id]);
        $room = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($room) {
            return new Room($pdo, $id);
        }
        return null;
    } catch (PDOException $e) {
        echo "Erreur de requête SQL : " . $e->getMessage();
        return null;
    }
}
?>
