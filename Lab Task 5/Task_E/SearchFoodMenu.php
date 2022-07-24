<?php
include 'FindFood.php'
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
            <form method="post" enctype="multipart/form-data">  
                <?php   
                if(isset($err))  
                {  
                        echo $err;
                }
                ?>  
                <br> 
                <fieldset>
                    <form method="post" action="FindFood.php">
                        <legend>Search Food</legend> 
                        <input type="text" name="fname" class="form-control"><br>
                        <input type="submit" name="FindFood" value="Search"/>
                    </form>
                </fieldset>           
                <?php  
                if(isset($message))  
                {  
                        echo $message;  
                }  
                ?>
            </form>
            <br><br>
                <h1 style="font-size:50px;"><a href="../Task_B/ViewFoodMenu.php">Display Food</a></h1>
        </div>  
        <br />  
</body>
</html>