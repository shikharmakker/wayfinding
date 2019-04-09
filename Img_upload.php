<!DOCTYPE html>
<?php include('Constants.php') ?>
<html>
<head>
	<title></title>
</head>
<body>
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
$building = $_POST["building_name"] ;
$floor = $_POST["floor"];
$x = $_POST["building_name"] . $_POST["floor"];
$user = $_SESSION["username"];
$file = $x . '.jpg';
$sqlc1 = mysqli_query($conn,"Select * from maps where file_name = '$file'");
$rowc1 = mysqli_fetch_assoc($sqlc1);
if($rowc1){
    header('location: welcome.php?msg=already exists');
    return;
}
$target_dir = "images/";
$target_file = $target_dir.basename($_FILES["myimage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$upload_image=$_FILES['myimage'] ['tmp_name'];
// $row= $_FILES['myimage']['name'];
$filename=$_FILES["myimage"]["name"];
$extension=end(explode(".", $filename));
$row=$_POST["building_name"] .$_POST["floor"].".".$extension;
$date = date('y-m-d-h-i-s');
//echo "$target_dir$row";
//move_uploaded_file($_FILES['myimage']['tmp_name'],$row);
move_uploaded_file($upload_image, "$target_dir/$row");

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["myimage"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

$y = $user;
$version = 0;
$z = '{"cords":[{"value": 0,"connected_nodes":[],"Tags":[],"name":"","description":""}]}';
//{"cords":[{"value":4726,"connected_nodes":[3226,4740],"Tags":["Room 21b"],"name":"Node 7","description":"Help Desk Open till midnight"}]}
$query = mysqli_query($conn,"insert into maps_data(name,username,JSON_string,version) values ('$x','$y','$z','0')");
$query2 = mysqli_query($conn,"insert into maps_data(name,username,JSON_string,version) values ('$x','$y','$z','1')");
$query2 = mysqli_query($conn,"insert into maps_data(name,username,JSON_string,version) values ('$x','$y','$z','2')");

$query1 = mysqli_query($conn,"insert into maps(building_name,floor,username,file_name,date) values ('$building','$floor','$y','$row','$date')");

//$query2 = mysqli_query($conn,"insert into maps (name,username,file_name,date) values ('$_POST["name"]', '$user','$row','$date')");
mysqli_commit($conn);
mysqli_close($conn);

?>

<script type="text/javascript">
    var nav = "trial.php?img=" + "<?php echo $x ?>"+"&version=0" ;
    window.location.href =nav;
</script>
<p  style="text-align:center"><script> document.write('<a href="' + nav + '">Navigation</a>'); </script></p>
</body>
</html>
