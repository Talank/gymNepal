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
        <select name="date">
        	<option value="0" selected="selected">0 month</option>
           <option value="1" >1 month</option>
           <option value="3">3 month</option>
           <option value="6">6 month</option>
           <option value="12">12 month</option>
        </select>
    </label>
    <br><br>

	<button style="margin-left: 10px;"><b>update</b></button>
	</form>
	<a href="search.php"><input type="button" value="back"></a>
</div>
</body>
</html>