<?php
 $plan=$_POST['date'];
 $user_id=$_POST['user_id'];

 echo $firstname=$_POST['firstname'];
 echo $lastname=$_POST['lastname'];
include "../pages/connect.php";
	
	   if(!(empty($firstname)) || !(empty($lastname))){
        $stmt2="select duedate from users where user_id=$user_id";
        $result2=mysqli_query($conn,$stmt2);
        $row2=mysqli_fetch_array($result2);
        $date=date_create($row2['duedate']);
        if($plan==0){
          date_add($date,date_interval_create_from_date_string("0 months"));
        }
		else if ($plan == 1) {
		  date_add($date,date_interval_create_from_date_string("1 months"));
		}
		else if($plan ==3){
		  date_add($date,date_interval_create_from_date_string("3 months"));
		}
		else if($plan==6){
		  date_add($date,date_interval_create_from_date_string("6 months"));
		}
		else{
		  date_add($date,date_interval_create_from_date_string("12 months"));
		}
		echo $plan=date_format($date,"Y-m-d");


		$stmt="update users set duedate='$plan',firstname='$firstname',lastname='$lastname' where user_id=$user_id";
			
		$result=mysqli_query($conn,$stmt);
		if($result){
			$message="Date is now updated to ".$duedate."";
			
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("location:search.php");
		}
		else{
			echo "error";
		}
	}
?>