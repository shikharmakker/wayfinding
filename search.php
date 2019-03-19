<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","","test");
    $query=mysqli_query($con, "select * from test.first_test where name = 'shikharaiims'");
 
    $row = mysqli_fetch_assoc($query);
   // AND JSON_string LIKE '%{$key}%'
    echo json_encode($row);
    mysqli_close($con);
?>