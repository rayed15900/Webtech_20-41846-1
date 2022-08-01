<?php
require_once '../Model/model.php';

$userErr = $passErr = $fileErr = "";
$user = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (empty($_POST["user"])) 
    {
        $userErr = "<label class='text-danger'>Username required</label>";
    }
    else
    {
        $user = $_POST["user"];
        if (!preg_match("/^[a-zA-Z][\.\-\_\a-zA-Z0-9]{3,20}+$/",$user))
        {
            $userErr = "<label class='text-danger'>Invalid Username</label>";
        }
    }

    if (empty($_POST["pass"]))
    {
        $passErr = "<label class='text-danger'>Password required</label>";
    }
    else
    {
        $pass = $_POST["pass"];
        if (!preg_match("/^[a-zA-Z\-\_\@\#\%\&\.0-9]{3,20}+$/",$pass))
        {
            $passErr = "<label class='text-danger'>Invalid Password</label>";
        }
    }

    if($userErr == "" && $passErr == "")
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
                    $fileErr = "<label class='text-danger'>Incorrect username or password</label>";
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