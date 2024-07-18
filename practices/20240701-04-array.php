<?php

header('Content-Type: text/plain');

$ar1 = array(2, 4, 6);
$ar2 = [2, 4, 6];

$ar3 = array(
  'name' => 'David',
  'age' => 25,
);

$ar4 = [
  123,
  'name' => 'David',
  'age' => 25,
  'Hello~',
];

// echo $ar4 . "\n\n"; # 不要直接轉字串

var_dump($ar4);

print_r($ar4);

echo count($ar4);
