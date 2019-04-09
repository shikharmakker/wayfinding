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
foreach ($c as $key => $value) {
	# code...
	$tags = $value['Tags'];
	foreach ($tags as $k => $v) {
		# code...
		$val = $value['value'];
		$tag[$ct]['value'] = $val;
		$tag[$ct]['Tags'] = $v;
		$ct++; 
	}
}
$j = json_encode($tag);
print_r($j);

?>