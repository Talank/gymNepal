<?php

	include"../pages/connect.php";
	include "functions.php";
	$today=date('y-m-d');
	$query=mysqli_query($conn,"select *,datediff('".$today."',duedate) as count from users");
	if($query) {
		echo 'inside query'.mysqli_affected_rows($conn);
		while($row=mysqli_fetch_array($query)) {
			$user_id=$row['user_id'];//Get the user_id
			if($row['count']>1) {//We are simply checking the count
				//This will send multiple sms ,so prevent this extra info should be stored in database
				//about the users that have already been sent sms
				$query1=mysqli_query($conn,"select phone from information where user_id=$user_id Limit 1");
				if($query1) {
					$row1=mysqli_fetch_array($query1);
					$phone="+977".$row1['phone'];//Get the users phone also add the country code(which can be done in sendSms() if required)
					sendSms("Your Gym Period will expire tomorrow",$phone,"GymNepal");//Call the function to send sms

				}
			}
		}
	} else {
		echo mysqli_error($conn);
	}	
?>