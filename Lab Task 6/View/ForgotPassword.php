<?php
include 'Header Footer.php';
include '../Controller/ForgotPasswordCheck.php'
?>

<html>
<head>  
    <title>Login</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head> 
<body>  
    <br />  
    <div class="container" style="width:500px;"> 
    <br><br><br><br><br><br>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <?php
            if(isset($error)){
                 echo $error;
            }
        ?>
        <legend>FORGOT PASSWORD</legend>
        <label>Enter Email :</label>
        <input type = "text" name = "email" class="form-control"><?php echo $emailErr;?><br>
        <input type = "submit" name = "submit">
        <?php
            if(isset($message))
            {
                echo $message;
            }
        ?>
    </form>
</body>
</html>