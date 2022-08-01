<?php
include 'Header Footer Login Restaurant.php';
include '../Controller/AddRestaurantCheck.php';
?>

<html>
<head>
    <title></title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head> 
</head>
<body>
    <br><br><br><br><br>  
        <div class="container" style="width:500px;">
            <form method="post">  
                <?php   
                if(isset($error))  
                {  
                        echo $error;
                }
                ?>  
                <br> 
                <fieldset>
                        <legend>RESTAURANT</legend> 
                        <label>Name</label>  
                        <input type="text" name="name" class="form-control"/><?php echo $nameErr ?><br/>  
                        <label>Email</label>
                        <input type="text" name = "email" class="form-control"/><?php echo $emailErr ?><br/>
                        <label>Destination</label>
                        <input type="text" name = "des" class="form-control"/><?php echo $desErr ?><br/>
                        <label>Phone Number</label>
                        <input type="text" name = "phone" class="form-control"/><?php echo $phoneErr ?><br/>
                        
                        <input type="submit" name="submit" value="Submit"><br><?php echo $err ?> 
                </fieldset>           
                <?php  
                if(isset($message))  
                {  
                        echo $message;  
                }  
                ?>  
            </form>  
        </div>  
        <br />  
</body>
</html>