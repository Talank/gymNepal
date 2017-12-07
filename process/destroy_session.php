<?php
session_start();

session_destroy($_SESSION['user_id'],$_SESSION['due'],$_SESSION['amount']);
header("Location:search.php");

?>