<?php
    include 'Header Footer Login Dashboard.php';
    session_start();
    include '../Controller/ViewProfileCheck.php';
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
                <legend>VIEW PROFILE</legend>
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

                <a class="edit" style="text-decoration: none;" href="EditProfile.php">Edit Profile</a><br>
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