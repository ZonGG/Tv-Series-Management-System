<?php
require 'db.php';

//start the session of a login user 
session_start();

$user_check=$_SESSION['adminlogin'];


$query = "SELECT username FROM admin WHERE admin_id = '$user_check'";
$ses_sql = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];

?>