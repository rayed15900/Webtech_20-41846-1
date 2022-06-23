
<?php 
	$currPass = "abc@1234";


	if (isset($_POST['pass']))
    {
		if ($_POST['pass']==$currPass)
        {
            $newPass = $_POST["new_pass"];
            $retypePass = $_POST["retype_pass"];
            if($newPass == "abc@1234" || $retypePass == "abc@1234")
            {
                echo "New password cannot be same as current password";
            }
            else if ($newPass == $retypePass)
            {
                echo "New password set";
            }
            else
            {
                echo "Password did not match";
            }
		}
		else
        {
			$msg = "Password Invalid";
		}
	}
 ?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<span><?php
		if (isset($msg))
        {
			echo $msg;
		}
	 ?>	 	
	 </span>
	<br>
	Password:
	<input type="password" name="pass">
	<br>
    New Password:
	<input type="new_password" name="new_pass">
	<br>
    Retype New Password:
	<input type="retype_password" name="retype_pass">
	<br>
	<br>
	<input type="submit" name="submit" value="Submit">
</form>