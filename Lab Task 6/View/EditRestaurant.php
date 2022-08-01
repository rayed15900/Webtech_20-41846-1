<?php
    include 'Header Footer Login Restaurant.php';
    include '../Controller/EditRestaurantCheck.php';
?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head> 

<style>
    label{
        font-size: 15px;
    }
    .credentials{
        width: 100%;
        height: 35px;
        font-size: 15px;
    }
    .center{
        width: 100%;
        display: flex;
        justify-content: center;
    }
</style>

<body>  
    <div class="center" >
        <div class="container" style="width: 450px;"> 
            <br><br><br><br><br><br><br><br>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <?php
                    if(isset($fileErr))
                    {
                        echo $fileErr;
                    }
                ?>
                <fieldset>
                <legend>EDIT RESTAURANT</legend>
                <label>Name :</label>
                <input type="text" name="name" class="credentials"<?php echo " placeholder=".$name?>><?php echo $nameErr; ?>
                <br><br>
                
                <label>Email  :</label>
                <input type="text" name="email" class="credentials"<?php echo " placeholder=".$email?>><?php echo $emailErr; ?>
                <br><br>
                
                <label>Destination :</label> 
                <input type="text" name="des" class="credentials" <?php echo " placeholder=".$des?>><?php echo $desErr; ?>
                <br><br>

                <label>Phone Number :</label>
                <input type="text" name="phone" class="credentials" <?php echo "placeholder=".$phone?>><?php echo $phoneErr; ?>
                <br><br>

                <input type="submit" name="submit" value="submit"><br>
                <?php echo $message?>
            </form>
        </div>
    </div>
</body>
</html>