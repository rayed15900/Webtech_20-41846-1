<?php
require_once '../Model/model.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     if(isset($_POST['submit']))
     {
          $data['owner'] = $_SESSION['user'];
          $data['name'] = $_POST['name'];
          $data['cat'] = $_POST['cat'];
          $data['price'] = $_POST['price'];
     
          if(foodItem($data))
          {
               $message = "<label class='text-success'>Food Item Added successfully</label>";
          }
          else 
          {
               $message = "<label class='text-danger'>Can not add Food Item</label>";
          }
     }  
}
?>