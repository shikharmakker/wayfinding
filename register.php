

<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/index.css" type="text/css" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
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
 <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
 <script language = JavaScript1.2>
                    function Verify()
                    {
                       //alert("Hello! I am an alert box!!");
                       myform.action = "";
                       myform.method = "post";
                    }
</script>
  <title>Register</title>
 </head>
 <body>
  <div class="body-content">
  	<nav class="navbar" role="navigation" aria-label="main navigation">
  	  <div class="navbar-brand">
  	    <span class="navbar-item" style="font-size: x-large;">
        <strong>InNav</strong>
        </span>
  	    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
  	      <span aria-hidden="true"></span>
  	      <span aria-hidden="true"></span>
  	      <span aria-hidden="true"></span>
  	    </a>
  	  </div>
  	  <div id="navbarBasicExample" class="navbar-menu">
  	    <div class="navbar-start">
  	      <a class="navbar-item">
  	        Home
  	      </a>
  	    </div>
  	    <div class="navbar-end">
  						<a class="navbar-item">
  								Facing Trouble using AIIMS Nav?
  						</a>
  	      <div class="navbar-item">
            <a class="button is-primary" href="login.php">
              <strong>Login</strong>
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
  						Register
  					</p>
  				</div>
  				<div class="card-content">
  					<form   method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return Verify()" name="myform">
  							<div class="field">
          Enter Firstname:
  								<p class="control has-icons-left has-icons-right">
  										<input class="input" type="text" placeholder="Enter Firstname" name="firstname" required >
  										<span class="icon is-small is-left">
  												<i class="fas fa-envelope"></i>
  										</span>
  								</p>
  						</div>
              <div class="field">
          Enter Lastname:
                  <p class="control has-icons-left has-icons-right">
                      <input class="input" type="text" placeholder="Enter Lastname" name="lastname" required >
                      <span class="icon is-small is-left">
                          <i class="fas fa-envelope"></i>
                      </span>
                  </p>
              </div>
              <div class="field">
          Enter your Email:
                  <p class="control has-icons-left has-icons-right">
                      <input class="input" type="text" placeholder="Enter your Email" name="email" required >
                      <span class="icon is-small is-left">
                          <i class="fas fa-envelope"></i>
                      </span>
                  </p>
              </div>
        <div class="field">
         Enter a Password:
  								<p class="control has-icons-left">
           <input class="input" type="password" placeholder="Enter password" name="password" required>
  										<span class="icon is-small is-left">
  												<i class="fas fa-lock"></i>
  										</span>
  								</p>
  						</div>
              <div class="field">
         Confirm Password:
                  <p class="control has-icons-left">
           <input class="input" type="password" placeholder="Enter password again" name="pass" required>
                      <span class="icon is-small is-left">
                          <i class="fas fa-lock"></i>
                      </span>
                  </p>
              </div>

       
  					
  							
  						<div class="field">
  								<p class="control" style="margin-top:1.5rem;">
  									<input style="width:100%;" id="button" type="submit" value="Register" name="Register" class="button is-success"/>
  								</p>
  						</div>

  								</form>
  				</div>
  			</div>
  		</div>
 </body>
 <script type="text/javascript">
         $(function () {
        $("#button").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#pass").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            else{
              alert("You are registered successfully, You can go to login page");
               
            }
          
        });
    });

 </script>
</html>
<?php 
include('Constants.php');
if(count($_POST)>0) {
  $first = $_POST["firstname"];
  $last = $_POST["lastname"];
  $psw = $_POST["password"];
  $email = $_POST["email"];
  $user = $first.$last;
  $query = mysqli_query($conn,"INSERT INTO admin (username,password,firstname,lastname,email) VALUES ('$user','$psw','$first','$last','$email')");

}
?>