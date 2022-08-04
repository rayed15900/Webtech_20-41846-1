<?php
    include 'Header Footer Login Restaurant.php';
    include '../Controller/EditRestaurantCheck.php';
?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        function validateEditRestaurant()
        {
            let name = document.editRestForm.name.value;  
            let email = document.editRestForm.email.value;
            let des = document.editRestForm.des.value;  
            let phone = document.editRestForm.phone.value;

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
            if(des != "")
            {
                if(!des.match(/^[a-zA-Z\.\ ]+$/))
                {
                    alert("Invalid Destination Name");
                    return false;
                }
                else if(des.length <3)
                {
                    alert("At least 3 characters required in Destination Name");
                    return false;
                }
            }
            if(phone != "")
            {
                if(!phone.match(/^[0-9]{11}$/))
                {
                    alert("Invalid Phone Number");
                    return false;
                }
            }
        }
    </script>
</head> 

<style>
    label{
        font-size: 15px;
    }
    .credentials{
        width: 100%;
        height: 35px;
        font-size: 15px;
    }
    .center{
        width: 100%;
        display: flex;
        justify-content: center;
    }
</style>

<body>  
    <div class="center" >
        <div class="container" style="width: 450px;"> 
            <br><br><br><br><br><br><br><br>
            <form name="editRestForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return validateEditRestaurant()">
                <?php
                    if(isset($fileErr))
                    {
                        echo $fileErr;
                    }
                ?>
                <fieldset>
                <legend>EDIT RESTAURANT</legend>
                <label>Name :</label>
                <input type="text" name="name" class="credentials"<?php echo " placeholder=".$name?>><p style="color:red" id="nameErr"></p>
                <br><br>
                
                <label>Email  :</label>
                <input type="text" name="email" class="credentials"<?php echo " placeholder=".$email?>><p style="color:red" id="emailErr"></p>
                <br><br>
                
                <label>Destination :</label> 
                <input type="text" name="des" class="credentials" <?php echo " placeholder=".$des?>><p style="color:red" id="desErr"></p>
                <br><br>

                <label>Phone Number :</label>
                <input type="text" name="phone" class="credentials" <?php echo "placeholder=".$phone?>><p style="color:red" id="phoneErr"></p>
                <br><br>

                <input type="submit" name="submit" value="submit"><br>
                <?php echo $message?>
            </form>
        </div>
    </div>
</body>
</html>