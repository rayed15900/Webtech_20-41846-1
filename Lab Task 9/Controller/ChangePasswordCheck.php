<?php
require_once '../Model/model.php';
session_start();
$message = $Err = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST['submit']))
    {        
        $AllUser = showAllUser();

        foreach($AllUser as $user)
        {
            if($user["user"]==$_SESSION["user"])
            {
                if($_POST["cpass"]==$user["pass"])
                {
                    $data["pass"]=$_POST["npass"];
                    editUserPass($user['user'], $data);
                    $message = "<label class='text-success'>Password Changed</label>";
                    break;
                }
                else
                {
                    $Err = "<label class='text-danger'>Current Password did not match</label>";
                }
            }
        }
    }
}
?>