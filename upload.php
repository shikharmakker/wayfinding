<?php include('Constants.php') ?>
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
?>
<?php
if(isset($_SESSION["username"])) {    }
?>
<?php
//echo "<script type='text/javascript'>alert('hello');</script>";
$x = $_POST['name'];
$y= $_POST['JSON_string'];
$z;
$user = $_SESSION["username"];
$sql = mysqli_query($conn,"Select * from maps_data where name = '$x'");
$sql0 = mysqli_query($conn,"Select * from maps_data where name = '$x' and version = '0'");
$sql1 = mysqli_query($conn,"Select * from maps_data where name = '$x' and version = '1'");
$sql2 = mysqli_query($conn,"Select * from maps_data where name = '$x' and version = '2'");

$row = mysqli_fetch_assoc($sql);
$row0 = mysqli_fetch_assoc($sql0);
$row1 = mysqli_fetch_assoc($sql1);
$row2 = mysqli_fetch_assoc($sql2);

//$sql2 = mysql_query($conn,"Select * from maps_data where name = '$x' and version = '2'");
// 0 is latest version , 1 is previous version...
//echo $x;
//print_r($row);
//print_r($row);die;
if(!$sql){
$query1 = mysqli_query($conn,"insert into maps_data(name,JSON_string,version,username) values ('$x', '$y','0','$user') ");
$query = mysqli_query($conn,"insert into maps_data(name,JSON_string,version,username) values ('$x', '$y','1','$user')");
$query2 = mysqli_query($conn,"insert into maps_data(name,JSON_string,version,username) values ('$x', '$y','2','$user')");

}
else{
	$p = $row0['name'];
	$q = $row0['JSON_string'];
	$r = 1;
	$z = 0;
	$q1 = $row1['JSON_string'];
	$query1 = mysqli_query($conn,"update maps_data set name = '$p', JSON_string = '$q1', version = '2', username = '$user' where name = '$x' and version = '2'");
	$query1 = mysqli_query($conn,"update maps_data set name = '$p', JSON_string = '$q', version = '$r', username = '$user' where name = '$x' and version = '1'");
	$query2 = mysqli_query($conn,"update maps_data set name = '$x', JSON_string = '$y', version = '$z', username = '$user' where name = '$x' and version = '0'");
}

?>
