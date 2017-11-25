<?php
include "../pages/connect.php";
$date=date("Y-m-d");
$view_by_time=false;
$stmt="SELECT * from users where user_id in (select user_id from attendance where date like '$date' order by time)";
$result=mysqli_query($conn,$stmt);
$num=mysqli_num_rows($result);
?>

<?php 
  if (isset($_GET['filterByTime'])) {
    if (!(empty($_GET['time1']) && empty($_GET['time2']))) {
      $time1= $_GET['time1'];
      $time2= $_GET['time2'];
      list($time1_hour, $time1_min) = explode(":", $time1);
      list($time2_hour, $time2_min) = explode(":", $time2);

      $ampm1=  $time1_hour < 12 ? 'am' : 'pm';
      $ampm2=  $time2_hour < 12 ? 'am' : 'pm';

       $time1_hour = $ampm1=='pm' ? ($time1_hour-12) : ($time1_hour);

       $sec=0;
       $time1 = date_create("$time1_hour:$time1_min:$sec");
       $time1 = date_format($time1,"h:i:s");

       $time2 = date_create("$time2_hour:$time2_min:$sec");
       $time2 = date_format($time2,"h:i:s");

      $stmt2="SELECT * from users where user_id in (select user_id from attendance where time>='$time1' and time<='$time2'and date='$date' order by time)";
      $view_by_time=true;
      $result=mysqli_query($conn,$stmt2);
      $num=mysqli_num_rows($result);
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
	<link rel="stylesheet" type="text/css" href="../css/table2.css">
</head>
<body>
  <div class="filterByTime">
    <form method="get">
      Select time: <br>
      From: <input type="time" name="time1" required> &nbsp &nbsp 
      To: <input type="time" name="time2" required> &nbsp &nbsp 
      <input type="Submit" name="filterByTime" value="Go">
    </form>
  </div>
  <h1 align="center">Todays Attendance
    <?php 
      if ($view_by_time) {
        echo "<br>$time1 To $time2";
      }
     ?>
  </h1>
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