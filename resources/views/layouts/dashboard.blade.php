@extends('master')

@section('content')
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
	              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
	              <div id="centers">
	                <h3><?php echo $count;?></h3>
	              </div>
	            </div>
	              <h4>USERS</h4>
	              <span class="text-muted">Total Number of Users</span>
	            </div>
	            <div class="col-xs-6 col-sm-3 placeholder">
	              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
	              <div id="centers">
	                <h3><?php echo $pending;?></h3>
	              </div>
	              <h4>PENDING</h4>
	              <span class="text-muted">Total No of Pending Users</span>
	            </div>
	            <div class="col-xs-6 col-sm-3 placeholder">
	              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
	              <div id="centers">
	                <h3><?php echo $active;?></h3>
	              </div>
	              <h4>ACTIVE</h4>
	              <span class="text-muted">Total No Of Active Users</span>
	            </div>
	            <div class="col-xs-6 col-sm-3 placeholder">
	              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
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
	    		<div id="id02" class="modal">
	    			<div class="container">
	    				    <div class="well" style="margin-top: 5px;">
	    						<h1 style="display: inline;">BULLS COUNTER</h1>
	    						<span id="closeCounter" class="close" title="Close Form">&times;</span>
	    					</div>
	    					<div class="col-lg-12 well">
	    						<div class="row" id="renew">
	    			
	    						</div>
	    					</div>
	    			</div>	
	    		</div>

	    		<div id="id01" class="modal">
					<div class="container">
						<div class="well" style="margin-top: 5px;text-align: center;">
							<h1 style="display: inline;">Registration Information</h1>
							<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Form">&times;</span>
						</div>
	    				
						<div class="col-lg-12 well">
							<div class="row">
								<form class="modal-content animate" action="register" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
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
										<button type="button" class="btn-primary" name="submit">Register</button>					
						
									</div>
								</form> 
							</div>
						</div>
					</div>
				</div>

	        </div>
	      </div>
	    </div>
@endsection

    