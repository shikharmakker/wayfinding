<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8"/>
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <style>
         html{
          font-family: 'Montserrat', 'Raleway', sans-serif;
         }
         .head{
          background-image: linear-gradient(#e67e22, #f39c12, #f1c40f);
          text-align: center;
          font-weight: bold;
          margin: 0px;
          padding-top: 20px;
          padding-bottom: 10px;
         }
         .grid-container {
          display: inline-grid;
          grid-template-columns: auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto;
          <!--background-color: #2345F4;-->
          padding: 0px;
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
          display: inline-block;
         
          padding: 0px;
          background-repeat: no-repeat;
          background-size: 600px 600px;
          margin-top: 0px;
          float: left;
          padding-right: 20px;
         }
         .user-ia{
          display: inline-block;
          background-color: #f1c40f;
          padding-left: 40px;
          padding-right: 50px;
          margin-top: 80px;
          padding-top: 20px;
          float: left;
          border-radius: 10px;
         }
         .button {
          border-radius: 5px;
          width: 70%;
         }
         .button:active {
          font-weight: bolder;
         }

         .instructions {
          display: inline-block;
          margin-top: 60px;
          margin-left: 10px;
          margin-right: 20px;
          width: 20%
         }
         th {
          background-color: #d35400;
         }
         th, td {
          padding: 10px;
         }

         .color-key {
          display: inline-block;
          margin-top: 40px;
          margin-left: 20px;
          border: 2px solid #d35400;
          border-radius: 5px;
         }
      </style>
      <script>
      function myfunction(){
      b="shikharaiims.jpg";
      // window.alert(b);
      var a="images/" + b;
      var elem = document.getElementById("example2");
      elem.style.background="url('" + a + "')";
      elem.style.backgroundRepeat="no-repeat";
       elem.style.backgroundSize="600px 600px";
       display();
     }
      </script>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
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

      <?php
      $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "";
      $database="test";
      $conn = new mysqli($dbhost, $dbuser, $dbpass,$database);
      
      $sqln = "SELECT JSON_string FROM test.first_test";
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
                
                document.getElementById("description").innerHTML=obj.cords[c].description;}
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
           document.getElementById(i).style.backgroundColor = "yellow";
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
         src_tag = document.getElementById("source").value;
         dest_tag = document.getElementById("destination").value;
         // var tr = '{"cords":[{"value":5626,"connected_nodes":[4726],"Tags":["entry"]},{"value":3226,"connected_nodes":[4726,3229,2226],"Tags":[]},{"value":3229,"connected_nodes":[3226],"Tags":["stairs","help desk"]},{"value":2226,"connected_nodes":[3226,2240],"Tags":[]},{"value":2240,"connected_nodes":[2226],"Tags":[]},{"value":4726,"connected_nodes":[3226,5626,4750],"Tags":[]},{"value":4750,"connected_nodes":[4726],"Tags":["gents washroom","ladies washroom"]}]}'
         var obj = JSON.parse(tr);
         for(var b=0;b<obj.cords.length;b++){
          cords[b] = obj.cords[b].value;
          for(var c=0;c<obj.cords[b].connected_nodes.length;c++){
            connected_nodes[b][c] = obj.cords[b].connected_nodes[c];
          }
            if(obj.cords[b].name==src_tag)
              src = obj.cords[b].value;
            if(obj.cords[b].name==dest_tag)
              dest = obj.cords[b].value;
         }
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
      <div class="head">
       <h1><strong>Indoor Navigation</strong></h1>
       <div class="heading">
       <p id = "mapping"></p>
       <h1>USER</h1>
      </div>
      </div>

      <p id = "mapping"></p>
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
      <div class="user-ia">
         <input type="text" name="typeahead">
      <table>
        <tr>
         
       <tr>
        <td>Source:</td>
       <td>
      <select name="source" id = "source">
       <script language="javascript" type="text/javascript">
          //var tr = '{"cords":[{"value":5626,"connected_nodes":[4726],"Tags":["entry"]},{"value":3226,"connected_nodes":[4726,3229,2226],"Tags":[]},{"value":3229,"connected_nodes":[3226],"Tags":["stairs","help desk"]},{"value":2226,"connected_nodes":[3226,2240],"Tags":[]},{"value":2240,"connected_nodes":[2226],"Tags":[]},{"value":4726,"connected_nodes":[3226,5626,4750],"Tags":[]},{"value":4750,"connected_nodes":[4726],"Tags":["gents washroom","ladies washroom"]}]}'
         var obj = JSON.parse(tr);
          for(var b=0;b<obj.cords.length;b++){
              document.write("<option>"+obj.cords[b].name+"</option>");
          }
        </script>
      </select>
     </td>
     </tr>
     <tr>
      <td>Destination:</td>
      <td>
      <select name="destination" id = "destination">
        <script language="javascript" type="text/javascript">
          //var tr = '{"cords":[{"value":5626,"connected_nodes":[4726],"Tags":["entry"]},{"value":3226,"connected_nodes":[4726,3229,2226],"Tags":[]},{"value":3229,"connected_nodes":[3226],"Tags":["stairs","help desk"]},{"value":2226,"connected_nodes":[3226,2240],"Tags":[]},{"value":2240,"connected_nodes":[2226],"Tags":[]},{"value":4726,"connected_nodes":[3226,5626,4750],"Tags":[]},{"value":4750,"connected_nodes":[4726],"Tags":["gents washroom","ladies washroom"]}]}'
         var obj = JSON.parse(tr);
          for(var b=0;b<obj.cords.length;b++){
              document.write("<option>"+obj.cords[b].name+"</option>");
          }
        </script>
      </select>
     </td>
     </table>
     <br />

  <button class="button"id = "submit" type = "button" onclick = "Submit()">Submit</button><br>
  <p>Way:</p>
  <p id="display_name"></p>
 <button class="button" id="next" type = "button" onclick="Next()">Next</button><br>
  <p id="display_next"></p>
  <button class="button" id="previous" type = "button" onclick="Previous()">Previous</button><br>
  <p id="display_prev"></p>
  <p>Name:</p>
  <p id="name"><br /><br /></p>
  <p>Description:</p>
  <p id="description"><br /><br /></p>

  </script>
 </div>
 <div class="instructions">
  <strong>Instructions:</strong>
  <p>1. Choose your starting point : 'Source', from the drop down menu.<br />
  2. Choose your destinantion point : 'Destination', from the drop down menu.<br />
  3. Click on 'Submit'. You now have your path highlighted in front of you!<br />
  4. Click on any node to select it and read the description about it.
 </p>

 <div class="color-key">
  <table>
   <tr>
    <th style="text-align: center;"><strong>Colour</strong></th>
    <th><strong>Key</strong></th>
   </tr>
   <tr>
    <td style="color: #0023F5; font-weight: bold; text-align: center;">Blue</td>
    <td>Path Nodes</td>
   </tr>
   <tr>
    <td style="color: #EB3223; font-weight: bold; text-align: center;">Red</td>
    <td>Source Node</td>
   </tr>
   <tr>
    <td style="color: #9EF74D; font-weight: bold; text-align: center;">Green</td>
    <td>Optimum path</td>
   </tr>
   <tr>
    <td style="color: yellow; font-weight: bold; text-align: center;">Yellow</td>
    <td>Selected Node</td>
   </tr>
  </table>
 </div>
</div>
   </body>
   <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
</html>