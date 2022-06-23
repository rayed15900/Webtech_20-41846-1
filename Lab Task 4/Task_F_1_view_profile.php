<?php
    include 'login header footer dashboard.php';
    session_start();
?>

<!DOCTYPE html>
<head>  
    <title>Login</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head> 

<style>
    label{
        font-size: 20px;
    }
    .credentials{
        font-size: 20px;
    }
    .edit{
        font-size: 20px;
        color: #63CF3C;
    }
    .edit:hover{
        background: white;
    }
    .center{
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .pic{
        padding-right: 100px;
    }
</style>

<?php
if(file_exists('data.json')){
    $data = file_get_contents("data.json");
    $data = json_decode($data, true);
    foreach($data as $item){
        if($item["username"]==$_SESSION["name"])
        {
            $name = $item['name'];
            $email = $item['e-mail'];
            $gender = $item['gender'];
            $dob = $item['dob'];
            break;
        }
        else
        {
            $error = "<label class='text-danger'>Data could not found</label>";
        }
    }
        
}
?>

<body>  
    <div class="center" >
        <div class="container" style="width: 450px;"> 
            <br><br><br><br><br><br><br><br>
            <form action="" method="post">
                <?php
                    if(isset($error)){
                        echo $error;
                    }
                ?>
                <fieldset>
                <legend>LOGIN</legend>
                <label>Name :</label> 
                <span class="credentials"><?php echo $name;?></span>
                <br><br><hr>
                
                <label>Email  :</label>
                <span class="credentials"><?php echo $email;?></span>
                <br><br><hr>
                
                <label>Gender :</label> 
                <span class="credentials"><?php echo $gender;?></span>
                <br><br><hr>

                <label>Date of Birth :</label>
                <span class="credentials"><?php echo $dob;?></span>
                <br><br><hr>

                <a class="edit" style="text-decoration: none;" href="Task_F_2_edit_profile.php">Edit Profile</a><br>
            </form>
        </div>
        <div class="pic">
        <br><br><br><br><br><br><br><br><br>
            <?php
            if(file_exists('pic.json'))
            {
                $pic = file_get_contents("pic.json");
                $pic = json_decode($pic, true);
                if(!empty($pic))
                {
                    foreach($pic as $item)
                    {
                        if($item["name"]==$_SESSION["name"])
                        {
                            $p = $item['pic'];
                            echo $p;
                            break;
                        }
                        else
                        {
                            $error = "<label class='text-danger'>pic could not found</label>";
                        }
                    }
                }
                else
                {
                    echo "<img src='default.jpg'>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>