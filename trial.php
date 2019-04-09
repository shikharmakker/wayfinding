   <!DOCTYPE html>
   <?php include('Constants.php')
   ?>

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
}

#popdiv {
 width: 50%;
 height: 50%;
  background-color: white;
  position: absolute;
  top: 100px;
  left: 350px;
}

             .content{
              margin: 1vh 1vw;
             }
             .choices *{
              margin: 1vh 0px;
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

             padding:5px;
             font-size: 30px;
             text-align: center;
             opacity: 0.2;
            }

            #example2 {
             display: inline-block;
             padding: 0px;
             background-repeat: no-repeat;
             background-size: 600px 600px;
             margin-top: 0px;
             float: left;
             max-width: 100vw;
             max-height: 100vh;
            }
            .ia{
             display: inline-block;
             float: left;
            }
            .popup{
             display: inline-block;
             float: left;
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


            .aid{
             display: inline-block;
             float: right;
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

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script type="application/javascript">
         var name_temp;
         var brad2;
         var url_string = window.location.href;
         var url = new URL(url_string);

       //  var version = url.searchParams.get("version");
         var brad = url.searchParams.get("img");
               function myfunction(){

           name_temp = brad;
                   // window.alert(b);
                   var a="./images/" + brad + ".jpg";
                   var elem = document.getElementById("example2");
                   elem.style.background="url('" + a + "')";
                   elem.style.backgroundRepeat="no-repeat";
                   elem.style.backgroundSize="600px 600px";
                   display();
                  //  brad2 = url.searchParams.get("username");
                                          }

         <?php
         $n = $_GET['img'];
         $version = $_GET['version'];
        // $p = $_POST['psw'];

         $sql = "SELECT JSON_string FROM maps_data WHERE name = '$n' and version = '$version'";
         $sqlc1 = mysqli_query($conn,"Select JSON_string from maps_data where name = '$n' and version = '0'");
         $rowc1 = mysqli_fetch_assoc($sqlc1);
         $sqlc2 = mysqli_query($conn,"Select JSON_string from maps_data where name = '$n' and version = '1'");
         $rowc2 = mysqli_fetch_assoc($sqlc2);
         $j1 = $rowc1['JSON_string'];
         $j2 = $rowc2['JSON_string'];
         $a = 0;
         if($j1 == $j2){
           $a = 1;
         }
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result);
         $psw = $_SESSION['password'];

         ?>
         var tr;
         var delall=0;
         var prob = 0;
         //alert(name_temp);
       //  var version = 0;
         var chords = [];
         var psw =  '<?php echo $psw ;?>';
         var ct =  '<?php echo $a ;?>';
         //alert(ct);
         tr = '<?php echo $row['JSON_string'] ;?>';


         var obj = JSON.parse(tr);
         var connected = [];
         for (var temp = 0; temp < 3600 ; temp++) {
              connected[temp] = [];
            }
         for(var b=0;b<obj.cords.length;b++){
             chords[b] = obj.cords[b].value;
             for(var i =0; i<obj.cords[b].connected_nodes.length;i++){
             connected[b][i] = obj.cords[b].connected_nodes[i];
           }
         }
         if(ct == 1){
           // alert("hello");
            valuedelete(0,chords);
           }



            var cords = [];
            for(var i = 0; i < chords.length;i++){
             cords[i] = chords[i];

            }

            var connected_nodes = [];
            var name_string = [];
            var description = [];
            var Tag_strings = [];
            for (var temp = 0; temp < 3600 ; temp++) {
              connected_nodes[temp] = [];
              Tag_strings[temp] = [];
              name_string[temp] = '';
              description[temp] = '';
            }
            for(var b= 0; b<obj.cords.length;b++){
               for(var i = 0; i < connected[b].length;i++){
                 connected_nodes[b][i] = connected[b][i];
                 Tag_strings[b][i] = obj.cords[b].Tags[i];
               }
               name_string[b] = obj.cords[b].name;
               description[b] = obj.cords[b].description;
            }

            var edge_index = -1;
            var Node_select = false;
            var Edge_select = false;
            var Tag = false;
            var delete_ = false;
            var select = 0;
            var tag_select = 0;
            var tag_index = -1;
            var finalJSON = '';
            var str;
      var str1 = '';
            var str2 = '';
            var sel = 0;
            var prev = -1;
            var sele = -1 ;
            function sun(sel){
              return sel;
            }
            function clk(i){

             

               if(find(i,cords)!=-1 && delete_ == false){
                 if(sel == 1){
                   red(prev);
                   sel = 0;
                 }
                   document.getElementById("description").innerHTML="";
                   for (var z = 0; z < obj.cords.length; z++) {
              // green(obj.cords.value);
                   if(i==obj.cords[z].value){
                   document.getElementById("description").innerHTML=obj.cords[z].description;
                   document.getElementById("nam").innerHTML=obj.cords[z].name;
                   document.getElementById("naml").innerHTML = "Name: ";
                   document.getElementById("desl").innerHTML = "Description: ";

                 }
                   
                   yellow(i);
                 }
                 sel = 1;
                 prev = i;
                         }
                         else{
                          document.getElementById("description").innerHTML="";
                   document.getElementById("nam").innerHTML="";
                   document.getElementById("naml").innerHTML = "";
                   document.getElementById("desl").innerHTML = "";
                   reset();
                   display();
                         }

             
               if(Node_select){
                 //red(i);
                 select = 0;
                   sele = i;
                //    

                   
                 if (find(i,cords) == -1){
                   cords.push(i);
                  
                    
                   red(i);
                   display();
             
   /*     document.write("<center><div class = \"fullscreen-container\"><iframe src=\"popup-trial.php?id=\""+sele+"\" style=\"height: 100%; width: 40%;\" scrolling=\"yes\"></iframe></div></center>");           
                  $(".fullscreen-container").fadeTo(200, 1);*/
                //    alert( $(".fullscreen-container")[0]);
                document.getElementById('response_name').innerHTML = '<label class="label">Name: </label><input type="text" id="Name_input" required placeholder="Submit Name " size="15">';
                document.getElementById('response_description').innerHTML = '<label class="label">Nearby services</label><input type="text" id="Description_input" required placeholder="Submit Description" size="15">';
                document.getElementById('response_tag').innerHTML = ' <label class="label">Description</label><input type="text" required id="Tag_input" placeholder="Submit Tags" size="15">';
               
                document.getElementById('buttons').innerHTML = '<button id = "Tag_cancel" type="button" onclick ="Cancel_tag()" >Done</button>';
                unselect("Node");
                Tag = true;
                Node_select = false;
                Edge_select = false;
                delete_ = false;
                select = 0;

                 }
                 else{
                   alert("You have already selected the node");
                 }
               } else if (Edge_select) {
              if (find(i,cords) == -1) {
                alert("Please select one of the registered points");
              }else{
                if(select == 0){
                  blue(i);
                  edge_index = find(i,cords);
                  select = 1;

                }
                else{
                  yellow(i);
                  connected_nodes[edge_index].push(i);
                  connected_nodes[find(i,cords)].push(cords[edge_index]);
                  finalpath(i,cords[edge_index]);
                  select = 0;
                  edge_index = -1;
                  Stop();
                  blue(cords[edge_index]);

                }
              }
            } else if (delete_) {

                 var index_delete = find(i,cords);
                 if (index_delete == -1) {
                   alert("Please select registered point");
                 } else {
                   /*for (var r = 0; r < connected_nodes[index_delete].length; r++) {
                     finaldelete(i,connected_nodes[index_delete][r]);
                   }*/
                   for (var r = 0; r < connected_nodes[index_delete].length; r++) {
                     //finaldelete(i,connected_nodes[index_delete][r]);
                     valuedelete(i,connected_nodes[find(connected_nodes[index_delete][r],cords)]);
                   }
                   connected_nodes.splice(index_delete,1);
                   Tag_strings.splice(index_delete,1);
                   valuedelete(i,cords);
                   display();
                 }
               }
                 if(Tag){
                 if(tag_select == 1){
                   alert("You have already selected a node");
                   return;
                 }
                 tag_index = find(i,cords);
                 if (tag_index == -1) {
                   alert("Please select registered point");
                   return;
                 }
                 tag_select = 1;
                 yellow(i);
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
            function selected(i){
               document.getElementById(i).style.backgroundColor = "orange";
              document.getElementById(i).style.opacity = "1";
            }
            function green(i){
              document.getElementById(i).style.backgroundColor = "lawngreen";
              document.getElementById(i).style.opacity = "1";
            }
             function orange(i){
              document.getElementById(i).style.backgroundColor = "orange";
              document.getElementById(i).style.opacity = "1";
            }
            function valuedelete(q,w){
              var ind = find(q,w);
              if(q!=-1){
              w.splice(ind,1);
            }
            }
            function red(i){
              document.getElementById(i).style.backgroundColor = "red";
              document.getElementById(i).style.opacity = "1";

            }
            function yellow(i){
              document.getElementById(i).style.opacity = "1";
              document.getElementById(i).style.backgroundColor = "yellow";
            }
            function blue(i) {
              document.getElementById(i).style.opacity = "1";
              document.getElementById(i).style.backgroundColor = "blue";
            }
            function greygrid(){

             var kk = 0;
              for (var ii = 0; ii < 60; ii++) {
                for (var jj = 0; jj < 60; jj++) {
                  kk = 100*ii + jj;
                  document.getElementById(kk).style.border = ".016px solid #C0C0C0";
                }
              }
            }
            function unselect(i){
             if(Node_select){
               Node_select = false;
             }
             if(Edge_select){
               Edge_select = false;
             }
             if(delete_){
                delete_ = false;
             }
              document.getElementById(i).style.opacity = "1";
              document.getElementById(i).style.backgroundColor = "";
            }
            function Stop(){
              unselect("Node");
              unselect("Edge");
              unselect("Delete");
              unselect("Tags");
              document.getElementById(prev).style.opacity = "1";
              //document.getElementById(prev).style.backgroundColor = "red";
                edge_index = -1;
                Node_select = false;
                Edge_select = false;
                Tag = false;
                delete_ = false;
                select = 0;
                tag_select = 0;
                tag_index = -1;
                sel = 0;
                prev = -1;
                sele = -1 ;
              
              Cancel_tag();
              greygrid();
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
            function deletepath(x,y){
                var a,b,c,d,e,f,g;
                a = Math.floor(x/100); b = x%100;
                c = Math.floor(y/100); d = y%100;
                e = Math.floor((a+c)/2);
                f = Math.floor((b+d)/2);
                if (e==a & f==b) {
                  g = 100*c +b ;
                  disappear(g);
                }
                else if (e==c & f==d) {
                  g = 100*a +d ;
                  disappear(g);
                } else {
                  g = 100*e + f;
                  disappear(g);
                  deletepath(g,x);
                  deletepath(g,y);
                }
            }
            function finaldelete(x,y){
              deletepath(x,y);
              red(x);
              red(y);
            }
            function finalpath(x,y){
              path(x,y);
              red(x);
              red(y);
              check();
            }
            function Nodeselect(){
              selected('Node');
              if(Tag){
                alert("Please submit tag response or cancel it to proceed");
                return;
              }
              if(Edge_select){
               unselect('Edge');
              }
              if(Edge_select & edge_index != -1){
                //red(cords[edge_index]);
              }

          //   display();
              Node_select = true;
              Edge_select = false;
              delete_ = false;
              select = 0;
            }
            function Edgeselect(){
             selected('Edge');
              if(Tag){
                alert("Please submit tag response or cancel it to proceed");
                return;
              }
              if(Node_select){
               unselect('Node');
              }
              Node_select = false;
              Edge_select = true;
              delete_ = false;
            }
            /*function debug(){
              var strin = "";
              for (var i = 0; i < connected_nodes[0].length; i++) {
                strin  = strin + " " + connected_nodes[0][i];
              }
              document.getElementById('test').innerHTML = strin;
            }*/
            function display(){
              reset();
              for (var o = 0; o < cords.length; o++) {
                if(cords[o]!=0)
                red(cords[o]);
                for(var t = 0; t < connected_nodes[o].length ; t++){
                 finalpath(cords[o], connected_nodes[o][t]);
                }
              }
             // check();
            }
            function Print(){
              console.log(cords,connected_nodes,Tag_strings,cords.length,finalJSON);
            }
            function disappear(x){
              document.getElementById(x).style.backgroundColor = "";
            }
             function Delete(){
               selected('Delete');
              if(Tag){
                alert("Please submit tag response or cancel it to proceed");
                return;
              }
              delete_ = true;
              Node_select = false;
              if(Edge_select){
                red(cords[edge_index]);
              }
              Edge_select = false;

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
            function check(){
             var count = 0;
               for(var b=0;b<cords.length;b++){
                        if(!name_string[b]){
                          // alert("empty name");
                          var t = cords[b];
                         // alert(t);
                         // orange(t);
                          count++;
                        }
                 }
               //  alert(cords);
               
                 if(count > 0)
                   return false;
            }
            function Submit(){
              if(prob ==1){
                alert("Please fill the details of Junction");
                return;
              }
              Create_JSON();
              document.getElementById('json').innerHTML = finalJSON;

              var name = name_temp.replace('.jpg','');
              //alert("name : " + name);
              document.getElementById('name').innerHTML = name;
            //alert(finalJSON);
              if(name == ""){
                alert("Please enter a tag");
                return;
              }else{

                                  send();             //alert(finalJSON);
               alert("Map Annotated Successfully");
               var nav = "trial.php?img=" + "<?php echo $n ?>"+"&version=0" ;
               window.location.href =nav;
              }


            }
            function send(){
              $.post("upload.php",{name: $("#name").html(),JSON_string: $("#json").html()});
             // alert( $("#json").html());
            }

            function Create_JSON(){
              finalJSON = '{"cords":[';
              for (var count = 0; count < cords.length; count++) {
                str = '{"value":';
                str += cords[count] + ',"connected_nodes":['
                str1 = '';
                for (var c = 0; c < connected_nodes[count].length; c++) {
                  str1 += connected_nodes[count][c] + ',';
                }
                str1 = str1.substring(0,str1.length-1);
                str += str1;
                str += '],"Tags":[';
                str2 = '';
                for (var y = 0; y < Tag_strings[count].length; y++) {
                  str2 += '"' + Tag_strings[count][y] + '",';
                }
                str2 = str2.substring(0,str2.length-1);
                str += str2;
                str += '],"name":"';
                if (name_string[count] != '') {
                  str += name_string[count];
                }
                str += '","description":"';
                if (description[count] != '') {
                  str += description[count];
                }
                str += '"}';
                finalJSON += str + ',';
               }
              finalJSON = finalJSON.substring(0,finalJSON.length - 1);
              finalJSON += ']}' ;
              //alert(finalJSON);
            }
            var aler = 0;
            function Cancel_tag(){
              if(tag_index != -1){
                red(cords[tag_index]);
              }
              if(document.getElementById('Description_input').value=="" || document.getElementById('Name_input').value =="" || document.getElementById('Tag_input').value==""){
                alert('please fill the details for the junction');
                prob = 1;
                return; 
              }

              Submit_tag();
              Submit_name();
              Submit_description();
              document.getElementById('response_tag').innerHTML = '';
              document.getElementById('response_name').innerHTML = '';
              document.getElementById('response_description').innerHTML = '';
              document.getElementById('buttons').innerHTML = '';
              prob = 0;
              alert('You have successfully added junction');
              unselect(tag_index);
              tag_index = -1;
              tag_select = 0;
              Tag = false;
            }
            function Submit_tag(){
              var input = document.getElementById('Tag_input').value;
              if(input == ""){
                alert("Please enter a tag");
                unselect(tag_index);
                return;
              }
              if(tag_index == -1 || tag_select == 0){
               if(aler==0)
                alert("Please select a node");
              unselect();
                aler = 1;
                return;
              }
              aler = 0;
              var arr = input.split(',');
    for(var i = 0 ; i < arr.length ; i++){
              Tag_strings[tag_index].push(arr[i]);
}

              document.getElementById('Tag_input').value = "";


            }
            function Submit_name(){

              var input = document.getElementById('Name_input').value;
              if(input == ""){
                alert("Please enter a name");
                unselect(tag_index);
                return;
              }
              // alert(input);
              if(tag_index == -1 || tag_select == 0 ){
               if(aler==0)
                alert("Please select a node");
              unselect(tag_index);
                aler = 1;
                return;
              }
              aler = 0;
              if (name_string[tag_index] == '') {
                name_string[tag_index] = input;
              } else {
                alert("Name for this node is now replaced");
                name_string[tag_index] = input;
              }
              document.getElementById('Name_input').value = "";
              }

            function Submit_description(){
              var input = document.getElementById('Description_input').value;
              if(input == ""){
                alert("Please enter a description");
                unselect(tag_index);
                return;
              }
              if(tag_index == -1 || tag_select == 0){
               if(aler==0)
                alert("Please select a node");
               unselect(tag_index);
                aler = 1;
                return;
              }
              aler = 0;
              if (description[tag_index] == '') {
                description[tag_index] = input;
                // alert("description saved : " + input);
              } else {
                // alert("description of this node is now replaced");
                description[tag_index] = input;
              }
              document.getElementById('Description_input').value = "";
           //   document.getElementById('response').innerHTML = '';
           //   document.getElementById('buttons').innerHTML = '';
           //   if(tag_index != -1){
           //     red(cords[tag_index]);
           //   }
             // tag_index = -1;
             // tag_select = 0;
             // Tag = false;
            }
            function tagg(){
             selected('Tags');
              if(Edge_select){
                red(cords[edge_index]);
              }
              //alert("PLease select a node");

              Tag = true;
              Node_select = false;
              Edge_select = false;
              delete_ = false;
              select = 0;
            
            }
            function mouseOver(i){
              if(Node_select){
               greygrid();
               display();
               red(i);
                document.getElementById(i).style.opacity = "0.5";
              }


            }
            function mouseOut(i){
              if(Node_select){
                greygrid();
                reset();
                display();
              }
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

        <div class="navbar-end">
          <div class="navbar-item">
              <a class="button is-primary" href="welcome.php">
                <strong>Dashboard</strong>
              </a>
          </div>
           <a class="navbar-item" href="logout.php">
             Logout<span style="display:inline-block; width:0.2rem;"></span>
             <i class="fas fa-sign-out-alt"></i>
           </a>

          </div>
        </div>
    </nav>


     <div class="content">
      <div class="columns">
        <div class="column is-flex level-item">
        <div class="level-item">
         <div class="ia">
          <div class="choices">
           <table>
              <tr>
               <a class="button is-text" id="Node" type="button" onclick="Nodeselect()">Junction</a><br />
              </tr>
           <!--   <tr>
               <a class="button is-text" id="roomno" type="button" onclick="">Room number</a><br />
              </tr>
              <tr>
               <a class="button is-text" id="amenities" type="button" onclick="tagg()">Amenities</a><br />
              </tr>-->
              <tr>
              <a class="button is-text" id="Edge" type="button" onclick="Edgeselect()">Path</a><br />
              </tr>
              <tr>
              <a class="button is-text" id="Stop" type="button" onclick="Stop()">Stop Action</a><br />
              </tr>
              <tr>
              <a class="button is-text " id="Delete" type="button" onclick="Delete()">Clear</a><br>
              </tr>
              <tr>
              <a class="button is-text" id="Delete" type="button" onclick="DeleteAll()">Clear All</a><br />
              </tr>
           </table>

          </div>
            <a class="button is-success is-fullwidth is-medium" id="but1" type="button" >Submit</a> <br />

         <div class="fullscreen-container">
      <div id="popdiv">
          <form method="post">
           <div class="field">
             <label class="label">Enter Password</label>
             <div class="control">
               <input class="input is-fullwidth" type="password" name="psw" id="psw" placeholder="Password">
             </div>
           </div>
            <div class="field is-grouped is-grouped-centered">
              <p class="control">
                <a class="button is-success is-fullwidth" id="btnSubmit">
                  Submit
                </a>
              </p>
              <p class="control">
                <a class="button is-light is-fullwidth" id="but2">
                  Cancel
                </a>
              </p>
            </div>
          </form>

      </div>
    </div>
       <script type="text/javascript">
            $(function() {
      $("#but1").click(function() {
        $(".fullscreen-container").fadeTo(200, 1);
      });
      $("#but2").click(function() {
        $(".fullscreen-container").fadeOut(200);
      });
    });

              $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#psw").val();
            var confirmPassword = psw;
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            Submit();
        });
    });


           


        </script>
        

     <a class="button is-link is-rounded is-small" id="undo" onclick="undo()">Undo</a>
     <a class="button is-danger is-rounded is-small" id="undo" onclick="redo()">Redo</a>
<br>
              <label id = "naml"></label><p id="nam"></p>
         <br><label id = "desl"></label><p id="description"></p>
          <p hidden id="json"></p>
          <p hidden id="name"></p>
          <!--<button id = "Display" type="button" onclick ="display()" >Display</button>-->
          <!--<button id = "Debug" type="button" onclick ="debug()" >Debug</button>-->
          <!--<p id = "response">Clicked at => </p>-->
          <!--<button id = "Print" type="button" onclick ="Print()" >Print</button>-->


         </div>
        </div>
        </div>

        <div class="column is-three-fifths is-flex">
         <div class="level-item">
          <div id="example2">
           <div class="grid-container">
            <script type="text/javascript">
             for (var i = 0; i < 60; i++) {
              for (var j = 0; j < 60; j++) {
               var k = 100 * i + j;
               document.write("<div class=\"grid-item\" id = \"" + k + "\" onclick =\"clk(" + k + ")\" onmouseover = \"mouseOver(" + k + ")\" onmouseout = \"mouseOut(" +
                k + ")\"></div>");
              /* if(j == 0){
                  document.write("<div class = \"fullscreen-container\"><iframe src=\"popup-trial.htm\"></iframe></div>");
               }*/
              }
             }
            </script>

           </div>
          </div>
         </div>
        </div>
      <div class="column" style="padding: 5vh 0.75vw;">
          <p id="response_name"></p>
          <p id="response_tag"></p>
          <p id="response_description"></p>
          <p id="buttons"></p>

                 <div class="color-key" style="display:">
                  <table class="table is-bordered" style="color: #555; font-size: 0.8rem;">
                   <tr>
                    <th style="text-align: center; color: #666; font-weight: 450;">Colour</th>
                    <th style="color: #666; font-weight: 450;">Significance</th>
                   </tr>
                   <tr>
                    <td style="color: red; text-align: center;">Red</td>
                    <td>Added Node </td>
                   </tr>
                   <tr>
                    <td style="color: #ffcb00; text-align: center;">Yellow</td>
                    <td>Selected Node</td>
                   </tr>
                   <tr>
                    <td style="color: blue; text-align: center;">Blue</td>
                    <td>Selected node of an edge</td>
                   </tr>
                   <tr>
                    <td style="color: green; text-align: center; ">Green</td>
                    <td>Edge line</td>
                   </tr>
                  </table><br /><br />

                 </div>

        </div>






      </div>


      <!-- <button class="button-" id = "Update" type="button" onclick ="Update()" >Update</button>
      <div class="aid">
       <div class="popup" onclick="myFunction()">
        <a id="instr-button" class="button is-info">Need Help?<span id="hide" class="hide">(Hide)</span></a>
        <span class="popuptext" id="myPopup"><strong>INSTRUCTIONS</strong>
         <p>1. Select 'Node' and click on the grid to select a block.<br />
          2. While Selecting the node, make sure to select it in a same grid line.<br />
          3. Select 'Edge', then click on 2 nodes to create an edge connecting those two nodes. <br />
          4. Click on 'Stop' after creating an edge, or in case you want to deselect a function.<br />
          5. Select 'Delete' and then click on a node to delete it.<br />
          6. Select 'Name' and then click on a node to submit a name, tag and/or description.<br />
          7. Click any node to read the description.<br />
         </p>
        </span>
       </div>
      </div>
      -->
      <script>
      

     //   document.write("<center><div class = \"fullscreen-container\"><iframe src=\"popup-trial.php?id=\""+sele+"\" style=\"height: 100%; width: 40%;\" scrolling=\"yes\"></iframe></div></center>");
       

      </script>     

    </body>




    <?php
      $user = $_SESSION["username"];
   //print_r($user);
   $sql = "SELECT password FROM admin WHERE username = '$user'";
   $result = mysqli_query($conn, $sql);
   //print_r($result);
   $row = mysqli_fetch_assoc($result);
   $pass = $row['password'];

   ?>
  <script type="text/javascript">
         $(function() {
      $("#but1").click(function() {
        $(".fullscreen-container").fadeTo(200, 1);
      });
      $("#but2").click(function() {
        $(".fullscreen-container").fadeOut(200);
      });
    });
    function myFunction() {
     var t =  '<?php echo $pass ;?>';
   var nat = prompt("Confirm your Password");
   while (nat.length == 0 || nat!=t) {
       nat = prompt("Please write a correct password");
   }
   Submit();

   }
    var v = "<?php echo $version;?>";
    function DeleteAll(){

            // var r = alert("are you sure ?");
            // if(r==true){
             var t =  '<?php echo $pass ;?>';
   var nat = prompt("Confirm your Password");
   while (nat.length == 0 || nat!=t) {
       nat = prompt("Please write a correct password");
   }
               var nav = "clear.php?img="+"<?php echo $n?>" ;
               window.location.href =nav;

            }
   function undo(){

   var r = confirm("Are you sure!");
   if(r==true && v!=2){
       var nav = "trial.php?img="+"<?php echo $n?>"+"&version="+"<?php echo $version+1 ?>" ;
       window.location.href =nav;}
     else{
         alert("You cannot go back further");
       }

     //alert(tr);
   }
   function redo(){
     var r = confirm("Are you sure!");
   if(r==true && v!=0){
       var nav = "trial.php?img="+"<?php echo $n?>"+"&version="+"<?php echo $version-1 ?>" ;
     window.location.href =nav;}
     else{
         alert("You cannot go further");
       }
     //alert(tr);
   }
    </script>

 </html>

   <!-- tags -> nearby services, multiple strings  -->
   <!-- name -> unique identifier for user ( and admin)  -->
   <!-- description -> unique string,describes the node  -->
