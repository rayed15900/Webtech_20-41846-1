<?php 
require_once '../model.php';

if (deleteFood($_GET['id'])) {
    header('Location: ../Task_B/ViewFoodMenu.php');
}

 ?>