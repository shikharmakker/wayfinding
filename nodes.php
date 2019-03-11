<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$database="test";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$database);
//$x = $_GET['RN'];
$x = 'shikharaiims';
$query = mysqli_query($conn,"SELECT JSON_string FROM test.first_test WHERE  name = 'shikharaiims'");
$arr = $query->fetch_assoc();


echo $arr['JSON_string'];
?>