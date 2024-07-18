<?php

header('Content-Type: text/plain');


$ar4 = [
  123,
  'name' => 'David',
  'age' => 25,
  'Hello~',
];

foreach ($ar4 as $k => $v) {
  echo "$k : $v \n\n";
}
