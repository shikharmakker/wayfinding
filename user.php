

<!DOCTYPE html>
<?php include('Constants.php');
$floor = $_GET['floor'];
$building = $_GET['building'];
$x = $building.$floor;
?>

<html>
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin|PT+Serif" rel="stylesheet">
      <style>
         body{
          max-height: 100vh;
          font-family: 'Libre Franklin';
         }
         .content{
          margin-top: 5vh;
          margin-left: 0.5vw;
          margin-right: 0.5vw;
         }
         .column{
          padding: 0px;
         }
         .grid-container {
             display: inline-grid;
             grid-template-columns: repeat(60, 1fr);
             padding: 0px;
             background-repeat: no-repeat;
             background-size: 600px 600px;
             max-width: 100vw;
            }
            .fullscreen-container {
             display: none;
             position: fixed;
             top: 0;
             bottom: 0;
             left: 0;
             right: 0;
             background-color: #29292924;
             z-index: 9999;
            }

         #example2 {
          display: inline-block;
          padding: 0px;
          background-repeat: no-repeat;
          background-size: 600px 600px;
          margin-top: 0px;
          float: left;
          max-height: 100%;
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
          .fullscreen-container {
           display: none;
           position: fixed;
           top: 0;
           bottom: 0;
           left: 0;
           right: 0;
           background-color: #29292924;
           z-index: 9999;
              }

              .full-container{
               display: none;
               position: fixed;
               top: 0;
               bottom: 0;
               left: 0;
               right: 0;
               background-color: #29292924;
               z-index: 9999;
              }
              .card-wrapper{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: calc(100vh - 10rem);
              }
              .card-header-title{
               font-size: 2rem;
              }

              @media only screen and (max-width: 350px){
               .grid-item {
                padding: 0.165rem;
                opacity: 0.8;
               }
               #popdiv, #pop {
                 top: 10%;
                 background-color: white;
                 position: absolute;
                 min-width: 40vw;
                 min-height: 49vh;
               }
               .user-input-wrapper .column{
                padding: 1vh 5vw;
               }

              }


              @media only screen and (min-width: 350px){
               .grid-item {
                padding: 0.19rem;
                opacity: 0.8;
               }
               #popdiv, #pop {
                 top: 10%;
                 background-color: white;
                 position: absolute;
                 min-width: 40vw;
                 min-height: 49vh;
               }
               .user-input-wrapper .column{
                padding: 1vh 5vw;
               }
              }
              @media only screen and (min-width: 400px){
               .grid-item {
                padding: 0.22rem;
                opacity: 0.8;
               }
               #popdiv, #pop {
                 top: 10%;
                 background-color: white;
                 position: absolute;
                 min-width: 40vw;
                 min-height: 49vh;
               }
               .user-input-wrapper .column{
                padding: 1vh 5vw;
               }

              }
              @media only screen and (min-width: 700px){
               .grid-item {
                padding: 0.4rem;
                opacity: 0.8;
               }
               #popdiv, #pop {
                 top: 10%;
                 background-color: white;
                 position: absolute;
                 min-width: 40vw;
                 min-height: 49vh;
               }
               .user-input-wrapper .column{
                padding: 1vh 5vw;
               }
              }
              @media only screen and (min-width: 1000px){
               .grid-item {
                padding: 0.25rem;
                opacity: 0.8;
               }
               #popdiv, #pop {
                 top: 10%;
                 background-color: white;
                 position: absolute;
                 min-width: 40vw;
                 min-height: 49vh;
               }
               .user-input-wrapper .column{
                padding: 1vh 5vw;
               }
              }
              @media only screen and (min-width: 1100px){
               .grid-item {
                padding: 0.32rem;
                opacity: 0.8;
               }

                #popdiv, #pop {
                  top: 20%;
                  left: 30%;
                  background-color: white;
                  position: fixed;
                  min-width: 40vw;
                  min-height: 49vh;
                }
                #pop{
                 top: 10%;
                }
                .user-input-wrapper .column{
                 padding: 1vh 1vw;
                }
                .user-input-wrapper .field-body{
                 width: 150px;
                }

              }
              #pop p{
               margin-bottom: 0.5rem;
              }
              #pop .card-header-title{
               margin: 0px;
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
      elem.style.backgroundSize="100% 100%";

     }

      </script>

      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
      // When the user clicks on div, open the popup
          $(function() {
   $("#but1").click(function() {
     $(".fullscreen-container").fadeTo(200, 1);
   });
   $("#but2").click(function() {
     $(".fullscreen-container").fadeOut(200);
   });
 });
           $(function() {

   $("#bt2").click(function() {
     $(".full-container").fadeOut(200);
   });
 });

           $(function () {
     $("#btnSub").click(function () {
     //  alert("hello");
         var tag = document.getElementById("complaint").value;
          var comp = $("input[name='prob']:checked").val();
          if(comp == 'Other'){
            comp = "Other: " + document.getElementById("otherdata").value;
          }
            // alert(tag);
             var val;
              var obj = JSON.parse(tr);
              var img = '<?php echo $x ;?>';
            //  alert(img);
           for(var b = 0; b < obj.cords.length ; b++){
           for(var c = 0 ; c< obj.cords[b].Tags.length;c++){
          // alert( obj.cords[b].Tags[c]);
           if(tag == obj.cords[b].Tags[c]){
             val = obj.cords[b].value;
            }
          }
        }
        $.post("complaint.php", //Required URL of the page on server
       { // Data Sending With Request To Server
           value:val,
           map:img,
           complaint:comp,
           tag:tag
       },
function(response,status){ // Required Callback Function
//alert("*----Received Data----*nnResponse : " + response+"nnStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
$(".fullscreen-container").fadeOut(200);
$("#form")[0].reset();

});
     });
 });

  var img = '<?php echo $x ;?>';


           //alert(nd);
      var nod = $.ajax({
    type: 'POST',
    url: "node.php",
    data: {map:img},
    dataType: 'json',
    context: document.body,
    global: false,
    async:false,
    success: function(data) {
        return data;
    }
}).responseText;

