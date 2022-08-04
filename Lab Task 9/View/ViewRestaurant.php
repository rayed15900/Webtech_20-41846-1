<?php
include 'Header Footer Login Restaurant.php';
include '../Controller/ViewRestaurantCheck.php';
?>

<html>
<head>
    <title></title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<style>
    .restaurant {
        color: #63CF3C;
        border: 2px solid;
        display: inline-block;
        width: 700px;
    }
</style>
<body>
        <?php
        if(isset($fileErr))
        {
            echo $fileErr;
        }
        ?>
    <div class="container" style="width: 500px; font-size:50px; margin-top: 200px; ">
        <a class="restaurant" style="text-decoration: none;  padding: 10px;" href="AddFoodMenu.php">
        Name: <?php echo $name;?>
        <br>
        Email: <?php echo $email;?>
        <br>
        Destination: <?php echo $des;?>
        <br>
        Phone:<?php echo $phone;?>
        </a>
    </div>
</body>
</html>