<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
session_start();
if(isset($_SESSION['username'])){

}
else{
	header("location:../index.html");
}

?>
<html>
<head>
	<title>Bulls gym</title>
	<link rel="shortcut icon" href="../Images/bulls.png" />
	<style type="text/css">

#content {
	background-color: transparent;

	background-size: 2em;
	width:40%;
	height: 20%;

}

	</style>
	<link rel="stylesheet" type="text/css" href="../css/table.css">
	<link rel="stylesheet" type="text/css" href="../css/form.css">

		<script src="../jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="../javascript/form.js"></script>

	<script type="text/javascript" src="../java4.js"></script>
</head>
<body>
	<h1 align="center" style="color:white;font-style: italic;">Pokhara Gym house</h1>


<!-- ************************ Navigation bar code goes here****************************** -->
    <div class="nav">
    
      <div class="dropLink1">
        <button class="dropbtn">view users 
        </button>
        <div class="dropdown-content1">
          <a href="view-users.php">view by date</a>
          <a href="#">view by address</a>
        </div>
      </div>
      
      <div class="dropLink2">
        <a href="#">Report</a>
      </div>
      
      <div>
        <a href="#" class="dropLink3">About Gym</a>
      </div>
      
    </div>

	<button  onclick="document.getElementById('id01').style.display='block'" style="width:auto;margin-left: 10px;">Register</button>
	<a href="logout.php"><button style="width: auto;">logout</button></a>
<input type="text" name="string" id="string" placeholder="Search by name or id....">
<div id="content"></div>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content animate" action="form-process.php" method="post" enctype="multipart/form-data">
    <div class="container">
      <label><b class="b1">Firstname</b></label>
      <input type="text" placeholder="firstname" name="firstname" required>

      <label><b class="b1">Lastname</b></label>
      <input type="text" placeholder="lastname" name="lastname" required>

      <label><b class="b1">Phone</b></label>
      <input type="text" placeholder="phone number" name="phone" maxlength="10" minlength="10" required>

      <label><b class="b1">Dob</b></label>
      <input type="text" placeholder="Date of birth(y-m-d)" name="dob" required>

      <label><b class="b1">Temporary address</b></label>
      <input type="text" placeholder="Temporary address" name="temp_address" required>

      <label><b class="b1">Permanent address</b></label>
      <input type="text" placeholder="Permanent address" name="perm_address" required>

      <label><b class="b1">Plan</b></label><br><br>
      <input type="date" placeholder="Plan" name="plan" required><br><br>

      <label><b class="b1">Issue date</b></label><br><br>
      <input type="date" placeholder="issue date" name="issue" required><br><br>

      <label><b class="b1">Occupation</b></label>
      <input type="text" placeholder="occupation" name="occupation" required>

      <input type="file" name="fileToUpload" id="fileToUpload">
      <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn" name="submit">Register</button>
      </div>
    </div>
  </form>
</div>



</body>
</html>