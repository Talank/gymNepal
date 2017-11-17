
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/table.css">
  <title></title>
</head>
<body>
  <script type="text/javascript" >
    function imageChange(){
      alert("a");
      document.getElementsById("img").src="Images/tick.png";
}
function changeColor(){
  document.getElementById('td1').style.color = "magenta";
  </script>
}


<?php 

  if(isset($_POST['name']))
  {


  	$name=$_POST['name'];
  	if(!empty($name))
  	{

      include"pages/connect.php";
      $stmt=" SELECT *,datediff(duedate,now()) as count from `users`,`information`  where users.firstname like '%$name%' and information.user_id=users.user_id";
      //$stmt="SELECT * from `users` where firstname like '%$name%'";
      $result=mysqli_query($conn,$stmt);

      $num=mysqli_num_rows($result);

      $suffix=($num!=1 && $num!=0)?'s':'';
            echo "<p style=color:white>your have got ".$num." result".$suffix."<br>";
echo"<table id=t1><tr><th align=center>id</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>duedate</th>
                <th>phone</th>
                <th>dob</th>
                <th>address</th>
                <th>occupation</th>
                <th>R.day</th>
                <th>Dp</th>
                <th>Update</tr>";


      while($row=mysqli_fetch_array($result))
     {
//echo "<br><section>"."name-"$row['item_name']."price-".$row['price']."code".$row['item_code']."</section><br>";
//echo $row['information'];
      
echo"<tr>";
echo "<td>" .$row['user_id']."</td>";
echo "<td>".$row['firstname']."</td>";
echo "<td>".$row['lastname']."</td>";
echo "<td >".$row['duedate']."</td>";
echo "<td >".$row['phone']."</td>";
echo "<td >".$row['dob']."</td>";
echo "<td >".$row['temporay_address']."</td>";
echo "<td >".$row['occupation']."</td>";


 echo "<td id=color>".$row['count']."</td>";
echo "<td><img src=Images/$row[picture] height=60 width=80></td>";
echo "<td><a href=renew.php?id=$row[user_id]><button style=width:auto;margin-left: 10px;>Edit</button></a><a href=attend.php?id=$row[user_id]><button style=width:auto;margin-left: 10px;><img src=Images/tick.png width=17 height=17 id=img></button></a></td>";

echo"</tr>";

      }
      echo"</table>";
      if($num<1)
      {
        echo"<p id=error style=color:white>Invalid username! sorry couldnt found it</p>";
      }
   
  }

  else{
    echo"Insert please.......";
  }
}
?>

</body>
</html>