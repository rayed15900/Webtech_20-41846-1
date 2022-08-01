<?php
require_once '../Model/model.php';
session_start();
$message = $err = $fileErr = $nameErr = $emailErr = $desErr = $phoneErr = "";
$name = $email = $des = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     if(empty($_POST["name"]))  
     {  
          $nameErr = "<label class='text-danger'>Name Required</label>";  
     }
     else
     {
          $name = $_POST["name"];
          if (!preg_match("/^[a-zA-Z\.\ ]{3,20}+$/",$name)) 
          {
               $nameErr = "<label class='text-danger'>Invalid Name</label>";
          }
     }

     if(empty($_POST["email"]))  
     {  
          $emailErr = "<label class='text-danger'>Email Required</label>";  
     }
     else
     {
          $email = $_POST["email"];
          if(!filter_var($email, FILTER_VALIDATE_EMAIL))
          {
               $emailErr = "<label class='text-danger'>Invalid Email</label>";
          }
     }
     
     if(empty($_POST["des"]))  
     {  
          $desErr = "<label class='text-danger'>Destination Required</label>";  
     }
     else
     {
          $des = $_POST["des"];
          if (!preg_match("/^[a-zA-Z\.\ ]{3,20}+$/",$des))
          {
               $desErr = "<label class='text-danger'>Invalid Destination</label>";
          }
     }
     
     if(empty($_POST["phone"]))  
     {  
          $phoneErr = "<label class='text-danger'>Phone Number Required</label>";  
     }
     else
     {
          $phone = $_POST["phone"];
          if (!preg_match("/^[0-9]{11}$/",$phone))
          {
               $phoneErr = "<label class='text-danger'>Invalid Phone Number</label>";
          }
     }

     if($nameErr == "" && $emailErr == "" && $desErr == "" && $phoneErr == "")  
     {
          $AllRestaurant = showRestaurant();

          if(isset($_POST['submit']))
          {
               $exists = 0;

               foreach($AllRestaurant as $res)
               {
                    if($res['owner'] == $_SESSION['user'])
                    {
                         $exists = 1;
                         $err = "<label class='text-danger'>Restaurant already exists</label>";
                         break;
                    }
               }

               if($exists == 0)
               {
                    $data['owner'] = $_SESSION['user'];
                    $data['name'] = $_POST['name'];
                    $data['email'] = $_POST['email'];
                    $data['des'] = $_POST['des'];
                    $data['phone'] = $_POST['phone'];
               
                    if(restaurant($data))
                    {
                         $message = "<label class='text-success'>Restaurant added successfully</label>";
                    }
                    else 
                    {
                         $message = "<label class='text-danger'>Can not add restaurant</label>";
                    }
               }
          }
     }
}
?>