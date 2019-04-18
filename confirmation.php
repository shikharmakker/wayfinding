<?php

include('Constants.php');

// Passkey that got from link 
$passkey=$_GET['passkey'];

$tbl_name1="temp_admin";

// Retrieve data from table where row that match this passkey 
$sql1="SELECT * FROM $tbl_name1 WHERE confirm ='$passkey'";
$result1=mysqli_query($conn,$sql1);

// If successfully queried 
if($result1){

// Count how many row has this passkey
$count=mysqli_num_rows($result1);

// if found this passkey in our database, retrieve data from table "temp_members_db"
if($count==1){

$rows=mysqli_fetch_array($result1);
$last = $rows['lastname'];
$first=$rows['firstname'];
$email=$rows['email'];
$password=$rows['password'];
$user = $first.$last;
$tbl_name2="admin";
//$sql2="INSERT INTO $tbl_name2(firstname,lastname,email,username,password)VALUES('$first','$last','$email','$user','$password')";
//$result2=mysqli_query($conn,$sql2);
$sql3="DELETE FROM $tbl_name1 WHERE confirm = '$passkey'";
$result3=mysqli_query($conn,$sql3);
echo "Your account has been activated";

}

// if not found passkey, display message "Wrong Confirmation code" 
else {
echo "Account already Activated";
}

// if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"



// Delete information of this user from table "temp_members_db" that has this passkey 



}
?>