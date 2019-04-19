<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="css/index.css" type="text/css" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
  <link href="https://fonts.googleapis.com/css?family=Libre+Franklin|PT+Serif" rel="stylesheet">
  <title>Recover Password</title>
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
            <a class="button is-light" href="howtouseadmin.htm">
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
    <div class="card" style="width:100%;max-width:500px;margin:auto">
      <div class="card-header">
        <p class="card-header-title">
          Forgot Password?
        </p>
      </div>
      <div class="card-content">
        <form method="post">
          <p>Enter your username. We will send you a link for password reset at you registered e-mail address.</p><br />
          <div class="field">
            <div class="control">
                <input type="text" name="username" id="username" placeholder="Username" class="input is-fullwidth">
            </div>
          </div>
          <input type="submit" name="submit" id="submit" value="Send reset link" class="button is-success is-medium is-fullwidth" style="margin-top: 4vh;">
        </form>
      </div>
    </div>
  </div>


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
              //  alert("Check your mail for the link");
                  //alert(response);


                  });
              alert("Thanks for the response");
            //  alert("Check your registered email for verification ");
            }

        });
    });

 </script>
</html>
