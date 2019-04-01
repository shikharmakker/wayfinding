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
<script type="text/javascript">
  
  //alert(count);
  var tr = '<?php echo $r ;?>';
  //alert(tr);
  var obj = JSON.parse(tr); 
  for(var i = 0 ; i < obj.length ; i++){

  }
  //var obj = JSON.parse(tr);
 // alert(obj);


</script>
  <meta charset="utf-8">

  <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">

  <title>Select</title>
 </head>
 <body>
  <select name="destination" id = "destination">
        <script language="javascript" type="text/javascript">
          for(var b=0;b<obj.length;b++){
              document.write("<option>"+obj[b].building+"</option>");
          }
        </script>
</select>
 <select name="destination" id = "destination">
        <script language="javascript" type="text/javascript">
          for(var b=0;b<obj.length;b++){
              document.write("<option>"+obj[b].building+"</option>");
          }
        </script>
</select>
 <button class="button"id = "submit" type = "button" onclick = "Submit()">Submit</button><br>



 </body>
</html>
