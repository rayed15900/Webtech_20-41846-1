<?php
require_once '../model.php';

$message = $err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     if (isset($_POST['UpdateFood']))
     {
          $data['fname'] = $_POST['fname'];
          $data['cat'] = $_POST['cat'];
          $data['price'] = $_POST['price'];

          if (updateFood($_POST['ID'], $data))
          {
               $message = "<label class='text-success'>Food Updated successfully</label>";
               header('Location: ../Task_B/ViewFoodMenu.php?id=' . $_POST["ID"]);
          }
     }
     else
     {
          $err="<label class='text-danger'>You are not allowed to access this page</label>";
     }
}
?>