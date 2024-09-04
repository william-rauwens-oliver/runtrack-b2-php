<?php

require_once 'class/Student.php';


$student1 = new Student(1, 1, "email@gmail.com", "Terry Cristinelli", new DateTime("1990-01-18"), "male");
var_dump($student1);

$student2 = new Student();
var_dump($student2);
