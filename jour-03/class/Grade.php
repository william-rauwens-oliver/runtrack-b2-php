<?php
class Grade {
    private $id;
    private $room_id;
    private $name;
    private $year;
    private $pdo;

    public function __construct($pdo, $id = null) {
        $this->pdo = $pdo;
        if ($id) {
            $this->id = $id;
            $this->load();
        }
    }

    private function load() {
        $stmt = $this->pdo->prepare("SELECT * FROM grade WHERE id = ?");
        $stmt->execute([$this->id]);
        $grade = $stmt->fetch();
        if ($grade) {
            $this->room_id = $grade['room_id'];
            $this->name = $grade['name'];
            $this->year = $grade['year'];
        }
    }

    public function getStudents(): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM student WHERE grade_id = ?");
        $stmt->execute([$this->id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: null;
    }

    public function getName(): ?string {
        return $this->name;
    }
}
?>
