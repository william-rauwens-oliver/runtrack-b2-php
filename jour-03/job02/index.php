<?php

require_once 'class/Grade.php';
require_once 'class/Room.php';
require_once 'class/Floor.php';

$grade1 = new Grade(1, 8, "Bachelor 1", new DateTime("2023-01-09"));
var_dump($grade1);

$grade2 = new Grade();
var_dump($grade2);

$room1 = new Room(1, 1, "RDC Food and Drinks", 90);
var_dump($room1);

$room2 = new Room();
var_dump($room2);

$floor1 = new Floor(1, "Rez-de-chaussée", 0);
var_dump($floor1);

$floor2 = new Floor();
var_dump($floor2);
