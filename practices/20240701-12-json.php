<?php

sleep(10); // 模擬網速很慢的情況

header('Content-Type: application/json');

$ar1 = [
  'name' => '小新',
  'age' => 25,
  'Hello~',
];

echo json_encode($ar1, JSON_UNESCAPED_UNICODE);
