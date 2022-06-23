<?php
    $nameErr = $emailErr = $dobErr = $genderErr = $degreeErr = $bloodErr = "";
    $name = $email = $dob = $gender = $degree = $blood = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      if (empty($_POST["name"]))
      {
        $nameErr = "Name cannot be empty";
      }
      else
      {
        $name = $_POST["name"];

        if (!preg_match('/^[a-zA-Z.-]{2,}$/', $name))
        {
            $nameErr = "Invalid User Name";
        } 
        else 
        {
            $nameErr = "";
        }
      }

      if (empty($_POST["email"]))
      {
        $emailErr = "email cannot be empty";
      } 
      else 
      {
        $email = $_POST["email"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $emailErr = "Invalid email format";
        }
        else 
        {
            $emailErr = "";
        }
      }

      if (empty($_POST["dob"]))
      {
        $dobErr = "Date Of Birth cannot be empty";
      } 
      else 
      {
        $dob = $_POST["dob"];

        if (date("Y") < 1953 && date("Y") > 1998) 
        {
            $dobErr = "Invalid Date of Birth";
        }
        else if(date("Y") >= 1953 && date("Y") <= 1998)
        {
            $dobErr = "";
        }
      }

      if (empty($_POST["gender"]))
      {
        $genderErr = "Gender cannot be empty";
      } 
      else 
      {
        $gender = $_POST["gender"];        
      }

      if (empty($_POST["degree"]))
      {
        $degreeErr = "Degree cannot be empty";
      } 
      else 
      {
        $degree = $_POST["degree"];
        
        $checked_count = count($_POST['degree']);

        if($checked_count <2)
        {
            $degreeErr = "Check at least two";
        }
        else
        {
            $degreeErr = "";
        }
      }

      if (empty($_POST["blood"]))
      {
        $bloodErr = "Blood Group cannot be empty";
      } 
      else 
      {
        $blood = $_POST["blood"];
        $bloodErr = "";     
      }
    }
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    User Name :
    <input type = "text" name = "name"><span style="color:red;"><?php echo $nameErr;?></span><br><br>
    Email:  
    <input type = "text" name = "email"><span style="color:red;"><?php echo $emailErr;?></span><br><br>
    Date Of Birth:
    <input type="date" name="dob"><span style="color:red;"><?php echo $dobErr;?></span><br><br>
    Gender: <br>
    <input type="radio" name="gender"> Male
    <input type="radio" name="gender">Female
    <input type="radio" name="gender"> Other <span style="color:red;"> <?php echo $genderErr;?></span><br><br>
    Degree: <br>
    <input type="checkbox" name="degree[]"> SSC
    <input type="checkbox" name="degree[]"> HSC
    <input type="checkbox" name="degree[]"> BSc
    <input type="checkbox" name="degree[]"> MSc <span style="color:red;"> <?php echo $degreeErr;?></span><br><br>
    Blood Group:
    <select name="blood">
        <option  disabled selected value></option>
        <option name="blood">A+</option>
        <option name="blood">A-</option>
        <option name="blood">B+</option>
        <option name="blood">B-</option>
        <option name="blood">O+</option>
        <option name="blood">O-</option>
    </select> <span style="color:red;"> <?php echo $bloodErr;?> <br> <br>

    <input type = "submit" name = "submit" value = "Submit">
</form>