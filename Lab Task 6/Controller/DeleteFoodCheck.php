<?php 
require_once '../Model/model.php';
$AllFoodMenu = showFoodMenu();

$click = "";

if($_GET['click'] == 1)
{
    deleteFood($_GET['id']);
    header('Location: ../View/DeleteFood.php');
}
?>