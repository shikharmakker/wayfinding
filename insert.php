<?php
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

	$con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con,"girnar");
    
    $notice = $_POST['address'];
    $date = date('y-m-d H-i-s');

    $sql = "INSERT INTO notices(notes,date,username) VALUES('$notice','$date','$_SESSION[user_name]')";
    $res = mysqli_query($con,$sql);
   echo "<meta http-equiv = 'refresh' content='0;url=welcome.php'>";
    
?>