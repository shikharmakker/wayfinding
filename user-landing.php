<!DOCTYPE html>
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/index.css" type="text/css" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
  <title></title>
  <style>
  .button{
   font-size: 2rem;
  }
   .card-wrapper{
     display: flex;
     justify-content: center;
     min-height: calc(100vh - 8rem);
   }
   .card-header-title{
    font-size: 2rem;
   }
   .card-content *{
    height: 10vh;
    margin: 0.2vh 0px;
   }

  </style>
 </head>

 <body>
  <nav class="navbar has-shadow is-light is-transparent" role="navigation" aria-label="main navigation">
   <div class="navbar-brand">
     <a class="navbar-item" href="">
      <span id="home" style="font-size: 1.5rem;"><strong>InNav</strong></span><span style="font-size: 1.4rem; margin-left: 1vw; margin-right: 1vw; font-weight: 300;">Menu</span>
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
   <div class="card" style="width:100%;max-width:400px;margin:auto; font-size: 2.5rem;">
    <div class="card-header">

    </div>
    <div class="card-content">
     <a class="button is-dark  is-outlined is-fullwidth" href="nav-dropdown.php">Navigate</a>
     <a class="button is-dark  is-outlined is-fullwidth">Appointment</a>
     <a class="button is-dark  is-outlined is-fullwidth">Reports</a>
     <a class="button is-dark  is-outlined is-fullwidth">Upload</a>
    </div>
   </div>
  </div>


 </body>
</html>
