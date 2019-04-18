<?php
include('Constants.php');
$val = $_POST['value'];
$map = $_POST['map'];
$complaint = $_POST['complaint'];
$tag = $_POST['tag'];
$file = $map . '.jpg';
$q = mysqli_query($conn,"SELECT * FROM maps where file_name ='$file'");
$r = mysqli_fetch_assoc($q);
$user = $r['username'];
$date = date('y-m-d');
$status = "unresolved";
$query = mysqli_query($conn,"INSERT INTO complaint (Tag,value,complaint,map,user,status,date) VALUES ('$tag','$val','$complaint','$map','$user','$status','$date')");
if($query){
	echo "complaint received successfuly";
}
else{
	echo "some error occured"; 
}


?>