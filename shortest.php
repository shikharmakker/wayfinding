<?php include('Constants.php') ?>
<?php



//echo $t;die;
$x = $_POST['map'];
$sr_t = $_POST['source'];
$det_t = $_POST['destination'];
$src_t = trim($sr_t, '"');
$dest_t = trim($det_t,'"');

$sql = "SELECT JSON_string FROM maps_data WHERE name = '$x' and version=0";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$r = json_decode($row['JSON_string'], true);
$c = $r['cords'];
    //  print_r($v);
//$src_t = $_GET['source'];
//$dest_t = $_GET['destination'];


foreach ($c as $key => $value) {
  # code...
  $tags = $value['Tags'];
  foreach ($tags as $k => $v) {
    # code...
    if($src_t == $v){
      $src = $value['value'];
      break;
    }
    if($dest_t == $v){
      $dest = $value['value'];
      break;
    }
  }
}

$chords = [];
$connected_nodes = [];
foreach ($c as $key => $value) {
      $chords[$key]['value'] = $value['value'];
    //  $nodes[$key]['connected_nodes'] = $value['connected_nodes'];
      foreach ($value['connected_nodes'] as $kt => $vt) {
            $connected_nodes[$key][$kt] = $value['connected_nodes'][$kt];
      }
}

require("Dijkstra.php");

function length($A,$B){
  $x1 = floor($A/100);
      $x2 = floor($B/100);
      $y1 = $A%100;
      $y2 = $B%100;
      $z = pow(($x2-$x1),2)+pow(($y2-$y1),2);
          //console.log("A,B:"+A+" "+B+"z: "+z);
          return sqrt($z);
}

function getname($a){
  global $chords;
  global $c;

  for($b =0 ; $b<count($chords);$b++){
                if($chords[$b]['value'] == $a){
                  //echo $a;
                  return $c[$b]['name'];
              }
                     }
}


function div($a){
  return floor($a/100);
}
function mod($a){
  return ($a%100);
}

function slope($p , $t ){
  if($p==NULL || $t == NULL){
    return 0;
  }
  $px =  mod($p);
  $py = div($p);
  $tx = mod($t);
  $ty = div($t);
 // $nx = mod($n);
 // $ny = div($n);
  $sl = ($ty - $py)/($tx - $px);
  return $sl;

}

 function sl($a,$b){
    $ax = mod($a);
    $ay = div($a);
    $bx = mod($b);
    $by = div($b);
    $slope = @(($by - $ay)/($bx - $ax));
    return $slope;
  }

  function dirn($para,$p,$t,$n){
    $px = mod($p);
    $py = div($p);
    $tx = mod($t);
    $ty = div($t);
    $nx = mod($n);
    $ny = div($n);
    $slp = sl($p,$t);
    $sln = sl($t,$n);
    //if($slp)
    if($p == NULL && $para == 1){
      if($ny - $ty == 0){
        $dist = round(abs(($nx - $tx)*0.46));
      }
      else{
        $dist = round(abs(($ny - $ty)*0.392));
      }
      return "Move $dist m Straight";
    }
    if($n == NULL && $para == 1){
      return "You have reached your Destination";
    }
    if($p ==  NULL && $para == 0){
      if($ny - $ty == 0){
        $dist = round(abs(($nx - $tx)*0.46));
      }
      else{
        $dist = round(abs(($ny - $ty)*0.392));
      }
      return "Move $dist m Straight";
    }
    if($n ==  NULL && $para == 0){
      return "You have reached to the Source";
    }
    if($slp == $sln){
      if(($ny - $ty) == 0){
        $dist = round(abs(($nx - $tx)*0.46));
      }
      else{
        $dist = round(abs(($ny - $ty)*0.392));
      }
      return "Move $dist m Straight";
    }
    else if(($tx - $px )> 0){
      $dist = round(abs(($ny - $ty)*0.392));
      if(($ny - $ty) > 0){
        return "Turn to your Right and Move $dist m Striaght";
      }
      else if(($ny - $ty) < 0){
        return "Turn to your Left and Move $dist m Striaght";
      }
    }
    else if(($tx - $px )< 0){
      $dist = round(abs(($ny - $ty)*0.392));
      if(($ny - $ty) > 0){
        return "Turn to your Left and Move $dist m Striaght";
      }
      else if(($ny - $ty) < 0){
        return "Turn to your Right and Move $dist m Striaght";
      }
    }
    else if(($ty-$py)>0){
      $dist = round(abs(($nx - $tx)*0.46));
      if(($nx - $tx) > 0){
        return "Turn to your Left and Move $dist m Striaght";
      }
      else if(($nx - $tx) < 0){
        return "Turn to your Right and Move $dist m Striaght";
      }
    }
    else if(($ty-$py)<0){
      $dist = round(abs(($nx - $tx)*0.46));
      if(($nx - $tx) > 0){
        return "Turn to your Right and Move $dist m Striaght";
      }
      else if(($nx - $tx) < 0){
        return "Turn to your Left and Move $dist m Striaght";
      }
    }
  }
  //echo dirn(2930,3930,3955);

function runTest() {
  $g = new Graph();
  global $c;
  global $src;
  global $dest;
  global $chords;
  global $connected_nodes;
  //echo $src;die;
  foreach ($chords as $key => $value) {
    foreach ($connected_nodes[$key] as $k => $v) {
      # code...
      $g->addedge($value['value'],$connected_nodes[$key][$k],length($value['value'],$connected_nodes[$key][$k]));
    }
    
  }

 


  list($distances, $prev) = $g->paths_from($src);
  
  $path = $g->paths_to($prev, $dest);
  
  
  $t = array();
  for($q = 0; $q < count($path); $q++){
    $pr = NULL;
    $nex = NULL ;
            $tem = $path[$q];
            if($q < count($path) - 1)
            $nex = $path[$q+1];
            if($q > 0)
            $pr = $path[$q-1];
            
          
            for($b = 0; $b < count($chords);$b++){
            if($tem == $chords[$b]['value']){
            //  t[q] = obj.cords[b].description;
              $t[$q]['value'] = $chords[$b]['value'];
              $t[$q]['description'] = $c[$b]['description'];
              $t[$q]['name'] = $c[$b]['name'];
              $t[$q]['Tags'] = $c[$b]['Tags'];
              $t[$q]['prevway'] = dirn(0, $nex,$tem,$pr);
              $t[$q]['nextway'] = dirn(1, $pr,$tem,$nex);
             // $t[$q]['nxt'] = dirn($pr,$tem,$nex);
              $t[$q]['x'] = mod($tem);
              $t[$q]['y'] = div($tem);
            //  $t[$q]['nextslope'] = slope($tem,$nex);
             // $t[$q]['prevslope'] = slope($prev,$tem);
              //$t[$q] = ('value'=> $chords[$b] , 'description'=> , 'name'=> $c[$b]['name'], 'Tags'=> $c[$b]['Tags'], 'nextway'=> $rnex, 'prevway'=> $rprev);
              break;
            }
          } 
        }
  
  print_r(json_encode($t));
  
}


runTest();





