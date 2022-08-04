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
        let i = 0;
        let len;
        let food;

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
        const xmlDoc = xhttp.responseXML;
        food = xmlDoc.getElementsByTagName("food");
        len = food.length;
        displayFood(i);
        }
        xhttp.open("GET", "../Controller/XML.php");
        xhttp.send();

        function displayFood(i) 
        {
        document.getElementById("showFood").innerHTML =
        "Name: " +
        food[i].getElementsByTagName("name")[0].childNodes[0].nodeValue +
        "<br>Category: " +
        food[i].getElementsByTagName("cat")[0].childNodes[0].nodeValue +
        "<br>Price: " + 
        food[i].getElementsByTagName("price")[0].childNodes[0].nodeValue;
        }

        function next() {
        if (i < len-1) {
            i++;
            displayFood(i);
        }
        }

        function previous() {
        if (i > 0) {
            i--;
            displayFood(i);
        }
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
</style>
<body>
    <div class="container" style="width: 500px; font-size:50px;">
    <br><br>
        <hr>
            <div id='showFood'></div><br>
            <input style="margin-left:140px;" type="button" onclick="previous()" value="<<">
            <input type="button" onclick="next()" value=">>">
        <hr>
    </div>
</body>
</html>