<!DOCTYPE html>
<html>
<head>
	<title>Renew</title>
	<link rel="stylesheet" type="text/css" href="css/renewDesign.css">
</head>
<body>
	<?php
	include"connect.php";
	$user_id=$_GET['id'];
	$stmt="SELECT * from `users` where user_id='$user_id'";
	$result=mysqli_query($conn,$stmt);
	$row=mysqli_fetch_array($result);

	?>
<div>
<form action="update.php" method="post">
	<img src="Images/<?php echo $row['picture'];?>" id="user_image"><br>
	<table>
	<tr><td><label><b>REGISTRATION ID:</b></td><td><input type="text" name="user_id" value=<?php echo $_GET['id'];?>></label></td></tr>
	<tr><td><label><b>FIRSTNAME:</b><input type="text" name="firstname" value=<?php echo $row['firstname'];?>></label></td></tr>
	<tr><td><label><b>LASTNAME:</b><input type="text" name="lastname" value=<?php echo $row['lastname'];?>></label></td></tr>
	<tr><td><label><b>NEW DATE:</b><input type="date" id="myDate" value=<?php echo $row['duedate']; ?> name="date"></label></td></tr>
	<table>
	<button>update</button>
	</form>
</div>
</body>
</html>