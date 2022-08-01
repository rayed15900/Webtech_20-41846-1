<?php
    include 'Header Footer Login Dashboard.php';
    include '../Controller/EditProfileCheck.php';
?>

<html>
<head>
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

<body>  
    <div class="center" >
        <div class="container" style="width: 450px;"> 
            <br><br><br><br><br><br><br><br>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <?php
                    if(isset($fileErr))
                    {
                        echo $fileErr;
                    }
                ?>
                <fieldset>
                <legend>EDIT PROFILE</legend>
                <label>Name :</label>
                <input type="text" name="name" class="credentials"<?php echo " placeholder=".$name?>><?php echo $nameErr; ?>
                <br><br><hr>
                
                <label>Email  :</label>
                <input type="text" name="email" class="credentials"<?php echo " placeholder=".$email?>><?php echo $emailErr; ?>
                <br><br><hr>
                
                <label>Gender :</label> 
                <input type="text" name="gender" class="credentials" <?php echo " placeholder=".$gender?>><?php echo $genderErr; ?>
                <br><br><hr>

                <label>Date of Birth :</label>
                <input type="text" name="dob" class="credentials" <?php echo "placeholder=".$dob?>><?php echo $dobErr; ?>
                <br><br><hr>

                <input type="submit" name="editProfile" value="submit"><br>
                <?php echo $message?>
            </form>
        </div>
        <div class="pic">
        <br><br><br><br><br><br><br><br><br>
            <?php
            include '../Controller/ProfilePhoto.php';
            ?>
        </div>
    </div>
</body>
</html>