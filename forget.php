<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="post">
	<label>Your username: </label>
	<input type="text" name="username" id="username" placeholder="username">
	<input type="submit" name="submit" id="submit" value="submit">
</form>


</body>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script type="text/javascript">
         $(function () {
        $("#submit").click(function () {
            var user = $("#username").val();
            if(user==""){
              alert("fill the username");
            }
            
            else{
              $.post("forget_psw.php", //Required URL of the page on server
                  { // Data Sending With Request To Server
                  username:user,
                  },
                  function(response,status){ // Required Callback Function
               	  alert(response);//"response" receives - whatever written in echo of above PHP script.
             	//	alert("Check your mail for the link");
                  //alert(response);
                  

                  });
              alert("Thanks for the response");
            //  alert("Check your registered email for verification ");      
            }
          
        });
    });

 </script>
</html>