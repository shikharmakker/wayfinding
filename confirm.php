<?php

session_start();
include("functions.php");
include('Constants.php');
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

$user = $_SESSION["username"];
$pass = $_POST['psw'];
//print_r($user);
$sql = "SELECT password FROM admin WHERE username = '$user'";
$result = mysqli_query($conn, $sql);
//print_r($result);
$row = mysqli_fetch_assoc($result);
//echo $row['password'];
header("trial.php?img=dasd");
if($pass == $row['password']){
	echo "submitted successfully";

	return true;
}
else{
	return false;
	//echo "wrong password";
}
?>
