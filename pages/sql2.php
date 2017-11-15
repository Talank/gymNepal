<?php 

  if(isset($_POST['name']))
  {


  	$name=$_POST['name'];
  	if(!empty($name))
  	{

      include"connect.php";
      
      $stmt="SELECT * from `users` where firstname like '%$name%'";
      $result=mysqli_query($conn,$stmt);

      $num=mysqli_num_rows($result);

      $suffix=($num!=1)?'s':'';
            echo "<p>your have got ".$num." result".$suffix."<br>";
echo"<table width=100%><tr><th>id</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>duedate</th>
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
echo "<td>".$row['duedate']."</td>";
echo "<td><img src=Images/$row[picture] height=60 width=80></td>";
echo "<td><button id=edit>Edit</button><button>Delete</button></td>";

echo"</tr>";

      }
      echo"</table>";
      if($num<1)
      {
        echo"<p align=center>couldnt found it</p>";
      }
   
  }

  else{
    echo"Insert please.......";
  }
}
?>
