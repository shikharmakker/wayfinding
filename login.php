<!DOCTYPE html>
<html>
<head>
	<link href="css/index.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>LOGIN</title>
</head>
<body>



<?php
session_start();

$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
mysqli_select_db( $con,"test");


include("functions.php");
$message="";



if(count($_POST)>0) {
	$check="select * from admin where username = '$_POST[username]' and password = '$_POST[password]'";
$query = mysqli_query($con,$check);
  
      if(mysqli_num_rows($query) > 0 ) {
      
		$_SESSION["user_id"] = 1001;
		$_SESSION["username"] = $_POST["username"];
		$_SESSION['loggedin_time'] = time();  
	} else {
		$message = "Invalid Username or Password!";
	}
}

if(isset($_SESSION["user_id"])) {
	if(!isLoginSessionExpired()) {
                header("Location:/aim/welcome.php");
        } else {
		header("Location:logout.php?session_expired=1");
	}
}

if(isset($_GET["session_expired"])) {
	$message = "Login Session is Expired. Please Login Again";
}
?>

<script language = JavaScript1.2>
                    function Verify()
                    {
                       //alert("Hello! I am an alert box!!");
                       myform.action = "";
                       myform.method = "post";                              
                    }
</script>  

<div class="body-content">
    <div class="module">
        <br>	
        <h1 align="center" style="font-size: 3em">LOGIN</h1>
       
        
        <form   method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return Verify()" name="myform">
            <div class="alert alert-error"></div>
            <table style="width: 100%">
            	<tr align="center">
            		<td>
            <input type="text" placeholder="User Name" name="username" style="width: 350px;background-color:rgba(0, 0, 0, .2);color:black" required /><br>
            <input type="password" placeholder="Password" name="password" style="width: 350px;background-color:rgba(0, 0, 0, .2);color:black" required />
            	</td>
            	</tr>
            </table>
            <br><br>
           
            <style>
                .message {
                    color: #333;
                    border: #FF0000 1px solid;
                    background: #FFE7E7;
                    padding: 5px 20px;
                }
            </style>
            
            <?php if($message!="") { ?>
            <table style="width: 100%">
            	<tr align="center">
            		<td>
            <div class="message" style="width: 350px"><?php echo $message; ?></div>
            </td>
    </tr>
</table>
            <?php } ?>

            <table style="width: 100%">
            	<tr align="center">
            		<td>
            <input id="button" type="submit" value="Login" name="login" class="btn btn-block btn-primary" style="width: 250px;height: 35px" /><br>
        </td>
    </tr>
</table>
            </form>
      
</body>
</html>