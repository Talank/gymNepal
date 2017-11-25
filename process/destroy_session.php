<?php
session_start();

session_destroy($_SESSION['user_id'],$_SESSION['due']);
header("Location:search.php");


?>