<?php include('Constants.php') ?>
<?php

//$x = $_GET['RN'];
$x = 'shikharaiims';
$query = mysqli_query($conn,"SELECT JSON_string FROM test.first_test WHERE  name = 'shikharaiims'");
$arr = $query->fetch_assoc();


echo $arr['JSON_string'];
?>