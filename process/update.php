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
		$stmt="select duedate from users where users.user_id=$user_id";
		echo "reached at line 13";
		$result=mysqli_query($conn,$stmt);
		if ($result) {
			echo "reached at line 15";
		}
		else
			echo "reached at line 18";
		$row=mysqli_fetch_array($result);
		$date =$row['duedate'];

		if ($duedate == 1) {
		  date_add($date,date_interval_create_from_date_string("1 months"));
		}
		else if($duedate ==3){
		  date_add($date,date_interval_create_from_date_string("3 months"));
		}
		else if($duedate==6){
		  date_add($date,date_interval_create_from_date_string("6 months"));
		}
		else{
		  date_add($date,date_interval_create_from_date_string("12 months"));
		}
		$duedate=date_format($date,"Y-m-d");
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