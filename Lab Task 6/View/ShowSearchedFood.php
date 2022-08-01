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
    <table class="container" style="width: 1000px; font-size:50px;">
    <br><br><br><br><br><br><br><br>
	    <thead>
            <tr>
                <th style="border-right: solid 5px;">Name</th>
                <th style="border-right: solid 5px; padding-left: 20px; padding-right: 20px;">Category</th>
                <th style="border-right: solid 5px; padding-left: 20px; padding-right: 20px;">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($AllSearchedFood as $i => $food): ?>
                <tr>
                    <td style="border-right: solid 5px;"><?php echo $food['name'] ?></td>
                    <td style="border-right: solid 5px; padding-left: 20px;"><?php echo $food['cat'] ?></td>
                    <td style="border-right: solid 5px; padding-left: 20px;"><?php echo $food['price'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>