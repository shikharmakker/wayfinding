<?php
include('Constants.php');
$i = 0;
$res = array();
$buildings = array();
$query = mysqli_query($conn,"SELECT * FROM maps");


while($row = mysqli_fetch_assoc($query)){
$hell = 0;
  foreach ($buildings as $key => $value) {
      if($value['building']==$row['building_name']){
        $len = count($buildings[$key]['floor']);
        $buildings[$key]['floor'][$len] = $row['floor']; 
        $hell = 1;
        break;
      }
  }
  if($hell==1){
    continue;
  }
  $buildings[$i]['building'] = $row['building_name'];
  $buildings[$i]['floor'][] = $row['floor'];  
  $i++;
}
$r = json_encode($buildings);
//$ct = count($buildings);

?>


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
   body{
    font-family: 'Montserrat', sans-serif;
   }
  .card-wrapper{
    display: flex;
    justify-content: center;
    min-height: calc(100vh - 3rem);
  }
  .card-header-title{
   font-size: 2rem;
  }
  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  #dropdown a:hover {background-color: #ddd;}

  .show {display: block;}

  </style>
  </head>

 <body>
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
           <a class="button is-primary">
             <strong>Back to menu</strong>
           </a>
       </div>

       </div>
     </div>
  </nav>

<script type="text/javascript">
  var ob;
  var floors = []
  //alert(count);
  var tr = '<?php echo $r ;?>';
  //alert(tr);
  var obj = JSON.parse(tr); 
  //var obj = JSON.parse(tr);
 // alert(obj);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


  <div  class="card-wrapper">
			<div class="card" style="width:100%;max-width:500px;margin:auto;">
				<div class="card-header">
     <div class="level-item">
      <p class="card-header-title">
 						Navigate
 					</p>
     </div>
				</div>
    <div class="card-content" style="padding: 1vh 2vw;">
     <div class="level-item">
      <form method="GET" enctype="multipart/form-data" style="width: 100%;" action="user.php">
      <div class="field is-horizontal">
        <div class="field-label">
          <label class="label">Building</label>
        </div>

        <div class="select is-fullwidth is-multiple">
         <select id="building" name="building">
          <option value="">-- select one -- </option>
          <script language="javascript" type="text/javascript">
          for(var b=0;b<=obj.length;b++){
               var c = obj[b].building;
              document.write("<option id = 'x' value=\""+c+"\">"+obj[b].building+"</option>");
             
          }
        </script>
</select>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label">
          <label class="label">Floor</label>
        </div>
        <div class="select is-fullwidth is-multiple" style="width: 79.5%;">
         <select id="floor" name="floor">
<option value="">-- select one -- </option>
</select>
        </div>
      </div>

       <div class="level-item">
        <div class="field" style="width: 100%;">
          <div class="control" style="margin-top:0.5rem;">
           <div class="level">
            <div class="level-item">
              <button>Submit</button>
            </div>
           </div>

          </div>
        </div>
       </div>
      </form>
     </div>
    </div>
			</div>
		</div>
 </body>
</html>
<script type="text/javascript">
  var floor = [];
  $(document).ready(function () {
    $("#building").change(function () {
      $("#floor").empty();
        var val = $(this).val();
        for(var i = 0 ;i < obj.length ; i++){
        if(val == obj[i].building){
        for(var j = 0 ; j < obj[i].floor.length;j++){
            floors[j] = obj[i].floor[j];
            var a = floors[j];
             $("#floor").append("<option selected>"+a+"</option>");
         }
        }   
      }        
    });
   
   


});


</script>
