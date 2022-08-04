<?php
require_once '../Model/model.php';
session_start();
$a = array();

$AllFoodMenu = showFoodMenu();

echo "<br><br>";

$i = 0;
foreach($AllFoodMenu as $food)
{
     if($food["owner"]==$_SESSION["user"])
     {
          $a[$i] = $food['name'];
          $i += 1;
     }
}

$q = $_REQUEST["q"];

$hint = "";

if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

echo $hint === "" ? "no suggestion" : $hint;
?>