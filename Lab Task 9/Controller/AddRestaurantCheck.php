<?php
require_once '../Model/model.php';
session_start();
$message = $err = $fileErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
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
?>