<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/index.css" type="text/css" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
  <title>Welcome!</title>
  <style>
       body{
        max-height: 100vh;
       }
       section{
        height:7rem;
        font-size: 5rem;
       }
       #list-of-maps{
        width: 80rem;
        margin: 5vh auto;
        text-align: center;
        align-items: center;
        border: 0px solid #eee;
       }
      .fullscreen-container {
       display: none;
       position: fixed;
       top: 0;
       bottom: 0;
       left: 0;
       right: 0;
       background: rgba(90, 90, 90, 0.5);
       z-index: 9999;
       align-items: center;
       }
     .fullscreen-container2 {
       display: none;
       position: fixed;
       top: 0;
       bottom: 0;
       left: 0;
       right: 0;
       background: rgba(90, 90, 90, 0.5);
       z-index: 9999;
       align-items: center;
      }

      #popdiv1 {
       min-height: 60%;
       background-color: white;
       position: absolute;
       justify-content: center;
       align-items: center;
       top: 70px;
       padding: 1.5vh 2vw;
       }

      #popdiv2 {
       min-height: 50%;
       min-width: 40%;
       background-color: white;
       position: absolute;
       justify-content: center;
       align-items: center;
       padding: 0.5vh 2vw;
       top: 0.5px;
       padding: 0px 0px;
      }

       iframe{
        height: 400px;
        width: 400px;
        border: 2px black solid;
        margin-bottom: 2vh;
       }
       .thumb-image{
        max-height: 40vh;
        max-width: 200%;
        margin: 10px;
    }

 </style>
  <script src="/scripts/snippet-javascript-console.min.js?v=1"></script>
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

  <?php include('Constants.php') ?>


  <?php
  if(isset($_GET["msg"])){
  $msg = $_GET['msg'];
}
$user = $_SESSION['username'];
$q = mysqli_query($conn,"SELECT * from admin where username = '$user'");
$row = mysqli_fetch_assoc($q);
$first = $row['firstname'];
  if(isset($_SESSION["username"])) {    }
  ?>
<?php

$query = mysqli_query($conn,"SELECT * from complaint where user = '$user'");




?>

  <script>
    var ps =  '<?php echo $msg ;?>';
   // alert(ps);
    if(ps){
      alert('file name already exists');
    }
  // When the user clicks on div, open the popup
  function myunction() {
      var popup = document.getElementById("myPopup");
      popup.classList.toggle("show");
  }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

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
           <div class="buttons">
             <a class="button is-light" href="logout.php">
               Logout<span style="display:inline-block; width:0.2rem;"></span>
               <i class="fas fa-sign-out-alt"></i>
             </a>
           </div>
         </div>
       </div>
     </div>
   </nav>

   <section class="hero is-primary">
     <div class="hero-body">
       <div class="container">
         <h1 class="title">
           <strong>Complaints</strong>
         </h1>
        
         <div>
          <!-- <p>Name : <input type="text" id="name"></p> -->
          <p id="temporary"></p>
         </div>
       </div>
     </div>
   </section>
   <div class="content">
    <table class="table" id="list-of-maps" style="width: 85%;">
     <tr>
      <td><center>
         <table valign="center" style="border: 1px solid black;  width:85%;">
                 <tr align="center" style="border: 1px solid black; height: 3em">
                     <th style="border: 1px solid black;width:15%">Service</th>
                     <th style="border: 1px solid black;width:35%">Complaint</th>
                     <th style="border: 1px solid black;width:15%">Map</th>
                     <th style="border: 1px solid black;width:10%">Status</th>
                      <th style="border: 1px solid black;width:15%">Date</th>
                       <th style="border: 1px solid black;width:10%">Action</th>
                      </tr>
                      <?php while ($ty = mysqli_fetch_array($query)){ ?>
                      <tr align="center" style="border: 1px solid black; height: 3em">
                      <td style="border: 1px solid black;"><?php echo $ty[1]?></td>
                      <td style="border: 1px solid black;"><?php echo $ty[3]?></td>
                      <td style="border: 1px solid black;"><?php echo $ty[4]?></td>
                      <td style="border: 1px solid black;"><?php echo $ty[6]?></td>
                      <td style="border: 1px solid black;"><?php echo $ty[7]?></td>
                      <td style="border: 1px solid black;"><a href='delcomp.php?value=<?php echo($ty[2])?>&complaint=<?php echo($ty[3])?>&map=<?php echo($ty[4])?>'>Resolve</a></td>
                      </tr>
                      <?php } ?>
             </table>
            </center>
     </td>
   </tr>
   </table>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


   </div>
  </div>
</body>
    <script type="text/javascript">
                         $(function() {
                   $("#button").click(function() {
                     $(".fullscreen-container2").fadeTo(200, 1);
                   });
                   $("#but-cancel").click(function() {
                     $(".fullscreen-container2").fadeOut(200);
                   });
                 });
                     </script>
</html>