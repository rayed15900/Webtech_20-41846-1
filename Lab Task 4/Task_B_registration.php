<?php  
 include 'header footer.php';
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter an e-mail</label>";  
      }  
      else if(empty($_POST["un"]))  
      {  
           $error = "<label class='text-danger'>Enter a username</label>";  
      }  
      else if(empty($_POST["pass"]))  
      {  
           $error = "<label class='text-danger'>Enter a password</label>";  
      }
      else if(empty($_POST["Cpass"]))  
      {  
           $error = "<label class='text-danger'>Confirm password field cannot be empty</label>";  
      } 
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label class='text-danger'>Gender cannot be empty</label>";  
      } 
       
      else  
      {  
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['name'],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["un"], 
                     'pass'        =>     $_POST["pass"], 
                     'gender'     =>     $_POST["gender"],  
                     'dob'     =>     $_POST["dob"]  
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>Account registered successfully</p>";
                }  
           }
           else
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>  

<!DOCTYPE html>  
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
                                
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br /> 
                     <fieldset>
                        <legend>REGISTRATION</legend> 
                     <label>Name</label>  
                     <input type="text" name="name" class="form-control" /><br />  
                     <label>E-mail</label>
                     <input type="email" name = "email" class="form-control" /><br />
                     <label>User Name</label>
                     <input type="text" name = "un" class="form-control" /><br />
                     <label>Password</label>
                     <input type="password" name = "pass" class="form-control" /><br />
                     <label>Confirm Password</label>
                     <input type="password" name = "Cpass" class="form-control" /><br />

                    <fieldset>
                    <legend>Gender</legend>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>                     
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="gender" value="other">
                    <label for="other">Other</label><br>

                    <legend>Date of Birth:</legend>
                    <input type="date" name="dob"> <br><br>
                    </fieldset> 
                     
                    <input type="submit" name="submit" value="Submit" />
                    <input type="submit" name="reset" value="Reset" /><br />           
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