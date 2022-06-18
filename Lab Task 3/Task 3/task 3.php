
<?php
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
      }
      
      if ($_FILES["fileToUpload"]["size"] > 4000000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
}
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
  <h1>Profile Picture</h1>
  <img src="icon.png" alt=""> <br>
  <input type="file" name="fileToUpload" id="fileToUpload"> <br> <br>
  <input type="submit" value="Submit" name="submit">
</form>
