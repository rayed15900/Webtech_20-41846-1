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
    <script>
        function checkEmail()
        {
            if (document.getElementById("email").value == "")
            {
                    document.getElementById("emailErr").innerHTML = "Email Required";
                    document.getElementById("email").style.borderColor = "red";
            }
            else
            {
                    document.getElementById("emailErr").innerHTML = "";
                    document.getElementById("email").style.borderColor = "black";
            }
        }
        function validateForgotPass()
        {
            let email = document.forgotForm.email.value;
            if (email=="")
            {  
                    alert("Email Required");  
                    return false;  
            }
            else if(!email.match(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i))
            {
                    alert("Invalid Email");
                    return false;
            }
        }
    </script>
</head> 
<body>  
    <br />  
    <div class="container" style="width:500px;"> 
    <br><br><br><br><br><br>
    <form name="forgotForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return validateForgotPass()">
        <?php
            if(isset($error)){
                 echo $error;
            }
        ?>
        <legend>FORGOT PASSWORD</legend>
        <label>Enter Email :</label>
        <input type = "text" name = "email" id="email" onblur="checkEmail()" class="form-control"><p style="color:red" id="emailErr"></p>
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