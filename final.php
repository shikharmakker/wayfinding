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
  <!DOCTYPE html>
  <html>
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/index.css" type="text/css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
    <style type="text/css">
    body{
     max-height: 100vh;
    }
    section{
     height:7rem;
     font-size: 5rem;
    }
    .content{
     margin: 0.25rem;
    }

    .thumb-image{
     max-height: 40vh;
     max-width: 200%;
     float:left;
     position:relative;
     margin: 10px;
     align-self: center;
    }

    </style>
    <title>Upload Image</title>
   </head>
   <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
        <span class="icon" >
          <i class="fas fa-home"></i>
        </span>
          <span style="display:inline-block; width:0.2rem;"></span>Home
       </a>
      </div>
      <div class="navbar-end">
       <a class="navbar-item">
        Facing Trouble using INav?
       </a>
       <div class="navbar-item">
        <a class="navbar-item" href="logout.php">
         Logout<span style="display:inline-block; width:0.2rem;"></span>
         <i class="fas fa-sign-out-alt"></i>
        </a>
       </div>
      </div>
     </div>
    </nav>
    <section class="hero is-primary">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">
            <strong>Upload New Map</strong>
          </h1>
          <div>
           <!-- <p>Name : <input type="text" id="name"></p> -->
           <p id="temporary"></p>
          </div>
        </div>
      </div>
    </section>
    <div id="content">
      <div style="width:100%;max-width:500px;margin:auto; align-items: center;" >
       <div class="card-content">
        <form method="POST" action="Img_upload.php" enctype="multipart/form-data">
         <div class="level-item">
          <div class="file has-name is-boxed is-primary">
           <label class="file-label">
             <input id="fileUpload" class="file-input" type="file" name="myimage" multiple="multiple" />
               <span class="file-cta">
                 <span class="file-icon">
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
        </div>
       
        <div class="level-item">
         <div class="field">
           <div class="control">
             <strong>Building Name:</strong><input class="input is-primary" type="text" placeholder="Enter Building name" name="building_name" id="Name_input">
           </div>
         </div>
        </div>
        <div class="level-item">
         <div class="field">
           <div class="control">
             <strong>Floor:</strong><input class="input is-primary" type="text" placeholder="Enter Floor" name="floor" id="Floor_input">
           </div>
         </div>
        </div>
        <div class="level-item">
         <div id="image-holder"></div>
        </div>

         <div class="field">
           <p class="control" style="margin-top:1.5rem;">
            <strong><input style="width:100%;" id="button" type="submit" value="Upload" name="submit_image" class="button is-success"/></strong>
           </p>
         </div>
        </form>
       </div>
      </div>




    </div>
   <script>
    var lat;
    var long;
    function geoFindMe() {

  const status = document.querySelector('#status');
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

document.querySelector('#find-me').addEventListener('load', geoFindMe());


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
          });
    </script>
   </body>
  </html>
