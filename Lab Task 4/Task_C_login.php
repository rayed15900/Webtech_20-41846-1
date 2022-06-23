<?php
include 'header footer.php';

$message = $error = "";
if(isset($_POST["login"])){
    if(empty($_POST["name"])){
        $error = "<label class='text-danger'>Enter username</label>";
    }
    else if(empty($_POST["pass"])){
        $error = "<label class='text-danger'>Enter password</label>";
    }
    else{
        if(file_exists('data.json')){
            $data = file_get_contents("data.json");
            $data = json_decode($data, true);
            foreach($data as $item){
                if($item["username"]==$_POST["name"] && $item["pass"]==$_POST["pass"]){                    
                    session_start();			        

                    $name =$_POST["name"];

                    $_SESSION['name'] = $name;
                    header("location:Task_E_dashboard.php");                    
                }
                else{
                    $error = "<label class='text-danger'>Incorrect username or password</label>";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<head>  
    <title>Login</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head> 
<body>  
    <br />  
    <div class="container" style="width: 500px; height: 10%;"> 
    <br><br><br><br><br><br>
    <form action="" method="post">
        <?php
            if(isset($error)){
                 echo $error;
            }
        ?>
        <fieldset>
        <legend>LOGIN</legend>
        <label>User Name :</label>
        <input type = "text" name = "name" class="form-control" value="<?php if(isset($_COOKIE['name'])) {echo $_COOKIE['name'];} ?>"><br>
        <label>Password  :</label>
        <input type = "password" name = "pass" class="form-control" value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>"><br>
        <hr>
        <input type = "checkbox" name = "remember" <?php if(isset($_COOKIE['username'])) {echo "checked";} ?>>Remember Me<br><br>
        <input type = "submit" name = "login" value = "Login">
        <a href="Task_D_forgotpass.php">Forgot Password?<br>

        <?php
            if(isset($message)){
                echo $message;
            }

            if (!empty($_POST['remember'])) {
                setcookie("name", $_POST['name'], time()+10);
                setcookie("pass", $_POST['pass'], time()+10);                
            }else{
                setcookie("name", "");
                setcookie("pass", "");
            }
        ?>
    </form>
</body>
</html>