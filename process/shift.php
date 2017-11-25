<?php
$id=$_POST['id'];

include"../pages/connect.php";

$stmt_1="select duration from pending where user_id=$id";
$result_1=mysqli_query($conn,$stmt_1);
$row_1=mysqli_fetch_array($result_1);
$duration=$row_1['duration'];
$x=$duration." days";

$today=date('Y-m-d');
$date=date_create($today);

date_add($date,date_interval_create_from_date_string($x));
$plan=date_format($date,"Y-m-d");


$stmt_2="update users set duedate='$plan' where user_id=$id";
$stmt_3="update status set status=1 where user_id=$id";
$result_2=mysqli_query($conn,$stmt_2);
$result_3=mysqli_query($conn,$stmt_3);

if($result_2 && $result_3){
	mysqli_query($conn,"delete from pending where user_id=$id");
	echo"Successfully shifted! Tap refresh to see updated ones";
}
else{
	echo "Sorry";
}




?>