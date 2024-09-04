<?php

class Floor {
    private int $id;
    private string $name;
    private int $level;

    public function __construct(
        int $id = 0,
        string $name = "",
        int $level = 0
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getLevel(): int {
        return $this->level;
    }
}
