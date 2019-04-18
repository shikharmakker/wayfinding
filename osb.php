<?php
include("Constants.php");
$name = $_POST['name'];
$tag = $_POST['tag'];
$desc = $_POST['desc'];
$user = $_POST['user'];
$val = $_POST['val'];
$map = $_POST['map'];


$query = mysqli_query($conn,"INSERT into junctions (value, Tags , Description, name, username, map) values ('$val','$tag','$desc','$name','$user','$map')");
 //access data like this

?>