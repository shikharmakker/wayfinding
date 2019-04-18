<?php

include('Constants.php');

$user = $_GET['user'];
$pass = $_GET['key'];

$sql1="SELECT * FROM forget_psw WHERE api_key ='$pass' and username='$user'";
$result1 = mysqli_query($conn,$sql1);
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
	
	<div>
	<form method="post" action="changepsw.php">
		<label>New Password</label>
		<input type="password" name="psw" id="psw">
		<input type="submit" name="submit" id="submit">
	</form>

</div>
	</body>
	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script type="text/javascript">
         $(function () {
        $("#submit").click(function () {
            var user = '<?php echo $user ;?>';
            var psw = $("#psw").val();
            if(psw==""){
              alert("fill the password");
            }
            else{

             $.post("changepsw.php", //Required URL of the page on server
                  { // Data Sending With Request To Server
                  username:user,
                  password:psw,
                  },
                  function(response,status){ // Required Callback Function
               	  alert("*----Received Data----*nnResponse : " + response+"nnStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
             	//	alert("Check your mail for the link");
                  //alert(response);
                   var nav = "login.php" ;
                    location.href =nav;
                  

                  });
              alert("Thanks for the response");
            //  alert("Check your registered email for verification ");      
            }
          
        });
    });
</script>

	</html>



