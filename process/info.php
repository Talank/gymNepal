
<?php
$id=$_POST['id'];
include"../pages/connect.php";
$stmt="SELECT * from `information` where user_id=$id";

$result=mysqli_query($conn,$stmt);
$row=mysqli_fetch_array($result);
echo "<div>
        <b>Info</b><hr>
       <table>
       <tr><td><b>Reg_id-</b> </td><td><b><mark>$row[user_id]</mark></b></td></tr>
       <tr><td><b>phone-</b> </td><td><b><mark>$row[phone]</mark></b></td></tr>
       <tr><td><b>dob-</b> </td><td><b><mark>$row[dob]</mark></b></td></tr>
       <tr><td><b>temp address-</b></td><td><b><mark>$row[temporay_address]</mark></b></td></tr>
       <tr><td><b>perm address-<b></td><td><b> <mark>$row[permant_address]</mark></b></td></tr>
       <tr><td><b>Occupation -<b></td><td><b><mark>$row[occupation]</mark></b></td></tr>
       </table>
      </div>";
?>