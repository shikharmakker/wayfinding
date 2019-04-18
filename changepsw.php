<?php

include('Constants.php');
$user = $_POST['username'];
$psw = $_POST['password'];
$sql = mysqli_query($conn,"UPDATE admin SET password='$psw' WHERE username = '$user'");

echo "Password has changed";

?>