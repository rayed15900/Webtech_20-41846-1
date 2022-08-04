<?php
include 'Header Footer Login Dashboard.php';
include '../Controller/ChangePasswordCheck.php';
?>

<html>
<head> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script>
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
    function checkNpass()
    {
        if (document.getElementById("npass").value == "") 
        {
              document.getElementById("npassErr").innerHTML = "New Password Required";
              document.getElementById("npass").style.borderColor = "red";
        }
        else
        {
              document.getElementById("npassErr").innerHTML = "";
              document.getElementById("npass").style.borderColor = "black";
        }
    }
    function checkRetype()
    {
        if (document.getElementById("retype").value == "") 
        {
              document.getElementById("retypeErr").innerHTML = "Retype Password";
              document.getElementById("retype").style.borderColor = "red";
        }
        else
        {
              document.getElementById("retypeErr").innerHTML = "";
              document.getElementById("retype").style.borderColor = "black";
        }
    }
    function validateChangePass()
    {
        let cpass = document.changePassForm.cpass.value;
        let npass = document.changePassForm.npass.value;
        let retype = document.changePassForm.retype.value;

        if(cpass=="")
        {
              alert("Current Password Required");
              return false;
        }
        else if(!cpass.match(/^[a-zA-Z\-\_\@\#\%\&\.0-9]+$/))
        {  
              alert("Invalid Current Password");
              return false;
        }
        else if(cpass.length <3)
        {
              alert("At least 3 characters required in password");
              return false;
        }
        else if(npass=="")
        {
              alert("New Password Required");
              return false;
        }
        else if(npass == cpass)
        {  
              alert("New Password should not be same as Current Password");
              return false;
        }
        else if(retype=="")
        {
              alert("Retype Password");
              return false;
        }
        else if(retype != npass)
        {  
              alert("New Password must match with the Retyped Password");
              return false;
        }
    }  
  </script>
</head> 
<body>  
<br><br><br><br><br><br>
<div class="container" style="width:500px;"> 

<h2>CHANGE PASSWORD</h2><br>
<?php echo $Err?>
<form name="changePassForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateChangePass()">
  <span style="color:black">Current Password : </span>
  <input type="password" name="cpass" id="cpass" onblur="checkCpass()" class="form-control">
  <p style="color:red" id="cpassErr"></p>
  <br><br>

  <span style="color:black">New Password :</span>
  <input type="password" name="npass" id="npass" onblur="checkNpass()" class="form-control">
  <p style="color:red" id="npassErr"></p>
  <br><br>

  <span style="color:black">Retype New Password :</span>
  <input type="password" name="retype" id="retype" onblur="checkRetype()" class="form-control">
  <p style="color:red" id="retypeErr"></p>
  <br><br>

  <input type="submit" name="submit" value="Submit"><br>
  <?php echo $message?> 

</form>
</div>
</body>

</html>