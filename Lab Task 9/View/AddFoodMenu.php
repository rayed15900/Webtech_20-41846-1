<?php
include 'Header Footer Login FoodMenu.php';
include '../Controller/AddFoodMenuCheck.php';
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
        function checkCat()
        {
            if (document.getElementById("cat").value == "")
            {
                    document.getElementById("catErr").innerHTML = "Category Required";
                    document.getElementById("cat").style.borderColor = "red";
            }
            else
            {
                    document.getElementById("catErr").innerHTML = "";
                    document.getElementById("cat").style.borderColor = "black";
            }
        }
        function checkPrice()
        {
            if (document.getElementById("price").value == "")
            {
                    document.getElementById("priceErr").innerHTML = "Price Required";
                    document.getElementById("price").style.borderColor = "red";
            }
            else
            {
                    document.getElementById("priceErr").innerHTML = "";
                    document.getElementById("price").style.borderColor = "black";
            }
        }

        function validateAddFood()
        {
            let name = document.addFoodForm.name.value;  
            let cat = document.addFoodForm.cat.value;
            let price = document.addFoodForm.price.value;  

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
            if (cat=="")
            {  
                    alert("Category Required");  
                    return false;  
            }
            else if(!cat.match(/^[a-zA-Z\.\ ]+$/))
            {
                    alert("Invalid Category");
                    return false;
            }
            else if(cat.length <3)
            {
                    alert("At least 3 characters required in category");
                    return false;
            }
            if (price=="")
            {  
                    alert("Price Required");  
                    return false;  
            }
            else if(!price.match(/[0-9]$/))
            {
                    alert("Invalid Price");
                    return false;
            }
        }
    </script>
</head> 
</head>
<body>
    <br><br><br><br><br>  
        <div class="container" style="width:500px;">
            <form name="addFoodForm" method="post" onsubmit="return validateAddFood()">  
                <?php   
                if(isset($error))  
                {  
                        echo $error;
                }
                ?>  
                <br> 
                <fieldset>
                        <legend>Food Item</legend> 
                        <label>Name</label>  
                        <input type="text" name="name" id="name" onblur="checkName()" class="form-control"/><p style="color:red" id="nameErr"></p>
                        <label>Category</label>
                        <input type="text" name = "cat" id="cat" onblur="checkCat()" class="form-control"/><p style="color:red" id="catErr"></p>
                        <label>Price</label>
                        <input type="text" name = "price" id="price" onblur="checkPrice()" class="form-control"/><p style="color:red" id="priceErr"></p>
                        
                        <input type="submit" name="submit" value="Submit">
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