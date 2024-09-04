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
}