<?php
include 'Header Footer Login FoodMenu.php';
?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        const xhttp = new XMLHttpRequest();
        let food;
        xhttp.onload = function() 
        {
            const xmlDoc = xhttp.responseXML; 
            food = xmlDoc.getElementsByTagName("food");
            loadFood();
        }
        xhttp.open("GET", "../Controller/XML.php");
        xhttp.send();

        function loadFood() 
        {
            let table="";
            for (let i = 0; i < food.length; i++) { 
                table += "<tr onclick='displayFood(" + i + ")'><td style='padding-top:10px'>";
                table += food[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
                table += "</td>";
                table += "</tr>";
            }
            document.getElementById("food").innerHTML = table;
        }

        var x;
        
        function displayFood(i) 
        {
            document.getElementById("showFood").innerHTML =
            "Name: " + food[i].getElementsByTagName("name")[0].childNodes[0].nodeValue +
            "<br>Category: " + food[i].getElementsByTagName("cat")[0].childNodes[0].nodeValue +
            "<br>Price: " + food[i].getElementsByTagName("price")[0].childNodes[0].nodeValue;
        }
    </script>
</head>
<style>
    body {
        color:#blue;
    }
    hr {
        position: relative;
        top: 20px;
        border: none;
        height: 5px;
        background: black;
        margin-bottom: 50px;
    }

    #food:hover{
        cursor: pointer;
    }
</style>
<body>
    <div class="container" style="color:black; width: 500px;">
        <br><br><br><br><br><br>
        <hr>
        <table style="font-size:50px;;" id="food"></table>
        <hr>
        <span style="font-size:40px;" id='showFood'></span>
    </div>
</body>
</html>