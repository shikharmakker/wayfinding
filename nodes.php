<?php include('Constants.php'); ?>
<?php

//$x = $_GET['RN'];
$floor = $_GET['floor'];
$building = $_GET['building'];
$x = $building.$floor;
$sql = "SELECT JSON_string FROM maps_data WHERE name = '$x' and version=0";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$r = json_decode($row['JSON_string'], true);
$c = $r['cords'];
$tags;
$tag;
$ct = 0;

function div($a){
  return floor($a/100);
}
function mod($a){
  return ($a%100);
}

foreach ($c as $key => $value) {
	# code...
	$tags = $value['Tags'];
	foreach ($tags as $k => $v) {
		# code...
		if($v == "undefined"){
			continue;
		}
		$val = $value['value'];
		$tag[$ct]['value'] = $val;
		$tag[$ct]['Tags'] = $v;
		$tag[$ct]['x'] = mod($val);
		$tag[$ct]['y'] = div($val);
		$ct++; 
	}
}
$t = array('cords'=>$tag);
$j = json_encode($t);
print_r($j);

?>