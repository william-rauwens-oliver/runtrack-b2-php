<?php
class Floor {
    private $id;
    private $name;
    private $pdo;

    public function __construct($pdo, $id = null) {
        $this->pdo = $pdo;
        if ($id) {
            $this->id = $id;
            $this->load();
        }
    }

    private function load() {
        $stmt = $this->pdo->prepare("SELECT * FROM floor WHERE id = ?");
        $stmt->execute([$this->id]);
        $floor = $stmt->fetch();
        if ($floor) {
            $this->name = $floor['name'];
        }
    }

    public function getRooms(): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM room WHERE floor_id = ?");
        $stmt->execute([$this->id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: null;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(?string $name): void {
        $this->name = $name;
    }
}
?>
