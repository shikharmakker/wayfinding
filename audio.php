<?php
include('Constants.php');
session_start();
include("functions.php");
if(isset($_SESSION["user_id"])) {
    if(isLoginSessionExpired()) {
        header("Location:logout.php?session_expired=1");
    }
}
else
{
    $url = "login.php";
    echo "Login Session is Expired. Please Login Again";
    header("Location:$url");
}
?>

<?php
if(isset($_SESSION["username"])) {    }
?>

<?php


$file_name = $_FILES['file']['name'];
$map = $_POST['map'];
$v = $_POST['val'];
$user = $_SESSION["username"];
if($_FILES['file']['type']=='audio/mpeg' || $_FILES['file']['type']=='audio/mpeg3' || $_FILES['file']['type']=='audio/x-mpeg3' || $_FILES['file']['type']=='audio/mp3' || $_FILES['file']['type']=='audio/x-wav' || $_FILES['file']['type']=='audio/wav')
{ 
 $new_file_name=$v.$_FILES['file']['name'];
//$extension= end(explode(".", $new_file_name));

 // Where the file is going to be placed
 $target_path = "audio/".$new_file_name;
 
 //target path where u want to store file.

  //following function will move uploaded file to audios folder. 
if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
	echo 'File successfully uploaded : audio/' . $_FILES['file']['name'];
	$query = mysqli_query($conn,"UPDATE junctions SET audio='$new_file_name' where value='$v' and map='$map'");
  //insert query if u want to insert file
}
}
else{
	echo "file is not a valid audio";
}



?>