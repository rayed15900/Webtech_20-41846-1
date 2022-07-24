<?php
require_once '../Task_A/FoodInfo.php';
$foodmenu = fetchAllFood();
?>

<html>
<head>
    <title></title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
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
    <div class="container" style="width: 1000px;">
    <table style="font-size:50px;">
    <br><br><br><br><br><br><br><br>
	    <thead>
            <tr>
                <th style="border: solid 5px;">Name</th>
                <th style="border: solid 5px; padding-left: 20px; padding-right: 20px;">Category</th>
                <th style="border: solid 5px; padding-left: 20px; padding-right: 20px;">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($foodmenu as $i => $food): ?>
                <tr>
                    <td style="border: solid 5px;"><?php echo $food['fname'] ?></td>
                    <td style="border: solid 5px; padding-left: 20px;"><?php echo $food['cat'] ?></td>
                    <td style="border: solid 5px; padding-left: 20px;"><?php echo $food['price'] ?></td>
                    <td><a href="../Task_C/EditFoodMenu.php?id=<?php echo $food['ID'] ?>">Edit</a>&nbsp<a href="../Task_D/DeleteFood.php?id=<?php echo $food['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../Task_A/AddFoodMenu.php" style="font-size:50px;">Add Food</a><br>
    <a href="../Task_E/SearchFoodMenu.php" style="font-size:50px;">Search Food</a>
    </div>
</body>
</html>