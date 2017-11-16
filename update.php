<?php
$duedate=$_POST['date'];
$user_id=$_POST['user_id'];

include "connect.php";
$stmt="update users set duedate='$duedate' where user_id='$user_id'";
$result=mysqli_query($conn,$stmt);
if($result){
	$message="Date is now updated to ".$duedate."";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
	header("location:index.html");
}
else{
	echo "error";
}
?>