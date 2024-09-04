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

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getLevel(): int {
        return $this->level;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function getStartDate(): DateTime {
        return $this->startDate;
    }

    // Setters
    public function setId(int $id): static {
        $this->id = $id;
        return $this;
    }

    public function setLevel(int $level): static {
        $this->level = $level;
        return $this;
    }

    public function setName(?string $name): static {
        $this->name = $name;
        return $this;
    }

    public function setStartDate(DateTime $startDate): static {
        $this->startDate = $startDate;
        return $this;
    }
}
