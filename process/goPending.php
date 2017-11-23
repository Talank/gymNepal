<?php
include"../pages/connect.php";
$id=$_GET['id'];
 $date=date("Y-m-d");

$stmt_1="select datediff(duedate,now()) as count from `users` where user_id='$id'";
$result_1=mysqli_query($conn,$stmt_1);
 $row_1=mysqli_fetch_array($result_1);
 $duration=$row_1['count'];

 if($duration>0){
     if($duration<7){
     	echo "<script type='text/javascript'>alert('Sorry less than 7 days can not be pended.Thank you');</script>";

     	
    	 }
     else{
		$stmt_2="INSERT into `pending` values($id,$duration,'$date')";
		$stmt_3="UPDATE `status` set status=0 where user_id=$id";
		$result_2=mysqli_query($conn,$stmt_2);
		$result_3=mysqli_query($conn,$stmt_3);
			if($result_2 && $result_3){
					echo "<script type='text/javascript'>alert('successful');</script>";
				   header("location:search.php");
			}
			else{
				echo "error in pending";
			}
	}

}
else{
	echo"Sorry! your duration is already finished!";
}

?>