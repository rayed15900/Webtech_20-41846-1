<?php
include 'Header Footer Login Restaurant.php';
include '../Controller/AddRestaurantCheck.php';
?>

<html>
<head>
    <title></title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        function checkName()
        {
            if (document.getElementById("name").value == "")
            {
                    document.getElementById("nameErr").innerHTML = "Name Required";
                    document.getElementById("name").style.borderColor = "red";
            }
            else
            {
                    document.getElementById("nameErr").innerHTML = "";
                    document.getElementById("name").style.borderColor = "black";
            }
        }
        function checkEmail()
        {
            if (document.getElementById("email").value == "")
            {
                    document.getElementById("emailErr").innerHTML = "Email Required";
                    document.getElementById("email").style.borderColor = "red";
            }
            else
            {
                    document.getElementById("emailErr").innerHTML = "";
                    document.getElementById("email").style.borderColor = "black";
            }
        }
        function checkDes()
        {
            if (document.getElementById("des").value == "")
            {
                    document.getElementById("desErr").innerHTML = "Destination Required";
                    document.getElementById("des").style.borderColor = "red";
            }
            else
            {
                    document.getElementById("desErr").innerHTML = "";
                    document.getElementById("des").style.borderColor = "black";
            }
        }
        function checkPhone()
        {
            if (document.getElementById("phone").value == "")
            {
                    document.getElementById("phoneErr").innerHTML = "Phone Number Required";
                    document.getElementById("phone").style.borderColor = "red";
            }
            else
            {
                    document.getElementById("phoneErr").innerHTML = "";
                    document.getElementById("phone").style.borderColor = "black";
            }
        }
        function validateAddRestaurant()
        {
            let name = document.addRestForm.name.value;  
            let email = document.addRestForm.email.value;
            let des = document.addRestForm.des.value;  
            let phone = document.addRestForm.phone.value;

            if (name=="")
            {  
                    alert("Name Required");  
                    return false;  
            }
            else if(!name.match(/^[a-zA-Z\.\ ]+$/))
            {
                    alert("Invalid Name");
                    return false;
            }
            else if(name.length <3)
            {
                    alert("At least 3 characters required in Name");
                    return false;
            }
            else if (email=="")
            {  
                    alert("Email Required");  
                    return false;  
            }
            else if(!email.match(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i))
            {
                    alert("Invalid Email");
                    return false;
            }
            if (des=="")
            {  
                    alert("Destination Required");  
                    return false;  
            }
            else if(!des.match(/^[a-zA-Z\.\ ]+$/))
            {
                    alert("Invalid Destination Name");
                    return false;
            }
            else if(des.length <3)
            {
                    alert("At least 3 characters required in Destination Name");
                    return false;
            }
            if (phone=="")
            {  
                    alert("Phone Number Required");  
                    return false;  
            }
            else if(!phone.match(/^[0-9]{11}$/))
            {
                    alert("Invalid Phone Number");
                    return false;
            }
        }
    </script>
</head> 
</head>
<body>
    <br><br><br><br><br>  
        <div class="container" style="width:500px;">
            <form name="addRestForm" method="post" onsubmit="return validateAddRestaurant()">  
                <?php   
                if(isset($error))  
                {  
                        echo $error;
                }
                ?>  
                <br> 
                <fieldset>
                        <legend>RESTAURANT</legend> 
                        <label>Name</label>  
                        <input type="text" name="name" id="name" onblur="checkName()" class="form-control"/><p style="color:red" id="nameErr"></p>
                        <label>Email</label>
                        <input type="text" name = "email" id = "email" onblur="checkEmail()" class="form-control"/><p style="color:red" id="emailErr"></p>
                        <label>Destination</label>
                        <input type="text" name = "des" id = "des" onblur="checkDes()" class="form-control"/><p style="color:red" id="desErr"></p>
                        <label>Phone Number</label>
                        <input type="text" name = "phone" id = "phone" onblur="checkPhone()" class="form-control"/><p style="color:red" id="phoneErr"></p>
                        
                        <input type="submit" name="submit" value="Submit"><br><?php echo $err ?> 
                </fieldset>           
                <?php  
                if(isset($message))  
                {  
                        echo $message;  
                }  
                ?>  
            </form>  
        </div>  
        <br />  
</body>
</html>