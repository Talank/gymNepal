<?php 
session_start();
if(isset($_SESSION['username'])){
	include "functions.php";
	$count=getCount("select count(user_id) as num from users");
	$pending=getCount("select count(user_id) as num from pending");
	$active=$count-$pending;
	$dueNo=getCount("select count(user_id) as num from duebalance where due>0");
}
else{
	header("location:../index.html");
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../Images/bulls.png" />
    <title>Bulls gym</title>

    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/custom_search.css">
    <link href="../css/form.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Pokhara Gym house</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search" name="string" id="string">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <h4>View Users</h4>
          <ul class="nav nav-sidebar">
            <li><a href="view-users.php">view by date</a></li>
            <li><a href="#">view by address</a></li>
            <li><a href="attendance.php">view by attendance</a></li>
			<li><a href="pending.php">Pending users</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="#" onClick="document.getElementById('id01').style.display='block'">Register</a></li>
			<li><a href="add_pending.php">Add Pending</a></li>
			<li><a href="logout.php">Log Out</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Gym Control Panel</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <div id="checking">
              <img src="../images/download.gif" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <div id="centers">
                <h3><?php echo $count;?></h3>
              </div>
            </div>
              <h4>USERS</h4>
              <span class="text-muted">Total Number of Users</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/download.gif" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <div id="centers">
                <h3><?php echo $pending;?></h3>
              </div>
              <h4>PENDING</h4>
              <span class="text-muted">Total No of Pending Users</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/download.gif" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <div id="centers">
                <h3><?php echo $active;?></h3>
              </div>
              <h4>ACTIVE</h4>
              <span class="text-muted">Total No Of Active Users</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/download.gif" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <div id="centers">
                <h3><?php echo $dueNo;?></h3>
              </div>
              <h4>DEBT</h4>
              <span class="text-muted">Total No Of Users Having Debt</span>
            </div>
          </div>

          <h2 class="sub-header">Search Results</h2>
     	 		<div class="jumbotron">
	        		<div id="content">
					</div>

    		</div> 
    		<div id="id01" class="modal">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Form">×</span>
				<div class="container">
    				<h1 class="well">Registration Information</h1>
					<div class="col-lg-12 well">
						<div class="row">
							<form class="modal-content animate" action="form-process.php" method="post" enctype="multipart/form-data">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-6 form-group">
											<label>First Name</label>
											<input type="text" placeholder="Enter First Name Here.." class="form-control" name="firstname" required>
										</div>
										<div class="col-sm-6 form-group">
											<label>Last Name</label>
											<input type="text" placeholder="Enter Last Name Here.." class="form-control" name="lastname" required>
										</div>
									</div>
						
									<div class="row">
										<div class="col-sm-6 form-group">
											<label>Phone</label>
											<input type="text" class="form-control" placeholder="phone number" name="phone" maxlength="10" minlength="10" required>
										</div>	
									</div>
						
									<div class="row">
										<div class="col-sm-6 form-group">
											<label>Date Of Birth</label>
											<input type="text" class="form-control" placeholder="Date of birth(y-m-d)" name="dob" required>
										</div>	
									</div>
									<div class="row">
			
										<div class="col-sm-6 form-group">
											<label>Temporary address</label>
											<input type="text" class="form-control" placeholder="Temporary address" name="temp_address" required>
										</div>	
										<div class="col-sm-6 form-group">
											<label>Permanent address</label>
											<input type="text" class="form-control" placeholder="Permanent address" name="perm_address" required>
										</div>		
									</div>
									<div class="row">
										<div class="col-sm-6 form-group">
											<label>Plan</label>
											<select name="plan">
												<option value="1" selected="selected">1 month</option>
												<option value="3">3 month</option>
												<option value="6">6 month</option>
												<option value="12">12 month</option>
											</select>
										</div>		
							
									</div>	
									<div class="row">
										<div class="col-sm-6 form-group">
											<label>Issue date</label>
											<input type="date" class="form-control" placeholder="issue date" name="issue" required>
										</div>	
										<div class="col-sm-6 form-group">
											<label>Occupation</label>
											<input type="text" class="form-control" placeholder="occupation" name="occupation" required>
										</div>	
						
									</div>
				
									<div class="form-group">
										<input type="file" class="btn-primary" name="fileToUpload" id="fileToUpload">
									</div>
					 				<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
					
									<button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn-danger">Cancel</button>
									<button type="submit" class="btn-primary" name="submit">Register</button>					
					
								</div>
							</form> 
						</div>
					</div>
				</div>
			</div>

        </div>
      </div>
    </div>

   
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
     <script src="../javascript/jquery.min.js"></script>
    	<script src ="../javascript/bootstrap.min.js"></script>
	<script type="text/javascript" src="../java4.js"></script>
	<script type="text/javascript" src="../javascript/form.js"></script>


	<script type="text/javascript">
		//currenty disabling this script to prevent sms setn
	/*	setInterval(function(){
			$.ajax("send_sms.php");
			console.log("Sending Request");
		},10000);*/
	</script>
  </body>
</html>

