<?php
header('Content-Type: application/json');

echo json_encode([
  '_POST' => $_POST,
  '_FILES' => $_FILES,
]);
