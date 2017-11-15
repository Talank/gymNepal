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
			redirect_to("../index.php?login=success");
			}
			else{
				redirect_to("../index.php?password_wrong");
			}
		}

		else{
			redirect_to("../index.php?username_not_found");
		}
	}

 ?>