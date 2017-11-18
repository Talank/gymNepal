


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/table2.css">
</head>
<body>

<?php
 $date1=$_POST['date1'];
 $date2=$_POST['date2'];
 include"../connect.php";
 $stmt="select * from `users` where issue_date between '$date1' and '$date2'";
 $result=mysqli_query($conn,$stmt);
  $num=mysqli_num_rows($result);
  		echo"<table id=t1>
  		        <tr>
 				<th align=center>id</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>duedate</th>    
                <th>issuedate</th>          
                <th>Dp</th>
                <th>Details</th>
                </tr>";
                
               
if($num>0){
 while($row=mysqli_fetch_array($result)){
 echo"<tr>
 	  <td>$row[user_id]</td>
       <td>$row[firstname]</td>
       <td>$row[lastname]</td>
       <td>$row[duedate]</td>
       <td>$row[issue_date]</td>
       <td><img src=../Images/$row[picture] height=60 width=80></td>
       <td><button>show more</button></td>
      </tr>";
   
                

}
 }
 else{
 	echo"<p style=color:white align=center>No result</p>";
 }
 ?>

</body>
</html>