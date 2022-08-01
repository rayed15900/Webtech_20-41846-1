<?php
require_once '../Model/model.php';
session_start();
$fileErr = $nameErr = $emailErr = $genderErr = $dobErr = $message = "";
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
                    $name = $_POST["name"];
                    if (!preg_match("/^[a-zA-Z\.\ ]{3,20}+$/",$name)) 
                    {
                        $nameErr = "<label class='text-danger'>Invalid Name</label>";
                    }
                    else
                    {
                        $data['name'] = $name;
                        editUserName($user['user'], $data);
                    }
                }
                if(!empty($_POST["email"]))
                {
                    $email = $_POST["email"];
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        $emailErr = "<label class='text-danger'>Invalid Email</label>";
                    }
                    else
                    {
                        $data["email"]=$_POST["email"];
                        editUserEmail($user['user'], $data);
                    }
                }
                if(!empty($_POST["gender"]))
                {
                    $gender = $_POST["gender"];
                    if($gender == "Male" || $gender == "Female" || $gender == "Other")
                    {
                        $data["gender"] = $gender;
                        editUserGender($user['user'], $data);
                    }
                    else
                    {
                        $genderErr = "<label class='text-danger'>Invalid Gender</label>";
                    }
                }
                if(!empty($_POST["dob"]))
                {
                    $dob = $_POST["dob"];
                    if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$dob)) 
                    {
                        $data["dob"]=$dob;
                        editUserDOB($user['user'], $data);
                    }
                    else
                    {
                        $dobErr = "<label class='text-danger'>Invalid Date</label>";
                    }
                }
                if($fileErr == "" && $nameErr == "" && $emailErr == "" && $genderErr == "" && $dobErr == "")
                {
                    $message = "<label class = text-success> Successfully changed</label>";
                }
            }
        }
    }
    else
    {  
        $fileErr = 'Edit Profile Failed';
    }  
}
?>