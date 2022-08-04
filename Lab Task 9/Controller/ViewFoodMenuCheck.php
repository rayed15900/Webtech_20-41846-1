<?php
require_once '../Model/model.php';
$fileErr = "";
$name = $cat = $price = "";

$AllFoodMenu = showFoodMenu();

echo "<br><br>";
foreach($AllFoodMenu as $food)
{
    if($food["owner"]==$_SESSION["user"])
    {
        $name = $food['name'];
        echo "Name: ".$name."<br>";
        $cat = $food['cat'];
        echo "Category: ".$cat."<br>";
        $price = $food['price'];
        echo "Price: ".$price."<br><hr>";
    }
}

?>