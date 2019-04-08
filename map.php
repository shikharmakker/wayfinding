<!DOCTYPE html>
<?php include('Constants.php');
$img = $_GET['img'];
$ver = $_GET['version'];
 ?>
<html>
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
  
      <style>
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
         .grid-container {
             display: inline-grid;
             grid-template-columns: auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto auto;
             <!--background-color: #2345F4;-->
             padding: 0px;
             background-repeat: no-repeat;
             background-size: 360px 368px;
            }
         .grid-item {
         
          border: 0px solid rgba(0, 0, 0, 0.8);
          padding: 3px;
         
          text-align: center;
          opacity: 1;
         }

         #example2 {
          display: inline-block;
          padding: 0px;
          background-repeat: no-repeat;
          background-size: 360px 360px;
          margin-top: 0px;
          float: left;
          
         }
        

      </style>
      <script>
      function myfunction(){
      var l =   '<?php echo $img; ?>';
      b= l+".jpg";
      // window.alert(b);
      var a="images/" + b;
      var elem = document.getElementById("example2");
      elem.style.background="url('" + a + "')";
      elem.style.backgroundRepeat="no-repeat";
       elem.style.backgroundSize="360px 368px";
       display();
      // alert(l);
     }
      </script>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script>
      <?php
      $sql = "SELECT JSON_string FROM maps_data WHERE name = '$img' and version = '$ver'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      ?>

      <?php


      $sqln = "SELECT JSON_string FROM maps_data WHERE name = '$img' and version = '$ver'";

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
                for(var t = 0; t < connected[o].length ; t++){
                 finalpath(chords[o], connected[o][t]);
                }
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
              <div class="content">
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
             
             </div>
          </div>
          

        

        
        </div>
      
   </body>
</html>
