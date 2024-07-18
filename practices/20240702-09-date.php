<?php
# date_default_timezone_set('Asia/Taipei');

printf('<h2>%s</h2>', date("Y-m-d H:i:s"));
printf('<h2>%s</h2>', date("Y-m-d H:i:s", time() + 30 * 24 * 60 * 60));
printf('<h2>%s</h2>', date("D w", time() + 30 * 24 * 60 * 60));

$t = strtotime('2024/02/29');
printf('<h2>%s</h2>', date("Y-m-d H:i:s", $t));

$t2 = strtotime('2024/05/35');
var_dump($t2);
printf('<h2>%s</h2>', date("Y-m-d H:i:s", $t2));
