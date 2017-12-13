<?php
	session_start();
	$plan=$_POST['date'];
	$_SESSION['user_id']=$user_id=$_POST['user_id'];
	$_SESSION['due']=$dueAmount=$_POST['dueAmount'];
	$amount=$_POST['amount'];
	$discount=$_POST['discount'];
	$tender=$_POST['tender'];
	$totalDue=$_POST['preDueAmount']+$_POST['dueAmount'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	include "../pages/connect.php";
	if(!(empty($firstname)) || !(empty($lastname))){
		$query=mysqli_query($conn,"select due from duebalance where user_id=$user_id LIMIT 1");
		if($query) {
			$row=mysqli_fetch_array($query);
			if(isset($_POST['cutPrevious'])) {
				$amount+=$row['due'];
			} else {
				echo 'cutPrevious not set';
			}
		}
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
				if($query) {
					mysqli_query($conn,"insert into duebalance values ($user_id,$totalDue)");
				}
			} 
		} else {//Update user due amount and redirect to bill.php
			$query=mysqli_query($conn,"update duebalance set due=$totalDue where user_id =$user_id");
			
		}
		if($totalDue==0) {//Check if the total due is cleared or not
			$query=mysqli_query($conn,"delete from duebalance where user_id=$user_id");
		}
		header("location:bill.php?amount=$amount&&discount=$discount&&tender=$tender");
	} else{
		echo "not found";
	}
?>