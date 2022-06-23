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
$error = "";

if(file_exists('data.json'))
{
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

if(isset($_POST["submit"]))  
{
    if(file_exists('data.json'))
    {
        $data = file_get_contents("data.json");
        $data = json_decode($data, true);

        foreach($data as $key=>$entry)
        {
            if($entry["username"]==$_SESSION['name'])
            {
                if(!empty($_POST["name"]))
                {
                    $data[$key]["name"]=$_POST["name"];
                }
                if(!empty($_POST["email"]))
                {
                    $data[$key]["e-mail"]=$_POST["email"];
                }
                if(!empty($_POST["gender"]))
                {
                    $data[$key]["gender"]=$_POST["gender"];
                }
                if(!empty($_POST["dob"]))
                {
                    $data[$key]["dob"]=$_POST["dob"];
                }
            }
        }

        $newdata=json_encode($data);
        file_put_contents('data.json',$newdata);
        $retypeErr = "<label class = text-success>Eidited Successfully changed</label>";
    }
    else
    {  
        $error = 'JSON File dont exits';  
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
                <input type="text" name="name" class="credentials"<?php echo " placeholder=".$name?>>
                <br><br><hr>
                
                <label>Email  :</label>
                <input type="text" name="email" class="credentials"<?php echo " placeholder=".$email?>>
                <br><br><hr>
                
                <label>Gender :</label> 
                <input type="text" name="gender" class="credentials" <?php echo " placeholder=".$gender?>>
                <br><br><hr>

                <label>Date of Birth :</label>
                <input type="text" name="dob" class="credentials" <?php echo "placeholder=".$dob?>>
                <br><br><hr>

                <input type="submit" name="submit" value="submit"><?php echo $error?>
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
                    foreach($pic as $item){
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