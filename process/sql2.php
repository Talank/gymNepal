
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <title></title>
</head>
<body>

<?php 

  if(isset($_POST['name']))
  {
  	$name=$_POST['name'];
  	if(!empty($name))
  	{

      include"../pages/connect.php";
      $stmt=" SELECT *,datediff(duedate,now()) as count from `users`,`information`,`status`  where (users.firstname like '%$name%' ||users.user_id like '%$name%') and information.user_id=users.user_id and users.user_id=status.user_id";
      $result=mysqli_query($conn,$stmt);

      $num=mysqli_num_rows($result);

      $suffix=($num!=1 && $num!=0)?'s':'';
            echo "<p align=center>your have got ".$num." result".$suffix."<br>";
            echo"<table id=t1><tr><th>Reg no.</th>
                <th>Dp</th>
                <th>Name</th>
                <th>address</th>
                <th>R.day</th>
                <th>Status</th>
                <th>Action</tr>";

      while($row=mysqli_fetch_array($result))
     {
            
        echo"<tr>";
        echo "<td>" .$row['user_id']."</td>";
        echo "<td><img src=../Images/$row[picture] height=70 width=70 style=padding:10px;></td>";
        echo "<td>".$row['firstname']." ".$row['lastname']."</td>";
        echo "<td >".$row['temporay_address']."</td>";

        if($row['count']>0){
         echo "<td id=color>".$row['count']."</td>";
        }
        else{
          echo '<td style="color: red;">finished</td>';
        }

         
         
         $message=($row['status']!=0)?'<img src=../Images/online.png width=30 height=28':'<img src=../Images/offline.png  width=23 height=22';
         echo"<td>".$message."</td>";
        echo "<td>
                <a href=renew.php?id=$row[user_id]>
                  <button class='edit_btn'>
                    Edit
                  </button>
                </a>";
                
                if($row['status']!=0){
                  echo"
                    <a href=attend.php?id=$row[user_id]>
                      <button class='tick_mark'>
                        <img src=../Images/tick.png id=img>
                      </button>
                    </a>";
                }
             echo"</td>";

        echo"</tr>";

              }
              echo"</table>";
              if($num<1)
              {
                echo"<p id=error style=color:black>Invalid username! sorry couldnt found it</p>";
              }
           
          }

          else{
            echo"Insert please.......";
          }
        }
?>

</body>
</html>