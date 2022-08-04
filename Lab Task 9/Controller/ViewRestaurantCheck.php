<?php
require_once '../Model/model.php';
session_start();
$fileErr = "";
$name = $email = $des = $phone = "";

$AllRestaurant = showRestaurant();

foreach($AllRestaurant as $res)
{
    if($res["owner"]==$_SESSION["user"])
    {
        $name = $res['name'];
        $email = $res['email'];
        $des = $res['des'];
        $phone = $res['phone'];
        $fileErr = "";
        break;
    }
    else
    {
        $fileErr = "<label class='text-danger'>Can not find Data</label>";
    }
}
?>