<?php 
	session_start();

	//making a redirect to function. we may need to declear this function in other file just like connect.php for better code reusability
	function redirect_to($new_location){
        header("Location: ".$new_location);
        exit();
    }

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
				// header("location:../index.html?login=success");
			 redirect_to("../index.php?login=success");
			}
			else{
				redirect_to("../index.php?password_wrong");
				//header("location:../index.html?password_wrong");
			}
		}

		else{
			redirect_to("../index.php?username_not_found");
			//header("location:../index.html?username_not_found");
		}
	}

 ?>