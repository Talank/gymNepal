<?php 
	session_start();

	include_once('../pages/connect.php');
	if (isset($_POST['login'])) {
		$username = $conn->real_escape_string($_POST['username']);
		$password = $conn->real_escape_string($_POST['password']);

		$query = "SELECT * FROM admin WHERE username = '$username'";
		$result = mysqli_query($conn , $query)
					or die("Error : ".error_connect());
		$row = mysqli_fetch_array($result);
		
		if ($row){
			if ($password == ($row['password'])) {
				$error_msg="";
				$_SESSION['username']= $username;
				//echo "okay";
				header("location:../search.php");
			 //redirect_to("../index.php?login=success");
			}
			else{
			
				header("location:../index.html?password_wrong");
			}
		}

		else{
			header("location:../index.html?username_not_found");
		}
	}

 ?>