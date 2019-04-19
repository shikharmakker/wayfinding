<?php
include('Constants.php');
$val = $_POST['value'];
$map = $_POST['map'];
$quer = mysqli_query($conn,"SELECT * FROM complaint WHERE map='$map' and value='$val' and status='unresolved'");
$row = mysqli_fetch_assoc($quer);
$j = json_encode($row);
print_r($j);
?>