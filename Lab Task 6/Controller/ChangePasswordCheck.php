<?php
require_once '../Model/model.php';
session_start();
$message = $cpassErr = $npassErr = $retypeErr = "";
$cpass = $npass = $retype = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["cpass"])) 
    {
        $cpassErr = "<label class='text-danger'>Enter current password</label>";
    }
    else
    {
        $cpass=$_POST["cpass"];
        if (!preg_match("/^[a-zA-Z\-\_\@\#\%\&\.0-9]{3,20}+$/",$cpass)) 
        {
            $cpassErr = "<label class='text-danger'>Invalid Password</label>";
        }
        else
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
                            if($_SERVER["REQUEST_METHOD"] == "POST")
                            {
                                if (empty($_POST["npass"]))
                                {
                                    $npassErr = "<label class='text-danger'>Enter new password</label>";
                                }
                                else
                                {
                                    $npass = $_POST["npass"];
                                    if(!preg_match("/^[a-zA-Z\-\_\@\#\%\&\.0-9]{3,20}+$/",$npass)) 
                                    {
                                        $npassErr = "<label class='text-danger'>Invalid Password</label>";
                                    }
                                    else
                                    {
                                        if($npass==$cpass)
                                        {
                                            $npassErr = "<label class='text-danger'>New Password should not be same as Current Password</label>";
                                        }
                                    }
                                }
                            }
        
                            if($_SERVER["REQUEST_METHOD"] == "POST")
                            {
                                if (empty($_POST["retype"]))
                                {
                                    $retypeErr = "<label class='text-danger'>Retype new password</label>";
                                }
                                else
                                {
                                    $retype = $_POST["retype"];
                                    if(!preg_match("/^[a-zA-Z\-\_\@\#\%\&\.0-9]{3,20}+$/",$retype)) 
                                    {
                                        $retypeErr = "<label class='text-danger'>Invalid Password</label>";
                                    }
                                    else
                                    {
                                        if($retype!=$npass)
                                        {
                                            $retypeErr = "<label class='text-danger'>New Password must match with the Retyped Password</label>";
                                        }
                                        else
                                        {
                                            $data["pass"]=$_POST["npass"];
                                            editUserPass($user['user'], $data);
                                            $message = "<label class='text-success'>Password Changed</label>";
                                        }
                                    }
                                }
                            }
                            break;
                        }
                        else
                        {
                            $cpassErr = "<label class='text-danger'>Current Password did not match</label>";
                        }
                    }
                }
            }
        }
    }

    if (empty($_POST["npass"])) 
    {
        $npassErr = "<label class='text-danger'>Enter New password</label>";
    }

    if (empty($_POST["retype"])) 
    {
        $retypeErr = "<label class='text-danger'>Retype new password</label>";
    }
}
?>