<?php
include 'Header Footer Login Dashboard.php';
session_start();
?>

<html>
<head>
    <title>Dashboard</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<style>
    .restaurant {
        color: #63CF3C;
    }
</style>
<body>
    <br><br>
        <div class="container">
            <h1 style="display:flex; padding-top: 90px; padding-left: 400px; font-size: 70px;">Welcome 
            <?php
            if(isset($_SESSION['user']))
            {
                echo $_SESSION['user'];
            }
            else
            {
                header("location:Login.php");  
            }
            ?>    
            </h1>
            <br><br>
            <a class="restaurant" style="display:flex; padding-top: 60px; margin-left: 450px; padding-right:0px; font-size: 70px; text-decoration: none;" href="ViewRestaurant.php">Go To Restaurants</a>
        </div>
</body>
</html>