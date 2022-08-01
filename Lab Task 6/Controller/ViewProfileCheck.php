<?php
require_once '../Model/model.php';
$fileErr = "";
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

?>