<?php
include 'Header Footer.php';
include '../Controller/RegistrationCheck.php';
?>

<html>  
     <head>  
          <title>Registration</title>  
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <script>
               function checkName()
               {
                    if (document.getElementById("name").value == "")
                    {
                         document.getElementById("nameErr").innerHTML = "Name Required";
                         document.getElementById("name").style.borderColor = "red";
                    }
                    else
                    {
                         document.getElementById("nameErr").innerHTML = "";
                         document.getElementById("name").style.borderColor = "black";
                    }
               }
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
               function checkCpass()
               {
                    if (document.getElementById("cpass").value == "") 
                    {
                         document.getElementById("cpassErr").innerHTML = "Current Password Required";
                         document.getElementById("cpass").style.borderColor = "red";
                    }
                    else
                    {
                         document.getElementById("cpassErr").innerHTML = "";
                         document.getElementById("cpass").style.borderColor = "black";
                    }
               }
               function validateRegistration()
               {
                    let name = document.regForm.name.value;  
                    let email = document.regForm.email.value;
                    let user = document.regForm.user.value;  
                    let pass = document.regForm.pass.value;  
                    let cpass = document.regForm.cpass.value;  
                    let gender = document.regForm.gender.value;
                    let dob = document.regForm.dob.value;
                 
                    if (name=="")
                    {  
                         alert("Name Required");  
                         return false;  
                    }
                    else if(!name.match(/^[a-zA-Z\.\ ]+$/))
                    {
                         alert("Invalid Name");
                         return false;
                    }
                    else if(name.length <3)
                    {
                         alert("At least 3 characters required in Name");
                         return false;
                    }
                    else if (email=="")
                    {  
                         alert("Email Required");  
                         return false;  
                    }
                    else if(!email.match(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i))
                    {
                         alert("Invalid Email");
                         return false;
                    }
                    else if (user=="")
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
                    else if(cpass=="")
                    {  
                         alert("Current Password Required");
                         return false;
                    }
                    else if(cpass != pass)
                    {  
                         alert("Password does not match");
                         return false;
                    }
                    else if(gender=="")
                    {  
                         alert("Select a gender");
                         return false;
                    }
                    else if(dob=="")
                    {  
                         alert("Select a Date");
                         return false;
                    }
               }
          </script>
     </head>  
     <body> 
          <br><br><br><br><br>  
          <div class="container" style="width:500px;">  
               <form name="regForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return validateRegistration()">  
                    <?phpif(isset($Err)){echo $Err;}?> 
                    <br> 
                    <fieldset>
                         <legend>REGISTRATION</legend> 
                         <label>Name</label>  
                         <input type="text" name="name" id="name" onblur="checkName()" class="form-control"><p style="color:red" id="nameErr"></p>  
                         <label>Email</label>
                         <input type="text" name = "email" id="email" onblur="checkEmail()" class="form-control"><p style="color:red" id="emailErr"></p>
                         <label>User Name</label>
                         <input type="text" name = "user" id="user" onblur="checkUser()" class="form-control"><p style="color:red" id="userErr"></p>
                         <label>Password</label>
                         <input type="password" name = "pass" id="pass" onblur="checkPass()" class="form-control"><p style="color:red" id="passErr"></p>
                         <label>Confirm Password</label>
                         <input type="password" name = "cpass" id="cpass" onblur="checkCpass()" class="form-control"><p style="color:red" id="cpassErr"></p>

                         <fieldset>
                              <legend>Gender</legend>
                              <input type="radio" id="male" name="gender" value="male">
                              <label for="male">Male</label>                     
                              <input type="radio" id="female" name="gender" value="female">
                              <label for="female">Female</label>
                              <input type="radio" id="other" name="gender" value="other">
                              <label for="other">Other</label><br><p style="color:red" id="genderErr"></p>
                              <legend>Date of Birth:</legend>
                              <input type="date" name="dob"><br><p style="color:red" id="dobErr"></p>
                         </fieldset> 
                         
                    </fieldset>
                    <input type="submit" name="register">
                    <?php if(isset($message)){echo $message;}?>  
               </form>  
          </div>  
          <br>
     </body>
</html>