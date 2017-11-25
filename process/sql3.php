<?php
$user_id=$_POST['id'];
include "../pages/connect.php";
$stmt="select user_id,picture,firstname,lastname from users where user_id ='$user_id'";
$result=mysqli_query($conn,$stmt);
$nums=mysqli_num_rows($result);
if($nums>0){
$row=mysqli_fetch_array($result);
	echo"<img src=../Images/$row[picture] id=img1><br>";
	echo"<b>Name:$row[firstname] $row[lastname]</b><br>";
	echo"<a href=goPending.php?id=$user_id><button id=button1>add to pending</button></a>";
}
else{
	echo "<p align='center'>sorry!no results found</p>";
}


?>