<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">

      <style>
      html {
       font-family: 'Montserrat', 'Raleway', sans-serif;
      }
      body {
       margin: 0px;
       height: 100vh;
      }
      .head {
       background-image: linear-gradient(#e67e22, #f39c12, #f1c40f);
       text-align: center;
       font-weight: bold;
       margin-top: 0px;
       padding-top: 10px;
       padding-bottom: 10px;
       text-align: center;
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
          padding-right: 15px;
                   }
         .user-ia {
          font-family: 'Raleway', sans-serif;
          font-size: 20px;
          display: inline-block;
          background-color: #f1c40f;
          margin-top: .8vh;
          padding-top: .8%;
          padding-bottom: 1%;
          border-radius: 10px;
          float: left;
          width: 11%;
          font-size: big;
          text-align: center;
          height: 70vh;
          text-align: center;
         }
         button {
          border: 0px;
         }
         .choices {
          margin: 0px;
         }
         .button {
          border-radius: 5px;
          border: 0px;
          text-align: center;
          height: 7.5%;
          width: 70%;
          font-size: 16px;
         }
         .button:active {
          font-weight: bolder;
         }
         .user-iafinal {
          display: inline-block;
          float: left;
          height: 12vh;
          width: 100%;
          border-radius: 10px;
          text-align: center;
          margin: 0px;
         }
         input {
          padding: .5vh 2%;
          border-radius: 4px;
          box-shadow: 0px;
          border: 2px solid #f39c12;
          text-align: center;
          width: 80%;
          height: 9%;
          margin: 1%;
          font-size: 14px;
         }
         #Tag_cancel {
          background-color: #16a085;
          width: 70%;
          height: 9%;
          font-size: 16px;
          padding: .5vh 2%;
          color: white;
          border-radius: 4px;
          margin: 0px;
         }
         #Tag_cancel:active {
          background-color: #16a085;
          width: 70%;
          height: 9%;
          font-size: 16px;
          padding: .5vh 2%;
          color: white;
          border-radius: 4px;
          margin: 0px;
          font-weight: bolder;
         }
         .button- {
          border-radius: 5px;
          border: 0px;
          text-align: center;
          height: 4vh;
          width: 95%;
          font-size: 16px;
         }
         .button-:active {
          font-weight: 400;
          border: solid 2px #27ae60;
         }
         #Submit {
          background-color: #27ae60;
          color: white;
          width: 90%;
          font-size: 18px;
          font-weight: bold;
          border: 0px;
         }
         .instructions {
          font-family: 'Raleway', sans-serif;
          font-size: 17px;
          font-weight: lighter;
          display: inline-block;
          float: right;
          width: 24%;
          margin: 0vh;
          margin-right: 7%;
         }

         th {
          background-color: #d35400;
         }
         th, td {
          padding: 10px;
         }
         .color-key {
          display: inline-block;
          margin-top: 0%;
          margin-left: 5%;
          border: 2px solid #d35400;
          border-radius: 5px;
          width: 80%
         }

      </style>

      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script type="application/javascript" >
      var name_temp;
      function myfunction(){

        var url_string = window.location.href; //window.location.href
        var url = new URL(url_string);
       var brad = url.searchParams.get("RN");
        name_temp = brad;
                // window.alert(b);
                var a="./images/" + brad;
                var elem = document.getElementById("example2");
                elem.style.background="url('" + a + "')";
                elem.style.backgroundRepeat="no-repeat";
                elem.style.backgroundSize="600px 600px";
                display();
                      }
      <?php
      $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "";
      $database="test";
      $conn = new mysqli($dbhost, $dbuser, $dbpass,$database);
      $sql = "SELECT JSON_string FROM test.first_test WHERE name = 'shikharaiims' limit 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      
      ?>
      var chords = [];
      var tr = '<?php echo $row['JSON_string'] ;?>';
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
         function clk(i){
            //alert("you have selected 2 points");
            /*<!--document.getElementById("response").innerHTML = resp;-->
            document.getElementById(i).style.backgroundColor = "red";
            <!--document.getElementById("test").innerHTML = cords.length;-->
            cords.push(i);*/

            if(find(i,cords)!=-1){
              if(sel == 1){
                red(prev);
                sel = 0;
              }
                document.getElementById("description").innerHTML="";
                for (var c = 0; c < obj.cords.length; c++) {
           // green(obj.cords.value);
                if(i==obj.cords[c].value)
                document.getElementById("description").innerHTML=obj.cords[c].description;
                yellow(i);
              }
              sel = 1;
              prev = i;
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
            } else if(Node_select){
              //red(i);
              select = 0;
              if (find(i,cords) == -1){
                cords.push(i);
                red(i);
                display();
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
                  Stop();
                //  blue(cords[edge_index]);
                  
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
         function valuedelete(q,w){
           var ind = find(q,w);
           w.splice(ind,1);
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
           document.getElementById(i).style.opacity = "1";
           document.getElementById(i).style.backgroundColor = "";
         }
         function Stop(){   
           unselect("Node");
           unselect("Edge");
           unselect("Delete");
           unselect("Tags");
           document.getElementById(prev).style.opacity = "1";
           document.getElementById(prev).style.backgroundColor = "red";
           Node_select = false;
           Edge_select = false;
           select = 0;
           delete_  = false;
           Cancel_tag();
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

             red(cords[edge_index]);
           }

          display();
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
             red(cords[o]);

             for(var t = 0; t < connected_nodes[o].length ; t++){
              finalpath(cords[o], connected_nodes[o][t]);
             }

           }
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
         function Submit(){

           Create_JSON();
           document.getElementById('json').innerHTML = finalJSON;

           var name = name_temp.replace('.jpg','');
           //alert("name : " + name);
           document.getElementById('name').innerHTML = name;
           if(name == ""){
             alert("Please enter a tag");
             return;
           }else{
             //alert("q");
              //alert($("#name").html());
              //alert("w");
              //alert($("#json").html());
             send();
             //alert(finalJSON);
             alert("done");
           }


         }
         function send(){
           $.post("upload.php",{name: $("#name").html(),JSON_string: $("#json").html()});

         }
         function Update(){

           Create_JSON();
         }
         /*function Create_JSON(){
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
             str += ']}'
             finalJSON += str + ',';
            }
           finalJSON = finalJSON.substring(0,finalJSON.length - 1);
           finalJSON += ']}' ;
         }*/
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
         function Cancel_tag(){
           if(tag_index != -1){
             red(cords[tag_index]);
           }
           Submit_tag();
           Submit_name();
           Submit_description();
           document.getElementById('response_tag').innerHTML = '';
           document.getElementById('response_name').innerHTML = '';
           document.getElementById('response_description').innerHTML = '';
           document.getElementById('buttons').innerHTML = '';
           tag_index = -1;
           tag_select = 0;
           Tag = false;
         }
         function Submit_tag(){
           var input = document.getElementById('Tag_input').value;
           if(input == ""){
             alert("Please enter a tag");
             return;
           }
           if(tag_index == -1 || tag_select == 0){
             alert("Please select a node");
             return;
           }
           Tag_strings[tag_index].push(input);
           document.getElementById('Tag_input').value = "";
        //   document.getElementById('response').innerHTML = '';
        //   document.getElementById('buttons').innerHTML = '';
        //   if(tag_index != -1){
        //     red(cords[tag_index]);
        //   }
          // tag_index = -1;
          // tag_select = 0;
          // Tag = false;
         }
         function Submit_name(){

           var input = document.getElementById('Name_input').value;
           if(input == ""){
             alert("Please enter a name");
             return;
           }
           // alert(input);
           if(tag_index == -1 || tag_select == 0){
             alert("Please select a node");
             return;
           }
           if (name_string[tag_index] == '') {
             name_string[tag_index] = input;
           } else {
             alert("Name for this node is now replaced");
             name_string[tag_index] = input;
           }
           document.getElementById('Name_input').value = "";
        //   document.getElementById('response').innerHTML = '';
        //   document.getElementById('buttons').innerHTML = '';
        //   if(tag_index != -1){
        //     red(cords[tag_index]);
        //   }
          // tag_index = -1;
          // tag_select = 0;
          // Tag = false;
         }
         function Submit_description(){
           var input = document.getElementById('Description_input').value;
           if(input == ""){
             alert("Please enter a description");
             return;
           }
           if(tag_index == -1 || tag_select == 0){
             alert("Please select a node");
             return;
           }
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
           document.getElementById('response_name').innerHTML = '<input type="text" id="Name_input" placeholder="Submit Name " size="15 ">';
           document.getElementById('response_description').innerHTML = '<input type="text" id="Description_input" placeholder="Submit Description" size="15">';
           document.getElementById('response_tag').innerHTML = '<input type="text" id="Tag_input" placeholder="Submit Tags" size="15">';
           document.getElementById('buttons').innerHTML = '<button id = "Tag_cancel" type="button" onclick ="Cancel_tag()" >Done</button>';
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
             reset();
             display();
           }
         }



      </script>
   </head>
   <body>
     <body onload="myfunction()">
      <div class="head">
       <h1><strong>Indoor Navigation</strong></h1>
      <div>
      <!-- <p>Name : <input type="text" id="name"></p> -->
      <p id = "temporary"></p>
     </div>
    </div>
      <div id="example2">
        <div class="grid-container">
           <script type="text/javascript">
              for(var i=0;i<60;i++){
                 for (var j=0;j<60 ;j++ ) {
                    var k =100*i + j;
                    document.write("<div class=\"grid-item\" id = \""+k+"\" onclick =\"clk("+k+")\" onmouseover = \"mouseOver("+k+")\" onmouseout = \"mouseOut("
                    +k+")\"></div>");
              }}
           </script>
        </div>
      </div>
      <!--      <button type="button" onclick ="finalpath(cords[0],cords[1])" >JOIN</button> -->
      <div class="user-ia">
       <table class="choices">
        <tr>
         <button class="button" id = "Node" type="button" onclick ="Nodeselect()" >Node</button>
         <p></p>
        </tr>
        <tr>
         <button class="button" id = "Edge" type="button" onclick ="Edgeselect()" >Edge</button>
         <p></p>
        </tr>
        <tr>
         <button class="button" id = "Stop" type="button" onclick ="Stop()" >Stop</button>
         <p></p>
        </tr>
        <tr>
         <button class="button" id = "Delete" type="button" onclick ="Delete()" >Delete</button>
         <p></p>
        </tr>
        <tr>
         <button class="button" id = "Tags" type="button" onclick ="tagg()" >Name</button>
        </tr>
       </table>
      <!--<button id = "Display" type="button" onclick ="display()" >Display</button>-->
      <!--<button id = "Debug" type="button" onclick ="debug()" >Debug</button>-->
      <!--<p id = "response">Clicked at => </p>-->
      <!--<button id = "Print" type="button" onclick ="Print()" >Print</button>-->

       <p id = "response_name"></p>
       <p id = "response_tag"></p>
       <p id = "response_description"></p>
       <p id = "buttons"></p>
       <div class="user-iafinal">
        <button class="button-" id = "Submit" type="button" onclick ="Submit()" >Submit</button>
        <p></p>
         <p>Description:</p>
  <p id="description"><br /><br /></p>
       </div>
      </div>


     <!-- <button class="button-" id = "Update" type="button" onclick ="Update()" >Update</button>-->
      <p hidden id = "json"></p>
      <p hidden id = "name"></p>

     <div class="instructions">
      <strong>Instructions:</strong>
      <p>1. Select 'Node' and click on the grid to select a block.<br />
      2. While Selecting the node, make sure to select it in a same grid line.
      3. Select 'Edge', then click on 2 nodes to create an edge connecting those two nodes. <br />
      4. Click on 'Stop' after creating an edge, or in case you want to deselect a function.<br />
      5. Select 'Delete' and then click on a node to delete it.<br />
      6. Select 'Name' and then click on a node to submit a name, tag and/or description.<br/>
      7. Click any node to read the description.<br>
      </p>

      <div class="color-key" style="font-size: 2vh; font-weight: bold;">
       <table>
       <tr>
        <th style="text-align: center;"><strong>Colour</strong></th>
        <th><strong>Key</strong></th>
       </tr>
       <tr>
        <td style="color: red; font-weight: bold; text-align: center;">Red</td>
        <td>Added Node </td>
       </tr>
       <tr>
        <td style="color: yellow; font-weight: bold; text-align: center;">Yellow</td>
        <td>Selected Node</td>
       </tr>
       <tr>
        <td style="color: blue; font-weight: bold; text-align: center;">Blue</td>
        <td>Selected node of an edge</td>
       </tr>
       <tr>
        <td style="color: green; font-weight: bold; text-align: center;">Green</td>
        <td>Edge line</td>
       </tr>

      </table>
      </div>
     </div>
   </body>
</html>

<!-- tags -> nearby services, multiple strings  -->
<!-- name -> unique identifier for user ( and admin)  -->
<!-- description -> unique string,describes the node  -->
