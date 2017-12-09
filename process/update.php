<?php
session_start();
$plan=$_POST['date'];
$_SESSION['user_id']=$user_id=$_POST['user_id'];
$_SESSION['due']=$dueAmount=$_POST['dueAmount'];
//$_SESSION['amount']=$_POST['amount'];
$amount=$_POST['amount'];
$totalDue=$_POST['preDueAmount']+$_POST['dueAmount'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
include "../pages/connect.php";
	
	   if(!(empty($firstname)) || !(empty($lastname))){
        $stmt2="select duedate from users where user_id=$user_id";
        $result2=mysqli_query($conn,$stmt2);
        $row2=mysqli_fetch_array($result2);
        $date=date_create($row2['duedate']);
		$todayDate=date_create(date('y-m-d',time()));
		if((date_diff($date,$todayDate))->format("%R%a")>0) {//Check user schedule
			$date=$todayDate;//Change the date to current as user is behind schedule
		}
		/*
		*Check For $plan values
		*If $plan is 0,the the user is just trying to clear his due
		*Otherwise the user is increasing his due date
		*/
		if($plan!=0) {
			date_add($date,date_interval_create_from_date_string($plan." months"));
			$plan=date_format($date,"Y-m-d");
			$stmt="update users set duedate='$plan',firstname='$firstname',lastname='$lastname' where user_id=$user_id";
			$result=mysqli_query($conn,$stmt);
			if($result){
				//$message="Date is now updated to ".$duedate."";
				/*
				*From calculations $totalDue is always +ve so add to the database directly
				*A if statement can be used if felt any doubt
				*If the $query is true,the user already had a deu and his due is not updated
				*Otherwise the user has kept deu,and it needs to be inserted to the duebalance table
				*/
				$query=mysqli_query($conn,"update duebalance set due=$totalDue where user_id =$user_id");
<<<<<<< HEAD

				if($query) {
					mysqli_query($conn,"insert into duebalance values ($user_id,$totalDue)");

=======
				if($query) {
					$query=mysqli_query($conn,"insert into duebalance(user_id,due) values ($user_id,$totalDue)");
>>>>>>> eb77b6d46293c01ecacfc92cd8e63fc8a84d21ec
				}
				header("location:bill.php?amount=$amount");
			}
		} else {//Update user due amount and redirect to bill.php
			$query=mysqli_query($conn,"update duebalance set due=$totalDue where user_id =$user_id");
			header("location:bill.php?amount=$amount");
		}
		//Coding Redundancy
		
   /*     if($plan==0){
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
		echo $plan=date_format($date,"Y-m-d");*/


		
		//The following code is to be removed

	/*	//if (!is_nan($dueAmount)) {
			$stmt3="select * from duebalance where user_id =$user_id";
			$result3=mysqli_query($conn,$stmt3);
			$nums=mysqli_num_rows($result3);
			
			if ($nums>0)
				$stmt4="update duebalance set due=due+$dueAmount where user_id =$user_id";
				
			else
				$stmt4="insert into duebalance values ($user_id,$dueAmount)";

				

			
			$result4=mysqli_query($conn,$stmt4);
			if($result4){
				header("location:bill.php?amount=$amount");
			}*/
		// }
		// else
		// 	echo "Due not a number";
	}
?>