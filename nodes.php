<?php include('Constants.php') ?>
<?php

//$x = $_GET['RN'];
$x = 'shikharaiims';
$query = mysqli_query($conn,"SELECT JSON_string FROM maps_data WHERE  name = 'shikharaiims'");
$arr = $query->fetch_assoc();


echo $arr['JSON_string'];
?>