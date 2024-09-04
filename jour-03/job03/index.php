<?php

require_once 'class/Student.php';
require_once 'class/Grade.php';
require_once 'class/Room.php';
require_once 'class/Floor.php';

$student1 = new Student(1, 1, "email@gmail.com", "Terry Cristinelli", new DateTime("1990-01-18"), "male");
echo "Student 1:\n";
var_dump($student1);

$student2 = new Student();
echo "Student 2 (default values):\n";
var_dump($student2);

$grade1 = new Grade(1, 8, "Bachelor 1", new DateTime("2023-01-09"));
echo "Grade 1:\n";
var_dump($grade1);

$grade2 = new Grade();
echo "Grade 2 (default values):\n";
var_dump($grade2);

$room1 = new Room(1, 1, "RDC Food and Drinks", 90);
echo "Room 1:\n";
var_dump($room1);

$room2 = new Room();
echo "Room 2 (default values):\n";
var_dump($room2);

$floor1 = new Floor(1, "Rez-de-chaussée", 0);
echo "Floor 1:\n";
var_dump($floor1);

$floor2 = new Floor();
echo "Floor 2 (default values):\n";
var_dump($floor2);

