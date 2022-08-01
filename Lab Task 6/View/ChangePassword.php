<?php
include 'Header Footer Login Dashboard.php';
include '../Controller/ChangePasswordCheck.php';
?>

<html>
<head> 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head> 
<body>  
<br><br><br><br><br><br>
<div class="container" style="width:500px;"> 

<h2>CHANGE PASSWORD</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <span style="color:black">Current Password : </span>
  <input type="password" name="cpass" class="form-control">
  <?php echo $cpassErr;?>
  <br><br>

  <span style="color:black">New Password :</span>
  <input type="password" name="npass" class="form-control">
  <?php echo $npassErr;?>
  <br><br>

  <span style="color:black">Retype New Password :</span>
  <input type="password" name="retype" class="form-control">
  <?php echo $retypeErr;?>
  <br><br>

  <input type="submit" name="submit" value="Submit"><br>
  <?php echo $message?> 

</form>
</div>
</body>

</html>