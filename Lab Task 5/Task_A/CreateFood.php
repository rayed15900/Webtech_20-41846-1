<?php
require_once '../model.php';

$message = $err = $fileErr = $nameErr =  $catErr = $priceErr = "";
$name = $cat = $price = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     if(empty($_POST["fname"]))  
     {  
          $nameErr = "<label class='text-danger'>Name Required</label>";  
     }
     else
     {
          $name = $_POST["fname"];
          if (!preg_match("/^[a-zA-Z\.\ ]{3,20}+$/",$name)) 
          {
               $nameErr = "<label class='text-danger'>Invalid Name</label>";
          }
     }
     
     if(empty($_POST["cat"]))  
     {  
          $catErr = "<label class='text-danger'>Category Required</label>";  
     }
     else
     {
          $cat = $_POST["cat"];
          if (!preg_match("/^[a-zA-Z\.\ ]{3,20}+$/",$cat))
          {
               $catErr = "<label class='text-danger'>Invalid Category</label>";
          }
     }
     
     if(empty($_POST["price"]))  
     {  
          $priceErr = "<label class='text-danger'>Price Required</label>";  
     }
     else
     {
          $price = $_POST["price"];
          if (!preg_match("/[0-9]$/",$price))
          {
               $priceErr = "<label class='text-danger'>Invalid Price</label>";
          }
     }

     if($nameErr == "" && $catErr == "" && $priceErr == "")  
     {
          if (isset($_POST['CreateFood'])) {
               $data['fname'] = $_POST['fname'];
               $data['cat'] = $_POST['cat'];
               $data['price'] = $_POST['price'];
          
            if (addFood($data)) {
               $message = "<label class='text-success'>Food Item Added successfully</label>";
            }
          } else {
               $message = "<label class='text-danger'>You are not allowed to access this page</label>";
          }
     }  
}
?>