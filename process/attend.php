<?php
include"../pages/connect.php";
$user_id=$_GET['id'];
date_default_timezone_set('Asia/Kathmandu');

 $date=date("Y/m/d");
$time=date("h:i:s");

 $clock=date("a");


$stmt="INSERT into attendance(user_id,dates,time,clock) values ($user_id,'$date','$time','$clock')";
$result=mysqli_query($conn,$stmt);
if($result){
  header("location:search.php");
}
else{
	echo "sorry error!";
}

?>