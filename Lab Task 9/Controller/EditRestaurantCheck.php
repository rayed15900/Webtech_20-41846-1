<?php
require_once '../Model/model.php';
session_start();
$fileErr = $message = "";
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
                    $data['name'] = $_POST["name"];
                    editRestaurantName($res['owner'], $data);
                }
                if(!empty($_POST["email"]))
                {
                    $data['email'] = $_POST["email"];
                    editRestaurantEmail($res['owner'], $data);
                }
                if(!empty($_POST["des"]))
                {
                    $data['des'] = $_POST["des"];
                    editRestaurantDes($res['owner'], $data);
                }
                if(!empty($_POST["phone"]))
                {
                    $data['phone'] = $_POST["phone"];
                    editRestaurantPhone($res['owner'], $data);
                }
                $message = "<label class = text-success> Successfully changed</label>";
            }
        }
    }
    else
    {
        $fileErr = 'Edit Restaurant Failed';
    }
}
?>