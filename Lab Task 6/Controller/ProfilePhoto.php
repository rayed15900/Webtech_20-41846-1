<?php
if(file_exists('../Data/UserPic.json'))
{
    $pic = file_get_contents("../Data/UserPic.json");
    $pic = json_decode($pic, true);
    if(!empty($pic))
    {
        foreach($pic as $item)
        {
            if($item["user"]==$_SESSION["user"])
            {
                $p = $item['pic'];
                echo $p;
                break;
            }
            else
            {
                $fileErr = "<label class='text-danger'>Can not find Picture</label>";
            }
        }
    }
    else
    {
        echo "<img src='../Data/default.jpg'>";
    }
}
?>