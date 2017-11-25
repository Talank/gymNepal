
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
	<script language=javascript>
		function printPage() {
			document.getElementById("back").style.visibility="hidden";
			document.getElementById("print").style.visibility="hidden";
		if (window.print) {

		  window.print(); 
		  }
		}
</script>

</head>
<body bg-color="#FAFAFA">
<h1 align="center">Bill</h1>
<h2><img src=../Images/bullsgym.jpg width="80" height="80"> </h2>
<div  align="center"><p id="p1">Bulls Gym Association,Nayabazar</p></div>
<div id="div1">
	<h3>Reciept</h3>
	
     	
<p class="p2">Name-<b><?php echo $row['firstname']." ". $row['lastname']; ?></b></p>
<p class="p2">Registration id- <b><?php echo $row['user_id']; ?> </b> </p>
<p class="p2">Due amount-<b><?php echo $row['due'];?></b></p>
<p class="p2">Date of payment-<b><?php echo date("Y-m-d");?></b></p>
<p class="p2">Status- <b><?php $msg=($row['due']>0)?"not cleared":"clear"; echo $msg;   ?></b></p>

<p class="p2">Amount Paid: Rs. <?php echo $_SESSION['due'];?>
<p class="p2">Signature-<span style="text-decoration: underline; white-space: pre;">                  </span></p>
<button onclick="printPage()" id="print">print</button>
<a href="destroy_session.php"><button id="back">back</button></a>

	
</div>
</body>
</html>