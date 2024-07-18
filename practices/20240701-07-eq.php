<?php

header('Content-Type: text/plain');

$ar1 = [3, 4, 5];
$ar2 = $ar1; # 設定值, 相當於複製一份, 不是設定參照 (位址)
$ar3 = &$ar1; # 設定位址 (參照)

$ar1[1] = 100;

print_r($ar1);
print_r($ar2);
print_r($ar3);
