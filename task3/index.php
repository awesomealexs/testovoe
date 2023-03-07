<?php

require_once __DIR__ . '/task3.php';

$task3 = new task3();

$boxes = [1, 2, 1, 5, 1, 3, 5, 2, 5, 4];
$weight = 6;

echo $task3->getResult($boxes, $weight) . PHP_EOL;

$boxes = [2, 4, 3, 6, 1];
$weight = 5;

echo $task3->getResult($boxes, $weight) . PHP_EOL;
