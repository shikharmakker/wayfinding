<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$database="test";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$database);
//$x = $_GET['RN'];
$x = 'shikharaiims';
$query = mysqli_query($conn,"SELECT * FROM test.first_test WHERE  name = 'shikharaiims'");
$arr = $query->fetch_assoc();
print_r($arr);
?>