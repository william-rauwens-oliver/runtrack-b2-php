<?php

class Grade {
    private int $id;
    private int $level;
    private string $name;
    private DateTime $startDate;

    public function __construct(
        int $id = 0,
        int $level = 0,
        string $name = "",
        DateTime $startDate = null
    ) {
        $this->id = $id;
        $this->level = $level;
        $this->name = $name;
        $this->startDate = $startDate ?: new DateTime();
    }

    public function getId(): int {
        return $this->id;
    }

    public function getLevel(): int {
        return $this->level;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getStartDate(): DateTime {
        return $this->startDate;
    }
}
