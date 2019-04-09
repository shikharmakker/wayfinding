<!DOCTYPE html>
<html>
		<head>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link href="css/index.css" type="text/css" rel="stylesheet">
			<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
			<link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
   <title>LOGIN</title>
			<style>
			.card-wrapper{
					display: flex;
	    justify-content: center;
	    align-items: center;
	    min-height: calc(100vh - 5rem);
			}
			.card-header-title{
    font-size: 2rem
			}
		</style>
		</head>
<body>
<?php
session_start();

include('Constants.php');


include("functions.php");
$message="";



if(count($_POST)>0) {
	$check="select * from admin where username = '$_POST[username]' and password = '$_POST[password]'";
$query = mysqli_query($conn,$check);

      if(mysqli_num_rows($query) > 0 ) {

		$_SESSION["user_id"] = 1001;
		$_SESSION["username"] = $_POST["username"];
		$_SESSION["password"] = $_POST["password"];
		$_SESSION['loggedin_time'] = time();
	} else {
		$message = "Invalid Username or Password!";
	}
}

if(isset($_SESSION["user_id"])) {
	if(!isLoginSessionExpired()) {
                header("Location: welcome.php");
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
	<nav class="navbar has-shadow is-light is-transparent" role="navigation" aria-label="main navigation">
	<div class="navbar-brand">
			<a class="navbar-item" href="">
				<span id="home" style="font-size: 1.5rem;"><strong>InNav</strong></span>
			</a>

			<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
			</a>
	</div>

	<div id="navbarBasicExample" class="navbar-menu">
			<div class="navbar-start">
				<a class="navbar-item">
					How to use
				</a>
				<a class="navbar-item">
						About Us
				</a>
			</div>

			<div class="navbar-end">
					<div class="navbar-item">
									<a class="button is-primary" href="register.php">
											<strong>Sign up</strong>
									</a>
					</div>
					</div>
			</div>

</nav>

		<br />
		<div  class="card-wrapper">
			<div class="card" style="width:100%;max-width:500px;margin:auto;">
				<div class="card-header">
					<p class="card-header-title">
						Login
					</p>
				</div>
				<div class="card-content">
					<form   method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return Verify()" name="myform">
							<div class="field">
								Username:
								<p class="control has-icons-left has-icons-right">
										<input class="input" type="text" placeholder="Enter your username here" name="username" required >
										<span class="icon is-small is-left">
												<i class="fas fa-envelope"></i>
										</span>
										<span class="icon is-small is-right">
												<i class="fas fa-check"></i>
										</span>
								</p>
						</div>
						<div class="field">
							Password:
								<p class="control has-icons-left">
										<input class="input" type="password" placeholder="Enter your password here" name="password" required>
										<span class="icon is-small is-left">
												<i class="fas fa-lock"></i>
										</span>
								</p>
						</div>
						<?php if($message!="") { ?>
							<div class="notification is-danger" style="margin-top:1.5rem;"><p><?php echo $message; ?></p></div>
						<?php } ?>
						<div class="field">
								<p class="control" style="margin-top:1.5rem;">
									<strong><input style="width:100%;" id="button" type="submit" value="Login" name="login" class="button is-success"/></strong>
								</p>
						</div>

								</form>
				</div>
			</div>
		</div>
			</body>
			</html>
