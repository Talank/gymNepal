<?php
include"connect.php";
$user_id=$_GET['id'];
date_default_timezone_set('GMT+5.45');

 $date=date("Y/m/d");
$time=date("h:i:s");

 $clock=date("a");


$stmt="INSERT into attendance values ('',$user_id,'$date','$time','$clock')";
$result=mysqli_query($conn,$stmt);
if($result){
  header("location:search.html");
}
else{
	echo "sorry error!";
}

?>