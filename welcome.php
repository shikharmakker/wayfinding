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
     border: 0.02px solid #eee;
    }

   </style>
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
    if(isset($_SESSION["username"])) {    }
    ?>

    <script>
    // When the user clicks on div, open the popup
    function myunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
    </script>
    <div class="body-content">
     <nav class="navbar" role="navigation" aria-label="main navigation">
    		<div class="navbar-brand">
    				<span class="navbar-item" style="font-size: x-large;">
    					<strong>InNav Administration</strong>
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
              <a class="button is-primary" href = "logout.php">
                <strong>Logout</strong>
              </a>
    	      </div>
    	    </div>
    	  </div>
    	</nav>
     <section class="hero is-primary">
       <div class="hero-body">
         <div class="container">
           <h1 class="title">
             <strong>Welcome <?php echo $_SESSION["username"]; ?>!</strong>
           </h1>
           <?php
           $ch="select * from maps where username = '$_SESSION[username]' ORDER BY date DESC";

           $query = mysqli_query($conn,$ch);
                    ?>
           <div>
            <!-- <p>Name : <input type="text" id="name"></p> -->
            <p id="temporary"></p>
           </div>
         </div>
       </div>
     </section>
     <div class="content">
      <table class="table is-striped is-hoverable" id="list-of-maps">
       <tr>
        <td>
           <table valign="center" style="border: 1px solid black;width:85%">
                   <tr align="center" style="border: 1px solid black; height: 3em">
                       <th style="border: 1px solid black;width:60%">Building</th>
                       <th style="border: 1px solid black;width:60%">Floor</th>
                       <th style="border: 1px solid black;width:25%">Date</th>
                       <th style="border: 1px solid black;width:15%">Edit</th>
                       <th style="border: 1px solid black;width:15%">Delete</th>
                        </tr>
                        <?php while ($ty = mysqli_fetch_array($query)){ ?>
                        <tr align="center" style="border: 1px solid black; height: 3em">
                        <td style="border: 1px solid black;"><?php echo $ty[1]?></td>
                        <td style="border: 1px solid black;"><?php echo $ty[2]?></td>
                        <td style="border: 1px solid black;"><?php echo $ty[5]?></td>
                        <td style="border: 1px solid black;"><a href='trial.php?img=<?php echo($ty[1].$ty[2])?>&version=0'>Open</a></td>
                        <td style="border: 1px solid black;"><a href='delete.php?id=<?php echo($ty[1].$ty[2]) ?>'>Delete Map</a></td>
                        </tr>
                        <?php } ?>
               </table>
       </td>
     </tr>
     </table>

         <a class="level-item" href="final.php"><input id="button" type="submit" value="Add New Floor" name="an" class="button is-link"  /></a>

     </div>
    </div>
  </body>
  </html>
