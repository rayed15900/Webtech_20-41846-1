<?php
require_once '../Model/model.php';

$Err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if($_POST["user"] != "" && $_POST["pass"] != "")
    {
        if (isset($_POST['login']))
        {
            $AllUser = showAllUser();
            
            foreach($AllUser as $user)
            {
                if($user["user"]==$_POST["user"] && $user["pass"]==$_POST["pass"])
                {
                    session_start();
                    $user = $_POST["user"];
                    $_SESSION['user'] = $user;
                    header("location:../View/Dashboard.php");
                }
                else
                {
                    $Err = "<label class='text-danger'>Incorrect username or password</label>";
                }
            }  
        }
    }
}

if (!empty($_POST['remember']))
{
    setcookie("user", $_POST['user'], time()+100);
    setcookie("pass", $_POST['pass'], time()+100);                
}
else
{
    setcookie("user", "");
    setcookie("pass", "");
}
?>