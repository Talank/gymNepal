
<?php
$id=$_POST['id'];
include"../pages/connect.php";
$stmt="SELECT * from `information` where user_id=$id";

$result=mysqli_query($conn,$stmt);
$row=mysqli_fetch_array($result);
echo "<table>
       <tr>
       <th style=color:white>phone</th>
       <th style=color:white>dob</th>
       <th style=color:white>temp address</th>
       <th style=color:white>perm address</th>
       <th style=color:white>occupation</th>
       </tr>
       
       <tr>
       <td style=color:white>$row[phone]</td>
       <td style=color:white>$row[dob]</td>
       <td style=color:white>$row[temporay_address]</td>
       <td style=color:white>$row[permant_address]</td>
       <td style=color:white>$row[occupation]</td>
       </tr>
       </table>";
?>