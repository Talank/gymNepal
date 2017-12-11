<?php

	include"../pages/connect.php";
	include "functions.php";
	$query=mysqli_query($conn,"select user_id,duedate from users");
	if($query) {
		$today=date_create(date('y-m-d',time()));//Get the current Date
		while($row=mysqli_fetch_array($query)) {
			$duedate=date_create($row['duedate']);//Get the due date
			$user_id=$row['user_id'];//Get the user_id
			if((date_diff($duedate,$today))->format("%R%a")<=1) {//Check if users is near expiry
				$query1=mysqli_query($conn,"select phone from information where user_id=$user_id Limit 1");
				if($query1) {
					$row1=mysqli_fetch_array($query1);
					$phone="+977".$row1['phone'];//Get the users phone also add the country code(which can be done in sendSms() if required)
					sendSms("Your Gym Period will expire tomorrow",$phone,"GymNepal");//Call the function to send sms

				}
			}
		}
	}	
?>