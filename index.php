<?php 
	session_start();
 ?>
<html>
<head>
	<title></title>
	<style type="text/css">

#content {
	background-color: transparent;

	background-size: 2em;
	width:40%;
	height: 20%;

}
	</style>
	<link rel="stylesheet" type="text/css" href="design.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="jquery-3.1.1.min.js"></script>

	<script type="text/javascript" src="java4.js"></script>
</head>
<body>
	<?php 
		if (isset($_SESSION['username'])){
			echo '<div class="container">
				<div id="content"></div>
				</div>';
		}
		else{
			echo '<div class="container">
					<input type="text" name="string" id="string">
						<div class="center sm-right">
							<div class="message">
								<p>Login</p>
							</div>		
							<div class="wrapper">
								<form class="form" method="post" action="process/login-process.php">
									<input type="text" name="username" placeholder="username">
									<input type="password" name="password" placeholder="password">
									<input type="submit" name="login" value="login">
								</form>
								<div class="container_footer">
									<p><a href="#">Forgot password?</a></p>
								</div>
							</div>
						</div>
					</div>';
			}	
	?>
</body>
</html>