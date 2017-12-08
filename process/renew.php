<!DOCTYPE html>
<html>
<head>
	<title>Renew</title>
	<link rel="stylesheet" type="text/css" href="../css/renewDesign.css">
	<script src="../jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="../javascript/showup.js">
	</script>

</head>
<body bgcolor="#FAFAFA">
	<?php
	$user_id=$_GET['id'];
	include"../pages/connect.php";
	// include "clear_attendance.php";
	$stmt="select firstname,lastname,duedate,picture,count(*) as value from users,attendance where users.user_id=attendance.user_id and users.user_id=$user_id";
	$result=mysqli_query($conn,$stmt)
			or die("Error : Sorry ! can not execute the process");
	$row=mysqli_fetch_array($result);
	
	$query=mysqli_query($conn,"select due from duebalance  where user_id=$user_id LIMIT 1");
	$query_data=mysqli_fetch_array($query);
	$preDueAmount=$query_data['due'];
	echo "Due AMount :".$query_data['due'];

	?>
<div id="div1">
<form action="update.php" method="post">
	<img src="../Images/<?php echo $row['picture'];?>" id="user_image"><br>
	<table>
	<b>REGISTRATION ID: <?php echo $_GET['id'];?></b><br><br>
	<b>Name: <?php echo $row['firstname'];  echo " ".$row['lastname'];?></b> &nbsp;
	<img src="../Images/right.png" width="22" height="20" id="b11">
	<img src="../Images/wrong.png" width="22" height="20" id="b22">
	
    <div id="div2" hidden>
    	<input name="user_id" value="<?php echo $_GET['id'];?>" hidden>
    	<input type="text" placeholder="Firstname" name="firstname" value="<?php echo $row['firstname'];?>" required>
    	<input type="text" placeholder="Lastname" name="lastname" value="<?php echo $row['lastname'];?>" required>
    </div>
	<br><br>
	
    <b>Attendance:<?php echo $row['value']; ?></b><br><br>
    <!-- <label><b>NEW DATE:</b><input type="date" id="myDate" value=<?php //echo $row['duedate']; ?> name="date"></label><br> -->

    <span id="myDate"><b>DUE DATE: </b><?php echo $row['duedate'];?></span><br><br>

    <label><b id="myDate">NEW DATE</b>
        <select name="date" id="selectMonths" onchange ="showAmount()">
        	<option value="0" selected="selected">0 month</option>
           <option value="1" >1 month</option>
           <option value="3">3 month</option>
           <option value="6">6 month</option>
           <option value="12">12 month</option>
        </select>
    </label>
    <br><br>

    <b>AMOUNT TO PAY:</b>
    <input type="text" name="amount" id="amount" oninput="showDueAmount()">
    <br><br>

    <b>CURRENT DUE AMOUNT: </b>
    <input type="number" name="dueAmount" id="dueAmount" readonly>
    <!-- <span id="dueAmount" style="color: white;"></span> -->
    <br><br>
	
	<b>CUT PREVIOUS DUE:</b>
    <input type="checkbox" name="cutPrevious" id="cutPre" onchange="showNetAmount()">
    <br><br>
	
	<b>PRIEVIOUS DUE AMOUNT:</b>
    <input type="text" name="preDueAmount" <?php echo "value=".'"'.$preDueAmount.'"'  ?> id="preDueAmount" readonly>
    <br><br>

	<button style="margin-left: 10px;"><b>update</b></button>
	</form>
	<a href="search.php"><input type="button" value="back"></a>
</div>
</body>
	<script type="text/javascript">
		//code for showing amount to be paid in the input field
		var amount=0;
		var preDue;
		var enteredAmount;
		//Get the amount ,so that we can clear due ,even if no month is selected
		document.getElementById("amount").value = amount;
		function showAmount(){
			var months = document.getElementById('selectMonths').value;
			if(months=="0"){
			      amount =0;
			    }
				else if (months == "1") {
				  amount =700;
				}
				else if(months =="3"){
				  amount =2100;
				}
				else if(months=="6"){  
				  amount =4200;
				}
				else{
				  amount =8400;
				}
				document.getElementById("amount").value = amount;
		}

		function showDueAmount(){
			enteredAmount= document.getElementById("amount").value;
			var dueAmount = amount - enteredAmount;
			if(dueAmount<0)//There is no due and the money is excess
				dueAmount=0;
			document.getElementById("dueAmount").value = dueAmount;
		}
		/*
		*This function is called if a user request to clear his old deu amount
		*/
		function showNetAmount() {
			if(document.getElementById('cutPre').checked) {
				var preDueAmount=document.getElementById('preDueAmount').value;
				preDue=preDueAmount;
				var excess=enteredAmount-amount;
				if(excess>0) {
					var dueAmount=preDueAmount-excess;
					if(dueAmount<0)
						dueAmount=0;
					document.getElementById('preDueAmount').value=dueAmount;	
				}
			} else {
				document.getElementById('preDueAmount').value=preDue;
			}
		}
	</script>
</html>