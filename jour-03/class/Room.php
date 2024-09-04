<?php
class Room {
    private $id;
    private $name;
    private $floor_id;
    private $pdo;

    public function __construct($pdo, $id = null) {
        $this->pdo = $pdo;
        if ($id) {
            $this->id = $id;
            $this->load();
        }
    }

    private function load() {
        $stmt = $this->pdo->prepare("SELECT * FROM room WHERE id = ?");
        $stmt->execute([$this->id]);
        $room = $stmt->fetch();
        if ($room) {
            $this->name = $room['name'];
            $this->floor_id = $room['floor_id'];
        }
    }

    public function getGrades(): ?array {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM grade WHERE room_id = ?");
            $stmt->execute([$this->id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            echo "Erreur de requête SQL : " . $e->getMessage();
            return null;
        }
    }    

    public function getName(): ?string {
        return $this->name;
    }
}

?>
