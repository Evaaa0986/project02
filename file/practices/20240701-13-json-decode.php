<?php

header('Content-Type: text/plain');

$str = '{"name":"小明", "性別":"男生"}';

$obj1 = json_decode($str); # 拿到的是 PHP 的物件

var_dump($obj1);

echo $obj1->name . "\n\n";

$ar1 = json_decode($str, true); # 拿到的是 PHP 的陣列

var_dump($ar1);
