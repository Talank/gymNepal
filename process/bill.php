
<?php
session_start();
$user_id=$_SESSION['user_id'];
include"../pages/connect.php";
$result=mysqli_query($conn,"SELECT * from users left join duebalance on users.user_id=duebalance.user_id and users.user_id=$user_id");
$row=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bill</title>
	<link rel="stylesheet" type="text/css" href="../css/bill.css">
</head>
<body bg-color="#FAFAFA">
<h1 align="center">Bill</h1>
<h2><img src=../Images/bullsgym.jpg width="80" height="80"> <p id="p1">Bulls Gym Association,Nayabazar</p></h2>
<div id="div1">
	<h3>Reciept</h3>
	
     	
<p class="p2">Name-<b><?php echo $row['firstname']." ". $row['lastname']; ?></b></p>
<p class="p2">Due amount-<b><?php echo $row['due'];?></b></p>
<p class="p2">Date of payment-<b><?php echo date("Y-m-d");?></b></p>
<p class="p2">Status- <b><?php $msg=($row['due']>0)?"not cleared":"clear"; echo $msg;   ?></b></p>
<p class="p2">Signature-</p>
<p class="p2">Amount Paid: $ <span style="text-decoration: underline; white-space: pre;"><?php echo $_SESSION['due'];?>                   </span></p>
<button>print</button>
<a href="destroy_session.php"><button>back</button></a>

	
</div>
</body>
</html>