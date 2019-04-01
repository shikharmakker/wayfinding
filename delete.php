<?php
	include('Constants.php');
    $name = $_GET['id'];
    $n = $name .".jpg";
    
   // echo $name;die;
    $sql = "DELETE FROM maps WHERE file_name = '$n'";
    $res = mysqli_query($conn,$sql);
    $sql1 = mysqli_query($conn,"DELETE FROM maps_data WHERE name = '$name'");
  	
  $filename = $name . '.jpg';
  //echo $filename;
  if (file_exists('images/'.$filename)) {
    unlink('images/'.$filename);
    echo 'File '.$filename.' has been deleted';
  } else {
    echo 'Could not delete '.$filename.', file does not exist';
}	


   echo "<meta http-equiv = 'refresh' content='0;url=welcome.php'>"; 


?>
