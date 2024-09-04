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

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getRoomId(): ?int {
        return $this->room_id;
    }

    public function setRoomId(int $room_id): void {
        $this->room_id = $room_id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(?string $name): void {
        $this->name = $name;
    }

    public function getYear(): ?int {
        return $this->year;
    }

    public function setYear(?int $year): void {
        $this->year = $year;
    }
}
?>
