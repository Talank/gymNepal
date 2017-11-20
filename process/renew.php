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
	include"../pages/connect.php";
	$user_id=$_GET['id'];
	$stmt="select firstname,lastname,duedate,picture,count(*) as value from users,attendance where users.user_id=attendance.user_id and users.user_id=$user_id";
	$result=mysqli_query($conn,$stmt);
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
    <label><b>NEW DATE:</b><input type="date" id="myDate" value=<?php echo $row['duedate']; ?> name="date"></label><br>
	<button style="margin-left: 10px;">update</button>
	</form>
</div>
</body>
</html>