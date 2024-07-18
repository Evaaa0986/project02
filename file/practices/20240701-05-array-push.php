<?php

header('Content-Type: text/plain');

$ar = []; # 不需要的, 但有宣告的用意
for ($i = 1; $i <= 42; $i++) {
  $ar[] = $i; # array_push()
}

shuffle($ar); # 亂數排序

// print_r($ar);
echo implode(",", $ar); # 把陣列接成字串

# explode # 把字串切成陣列
