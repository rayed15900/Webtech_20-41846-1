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
    <script>
        function checkUser()
        {
			if (document.getElementById("user").value == "")
            {
			  	document.getElementById("userErr").innerHTML = "Username Required";
			  	document.getElementById("user").style.borderColor = "red";
			}
            else
            {
			  	document.getElementById("userErr").innerHTML = "";
			  	document.getElementById("user").style.borderColor = "black";

			}
        }
        function checkPass()
        {
        	if (document.getElementById("pass").value == "") 
            {
			  	document.getElementById("passErr").innerHTML = "Password Required";
			  	document.getElementById("pass").style.borderColor = "red";
			}
            else
            {
				document.getElementById("passErr").innerHTML = "";
			  	document.getElementById("pass").style.borderColor = "black";
			}
        }

        function validateLogin()
        {  
            let user = document.loginForm.user.value;  
            let pass = document.loginForm.pass.value;  
            
            if (user=="")
            {  
                alert("Username Required");  
                return false;  
            }
            else if(!user.match(/^[a-zA-Z][\.\-\_\a-zA-Z0-9]+/))
            {
                alert("Invalid Username");
                return false;
            }
            else if(user.length <3)
            {
                alert("At least 3 characters required in username");
                return false;
            }
            else if(pass=="")
            {  
                alert("Password Required");
                return false;
            }
            else if(!pass.match(/^[a-zA-Z\-\_\@\#\%\&\.0-9]+$/))
            {  
                alert("Invalid Password");
                return false;
            }
            else if(pass.length <3)
            {
                alert("At least 3 characters required in password");
                return false;
            }
		}
    </script>
</head> 
<body>  
    <br>  
    <div class="container" style="width: 500px; height: 10%;"> 
        <br><br><br><br><br><br>
        <form name="loginForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return validateLogin()">
            <?php if(isset($Err)){echo $Err;}?>
            <legend>LOGIN</legend>
            <label>User Name :</label>
            <input type = "text" name="user" id="user" onblur="checkUser()" class="form-control" value="<?php if(isset($_COOKIE['user'])) {echo $_COOKIE['user'];}?>"><p style="color:red" id="userErr"></p>
            <label>Password  :</label>
            <input type = "password" name="pass" id="pass" onblur="checkPass()" class="form-control" value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];}?>"><p style="color:red" id="passErr"></p>
            <hr>
            <input type = "checkbox" name = "remember" <?php if(isset($_COOKIE['user'])) {echo "checked";} ?>>Remember Me<br><br>
            <input type = "submit" name = "login">
            <a href="ForgotPassword.php">Forgot Password?<br>
        </form>
    </div>
</body>
</html>