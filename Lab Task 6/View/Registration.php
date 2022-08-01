<?php
include 'Header Footer.php';
include '../Controller/RegistrationCheck.php';
?>

<html>  
     <head>  
          <title>Registration</title>  
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
     </head>  
     <body> 
          <br><br><br><br><br>  
          <div class="container" style="width:500px;">  
                              
               <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">  
                    <?php   
                    if(isset($fileErr))
                    {  
                         echo $fileErr;
                    }
                    ?>  
                    <br> 
                    <fieldset>
                         <legend>REGISTRATION</legend> 
                         <label>Name</label>  
                         <input type="text" name="name" class="form-control"><?php echo $nameErr ?><br>  
                         <label>Email</label>
                         <input type="text" name = "email" class="form-control"><?php echo $emailErr ?><br>
                         <label>User Name</label>
                         <input type="text" name = "user" class="form-control"><?php echo $userErr ?><br>
                         <label>Password</label>
                         <input type="password" name = "pass" class="form-control"><?php echo $passErr ?><br>
                         <label>Confirm Password</label>
                         <input type="password" name = "cpass" class="form-control"><?php echo $cpassErr ?><br>

                         <fieldset>
                              <legend>Gender</legend>
                              <input type="radio" id="male" name="gender" value="male">
                              <label for="male">Male</label>                     
                              <input type="radio" id="female" name="gender" value="female">
                              <label for="female">Female</label>
                              <input type="radio" id="other" name="gender" value="other">
                              <label for="other">Other</label><br><?php echo $genderErr ?><br>
                              <legend>Date of Birth:</legend>
                              <input type="date" name="dob"><br><?php echo $dobErr ?><br>
                         </fieldset> 
                         
                         <input type="submit" name="register" value="Submit" />         
                    </fieldset>           
                    <?php  
                    if(isset($message))  
                    {
                         echo $message;  
                    }  
                    ?>  
               </form>  
          </div>  
          <br>
     </body>
</html>