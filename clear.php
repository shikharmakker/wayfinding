<?php
session_start();
include("functions.php");
include("Constants.php");
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
$user = $_SESSION["username"];
$name = $_GET['img'];
$x = $name;
$y = $user;
$version = 0;
$z = '{"cords":[{"value": 0,"connected_nodes":[],"Tags":[],"name":"","description":""}]}';
$query = mysqli_query($conn,"DELETE FROM maps_data WHERE name = '$name'");
$query1 = mysqli_query($conn,"insert into maps_data(name,username,JSON_string,version) values ('$x','$y','$z','0')");
$query2 = mysqli_query($conn,"insert into maps_data(name,username,JSON_string,version) values ('$x','$y','$z','1')");
$query2 = mysqli_query($conn,"insert into maps_data(name,username,JSON_string,version) values ('$x','$y','$z','2')");

 echo "<meta http-equiv = 'refresh' content='0;url=trial.php?img=$name&version=0'>"; 
?>
