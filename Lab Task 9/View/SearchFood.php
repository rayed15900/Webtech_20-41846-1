<?php
include 'Header Footer Login FoodMenu.php';
?>

<html>
<head>
    <title></title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        function showHint(str)
        {
            if (str.length == 0)
            { 
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function()
            {
                document.getElementById("txtHint").innerHTML =
                this.responseText;
            }
            xhttp.open("GET", "../Controller/SearchFoodCheck.php?q="+str);
            xhttp.send();   
        }
    </script>
</head> 
</head>
<body>
    <br><br><br><br><br><br><br><br><br>
        <div class="container" style="width:500px;">
                <legend>Search Food</legend> 
                <input class="form-control" type="text" onkeyup="showHint(this.value)">
                <legend>Suggestions: <span id="txtHint"></span></legend> 
        </div>
</body>
</html>