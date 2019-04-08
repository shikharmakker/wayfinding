<?php include('Constants.php'); ?>
<?php

//$x = $_GET['RN'];
$floor = $_GET['floor'];
$building = $_GET['building'];
$x = $building.$floor;
$query = mysqli_query($conn,"SELECT JSON_string FROM maps_data WHERE  name = '$x' AND version = 0");
$arr = $query->fetch_assoc();
print_r($arr['JSON_string']);
?>