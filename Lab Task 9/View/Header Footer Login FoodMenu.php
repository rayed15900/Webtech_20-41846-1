<?php
    session_start();
?>

<html>
<style>
    span a:hover{
        background: #98DA37;
    }

    nav a:hover{
        background: #1F8A24;
        color: white;
    }

    .dashboard{
        background: #003002;
        margin-top: 97px;
        width: 300px;
        height: 95%;
        position: fixed;
    }

    .account{
        color: white;
        display:flex;
        justify-content: center;
        padding-top: 40px;
        padding-bottom: 40px;
        border-bottom: 3px outset white;
        margin-bottom: 0;
    }

    nav {
        margin:0;
    }

    nav a{
        color: white;
        font-size: 20px;
        display:flex;
        justify-content: center;
        align-items: center;
        padding-top: 30px;
        padding-bottom: 30px;
        margin: 0;
    }
</style>

<body style=" margin:0;">
    <div style="display:flex; justify-content: space-between; align-items: center; width: 100%; position: fixed; background: #85C429; padding: 20px 0; top: 0;">
        <span style="font-size: 40px; font-family: Sans-serif; font-weight: bold; padding-left: 50px">
            Vojon<span style="color:BF0A0A">Bilash</span>
        </span>
        <span style="font-size: 25px; font-family: Sans-serif; font-weight: bold;">
            <span style="color: black; text-decoration: none; padding: 15px; padding-right= 0px; margin-right: 0;">Logged in as,</span>
            <a href="Dashboard.php" style="color: #BF0A0A; border-right: 3px solid #C8F4BB; text-decoration: none; padding: 15px; margin-left: 0; margin-right: 0px;">
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
            </a>
            <a href="../Controller/Logout.php" style="color: black; text-decoration: none; padding: 15px; margin-left:0; margin-right: 10px;">Logout</a>
        </span>
    </div>

    <div class = "dashboard">
        <h1 class="account">Food Menu</h1>
        <nav>
            <a style="text-decoration: none;" href="AddFoodMenu.php">Add New Food</a>
            <a style="text-decoration: none;" href="DeleteFood.php">Delete Food</a>
            <a style="text-decoration: none;" href="ShowInformation.php">Show Food information</a>
            <a style="text-decoration: none;" href="NavFood.php">Navigate Between Food</a>
            <a style="text-decoration: none;" href="SearchFood.php">Search Food Suggestions</a>
            <a style="text-decoration: none;" href="ViewRestaurant.php">Go to Restaurant</a>
        </nav>
    </div>

    <div style="color:white; width: 100%; position: fixed; background: black; padding: 5px 0; bottom: 0; font-family: Sans-serif; font-weight: bold;">
        <div style="display:flex; justify-content: center; align-items: center;">Copyright &copy; 2022 Vojon<span style="color:red;">Bilash</span></div>        
    </div>
</body>
</html>