
<!DOCTYPE html>
<html>
<head>
	<title>Pending users</title>
	<link rel="stylesheet" type="text/css" href="../css/table2.css">
	<script src="../jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="../javascript/pending.js"></script>

</head>
<body>
	<div id="id01"></div>
<?php
include"../pages/connect.php";
$stmt="select * from users,pending where users.user_id=pending.user_id";
$result=mysqli_query($conn,$stmt);
  $num=mysqli_num_rows($result);
  		echo"<table id=t1>
  		        <tr>
 				<th align=center>id</th>
                <th>Dp</th>
                <th>Name</th>
                <th>Duedate</th>    
                <th>Pending days</th> 
               
                
                <th>Operation</th>
                </tr>";
                
               
if($num>0){
 while($row=mysqli_fetch_array($result)){
 echo"<tr>
 	  <td>$row[user_id]</td>
    <td><img src=../Images/$row[picture] height=60 width=80></td>
       <td>$row[firstname] $row[lastname]</td>
       <td>$row[duedate]</td>
       <td>$row[duration]</td>

       
       
       <td><span class=s1 value=$row[user_id]><button id=b1>shift</button></span></td>
       <div id=id01 ></div>
      </tr>";
   
                

}
 }
 else{
 	echo"<p style=color:red align=center>***No pending users***</p>";
 }
 ?>

</body>
</html>




