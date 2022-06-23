<?php
    include "login header footer dashboard.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<br><br><br><br><br><br><br><br>  
        <div class="container" style="width:500px;">
<?php
    if(!isset($_POST['submit']))
    {
        $a = "<img src='default.jpg'>";
        echo $a;
    }
    else if(isset($_POST['submit']))
    { 
        $filepath = $_FILES["file"]["name"];
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
        {
            $a = "<img src=".$filepath." />";

            if(file_exists('pic.json'))  
            {  
                    $current_data = file_get_contents('pic.json');  
                    $array_data = json_decode($current_data, true);  
                    $extra = array(  
                        'name'               =>     $_SESSION['name'],  
                        'pic'          =>     $a
                    );  
                    $array_data[] = $extra;  
                    $final_data = json_encode($array_data);  
                    if(file_put_contents('pic.json', $final_data))
                    {  
                        $message = "<label class='text-success'>File uploaded successfully</p>";
                    }
            }
           else  
           {  
                $error = 'JSON File dont exits';  
           }  
            echo "$a";
        } 
        else 
        {
            echo "Error !!";
        }
    }
    ?>

    <form action="Task_G_picture.php" enctype="multipart/form-data" method="post">
    <input type="file" name="file"><br/>
    <input type="submit" value="Upload" name="submit">
    </form>

    </div>
</body>
</html>