<?php
require_once '../Model/model.php';
$message = $Err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
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
?>