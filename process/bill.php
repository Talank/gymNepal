<?php
	session_start();
	$user_id=$_SESSION['user_id'];
	include"../pages/connect.php";
	$result=mysqli_query($conn,"SELECT * from users where user_id=$user_id");
	//left join duebalance on users.user_id=duebalance.user_id and users.
	$row=mysqli_fetch_array($result);

	$stmt1="select due from duebalance where user_id=$user_id";
	$result1=mysqli_query($conn,$stmt1);
	$nums1=mysqli_num_rows($result1);
	if ($nums1>0) {
		$row1= mysqli_fetch_array($result1);
		$due = $row1['due'];
	}
	else
		$due=0;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bill</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	


</head>
<body>
	<div class="well">
		<h3 class="text-center">BILLING TERMINAL</h3>
	</div>
	<div class="jumbotron text-center">
		<img src=../Images/bullsgym.jpg width="80" height="80" class="img-rounded" alt="Bulls Gyms">
		<div  align="center"><p>Bulls Gym Association,Nayabazar</p></div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Reciept
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td>
										Name
									</td>
									<td class="text-left">
										<b><?php echo $row['firstname']." ". $row['lastname']; ?></b>
									</td>
								</tr>
								<tr>
									<td>
										Registration id
									</td>
									<td  class="text-left">
										<b><?php echo $row['user_id']; ?></b>
									</td>
								</tr>
								<tr>
									<td>
										Date of payment
									</td>
									<td class="text-left">
										<b><?php echo date("Y-m-d");?></b>
									</td>
								</tr>
								<tr>
									<td>
										Status
									</td>
									<td  class="text-left">
										<b><?php $msg=($due>0)?"not cleared":"clear"; echo $msg;   ?></b>
									</td>
								</tr>
								<tr>
									<td>
										Amount To Be Paid:
									</td>
									<td class="text-left">
										Rs:<b><?php echo $_GET['amount'];?></b>
									</td>
								</tr>
								<tr>
									<td>
										Due amount
									</td>
									<td class="text-left">
										Rs:<b><?php echo $due;?></b>
									</td>
								</tr>
								<tr>
									<td>
										Net Amount
									</td>
									<td class="text-left">
										Rs:<b><?php echo ($_GET['amount']-$_GET['amount']*0.01*$_GET['discount']);?></b>
									</td>
								</tr>
								<tr>
									<td>
										Tender
									</td>
									<td class="text-left">
										Rs:<b><?php echo $_GET['tender'];?></b>
									</td>
								</tr>
								<tr>
									<td>
										Return
									</td>
									<td class="text-left">
										Rs:<b><?php if($_GET['tender']<=$_GET['amount']) echo "0"; else echo ($_GET['tender']-($_GET['amount']-$_GET['amount']*0.01*$_GET['discount']));?></b>
									</td>
								</tr>
								<tr>
									<td>
										Signature
									</td>
									<td class="text-left">
										<b>-----------</b>
									</td>
								</tr>
							</table>
						</div>
					</div>
				
		</div>
			</div>
			
		</div>
		<div class="text-center">
			<button class="btn btn-primary" onclick="printPage()" id="print">print</button>
			<a href="destroy_session.php"><button class="btn btn-danger" id="back">back</button></a>
		</div>
		
	</div>



	<script language=javascript>
		function printPage() {
			document.getElementById("back").style.visibility="hidden";
			document.getElementById("print").style.visibility="hidden";
		if (window.print) {

		  window.print(); 
		  }
		}
	</script>
</body>

