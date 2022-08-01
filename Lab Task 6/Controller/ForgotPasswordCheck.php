<?php
require_once '../Model/model.php';
$message = $emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if(empty($_POST["email"]))
    {
        $error = "<label class='text-danger'>Email Required</label>";
    }
    else
    {
        $email = $_POST["email"];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "<label class='text-danger'>Invalid email format</label>";
        }
        else
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
    }
}
?>