//alert(nod);
var a = nod.length ;
var tt = JSON.parse(nod);





      </script>
 <?php
       $res = mysqli_query($conn,"SELECT * FROM junctions WHERE map = '$x' ");
        $node = array();
        $i=0;
      while($ro = mysqli_fetch_assoc($res)){
          $node[$i]['value'] = $ro['value'];
          $node[$i]['name'] = $ro['name'];
          $node[$i]['Tags'] = $ro['Tags'];
          $node[$i]['Description'] = $ro['Description'];
          $node[$i]['audio'] = $ro['audio'];
          $node[$i]['image'] = $ro['image'];
          $i++;
      }
      ?>

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
         var select;
         var short;
        function clk(i){
          /*     for(var c = 0; c < tt.length; c++){
                //alert("aa");
                if(i==tt[c].value){
                document.getElementById("n").innerHTML=tt[c].name;
                document.getElementById("d").innerHTML=tt[c].Description;
                document.getElementById("t").innerHTML=tt[c].Tags;

              }
                yellow(i);
              }*/
         //document.getElementById("description").innerHTML="";
            if(find(i,chords)!=-1){
              select = i;
             //
              if(sel == 1){
                red(prev);
                sel = 0;
              }
           //     document.getElementById("description").innerHTML="";
                for (var c = 0; c < obj.cords.length; c++) {
           // green(obj.cords.value);
                if(i==obj.cords[c].value){
                  $(".full-container").fadeTo(200, 1);
               // document.getElementById("n").innerHTML=obj.cords[c].name;

               // document.getElementById("d").innerHTML=obj.cords[c].description;
                //document.getElementById("t").innerHTML=obj.cords[c].Tags;
               // document.getElementById("name").innerHTML=obj.cords[c].name;

               // document.getElementById("description").innerHTML=obj.cords[c].description;
              //  document.getElementById("tags").innerHTML=obj.cords[c].Tags;
              var img = '<?php echo $x ;?>';
              var test ;
              var cp = $.ajax({
         type: 'POST',
          url: "getcomplaint.php",
           data: {map:img, value:i},

        context: document.body,
        global: false,
        async:false,
        success: function(data) {
        //alert(data);
        return data;
        }
        }).responseText;

              var cpj = JSON.parse(cp);

              //alert(cpj);
        var nde = $.ajax({
         type: 'POST',
          url: "getnode.php",
           data: {map:img, value:i},

          context: document.body,
        global: false,
        async:false,
        success: function(data) {
        //alert(data);
        return data;
        }
        }).responseText;
             // alert(nde);
              var ob = JSON.parse(nde);
               document.getElementById("n").innerHTML=" "+ob.name;

                document.getElementById("d").innerHTML=ob.Description;
                document.getElementById("t").innerHTML=ob.Tags;
                
                
              if(cpj==null){
                document.getElementById('cpl').innerHTML=" ";
              }
              else{
                document.getElementById('cpl').innerHTML = cpj.complaint + " at " + cpj.Tag;
              }
                document.getElementById("ad").src = "audio/"+ob.audio;

                document.getElementById("preview").src ="img/"+ob.image;
              }
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
              for (var c = 0; c < obj.cords.length; c++) {
           // green(obj.cords.value);
                if(i==obj.cords[c].value){
                  document.getElementById("name").innerHTML=obj.cords[c].name;

                document.getElementById("description").innerHTML=obj.cords[c].description;
                document.getElementById("tags").innerHTML=obj.cords[c].Tags;}
                yellow(i);
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
        var cut;
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
         var img = '<?php echo $x ;?>';
      //   alert(src);
        var n = $.ajax({
         type: 'POST',
          url: "shortest.php",
           data: {map:img, source:sr, destination:des},

          context: document.body,
        global: false,
        async:false,
        success: function(data) {
        //alert(data);
        return data;
        }
        }).responseText;
        //  alert(n);
          short = JSON.parse(n);
        // alert(n);
        for(var i = 0 ; i < short.length ; i++){

          if(i==short.length-1){
            blue(next);

            return;
          }
          var curr = short[i].value;
          var next = short[i+1].value;
          make_path(curr,next);
          blue(curr);
          if(i==0){
            //blue(short[0].value);
            red(src);
          }
         cut = short[0].value;

        }



         document.getElementById("example2").style.opacity = 0.8;
         console.log(src+" "+dest);
       //  shortest_path();



        }
        //red(src);
        var temp_bool = false
        var initial;
        function dispred(){
          for(var i = 0 ; i < short.length;i++){
            red(short[i].value);
          }
        }

        function Next() {
          //var sele = select;
          //alert(short);
            // alert(cut);
          for(var i = 0 ; i < short.length; i++){
            //alert(short[i].value);
            if(cut == short[i].value){
              if(i == short.length - 1){
                document.getElementById("display_next").innerHTML = short[i].nextway;
                dispred();
                              yellow(short[i].value);
                break;
              }
              cut = short[i+1].value;
              document.getElementById("display_next").innerHTML = short[i].nextway;
              dispred();
              yellow(short[i].value);
              break;
            }
           // alert(short[i].nextway);
          }


        }
        function Previous() {
            for(var i = 0 ; i < short.length; i++){
            //alert(short[i].value);
            if(cut == short[i].value){
              if(i == short.length - 1){
                document.getElementById("display_next").innerHTML = short[i].prevway;
                dispred();
                              yellow(short[i].value);
                break;
              }
              cut = short[i-1].value;
              document.getElementById("display_next").innerHTML = short[i].prevway;
              dispred();
              yellow(short[i].value);
              break;
            }
           // alert(short[i].nextway);
          }
        }

      </script>


   </head>
   <body>
      <body onload="myfunction()">
       <nav class="navbar has-shadow is-light is-transparent" role="navigation" aria-label="main navigation">
         <div class="navbar-brand">
           <a class="navbar-item" href="">
            <span id="home" style="font-size: 1.5rem; font-family: 'PT Serif', serif;"><strong>InNav</strong></span><span style="font-size: 1.4rem; margin-left: 1vw; margin-right: 1vw; font-weight: 300;">Indoor Navigation Portal</span>
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
                 <a class="button is-primary" href="select.php">
                   <strong>Back to Menu</strong>
                 </a>
             </div>
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
         <div class="column is-flex level-item">
          <div class="level-item">
           <div class="way">

            <div class="">
             <a class="button is-link is-rounded" id="next" type = "button" onclick="Next()">Next</a>
             <a class="button is-link is-rounded" id="previous" type = "button" onclick="Previous()">Previous</a>
             <p id="display_next"></p>

            </div>

            <br><br>



            <div class="">
             <button id="but1" class="button is-warning">Complaint</button>
               <div class="fullscreen-container">
                <div id="popdiv">
                 <div class="card" style="width:100%;max-width:600px;margin:auto;">
                  <div class="card-header">
                   <p class="card-header-title">
                    Complaint Form
                   </p>
                  </div>
                  <div class="card-content">
                   <form method="post" id="form">
                    <p>Please fill the following fields to file your complaint.</p>
                    <div class="field is-horizontal">
                     <div class="field-label is-normal">
                       <label class="label">Service</label>
                     </div>
                     <div class="field-body">
                       <div class="field">
                         <div class="control">
                          <div class="select is-fullwidth">
                          <select name="complaint" id = "complaint" class="select">
                          <script language="javascript" type="text/javascript">
                           var obj = JSON.parse(tr);
                           for(var b=0;b<obj.cords.length;b++){
                              for(var c =0; c< obj.cords[b].Tags.length ; c++){
                                 if(obj.cords[b].Tags[c]!="undefined")
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

                     <div class="field is-horizontal">
                      <div class="field-label is-normal">
                        <label class="label">Complaint</label>
                      </div>
                      <div class="field-body">
                        <div class="field">
                         <script type="text/javascript">
                           function showtx() { document.getElementById('otherdata').style.display = 'block'; }
                           function hidetx() { document.getElementById('otherdata').style.display = 'none'; }
                         </script>
                          <div class="control">
                             <input type="radio" name="prob" value="Service provider unavailable" id="provider_missing" onclick="hidetx();" />Service provider unavailable<br />
                             <input type="radio" name="prob" value="Service is down" id="disabled" onclick="hidetx();" />Service is down<br />
                             <input type="radio" name="prob" value="Unserviceable" id="unserviceable" onclick="hidetx();" />Unserviceable<br />
                             <input type="radio" name="prob" value="Service Obsolete" id="obsolete" onclick="hidetx();" />Service Obsolete<br />
                             <input type="radio" name="prob" value="Other" id="other" onclick="showtx();" />Other<br />
                             <input id="otherdata" style="display: none;" name="otherdata" class="textarea" type="textarea" placeholder="Describe your complaint here."></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="columns" style="margin-top: 4vh; margin-bottom: 1vh;">
                     <div class="column" style="margin-right: 2vw;">
                      <p class="control">
                        <a class="button is-success is-fullwidth is-medium" id="btnSub">
                          Submit
                        </a>
                      </p>
                     </div>
                     <div class="column">
                      <p class="control">
                        <a class="button is-light is-fullwidth is-medium" id="but2">
                          Cancel
                        </a>
                      </p>
                     </div>
                    </div>
                   </form>
                  </div>
                 </div>

                </div>
              </div>

           </div>

           </div>
          </div>
         </div>


         <div class="full-container">
          <div id="pop">
           <div class="card" style="width:100%;max-width:600px;margin:auto;">
            <div class="card-header">
             <p class="card-header-title">
              Junction information
             </p>
            </div>
            <div class="card-content">
              <label class="label" style="display: inline-block; padding-right: 0.5vw;">Name: </label><p style="display: inline-block;" id="n"></p><br />
              <label class="label" style="display: inline-block;padding-right: 0.5vw;" >Description: </label><p id="d" style="display: inline-block;"></p><br />
              <label class="label" style="display: inline-block;padding-right: 0.5vw;">Services: </label><p id="t" style="display: inline-block;"></p><br />
              <label class="label" style="display: inline-block;padding-right: 0.5vw;">Active Complaint: </label><p style="display: inline-block;" id="cpl"></p><br />
              <label class="label" style="display: inline-block;padding-right: 0.5vw;">Audio Landmark: </label><p id="audio" style="display: none;"></p> <audio controls style="width: 100%; height: 5vh;" src="" id='ad'></audio><br />
              <label class="label" style="display: inline-block;padding-right: 0.5vw;">Image Landmark: </label><p id="image" style="display: none;"></p> <img src="" style="max-width: 100%; max-height:30vh;" id="preview">
              <a class="button is-light is-fullwidth is-medium" id="bt2" style="margin-top: 4vh;">
                OK
              </a>
           </div>
          </div>
       </div>
      </div>


         <div class="column is-half is-flex">
          <div class="level-item">
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
            <br>

          </div>

         </div>
         <div class="column" style="padding: 5vh 0.75vw;">
          <div class="color-key">
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


        <div class="user-input-wrapper">
         <div class="columns">
          <div class="column"></div>
          <div class="column">
           <div class="columns">
            <div class="column">
             <div class="field is-horizontal is-expanded">
               <div class="field-label is-normal" style="margin-right: 1vw">
                 <label class="label">Source</label>
               </div>
               <div class="field-body">
                 <div class="field">
                   <div class="control">
                     <div class="select is-fullwidth">
                      <select name="source" id = "source" class="select is-fullwidth">
                       <script language="javascript" type="text/javascript">
                           //var tr = '{"cords":[{"value":5626,"connected_nodes":[4726],"Tags":["entry"]},{"value":3226,"connected_nodes":[4726,3229,2226],"Tags":[]},{"value":3229,"connected_nodes":[3226],"Tags":["stairs","help desk"]},{"value":2226,"connected_nodes":[3226,2240],"Tags":[]},{"value":2240,"connected_nodes":[2226],"Tags":[]},{"value":4726,"connected_nodes":[3226,5626,4750],"Tags":[]},{"value":4750,"connected_nodes":[4726],"Tags":["gents washroom","ladies washroom"]}]}'
                          var obj = JSON.parse(tr);
                          for(var b=0;b<obj.cords.length;b++){

                             for(var c =0; c< obj.cords[b].Tags.length ; c++){
                            if(obj.cords[b].Tags[c]!="undefined")
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
            </div>
            <div class="column">
             <div class="field is-horizontal">
               <div class="field-label is-normal" style="margin-right: 1vw">
                 <label class="label">Destination</label>
               </div>
               <div class="field-body">
                 <div class="field is-expanded">
                   <div class="control">
                     <div class="select is-fullwidth">
                      <select name="destination" id = "destination" class="select is-fullwidth">
                       <script language="javascript" type="text/javascript">
                          //var tr = '{"cords":[{"value":5626,"connected_nodes":[4726],"Tags":["entry"]},{"value":3226,"connected_nodes":[4726,3229,2226],"Tags":[]},{"value":3229,"connected_nodes":[3226],"Tags":["stairs","help desk"]},{"value":2226,"connected_nodes":[3226,2240],"Tags":[]},{"value":2240,"connected_nodes":[2226],"Tags":[]},{"value":4726,"connected_nodes":[3226,5626,4750],"Tags":[]},{"value":4750,"connected_nodes":[4726],"Tags":["gents washroom","ladies washroom"]}]}'
                         var obj = JSON.parse(tr);
                        for(var b=0;b<obj.cords.length;b++){

                            for(var c =0; c< obj.cords[b].Tags.length ; c++){
                           if(obj.cords[b].Tags[c]!="undefined")
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
            </div>
            <div class="column">
             <div class="level-item">
              <a class="button is-success is-normal is-fullwidth" id = "submit" type = "button" onclick = "Submit()" style="">Submit</a>
             </div>
            </div>
           </div>

          </div>
          <div class="column"></div>
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
user.php
Displaying user.php.
