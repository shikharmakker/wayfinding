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
$sql = mysqli_query($conn,"Select * from first_test where name = '$x'");
$sql0 = mysqli_query($conn,"Select * from first_test where name = '$x' and version = '0'");
$sql1 = mysqli_query($conn,"Select * from first_test where name = '$x' and version = '1'");
$row = mysqli_fetch_assoc($sql);
$row0 = mysqli_fetch_assoc($sql0);
$row1 = mysqli_fetch_assoc($sql1);
//$sql2 = mysql_query($conn,"Select * from first_test where name = '$x' and version = '2'");
// 0 is latest version , 1 is previous version...
//echo $x;
//print_r($row);
//print_r($row);die;
if(!$sql){
$query1 = mysqli_query($conn,"insert into test.first_test(name,JSON_string,version,username) values ('$x', '$y','0','$user') ");
$query = mysqli_query($conn,"insert into test.first_test(name,JSON_string,version,username) values ('$x', '$y','1','$user')");

}
else{
	$p = $row0['name'];
	$q = $row0['JSON_string'];
	$r = 1;
	$z = 0;
	if(!$sql1){
	$query1 = mysqli_query($conn,"update first_test set name = '$p', JSON_string = '$q', version = '$r', username = '$user' where name = '$x' and version = '1'");
	}
	else{
	$query = mysqli_query($conn,"insert into first_test(name,JSON_string,version,username) values ('$x', '$y','1','$user')");
	}
	$query2 = mysqli_query($conn,"update first_test set name = '$x', JSON_string = '$y', version = '$z', username = '$user' where name = '$x' and version = '0'");
}

//insert into first_test(name,JSON_string) values ('$x', '$y') on duplicate key update JSON_string='$y'

/*else if($row1==null){
	echo "string1";
	 $p = $row0['name'];
	 $q = $row0['JSON_string'];
	 $r = 1;
	 $z = 0;
	 //print_r($row0);
	  $query2 = mysqli_query($conn,"update first_test set JSON_string ='$q', version = '1' where name = '$x' and version = '0'");
	 	 mysqli_commit($conn);
	 $query = mysqli_query($conn,"insert into first_test(name,JSON_string,version) values ('$x', '$y','0')");
	mysqli_commit($conn);*/
//mysqli_close($conn);


/*else{
	echo "string2";
	 $row = mysqli_fetch_assoc($sql0);
	 $p = $row['name'];
	 $q = $row['JSON_string'];
	 $r = 1;
	 $z = 0;
	 $query1 = mysqli_query($conn,"update first_test set name = '$p', JSON_string = '$q', version = '$r' where name = '$x' and version = '1'");
	 $query2 = mysqli_query($conn,"update first_test set name = '$x', JSON_string = '$y', version = '$z' where name = '$x' and version = '0'");
mysqli_commit($conn);
mysqli_close($conn);
}*/




?>
