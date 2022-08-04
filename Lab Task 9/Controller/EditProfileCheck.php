<?php
require_once '../Model/model.php';
session_start();
$fileErr = $message = "";
$name = $email = $gender = $dob = "";

$AllUser = showAllUser();
        
foreach($AllUser as $user)
{
    if($user["user"]==$_SESSION["user"])
    {
        $name = $user['name'];
        $email = $user['email'];
        $gender = $user['gender'];
        $dob = $user['dob'];
        $fileErr = "";
        break;
    }
    else
    {
        $fileErr = "<label class='text-danger'>Can not find Data</label>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['editProfile']))
    {        
        foreach($AllUser as $user)
        {
            if($user['user']==$_SESSION['user'])
            {
                if(!empty($_POST["name"]))
                {
                    $data['name'] = $_POST["name"];
                    editUserName($user['user'], $data);
                }
                if(!empty($_POST["email"]))
                {
                    $data["email"]=$_POST["email"];
                    editUserEmail($user['user'], $data);
                }
                if(!empty($_POST["gender"]))
                {
                    if($_POST["gender"] == "Male" || $_POST["gender"] == "Female" || $_POST["gender"] == "Other")
                    {
                        $data["gender"] = $_POST["gender"];
                        editUserGender($user['user'], $data);
                    }
                }
                if(!empty($_POST["dob"]))
                {
                    $data["dob"]=$_POST["dob"];
                    editUserDOB($user['user'], $data);
                }
                $message = "<label class = text-success> Successfully changed</label>";
            }
        }
    }
    else
    {  
        $fileErr = 'Edit Profile Failed';
    }  
}
?>