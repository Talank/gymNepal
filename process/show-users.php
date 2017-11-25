<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
   #id01{
   	width: 29%;
   	height: auto;
   	margin: auto;
   	margin-top: 10px
   	margin-right: 40px;
    float: right;
   	background: #009688;
   }

	</style>
	<link rel="stylesheet" type="text/css" href="../css/table2.css">
	<script src="../jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="../javascript/showdata.js"></script>
	
</head>
<body>

<?php
 $date1=$_POST['date1'];
 $date2=$_POST['date2'];
 
 include"../pages/connect.php";
 echo"<table id=t1>
              <tr>
        <th align=center>id</th>
                <th>Dp</th>
                <th>Name</th>
                <th>Duedate</th>    
                <th>Issuedate</th>          
                <th>Details</th>
                </tr>";
     $stmt="SELECT * from `users` where issue_date between '$date1' and '$date2' order by issue_date asc,user_id asc ";
        $result=mysqli_query($conn,$stmt);
        $num=mysqli_num_rows($result);
      		             
    if($num>0){
      while($row=mysqli_fetch_array($result)){
        echo"<tr>
     	  <td>$row[user_id]</td>
        <td><img src=../Images/$row[picture] height=60 width=80></td>
           <td>$row[firstname] $row[lastname]</td>
           <td>$row[duedate]</td>
           <td>$row[issue_date]</td>       
           
           <td><span class=s1 value=$row[user_id]><button id=b1>show more</button></span></td>
           <div id=id01 ></div>
          </tr>";            

        }
    }
     else{
     	echo"<p style=black:white align=center>No result</p>";
     }

?>

</body>
</html>