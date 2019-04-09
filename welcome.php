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
       min-height: 70%;
       background-color: white;
       position: absolute;
       justify-content: center;
       align-items: center;
       top: 70px;
       padding: 1.5vh 2vw;
       }

      #popdiv2 {
       min-height: 70%;
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
  if(isset($_SESSION["username"])) {    }
  ?>

  <script>

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
    <table class="table" id="list-of-maps" style="width: 85%;">
     <tr>
      <td><center>
         <table valign="center" style="border: 1px solid black;  width:85%;">
                 <tr align="center" style="border: 1px solid black; height: 3em">
                     <th style="border: 1px solid black;width:17%">Building</th>
                     <th style="border: 1px solid black;width:10%">Floor</th>
                     <th style="border: 1px solid black;width:15%">Date</th>
                     <th style="border: 1px solid black;width:20%">Edit</th>
                     <th style="border: 1px solid black;width:8%">Delete</th>
                      </tr>
                      <?php while ($ty = mysqli_fetch_array($query)){ ?>
                      <tr align="center" style="border: 1px solid black; height: 3em">
                      <td style="border: 1px solid black;"><?php echo $ty[1]?></td>
                      <td style="border: 1px solid black;"><?php echo $ty[2]?></td>
                      <td style="border: 1px solid black;"><?php echo $ty[5]?></td>
                      <td style="border: 1px solid black;">
                       <div class="level-item">
                        <div class="fullscreen-container" id="<?php echo($ty[1].$ty[2].'0')?>">
                         <div class="level-item">
                          <div id="popdiv1">
                           <div class="level-item">
                            <iframe src="map.php?img=<?php echo($ty[1].$ty[2])?>&version=0" scrolling="no"></iframe>
                           </div>
                           <div class="level">
                            <div class="level-item">
                             <a href="trial.php?img=<?php echo($ty[1].$ty[2])?>&version=0" class="button is-link" style="width: 60%;">Edit</a>
                            </div>
                            <div class="level-item">
                             <a href="upversion.php?img<?php echo($ty[1].$ty[2])?>&version=0" class="button is-success" style="width: 60%;">Update</a><br>
                            </div>
                            <div class="level-item">
                             <button onclick='$("#<?php echo($ty[1].$ty[2].'0')?>").fadeOut(200)' class="button is-dark">Cancel</button>
                            </div>
                           </div>
                          </div>
                         </div>
                         </div>
                       </div>
                       <div class="level-item">
                        <div class="fullscreen-container" id="<?php echo($ty[1].$ty[2].'1')?>">
                         <div class="level-item">
                          <div id="popdiv1">
                           <div class="level-item">
                            <iframe src="map.php?img=<?php echo($ty[1].$ty[2])?>&version=1" scrolling="no"></iframe>
                           </div>
                           <div class="level">
                            <div class="level-item">
                             <a href="trial.php?img=<?php echo($ty[1].$ty[2])?>&version=1" class="button is-link" style="width: 60%;">Edit</a>
                            </div>
                            <div class="level-item">
                             <a href="upversion.php?img=<?php echo($ty[1].$ty[2])?>&version=1" class="button is-success" style="width: 60%;">Update</a><br>
                            </div>
                            <div class="level-item">
                            <button onclick='$("#<?php echo($ty[1].$ty[2].'1')?>").fadeOut(200)' class="button is-dark">Cancel</button>
                           </div>
                           </div>
                          </div>
                         </div>
                         </div>
                       </div>
                       <div class="level-item">
                        <div class="fullscreen-container" id="<?php echo($ty[1].$ty[2].'2')?>">
                         <div class="level-item">
                          <div id="popdiv1">
                           <div class="level-item">
                            <iframe src="map.php?img=<?php echo($ty[1].$ty[2])?>&version=2" scrolling="no"></iframe>
                           </div>
                           <div class="level">
                            <div class="level-item">
                             <a href="trial.php?img=<?php echo($ty[1].$ty[2])?>&version=2" class="button is-link" style="width: 60%;">Edit</a>
                            </div>
                            <div class="level-item">
                             <a href="" class="button is-success" style="width: 60%;">Update</a><br>
                            </div>
                            <div class="level-item">
                             <button onclick='$("#<?php echo($ty[1].$ty[2].'2')?>").fadeOut(200)' class="button is-dark">Cancel</button>
                            </div>
                           </div>
                          </div>
                         </div>
                         </div>
                       </div>
                       <button  onClick='$("#<?php echo($ty[1].$ty[2].'0')?>").fadeTo(200, 1)' class="but1 button is-rounded is-small">Version 1</button>
                        <button  onClick='$("#<?php echo($ty[1].$ty[2].'1')?>").fadeTo(200, 1)' class="but1 button is-rounded is-small">Version 2</button>
                        <button  onClick='$("#<?php echo($ty[1].$ty[2].'2')?>").fadeTo(200, 1)' class="but1 button is-rounded is-small">Version 3</button>
                      </td>
                      <td style="border: 1px solid black;"><a href='delete.php?id=<?php echo($ty[1].$ty[2]) ?>'>Delete Map</a></td>
                      </tr>
                      <?php } ?>
             </table>
            </center>
     </td>
   </tr>
   </table>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <div class="level-item">
       <a><input id="button" type="submit" value="Add New Floor" name="an" class="button is-link" /></a>
                 <div class="fullscreen-container2">
                  <div class="level-item">
                   <div id="popdiv2">
                    <div class="card-content" style="padding: 1vh 2vw;">
                     <div class="level-item">
                      <span style="font-size: 1.5rem; margin-bottom: 3vh;">Upload Image</span>

                     </div>
                     <div class="level-item">
                      <form method="POST" action="Img_upload.php" enctype="multipart/form-data" style="width: 100%;">
                       <div class="level-item">
                        <div class="file has-name is-boxed is-primary is-small">
                         <label class="file-label">
                           <input id="fileUpload" class="file-input" type="file" name="myimage" multiple="multiple" required/>
                             <span class="file-cta">
                               <span class="file-icon is-large">
                                 <i class="fas fa-upload"></i>
                               </span>
                               <span class="file-label">
                               </span>
                             </span>
                             <span class="file-name">
                              Choose Image File
                             </span>
                         </label>
                       </div>
                      </div><br />

                      <div class="field is-horizontal">
                        <div class="field-label is-small">
                          <label class="label">Building Name</label>
                        </div>
                        <div class="field-body">
                          <div class="field">
                            <p class="control">
                             <input class="input is-primary is-small" type="text" placeholder="Enter Building name" name="building_name" id="Name_input" style="margin-top: 1.1vh;" required>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="field is-horizontal">
                        <div class="field-label is-small">
                          <label class="label">Floor</label>
                        </div>
                        <div class="field-body">
                          <div class="field">
                            <p class="control">
                             <input class="input is-primary is-small" type="text" placeholder="Enter Floor" name="floor" id="Floor_input" required>
                            </p>
                          </div>
                        </div>
                      </div>


                      <br />

                      <div class="level-item">
                       <div id="image-holder"></div>
                      </div>
                       <div class="level-item">
                        <div class="field" style="width: 100%;">
                          <p class="control" style="margin-top:1.5rem;">
                           <strong><input id="button" type="submit" value="Upload" name="submit_image" class="button is-success is-fullwidth"/></strong>
                          </p>
                        </div>
                       </div>
                       <div class="level-item">
                        <div class="field">
                          <p class="control" style="margin-top:1.5rem;">
                           <button id="but-cancel" class="button is-dark is-small">Cancel</button>
                          </p>
                        </div>
                       </div>

                      </form>
                     </div>
                    </div>
                    <script>
                     $(document).ready(function() {
                             $("#fileUpload").on('change', function() {
                               //Get count of selected files
                               var countFiles = $(this)[0].files.length;
                               var imgPath = $(this)[0].value;
                               var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                               var image_holder = $("#image-holder");
                               image_holder.empty();
                               if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                                 if (typeof(FileReader) != "undefined") {
                                   //loop for each file selected for uploaded.
                                   for (var i = 0; i < countFiles; i++)
                                   {
                                     var reader = new FileReader();
                                     reader.onload = function(e) {
                                       $("<img />", {
                                         "src": e.target.result,
                                         "class": "thumb-image"
                                       }).appendTo(image_holder);
                                     }
                                     image_holder.show();
                                     reader.readAsDataURL($(this)[0].files[i]);
                                   }
                                 } else {
                                   alert("This browser does not support FileReader.");
                                 }
                               } else {
                                 alert("Pls select only images");
                               }
                             });
                             $("submit").on('click',function(){

                             })

                           });
                    function geoFindMe() {

  const status = document.querySelector('.status');
  const mapLink = document.querySelector('#map-link');

  mapLink.href = '';
  mapLink.textContent = '';

  function success(position) {
    const latitude  = position.coords.latitude;
    const longitude = position.coords.longitude;

    status.textContent = '';
    mapLink.href = `https://www.openstreetmap.org/#map=18/${latitude}/${longitude}`;
    mapLink.textContent = `Latitude: ${latitude} °, Longitude: ${longitude} °`;
  }

  function error() {
    status.textContent = 'Unable to retrieve your location';
  }

  if (!navigator.geolocation) {
    status.textContent = 'Geolocation is not supported by your browser';
  } else {
    status.textContent = 'Locating…';
    navigator.geolocation.getCurrentPosition(success, error);
  }

}

document.querySelector('#find-me').addEventListener('click', geoFindMe);


                    </script>

                   </div>
                  </div>

                 </div>
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

      </div>
   </div>
  </div>
</body>

</html>
