<?php
require_once '../model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     if (isset($_POST['FindFood'])) 
     {
          echo $_POST['fname'];
          try
          {
               
               $allSearchedFood = searchFood($_POST['fname']);
               require_once 'ShowSearchedFood.php';
          } 
          catch (Exception $ex) 
          {
               echo $ex->getMessage();
          }
     }
}
