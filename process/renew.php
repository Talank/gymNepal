<!DOCTYPE html>
<html>
<head>
	<title>Renew</title>
	 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
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
	if($preDueAmount==null)
		$preDueAmount=0;

	?>
	<div class="well-sm text-center">
		<h3>GYM Counter</h3>
	</div>
	
	
	<div class="container">
	<div class="jumbotron">
		<form action="update.php" class="" method="post">
		<img src="../Images/<?php echo $row['picture'];?>" class="img-rounded center-block">
	<div class="alert alert-info text-center">
		<div class="row">
			<label>REGISTRATION ID: <?php echo $_GET['id'];?></label>
		</div>
		<div class="row">
			<label>Name: <?php echo $row['firstname'];  echo " ".$row['lastname'];?></label> &nbsp;
			<img src="../Images/right.png" width="22" height="20" id="b11" onclick="displayField()">
			<img src="../Images/wrong.png" width="22" height="20" id="b22">
		</div>
		
		<div class="row">
			<label>Attendance:<?php echo $row['value']; ?></label>
		</div>
		
		<div class="row">
			<label>DUE DATE:<?php echo $row['duedate'];?></label>
		</div>
	</div>
	
    <div id="div2" hidden>
    	<input name="user_id" value="<?php echo $_GET['id'];?>" hidden>
    	<input type="text" placeholder="Firstname" name="firstname" value="<?php echo $row['firstname'];?>" required>
    	<input type="text" placeholder="Lastname" name="lastname" value="<?php echo $row['lastname'];?>" required>
    </div>
	

	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-6 form-group">
				<label>NEW DATE</label>
				<select name="date" id="selectMonths" onchange ="showAmount()">
					<option value="0" selected="selected">0 month</option>
					<option value="1" >1 month</option>
					<option value="3">3 month</option>
					<option value="6">6 month</option>
					<option value="12">12 month</option>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-6 form-group">
				<label>AMOUNT TO PAY:</label>
				<input class="form-control"  type="number" name="amount" id="amount" readonly>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label>TENDER:</label>
				<input class="form-control" type="number" name="tender" id="tender" oninput="showDueAmount()">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-6 form-group">
				<label>DISCOUNT:</label>
				<input class="form-control" type="number" name="discount" min="0" maxlength="2" id="discount">%
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-6 form-group">
				<label>CURRENT DUE AMOUNT: </label>
				<input class="form-control" type="number" name="dueAmount" id="dueAmount" readonly>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-6 form-group">
				<label>CUT PREVIOUS DUE:</label>
				<input  type="checkbox" name="cutPrevious" id="cutPre" onchange="showNetAmount()">
			</div>
		
		</div>
		
		<div class="row">
			<div class="col-sm-6 form-group">
				<label>PRIEVIOUS DUE AMOUNT:</label>
				 <input class="form-control" type="text" name="preDueAmount" <?php echo "value=".'"'.$preDueAmount.'"'  ?> id="preDueAmount" readonly>
			</div>
		
		</div>
		
		
	</div>
	<div class="row text-center">
		<div class="col-sm-6 form-group">
			<a href="search.php"><button class="btn btn-warning">Back</button></a>
			<button class="btn btn-primary">Update</button>
		</div>
		
	</div>
	
	</form>
	
	
	</div>
	</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../javascript/showup.js"></script>
</body>
	<script type="text/javascript">
		//code for showing amount to be paid in the input field
		var amount=0;
		var preDue;
		var enteredAmount;
		//Get the amount ,so that we can clear due ,even if no month is selected
		document.getElementById("amount").value = amount;
		document.getElementById("dueAmount").value =0;
		document.getElementById("tender").value=0;
		document.getElementById("discount").value=0;
		function displayField() {
			document.getElementById("div2").style.visibility='visible';
		}


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
			enteredAmount= document.getElementById("tender").value;
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