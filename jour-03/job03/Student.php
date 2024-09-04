<?php

class Student {
    private int $id;
    private int $grade_id;
    private string $email;
    private string $fullname;
    private DateTime $birthdate;
    private string $gender;

    public function __construct(
        int $id = 0,
        int $grade_id = 0,
        string $email = "",
        string $fullname = "",
        DateTime $birthdate = null,
        string $gender = ""
    ) {
        $this->id = $id;
        $this->grade_id = $grade_id;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->birthdate = $birthdate ?: new DateTime();
        $this->gender = $gender;
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getGradeId(): int {
        return $this->grade_id;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function getFullname(): ?string {
        return $this->fullname;
    }

    public function getBirthdate(): DateTime {
        return $this->birthdate;
    }

    public function getGender(): ?string {
        return $this->gender;
    }

    // Setters
    public function setId(int $id): static {
        $this->id = $id;
        return $this;
    }

    public function setGradeId(int $grade_id): static {
        $this->grade_id = $grade_id;
        return $this;
    }

    public function setEmail(?string $email): static {
        $this->email = $email;
        return $this;
    }

    public function setFullname(?string $fullname): static {
        $this->fullname = $fullname;
        return $this;
    }

    public function setBirthdate(DateTime $birthdate): static {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function setGender(?string $gender): static {
        $this->gender = $gender;
        return $this;
    }
}
