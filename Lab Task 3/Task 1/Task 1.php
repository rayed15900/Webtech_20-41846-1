<?php
    $nameErr = $passwordErr = "";
    $name = $password = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = $_POST["name"];
        if (!preg_match('/^[a-zA-Z0-9.-_ ]{2,}$/', $name)) 
        {
            $nameErr = "Invalid User Name";
        }
        else {
            $nameErr = "";
        }
      }
    
      if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
      } else {
        $password = $_POST["password"];
        if (!preg_match("/^[a-zA-Z^\w]{8,}$/",$password)) 
        {
            $passwordErr = "Invalid Password";
        }
      }
    }
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label>User Name :</label>
    <input type = "text" name = "name">
    <span>* <?php echo $nameErr;?></span><br>
    <label>Password  :</label>
    <input type = "password" name = "password">
    <span>* <?php echo $passwordErr;?></span><br>

    <input type = "checkbox" name = "remember">Remember Me<br><br>
    <input type = "submit" name = "submit" value = "Submit">
    <a href="#">Forgot Password?<br>
</form>