<?php
include 'Header Footer.php';
include '../Controller/LoginCheck.php';
?>

<html>
<head>  
    <title>Login</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head> 
<body>  
    <br>  
    <div class="container" style="width: 500px; height: 10%;"> 
    <br><br><br><br><br><br>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <?php
            if(isset($fileErr)){
                 echo $fileErr;
            }
        ?>

        <legend>LOGIN</legend>
        <label>User Name :</label>
        <input type = "text" name = "user" class="form-control" value="<?php if(isset($_COOKIE['user'])) {echo $_COOKIE['user'];}?>"> <?php echo $userErr;?><br>
        <label>Password  :</label>
        <input type = "password" name = "pass" class="form-control" value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];}?>"> <?php echo $passErr;?>
        <hr>
        <input type = "checkbox" name = "remember" <?php if(isset($_COOKIE['user'])) {echo "checked";} ?>>Remember Me<br><br>
        <input type = "submit" name = "login">
        <a href="ForgotPassword.php">Forgot Password?<br>
    </form>
</body>
</html>