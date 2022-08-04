<?php
    include 'Header Footer Login Dashboard.php';
    include '../Controller/EditProfileCheck.php';
?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        function validateEditProfile()
        {
            let name = document.eidtProfileForm.name.value;  
            let email = document.eidtProfileForm.email.value;
            let gender = document.eidtProfileForm.gender.value;  
            let dob = document.eidtProfileForm.dob.value;


            if(name != "")
            {
                if(!name.match(/^[a-zA-Z\.\ ]+$/))
                {
                    alert("Invalid Name");
                    return false;
                }
                else if(name.length <3)
                {
                    alert("At least 3 characters required in Name");
                    return false;
                }
            }
            
            if(email != "")
            {
                if(!email.match(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i))
                {
                    alert("Invalid Email");
                    return false;
                }
            }

            if(gender != "")
            {
                if(gender == "Male" || gender == "Female" || gender == "Other")
                {
                }
                else
                {
                    alert("Invalid Gender");
                    return false;
                }
            }

            if(dob != "")
            {
                if(!dob.match(/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/))
                {
                    alert("Invalid Date of Birth");
                    return false;
                }
            }
        }
    </script>
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
            <form name="eidtProfileForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return validateEditProfile()">
                <?php
                    if(isset($fileErr))
                    {
                        echo $fileErr;
                    }
                ?>
                <fieldset>
                <legend>EDIT PROFILE</legend>
                <label>Name :</label>
                <input type="text" name="name" class="credentials"<?php echo " placeholder=".$name?>><p style="color:red" id="nameErr"></p>  
                <br><br><hr>
                
                <label>Email  :</label>
                <input type="text" name="email" class="credentials"<?php echo " placeholder=".$email?>><p style="color:red" id="emailErr"></p>  
                <br><br><hr>
                
                <label>Gender :</label> 
                <input type="text" name="gender" class="credentials" <?php echo " placeholder=".$gender?>><p style="color:red" id="genderErr"></p>  
                <br><br><hr>

                <label>Date of Birth :</label>
                <input type="text" name="dob" class="credentials" <?php echo "placeholder=".$dob?>><p style="color:red" id="dobErr"></p>  
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