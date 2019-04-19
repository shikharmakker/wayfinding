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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="css/index.css" type="text/css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin|PT+Serif" rel="stylesheet">
    <title>Reset Password</title>
    <style>
                      body{
                              max-height: 100vh;
                              font-family: 'Libre Franklin', sans-serif;
                            }
                      .card-wrapper{
                          display: flex;
                      justify-content: center;
                      align-items: center;
                      min-height: calc(100vh - 10rem);
                      }
                      .card-header-title{
                    font-size: 2rem;
                      }
                      .field-label{
                        flex-grow: 1.8;
                      }
                      .field-body{
                        width: 50%;
                      }
    </style>
  </head>
  <body>
    <nav class="navbar has-shadow is-light is-transparent" role="navigation" aria-label="main navigation">
      <div class="navbar-brand" href="user-landing.php">
          <a class="navbar-item" href="">
            <span class="icon is-normal">
              <i class="fas fa-2x  fa-home" href="user-landing.php"></i>
            </span>
            <span id="home" style="font-size: 1.5rem; font-family: 'PT Serif', serif; margin-left: 1vw;"><strong>InNav Administration</strong></span>

          <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
          </a>
      </div>

      <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">
          </div>


          <div class="navbar-end">

            <div class="navbar-item">
              <a class="button is-light" href="aboutus.htm">
                  About Us
              </a>
            </div>
            <div class="navbar-item">
              <a class="button is-light" href="howtouse.htm">
                How to use
              </a>
            </div>

            </div>
          </div>
    </nav>

    <script>
    document.addEventListener('DOMContentLoaded', () => {

      // Get all "navbar-burger" elements
      const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

      // Check if there are any navbar burgers
      if ($navbarBurgers.length > 0) {

          // Add a click event on each of them
          $navbarBurgers.forEach( el => {
              el.addEventListener('click', () => {

                  // Get the target from the "data-target" attribute
                  const target = el.dataset.target;
                  const $target = document.getElementById(target);

                  // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                  el.classList.toggle('is-active');
                  $target.classList.toggle('is-active');

              });
          });
      }

    });

    </script>
    <div  class="card-wrapper">
      <div class="card" style="width:100%;max-width:600px;margin:auto;">
        <div class="card-header">
          <p class="card-header-title">
            Reset Password
          </p>
        </div>
        <div class="card-content">
          <form method="post" action="changepsw.php">
            <p>Enter your new password. Password should be more than 6 characters long.</p><br />
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                  <label class="label">New Password</label>
              </div>
              <div class="field-body">
                <div class="field">
                      <div class="control has-icons-left">
                          <input class="input" type="password" placeholder="New password" name="psw" id="psw">
                          <span class="icon is-small is-left">
                              <i class="fas fa-lock"></i>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Confirm Password</label>
                </div>
                <div class="field-body">
                    <div class="field">
                      <div class="control has-icons-left">
                          <input class="input" type="password" placeholder="Confirm password" name="" id="">
                          <span class="icon is-small is-left">
                              <i class="fas fa-lock"></i>
                          </span>
                        </div>
                    </div>
                </div>
            </div>


           <input type="submit" name="submit" id="submit" value="Reset Password" class="button is-success is-medium is-fullwidth" style="margin-top: 4vh;">
          </form>
        </div>
      </div>
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
              //  alert("Check your mail for the link");
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
