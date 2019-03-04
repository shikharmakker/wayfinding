<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$database="test";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$database);
$x = $_POST['name'];
$y= $_POST['JSON_string'];
$message = $x;
echo "<script type='text/javascript'>alert('$message');</script>";
$query = mysqli_query($conn,"insert into test.first_test(name,JSON_string) values ('$x', '$y') on duplicate key update JSON_string='$y'");
mysqli_commit($conn);
mysqli_close($conn);
?>
