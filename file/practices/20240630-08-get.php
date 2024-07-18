<?php

# isset() 判斷變數有沒有設定
# intval() 把變數轉換成整數

$a = isset($_GET["a"]) ? intval($_GET["a"]) : 0;


echo $a;