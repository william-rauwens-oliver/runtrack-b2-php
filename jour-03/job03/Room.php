<?php

class Room {
    private int $id;
    private int $floorId;
    private string $name;
    private int $capacity;

    public function __construct(
        int $id = 0,
        int $floorId = 0,
        string $name = "",
        int $capacity = 0
    ) {
        $this->id = $id;
        $this->floorId = $floorId;
        $this->name = $name;
        $this->capacity = $capacity;
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getFloorId(): int {
        return $this->floorId;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function getCapacity(): int {
        return $this->capacity;
    }

    // Setters
    public function setId(int $id): static {
        $this->id = $id;
        return $this;
    }

    public function setFloorId(int $floorId): static {
        $this->floorId = $floorId;
        return $this;
    }

    public function setName(?string $name): static {
        $this->name = $name;
        return $this;
    }

    public function setCapacity(int $capacity): static {
        $this->capacity = $capacity;
        return $this;
    }
}
