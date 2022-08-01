<?php
require_once '../Model/model.php';
$message = $fileErr = $nameErr = $emailErr = $userErr = $passErr = $cpassErr = $genderErr = $dobErr = "";
$name = $email = $user = $pass = $cpass = $gender = $dob = "";

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
     
     if(empty($_POST["user"]))  
     {  
          $userErr = "<label class='text-danger'>Username Required</label>";  
     }
     else
     {
          $user = $_POST["user"];
          if (!preg_match("/^[a-zA-Z][\.\-\_\a-zA-Z0-9]{3,20}+$/",$user))
          {
               $userErr = "<label class='text-danger'>Invalid Username</label>";
          }
     }
     
     if(empty($_POST["pass"]))  
     {  
          $passErr = "<label class='text-danger'>Password Required</label>";  
     }
     else
     {
          $pass = $_POST["pass"];
          if (!preg_match("/^[a-zA-Z\-\_\@\#\%\&\.0-9]{3,20}+$/",$pass)) 
          {
               $passErr = "<label class='text-danger'>Invalid Password</label>";
          }
     }
     
     if(empty($_POST["cpass"]))  
     {  
          $cpassErr = "<label class='text-danger'>Confirm Password Required</label>";  
     } 
     else
     {
          $cpass = $_POST["cpass"];
          $pass = $_POST["pass"];
          if($cpass != $pass)
          {
               $cpassErr = "<label class='text-danger'>Password does not match</label>";
          }
     }
     
     if(empty($_POST["gender"]))  
     {  
          $genderErr = "<label class='text-danger'>Select a gender</label>";  
     }


     if(empty($_POST["dob"]))  
     {  
          $dobErr = "<label class='text-danger'>Select a Date</label>";  
     }

     if($nameErr == "" && $emailErr == "" && $userErr == "" && $passErr == "" && $cpassErr == "" && $genderErr == "" && $dobErr == "")  
     {
          if (isset($_POST['register']))
          {
               $data['name'] = $_POST['name'];
               $data['email'] = $_POST['email'];
               $data['user'] = $_POST['user'];
               $data['pass'] = $_POST['pass'];
               $data['gender'] = $_POST['gender'];
               $data['dob'] = $_POST['dob'];
          
               if (register($data))
               {
                    $message = "<label class='text-success'>Account registered successfully</label>";
               }
               else 
               {
                    $message = "<label class='text-danger'>Registration Failed</label>";
               }
          }
     }  
}
?>