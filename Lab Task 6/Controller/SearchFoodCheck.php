<?php
require_once '../Model/model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     if (isset($_POST['FindFood'])) 
     {
          echo $_POST['name'];
          try
          {
               $AllSearchedFood = searchFood($_POST['name']);
               require_once '../View/ShowSearchedFood.php';
          } 
          catch (Exception $ex) 
          {
               echo $ex->getMessage();
          }
     }
}
