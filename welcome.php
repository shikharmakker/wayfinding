<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="css/header.css" type="text/css" rel="stylesheet">
  <link href="css/index.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
 
</div>
<br><br><br>
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

<?php include('Constants.php') ?>


<?php
if(isset($_SESSION["username"])) {    }
?>

<script>
// When the user clicks on div, open the popup
function myunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>

 <div class="icon-bar" style="height: 30px;">

<a href = "logout.php" style="float: right; color: Black; margin-left: 20px; margin-right: 30px;">Logout</a>


</div>

<h1 align="center">Welcome <?php echo $_SESSION["username"]; ?></h1>
               <?php    
               $ch="select * from maps where username = '$_SESSION[username]' ORDER BY date DESC";
              
               $query = mysqli_query($conn,$ch);
                       	?>

                       	<table style="width:100%;">
                   <tr align="center" >
                       <td>
                           
               <table valign="center" style="border: 1px solid black;width:85%">
                   <tr align="center" style="border: 1px solid black; height: 3em">
                       <th style="border: 1px solid black;width:60%">Maps</th>
                       <th style="border: 1px solid black;width:25%">Date</th>
                       <th style="border: 1px solid black;width:15%">Action</th>
                        </tr>
                        <?php while ($ty = mysqli_fetch_array($query)){ ?>
                        <tr align="center" style="border: 1px solid black; height: 3em">
                        <td style="border: 1px solid black;"><?php echo $ty[1]?></td>
                        <td style="border: 1px solid black;"><?php echo $ty[4]?></td>
                        <td style="border: 1px solid black;"><a href='trial.php?img=<?php echo($ty[1])?>&version=0'>Edit</a></td>
                        </tr>
                        <?php } ?>
               </table>


                       </td>
                   </tr>
               </table>
<br><br>
               <table style="width: 100%">
            	<tr align="center">
            		<td>
            <a href="final.html"><input id="button" type="submit" value="Add New Floor" name="an" class="btn btn-block btn-primary" style="width: 250px;height: 35px" /></a><br>
        </td>
    </tr>
</table>
               
</body>
</html>