<?php
include "../pages/connect.php";
$date=date("Y-m-d");
$stmt="SELECT * from users where user_id in (select user_id from attendance where dates='$date' order by time)";
$result=mysqli_query($conn,$stmt);
$num=mysqli_num_rows($result);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
	<link rel="stylesheet" type="text/css" href="../css/table2.css">
</head>
<body>
  <h1 align="center">Todays Attendance</h1>
	<?php
	echo"<table id=t1>
  		        <tr>
 				<th align=center>id</th>
                <th>Dp</th>
                <th>Name</th>
                <th>Duedate</th>    
                
               
                
                <th>Operation</th>
                </tr>";
	if($num>0){
	while($row=mysqli_fetch_array($result)){
		echo"<tr>
 	  <td>$row[user_id]</td>
    <td><img src=../Images/$row[picture] height=60 width=80></td>
       <td>$row[firstname] $row[lastname]</td>
       <td>$row[duedate]</td>
       

       
       
       <td><span class=s1 value=$row[user_id]><button id=b1>message</button></span></td>
       <div id=id01 ></div>
      </tr>";
	}
}
else{
	echo "no attendance today";
	
}
?>
</body>
</html>