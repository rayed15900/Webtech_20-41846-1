<?php
require_once '../Model/model.php';
$message = $error = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $AllUser = showAllUser();

    foreach($AllUser as $user)
    {
        if($user["email"]==$_POST["email"])
        {
            $password = $user["pass"];
            $message = "<label class = text-success>Email Found! Your Password is: $password </label>";
            $error = "";
            break;
        }
        else
        {
            $error = "<label class='text-danger'>Email not found</label>";
        }
    }
}
?>