<?php
  $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "";
      $database="test";
      $conn = new mysqli($dbhost, $dbuser, $dbpass,$database);
      $sql = "SELECT JSON_string FROM test.first_test WHERE name = 'shikharaiims' limit 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

$src_tag = $_GET['source'];
$dest_tag = $_GET['destination'];

//echo $arr['JSON_string'];
?>
<script>

		var tr = '<?php echo $row['JSON_string'] ;?>';
		var cords = [];
        var connected_nodes = [];
        for (var temp = 0; temp < 3600 ; temp++) {
            connected_nodes[temp] = [];
        }
         var src_tag,dest_tag;
         src_tag = <?php echo $src_tag; ?>;
         dest_tag = <?php echo $dest_tag; ?>;
         var shortest_path_var = [];
        var src_bool = false,dest_bool = false;
        var src,dest;
        var sel = 0;
         var prev = -1;
         var obj = JSON.parse(tr);
         src = src_tag;
         dest = dest_tag;
          
      function find(key,array){
           for (var i = 0; i < array.length; i++) {
             if (array[i] == key) {
               return i;
             }
           }
           return -1;
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
          
      for(var b =0 ; b<obj.cords.length;b++){
      	cords[b] = chords[b];
      	for(var i = 0; i < obj.cords[b].connected_nodes.length;i++){
      		connected_nodes[b][i] = connected[b][i];

      	}
      	if(obj.cords[b].name==src_tag)
              src = obj.cords[b].value;
            if(obj.cords[b].name==dest_tag)
              dest = obj.cords[b].value;
         
      }
           
      
      shortest_path();
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
           // make_path(path[b],path[b+1]);
            //blue(path[b]);
           }
          // blue(path[b]);
            // document.getElementById("display_name").innerHTML=" ";
         /*  for (var b = path.length-1; b >=0 ; b--) {
             for (var c = 0; c < obj.cords.length; c++) {
               if(path[b]==obj.cords[c].value){
                 if(b!=0)
                      document.getElementById("display_name").innerHTML+=obj.cords[c].name+",";
                 else
                      document.getElementById("display_name").innerHTML+=obj.cords[c].name;
               }
             }
           }*/
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
          //alert(src);
         // alert(cords);
          var o = 0;
          while(queue.length != 0){
            var u = queue.shift();    //equivalent to pop
            var inde = find(u,cords);
            o++;
            //alert(inde);
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


   
          console.log(src+" "+dest);
         




        var a,s;
          s = JSON.stringify(shortest_path_var);
          var t = [];
        //  alert(shortest_path_var);

           for(var q = 0; q < shortest_path_var.length; q++){
          	var tem = shortest_path_var[q];
          	for(var b = 0; b < obj.cords.length;b++){
          	if(tem == obj.cords[b].value){
          	//	t[q] = obj.cords[b].description;
          		t[q] = {value: obj.cords[b].value , description: obj.cords[b].description, name: obj.cords[b].name, Tags: obj.cords[b].Tags};
          		break;
          	}
          }	
        }
         s = JSON.stringify(t);
        //  alert(s);
          document.write(s);

</script>