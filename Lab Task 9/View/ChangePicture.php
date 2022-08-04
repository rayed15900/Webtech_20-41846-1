<?php
    include 'Header Footer Login Dashboard.php';
?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <br><br><br><br><br><br><br><br>
    <div class="container" style="width:500px;">
        <form action="ChangePicture.php" enctype="multipart/form-data" method="post">
            <?php
                include '../Controller/ChangePictureCheck.php';
            ?>
            <input type="file" name="file"><br/>
            <input type="submit" value="Upload" name="submit"><br><?php echo $message; ?><?php echo $picErr; ?>
        </form>
    </div>
</body>
</html>