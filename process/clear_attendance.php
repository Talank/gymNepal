<?php
  $date=date("Y-m-d");
 $statement="delete from `attendance` where user_id in (select user_id from `users` where duedate<='$date')";
mysqli_query($conn,$statement);

?>