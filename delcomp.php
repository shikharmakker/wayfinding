<?php include('Constants.php') ?>


  <?php
  if(isset($_GET["msg"])){
  $msg = $_GET['msg'];
}
//$user = $_SESSION['username'];
//	include('Constants.php');
    $val = $_GET['value'];
    $comp = $_GET['complaint'];
    $map = $_GET['map'];
   // echo $name;die;
 //   $sql = "DELETE FROM maps WHERE value='$val' and map ='$map' and complaint='$comp' ";

    $res = mysqli_query($conn,"UPDATE complaint SET status = 'resolved' where value='$val' and map ='$map' and complaint='$comp'");
     echo "<meta http-equiv = 'refresh' content='0;url=admin_complaint.php'>"; 