<?php
$duedate=$_POST['date'];
$user_id=$_POST['user_id'];

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
include "../pages/connect.php";
	if(!empty($firstname) || !(empty($lastname))){
	$stmt="update users set duedate='$duedate',firstname='$firstname',lastname='$lastname' where user_id=$user_id";
	}
	else{
		$stmt="update users set duedate='$duedate' where user_id=$user_id";
	}
$result=mysqli_query($conn,$stmt);
if($result){
	$message="Date is now updated to ".$duedate."";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
	header("location:search.php");
}
else{
	echo "error";
}
?>