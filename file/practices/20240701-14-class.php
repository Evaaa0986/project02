<?php

header('Content-Type: application/json');

class Person
{
  public $name;
  public $mobile;
  private $sno = '345354';

  public function __construct($name, $mobile)
  {
    $this->name = $name;
    $this->mobile = $mobile;
  }

  # getter
  function getSno()
  {
    return $this->sno;
  }
  # setter
  function setSno($sno)
  {
    $this->sno = $sno;
  }
}

$p1 = new Person("David", "0938");

// $p1->name = "Bill";
// $p1->mobile = "0915";
# $p1->sno = "123";
print_r($p1);

echo $p1->getSno() . '<br>';
