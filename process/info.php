
<?php
$id=$_POST['id'];
include"../pages/connect.php";
$stmt="SELECT * from `information` where user_id=$id";

$result=mysqli_query($conn,$stmt);
$row=mysqli_fetch_array($result);
echo "<div>
        Info about registration_id:-$id
       <ol>
       <li><b>phone- $row[phone]</b></li>
       <li><b>dob- $row[dob]</b></li>
       <li><b>temp address- $row[temporay_address]</b></li>
       <li><b>perm address- $row[permant_address]</b></li>
       <li><b>Occupation -$row[occupation]</b></li>
       </ol>
      </div>";
?>