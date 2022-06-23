<?php
include 'login header footer dashboard.php';
session_start();
?>

<!DOCTYPE html>
<head>  
<style>
.error {color: #FF0000;}
</style>
<title>Login</title>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head> 
<body>  
<br><br><br><br><br><br>
<div class="container" style="width:500px;"> 

<?php
$curpassErr = $newpassErr = $retypeErr = "";
$curpass = $newpass = $retype = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["curpass"])) 
    {
        $curpassErr = "Enter current password";
    }
    else
    {
    $curpass=$_POST["curpass"];
    if(file_exists('data.json'))
    {
        $data = file_get_contents("data.json");
        $data = json_decode($data, true);
        foreach($data as $item)
        {
            if($_POST["curpass"]==$item["pass"])
            {
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    if (empty($_POST["newpass"]))
                    {
                        $newpassErr = "Enter new password";
                    }
                    else
                    {
                        $newpass = $_POST["newpass"];
                        if($newpass==$curpass)
                        {
                            $newpassErr = "New Password should not be same as the Current Password";
                        }
                    }
                }
                  
                if($_SERVER["REQUEST_METHOD"] == "POST") 
                {
                    if (empty($_POST["retype"])) 
                    {
                      $retypeErr = "Retype new password";
                    }
                    else
                    {
                      $retype = $_POST["retype"];
                      if($retype!=$newpass)
                      {
                        $retypeErr = "New Password must match with the Retyped Password";
                      }
                      else
                      {
                          if(file_exists('data.json'))
                          {
                              $data = file_get_contents("data.json");
                              $data = json_decode($data, true);
                              foreach($data as $key=>$entry)
                              {
                                  if($entry["username"]==$_SESSION['name'])
                                  {
                                      $data[$key]["pass"]=$retype;               
                                  }
                              }
                              $newdata=json_encode($data);
                              file_put_contents('data.json',$newdata);
                              $retypeErr = "<label class = text-success>Password changed</label>";
                          }
                      }
                    }
                }
                break;
            }
            else
            {
                $curpassErr = "<label class='text-danger'>Current Password did not match</label>";
            }
        }
    }
    }
}
?>

<h2>CHANGE PASSWORD</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <span style="color:black">Current Password : </span>
  <input type="password" name="curpass" class="form-control">
  <span class="error"><?php echo $curpassErr;?></span>
  <br><br>
  
  <span style="color:black">New Password :</span>
  <input type="password" name="newpass" class="form-control">
  <span class="error"> <?php echo $newpassErr;?></span>
  <br><br>

  <span style="color:black">Retype New Password :</span>
  <input type="password" name="retype" class="form-control">
  <span class="error"> <?php echo $retypeErr;?></span>
  <br><br>

  <input type="submit" name="submit" value="Submit">  

</form>
</div>
</body>

</html>