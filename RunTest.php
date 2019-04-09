<?php include('Constants.php') ?>
<?php

$floor = $_GET['floor'];
$building = $_GET['building'];
$x = $building.$floor;

$sql = "SELECT JSON_string FROM maps_data WHERE name = '$x' and version=0";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$r = json_decode($row['JSON_string'], true);
$c = $r['cords'];
    //  print_r($v);
$src_t = $_GET['source'];
$dest_t = $_GET['destination'];


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

function way($a,$q){

          $str;
       //   echo gettype($q);
          //a = tem , q = next

          if($q == NULL || $q<0){
            return "stay";
          }
          if(($q-$a) > 0){
            $str = "go east to ".getname($q);
          }
          else if(($q-$a) > -60 && ($q-$a)<0){
            $str = "go west to ".getname($q);
          }
          else if(($q-$a)>=100){
            $str = "go south to ".getname($q);
          }
          else{
            $str = "go north to ".getname($q);
          }
          return $str;
         
}

function way1($p,$t,$n){
    $str;
    $nx = $n%100;
    $ny = floor($n/100);
    $tx = $t%100;
    $ty = floor($t/100);
    $px = $p%100;
    $py = floor($p/100);
    $sp1 =($ny - $ty)/($nx - $tx);
    $sp2 =($ty - $py)/($tx - $px);

    $m = $sp1 * $sp2;
    if($m == 0){
      
          $str = "go straight to" .getname($n);
       
    }
    if($m==-1){
        if()
    }


    $d_1 = $n - $t;
    $d_2 = $t - $p;


}

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
  $nex = NULL ;
  
  $t = array();
  for($q = 0; $q < count($path); $q++){
    $pr = NULL;
            $tem = $path[$q];
            if($q < count($path)-1)
            $nex = $path[$q+1];
            
            if($q>0){
            $pr = $path[$q-1];}
            
             //echo gettype($pr);
            $rnex =  way($prev,$tem,$nex);
            $rprev = way($tem,$pr);
            
            for($b = 0; $b < count($chords);$b++){
            if($tem == $chords[$b]['value']){
            //  t[q] = obj.cords[b].description;
              $t[$q]['value'] = $chords[$b]['value'];
              $t[$q]['description'] = $c[$b]['description'];
              $t[$q]['name'] = $c[$b]['name'];
              $t[$q]['Tags'] = $c[$b]['Tags'];
              $t[$q]['prevway'] = $rprev;
              $t[$q]['nextway'] = $rnex;
              //$t[$q] = ('value'=> $chords[$b] , 'description'=> , 'name'=> $c[$b]['name'], 'Tags'=> $c[$b]['Tags'], 'nextway'=> $rnex, 'prevway'=> $rprev);
              break;
            }
          } 
        }
  
  print_r(json_encode($t));
  
}


runTest();






/*foreach ($c as $key => $value) {
  # code...
  $tag = $value['Tags'];
  $ta = implode($tag);
  //   $string = $src_t;
  
    if (strstr($ta,$src_t))
    {  
          $src = $value['value'];
       // echo $value['name'];
    }
    if(strstr($ta,$dest_t))
    {
        $dest = $value['value'];
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
}*/