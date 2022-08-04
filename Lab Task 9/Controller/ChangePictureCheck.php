<?php
$message = $picErr = "";

if(!isset($_POST['submit']))
{
    $a = "<img src='../Data/default.jpg'>";
    echo $a;
}
else if(isset($_POST['submit']))
{
    $filepath = basename($_FILES["file"]["name"]);
    $imageFileType = pathinfo($filepath,PATHINFO_EXTENSION);

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
    {
        $picErr = "<label class='text-danger'>Only JPG, JPEG and PNG files are allowed</label>";
      }
      
    if ($_FILES["file"]["size"] > 4000000) 
    {
        $picErr = "<label class='text-danger'>File is too large</label>";
    }
    else
    {
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath))
        {
            $a = "<img src=".$filepath.">";
    
            if(file_exists('../Data/UserPic.json'))
            {
                $img = file_get_contents("../Data/UserPic.json");
                $img = json_decode($img, true);
                $found = 0;
    
                foreach($img as $key=>$entry)
                {
                    if($entry["user"]==$_SESSION['user'])
                    {
                        $img[$key]["pic"] = $a;
                        $found = 1;
                        $newimg=json_encode($img);
                        file_put_contents('../Data/UserPic.json',$newimg);
                        $message = "<label class='text-success'>File uploaded successfully</label>";
                        echo $a;
                        break;
                    }
                }
                
                if($found == 0)
                {
                    $current_data = file_get_contents('../Data/UserPic.json');
                    $array_data = json_decode($current_data, true);
                    $extra = array(
                        'user'   =>   $_SESSION['user'],
                        'pic'   =>    $a
                    );
                    $array_data[] = $extra;
                    $final_data = json_encode($array_data);
                    if(file_put_contents('../Data/UserPic.json', $final_data))
                    {
                        $message = "<label class='text-success'>File uploaded successfully</label>";
                        echo $a;
                    }
                }
            }
        }
    }
}
?>