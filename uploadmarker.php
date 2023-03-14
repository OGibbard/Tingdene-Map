<?php
#Start session
session_start();
#Find directory
$target_dir = $_SESSION['company']."/";
#Where to upload to
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
print_r($target_file);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

#Check if it already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
#Check if it is too large
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
#Check the file type
if($imageFileType != "png" ) {
  echo "Sorry PNG files are allowed.";
  $uploadOk = 0;
}

#File not uploaded
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    header('Location: admin.php');
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>