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
$name = $_GET['img'];
$version = $_GET['version'];
$user = $_SESSION["username"];

$sql = mysqli_query($conn,"Select * from maps_data where name = '$name'");
$sql0 = mysqli_query($conn,"Select * from maps_data where name = '$name' and version = '0'");
$sql1 = mysqli_query($conn,"Select * from maps_data where name = '$name' and version = '1'");
$sql2 = mysqli_query($conn,"Select * from maps_data where name = '$name' and version = '2'");

$row = mysqli_fetch_assoc($sql);
$row0 = mysqli_fetch_assoc($sql0);
$row1 = mysqli_fetch_assoc($sql1);
$row2 = mysqli_fetch_assoc($sql2);

//$sql2 = mysql_query($conn,"Select * from maps_data where name = '$x' and version = '2'");
// 0 is latest version , 1 is previous version...
//echo $x;
//print_r($row);
//print_r($row);die;
$q0 = $row0['JSON_string'];
$q1 = $row1['JSON_string'];
$q2 = $row2['JSON_string'];
$query;

if($version == 0){
	echo "already this version in use";
}
else if($version == 1){
$query = mysqli_query($conn,"update maps_data set name = '$name', JSON_string = '$q0', username = '$user' where name = '$name' and version = '1'");
$query1 = mysqli_query($conn,"update maps_data set name = '$name', JSON_string = '$q1', username = '$user' where name = '$name' and version = '0'");
//$query2 = mysqli_query($conn,"update maps_data set name = '$name', JSON_string = '$q2', version = '2', username = '$user' where name = '$name' and version = '2'");
}
else if($version == 2){
$query0 = mysqli_query($conn,"update maps_data set name = '$name', JSON_string = '$q1', username = '$user' where name = '$name' and version = '2'");
$query2 = mysqli_query($conn,"update maps_data set name = '$name', JSON_string = '$q0', username = '$user' where name = '$name' and version = '1'");
$query1 = mysqli_query($conn,"update maps_data set name = '$name', JSON_string = '$q2', username = '$user' where name = '$name' and version = '0'");

}
$url = 'welcome.php';
header( "Location: $url" );



?>
