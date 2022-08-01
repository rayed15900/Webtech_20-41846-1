<?php
require_once '../Model/model.php';
session_start();
$fileErr = $nameErr = $emailErr = $desErr = $phoneErr = $message = "";
$name = $email = $des = $phone = "";

$AllRestaurant = showRestaurant();
        
foreach($AllRestaurant as $res)
{
    if($res["owner"]==$_SESSION["user"])
    {
        $name = $res['name'];
        $email = $res['email'];
        $des = $res['des'];
        $phone = $res['phone'];
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
    if (isset($_POST['submit']))
    {        
        foreach($AllRestaurant as $res)
        {
            if($res['owner']==$_SESSION['user'])
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
                        editRestaurantName($res['owner'], $data);
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
                        $data['email'] = $email;
                        editRestaurantEmail($res['owner'], $data);
                    }
                }
                if(!empty($_POST["des"]))
                {
                    $des = $_POST["des"];
                    if (!preg_match("/^[a-zA-Z\.\ ]{3,20}+$/",$des))
                    {
                        $desErr = "<label class='text-danger'>Invalid Destination</label>";
                    }
                    else
                    {
                        $data['des'] = $des;
                        editRestaurantDes($res['owner'], $data);
                    }
                }

                if(!empty($_POST["phone"]))
                {
                    $phone = $_POST["phone"];
                    if (!preg_match("/^[0-9]{11}$/",$phone))
                    {
                        $phoneErr = "<label class='text-danger'>Invalid Phone Number</label>";
                    }
                    else
                    {
                        $data['phone'] = $phone;
                        editRestaurantPhone($res['owner'], $data);
                    }
                }
            }
        }

        if($fileErr == "" && $nameErr == "" && $emailErr == "" && $desErr == "" && $phoneErr == "")
        {
            $message = "<label class = text-success> Successfully changed</label>";
        }
    }
    else
    {
        $fileErr = 'Edit Restaurant Failed';
    }
}
?>