<?php
    session_start();

	if (isset($_SESSION['name'])) {
		session_destroy();
		header("location:Task_C_login.php");
	}
	else{
		header("location:Task_C_login.php");
	}
?>