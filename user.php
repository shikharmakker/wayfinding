<!DOCTYPE html>
<?php include('Constants.php'); 
$floor = $_GET['floor'];
$building = $_GET['building'];
$x = $building.$floor;
?>

<html>
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/index.css" type="text/css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
      <style>
         body{
          max-height: 100vh;
          font-family: 'Raleway', sans-serif;
         }
         section{
          height:7rem;
          font-size: 5rem;
         }
         .content{
          margin: 0.25rem;
         }
         .grid-container {
             display: inline-grid;
             grid-template-columns: auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto;
             <!--background-color: #2345F4;-->
             padding: 0px;
             background-repeat: no-repeat;
             background-size: 600px 600px;
            }
         .grid-item {
          <!--background-color: rgba(255, 255, 255, 0.8);-->
          border: 0px solid rgba(0, 0, 0, 0.8);
          padding:5px;
          font-size: 30px;
          text-align: center;
          opacity: 1;
         }

         #example2 {
          padding: 0px;
          background-repeat: no-repeat;
          background-size: 600px 600px;
          margin-top: 0px;
          float: left;
          max-width: 100vw;
          max-height: 100vh;
         }
         #button-logout{
         background-color: white;
         color: black;
         cursor: pointer;
         color: #4a4a4a;
         display: block;
         line-height: 1.5;
         padding: .5rem .75rem;
         position: relative;
        }
        .select{
         width: 60%;
        }

         .aid{
          display: inline-block;
          float: right;
          width: 20rem;
         }

         .hide{
          visibility: hidden;
          text-decoration: underline;
          font-size: 10px;
         }

         .popup {
           position: relative;
           display: inline-block;
           cursor: pointer;
           -webkit-user-select: none;
           -moz-user-select: none;
           -ms-user-select: none;
           user-select: none;
           color: #444444;
         }

         /* The actual popup */
         .popup .popuptext {
           visibility: hidden;
           padding: 0.5rem 0.7rem;
           background-color: #555;
           color: #fff;
           text-align: left;
           width: 28rem;
           position: absolute;
           z-index: 1;
           top: 2.3rem;
           right: -80%;

         }

         /* Popup arrow */
         .popup .popuptext::after {
           content: "";
           position: absolute;
           bottom: 100%;
           right: 1000%;
           border-style: solid;
           border-color: #555 transparent transparent transparent;
         }

         /* Toggle this class - hide and show the popup */
         .popup .show {
           visibility: visible;
           -webkit-animation: fadeIn 1s;
           animation: fadeIn 1s;
         }

         /* Add animation (fade in the popup) */
         @-webkit-keyframes fadeIn {
           from {opacity: 0;}
           to {opacity: 1;}
         }

         @keyframes fadeIn {
           from {opacity: 0;}
           to {opacity:1 ;}
         }

         .popup:hover .popuptext{
          visibility: visible;
         }

         .invisibleDiv
         {
          width: 100%;
          z-index: -1;
          height: 100%;
         }

      </style>
      <script>
      function myfunction(){
      var z =  '<?php echo $x ;?>';
      b= z+".jpg";
      //alert(b);
      // window.alert(b);
      var a="images/" + b;
      var elem = document.getElementById("example2");
      elem.style.background="url('" + a + "')";
      elem.style.backgroundRepeat="no-repeat";
       elem.style.backgroundSize="600px 600px";
      
     }
      </script>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script>
      <?php
      $sql = "SELECT JSON_string FROM maps_data WHERE name = '$x' and version = '0' limit 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);


      ?>

      <?php


      $sqln = "SELECT JSON_string FROM maps_data where name = '$x' and version = '0'";
      $resultn = mysqli_query($conn, $sqln);
      $rown = mysqli_fetch_assoc($resultn);

      ?>
        var cords = [];
        var connected_nodes = [];
        for (var temp = 0; temp < 3600 ; temp++) {
            connected_nodes[temp] = [];
        }
         var tr = '<?php echo $row['JSON_string'] ;?>';

         //alert(tr);
        var src_tag,dest_tag;
        var src_bool = false,dest_bool = false;
        var src = -1,dest = -1;
         var sel = 0;
         var prev = -1;
        function clk(i){
        document.getElementById("description").innerHTML="";
            if(find(i,chords)!=-1){
              if(sel == 1){
                red(prev);
                sel = 0;
              }
                document.getElementById("description").innerHTML="";
                for (var c = 0; c < obj.cords.length; c++) {
           // green(obj.cords.value);
                if(i==obj.cords[c].value){
                  document.getElementById("name").innerHTML=obj.cords[c].name;

                document.getElementById("description").innerHTML=obj.cords[c].description;
                document.getElementById("tags").innerHTML=obj.cords[c].Tags;}
                yellow(i);
              }
              sel = 1;
              prev = i;
                      }
                      else{
                        red(prev);
                      }
        }
        var chords = [];
        var connected = [];
        for (var temp = 0; temp < 3600 ; temp++) {
            connected[temp] = [];
        }
        var obj = JSON.parse(tr);
         for(var b=0;b<obj.cords.length;b++){
          chords[b] = obj.cords[b].value;
          for(var i =0; i<obj.cords[b].connected_nodes.length;i++){
          connected[b][i] = obj.cords[b].connected_nodes[i];
        }
      }
       function find(key,array){
           for (var i = 0; i < array.length; i++) {
             if (array[i] == key) {
               return i;
             }
           }
           return -1;
         }
        function unselect(i){
                     document.getElementById(i).style.opacity = "1";
           document.getElementById(i).style.backgroundColor = "";
         }

         function yellow(i){
           document.getElementById(i).style.opacity = "1";
           document.getElementById(i).style.backgroundColor = "#ffcb00";
         }

      function red(i){
           document.getElementById(i).style.backgroundColor = "red";
           document.getElementById(i).style.opacity = "1";
         }
         function green(i){
           document.getElementById(i).style.backgroundColor = "lawngreen";
           document.getElementById(i).style.opacity = "1";
         }
          function path(x,y){
             var a,b,c,d,e,f,g;
             a = Math.floor(x/100); b = x%100;
             c = Math.floor(y/100); d = y%100;
             e = Math.floor((a+c)/2);
             f = Math.floor((b+d)/2);
             if (e==a & f==b) {
               g = 100*c +b ;
               green(g);
             }
             else if (e==c & f==d) {
               g = 100*a +d ;
               green(g);
             } else {
               g = 100*e + f;
               green(g);
               path(g,x);
               path(g,y);
             }
         }
         function finalpath(x,y){
           path(x,y);
           red(x);
           red(y);
         }
        function display(){

            for (var o = 0; o < chords.length; o++) {
            if(chords!= 0)
             red(chords[o]);
           }
         }
        function reset(){
          var kk = 0;
          for (var ii = 0; ii < 60; ii++) {
            for (var jj = 0; jj < 60; jj++) {
              kk = 100*ii + jj;
              document.getElementById(kk).style.backgroundColor = "";
            }
          }
        }
        var shortest_path_var = [];
        function shortest_path(){
           var pred = [];
           var dist = [];
           if(BFS(pred,dist)==false){
            alert("selected nodes are not connected");
            return;
           }
           var path = [];
           var crawl = dest;
           path.push(crawl);
           var ai = 1;
           console.log("dest:"+dest);
           console.log("src:"+src);
           while(pred[find(crawl,cords)] != -1){
            console.log("path:"+path);
            console.log("crawl:"+crawl+" "+find(crawl,cords));
            path.push(pred[find(crawl,cords)]);
            crawl = pred[find(crawl,cords)];
            ai++;
            if(ai == 1000)
              return;
           }

           shortest_path_var = path;
           for(var b=0;b<(path.length)-1;b++){
            console.log(path[b]);   //only for debugging
            make_path(path[b],path[b+1]);
            blue(path[b]);
           }
           blue(path[b]);
             document.getElementById("display_name").innerHTML="";
           for (var b = path.length-1; b >=0 ; b--) {
             for (var c = 0; c < obj.cords.length; c++) {
               if(path[b]==obj.cords[c].value){
                 if(b!=0)
                      document.getElementById("display_name").innerHTML+=obj.cords[c].name+",";
                 else
                      document.getElementById("display_name").innerHTML+=obj.cords[c].name;
               }
             }
           }
           return;
        }
        function BFS(pred, dist){
          var queue = [];
          var visited = [];
          for(var b=0;b<cords.length;b++){
            visited[b] = false;
            dist[b] = 100000;
            pred[b] = -1;
          }
          visited[find(src,cords)] = true;
          dist[find(src,cords)] = 0;
          queue.push(src);
          var o = 0;
          while(queue.length != 0){
            var u = queue.shift();    //equivalent to pop
            var inde = find(u,cords);
            o++;
            for(var b=0;b<connected_nodes[inde].length; b++){
              if(length(u,connected_nodes[inde][b])+dist[find(u,cords)]<dist[find(connected_nodes[inde][b],cords)] ){
                console.log("u:"+u+" "+length(u,connected_nodes[inde][b]));
                visited[find(connected_nodes[inde][b],cords)] = true;
                dist[find(connected_nodes[inde][b],cords)] = dist[find(u,cords)] +length(u,connected_nodes[inde][b]);
                pred[find(connected_nodes[inde][b],cords)] = u;
                queue.push(connected_nodes[inde][b]);
                o++;
                if(o>100)
                  return false;
              }
            }
            if(o>100)
              return false;
          }
          if(dist[find(dest,cords)]==100000)
              return false;
          return true;
        }
        function length(A,B){
          var x1 = Math.floor(A/100);
          var x2 = Math.floor(B/100);
          var y1 = A%100;
          var y2 = B%100;
          var z = Math.pow((x2-x1),2)+Math.pow((y2-y1),2);
          console.log("A,B:"+A+" "+B+"z: "+z);
          return Math.sqrt(z);
        }
        function find(key,array){   //returns the index at which key is store in array
          for (var i = 0; i < array.length; i++) {
            if (array[i] == key) {
              return i;
            }
          }
          return -1;
        }
        function greenify(i){
          document.getElementById(i).style.backgroundColor = "lawngreen";
        }

        function make_path(x,y){
            var a,b,c,d,e,f,g;
            a = Math.floor(x/100); b = x%100;
            c = Math.floor(y/100); d = y%100;
            e = Math.floor((a+c)/2);
            f = Math.floor((b+d)/2);
            if (e==a & f==b) {
              g = 100*c +b ;
              greenify(g);
            }
            else if (e==c & f==d) {
              g = 100*a +d ;
              greenify(g);
            } else {
              g = 100*e + f;
              greenify(g);
              make_path(g,x);
              make_path(g,y);
            }
        }
        function blue(i) {
          document.getElementById(i).style.backgroundColor = "blue";
        }
        function red(i) {
          document.getElementById(i).style.backgroundColor = "red";
        }
        //SAMPLE=>{"cords":[{"value":5626,"connected_nodes":[4726],"Tags":["entry"]},{"value":3226,"connected_nodes":[4726,3229,2226],"Tags":[]},{"value":3229,"connected_nodes":[3226],"Tags":["stairs","help desk"]},{"value":2226,"connected_nodes":[3226,2240],"Tags":[]},{"value":2240,"connected_nodes":[2226],"Tags":[]},{"value":4726,"connected_nodes":[3226,5626,4750],"Tags":[]},{"value":4750,"connected_nodes":[4726],"Tags":["gents washroom","ladies washroom"]}]}
        function Submit(){
         reset();
         sr = document.getElementById("source").value;
         des = document.getElementById("destination").value;
          var obj = JSON.parse(tr);
          for(var b = 0; b < obj.cords.length ; b++){
            for(var c = 0 ; c< obj.cords[b].Tags.length;c++){
             // alert( obj.cords[b].Tags[c]);
              if(sr == obj.cords[b].Tags[c]){
                src = obj.cords[b].value;
               // alert("hello");
              }
              if(des == obj.cords[b].Tags[c]){
                dest = obj.cords[b].value;
              }
            }
          }

         // var tr = '{"cords":[{"value":5626,"connected_nodes":[4726],"Tags":["entry"]},{"value":3226,"connected_nodes":[4726,3229,2226],"Tags":[]},{"value":3229,"connected_nodes":[3226],"Tags":["stairs","help desk"]},{"value":2226,"connected_nodes":[3226,2240],"Tags":[]},{"value":2240,"connected_nodes":[2226],"Tags":[]},{"value":4726,"connected_nodes":[3226,5626,4750],"Tags":[]},{"value":4750,"connected_nodes":[4726],"Tags":["gents washroom","ladies washroom"]}]}'
         var obj = JSON.parse(tr);
         for(var b=0;b<obj.cords.length;b++){
          cords[b] = obj.cords[b].value;
          for(var c=0;c<obj.cords[b].connected_nodes.length;c++){
            connected_nodes[b][c] = obj.cords[b].connected_nodes[c];
          }
            
         }
         document.getElementById("example2").style.opacity = 0.8;
         console.log(src+" "+dest);
         shortest_path();
                   red(src);



         blue(dest);
        }
        var temp_bool = false
        var initial;
        function Next() {
          if(temp_bool==false){
            initial = 0
           }
          for (var c = 0; c < obj.cords.length; c++) {
            if(shortest_path_var[initial]==obj.cords[c].value){
                 if(initial!=shortest_path_var.length)
                      document.getElementById("display_next").innerHTML="From "+obj.cords[c].name+" go to "+obj.cords[c+1].name;
            }
          }
          initial++;
        }
        function Previous() {
          if(temp_bool==false){
            return;
           }
          for (var c = 0; c < obj.cords.length; c++) {
            if(shortest_path_var[initial]==obj.cords[c].value){
                 if(initial!=shortest_path_var.length)
                      document.getElementById("display_prev").innerHTML="From "+obj.cords[c].name+" go to "+obj.cords[c-1].name;
            }
          }
          initial--;
        }

      </script>

   </head>
   <body>
      <body onload="myfunction()">
       <nav class="navbar has-shadow is-light is-transparent" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          <a class="navbar-item" href="">
           <span id="home" style="font-size: 1.5rem;"><strong>InNav</strong></span><span style="font-size: 1.4rem; margin-left: 1vw; margin-right: 1vw; font-weight: 300;">Indoor Navigation Portal</span>
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

       <div class="content">
        <div class="columns">
         <div class="column is-flex">
          <div class="level-item">
           <div class="way">
            <div>
             <p>Way:</p>
             <p id="display_name"></p>
            </div>
            <div class="">
             <a class="button is-link is-rounded" id="next" type = "button" onclick="Next()">Next</a>
             <a class="button is-link is-rounded" id="previous" type = "button" onclick="Previous()">Previous</a>
             <p id="display_next"></p>
             <p id="display_prev"></p>
            </div>
            <div class="">
             <p>Name:</p>
             <p id="name"></p>
            </div>
            <div class="">
             <p>Description:</p>
             <p id="description"></p>
            </div>
             <div class="">
             <p>Services:</p>
             <p id="tags"></p>
            </div>
           </div>
          </div>
         </div>
         <div class="column is-three-sixths is-flex">
          <div id="example2">
             <div class="grid-container">
                <script type="text/javascript">
                   for(var i=0;i<60;i++){
                      for (var j=0;j<60 ;j++ ) {
                         var k =100*i + j;
                         document.write("<div class=\"grid-item\" id = \""+k+"\" onclick =\"clk("+
                            k+")\"></div>");
                   }}
                </script>
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">        </script>
                <script src="typeahead.min.js"></script>
              </div>
           </div>

         </div>
         <div class="column is-flex">
          <div class="level-item">
           <div class="color-key"  style="display: flex; min-width: 15vw;">
            <table class="table is-bordered" style="color: #555; font-size: 0.8rem;">
             <tr>
              <th style="text-align: center; color: #666; font-weight: 450;">Colour</th>
              <th style="color: #666; font-weight: 450;">Significance</th>
             </tr>
             <tr>
              <td style="color: #0023F5; text-align: center;">Blue</td>
              <td>Path Nodes</td>
             </tr>
             <tr>
              <td style="color: #EB3223; text-align: center;">Red</td>
              <td>Source Node</td>
             </tr>
             <tr>
              <td style="color: #9EF74D; text-align: center;">Green</td>
              <td>Optimum path</td>
             </tr>
             <tr>
              <td style="color: #ffcb00; text-align: center;">Yellow</td>
              <td>Selected Node</td>
             </tr>
            </table><br /><br />
           </div>
          </div>
         </div>
        </div>


        <div class="level-item" style="background-color: #a9e2dd33;">
         <div class="user-input-wrapper" style="min-width: 58%">
          <div class="user-input" style="display: block;">
           <div class="columns">
            <div class="column">
             <div class="source">
              Source:
              <div class="select is-primary is-small">
              <select name="source" id = "source" class="select is-fullwidth">
               <script language="javascript" type="text/javascript">
                  //var tr = '{"cords":[{"value":5626,"connected_nodes":[4726],"Tags":["entry"]},{"value":3226,"connected_nodes":[4726,3229,2226],"Tags":[]},{"value":3229,"connected_nodes":[3226],"Tags":["stairs","help desk"]},{"value":2226,"connected_nodes":[3226,2240],"Tags":[]},{"value":2240,"connected_nodes":[2226],"Tags":[]},{"value":4726,"connected_nodes":[3226,5626,4750],"Tags":[]},{"value":4750,"connected_nodes":[4726],"Tags":["gents washroom","ladies washroom"]}]}'
                 var obj = JSON.parse(tr);
                 for(var b=0;b<obj.cords.length;b++){

                    for(var c =0; c< obj.cords[b].Tags.length ; c++){
                      document.write("<option>"+obj.cords[b].Tags[c]+"</option>");
                    }

                 } 

                </script>
               </select>
              </div>
             </div>
            </div>
            <div class="column">
             <div class="destination">
              Destination:
              <div class="select is-primary is-small">
              <select name="destination" id = "destination" class="select is-fullwidth">
               <script language="javascript" type="text/javascript">
                  //var tr = '{"cords":[{"value":5626,"connected_nodes":[4726],"Tags":["entry"]},{"value":3226,"connected_nodes":[4726,3229,2226],"Tags":[]},{"value":3229,"connected_nodes":[3226],"Tags":["stairs","help desk"]},{"value":2226,"connected_nodes":[3226,2240],"Tags":[]},{"value":2240,"connected_nodes":[2226],"Tags":[]},{"value":4726,"connected_nodes":[3226,5626,4750],"Tags":[]},{"value":4750,"connected_nodes":[4726],"Tags":["gents washroom","ladies washroom"]}]}'
                 var obj = JSON.parse(tr);
                for(var b=0;b<obj.cords.length;b++){

                    for(var c =0; c< obj.cords[b].Tags.length ; c++){
                      document.write("<option>"+obj.cords[b].Tags[c]+"</option>");
                    }

                 } 
               </script>
               </select>
              </div>
             </div>
            </div>
           </div>

         </div>
        <div class="level-item">
         <a class="button is-success is-medium" id = "submit" type = "button" onclick = "Submit()" style="margin-top: 1vh;">Submit</a>
        </div>
        </div>



         </div>
        </div>

          <!--
        <div class="aid">
         <div class="popup" onclick="myFunction()">
          <a id="instr-button" class="button is-info">Need Help?<span id="hide" class="hide">(Hide)</span></a>
          <span class="popuptext" class="message is-info" id="myPopup"><strong>INSTRUCTIONS</strong>
           <p>1. Choose your starting point : 'Source', from the drop down menu.<br />
           2. Choose your destinantion point : 'Destination', from the drop down menu.<br />
           3. Click on 'Submit'. You now have your path highlighted in front of you!<br />
           4. Click on any node to select it and read the description about it.<br />
          </p>
          </span>
         </div>
         -->
         <script>
         // When the user clicks on div, open the popup
         function myFunction() {
           var popup = document.getElementById("myPopup");
           popup.classList.toggle("show");
           var hide = document.getElementById("hide");
           hide.classList.toggle("show");
           pop=1;
         }
         </script>
        </div>
       </div>
   </body>
</html>
