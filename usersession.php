<?php
require 'db.php';

session_start();

$user_check1=$_SESSION['userlogin'];

// SQL Query To Fetch Complete Information Of User
$query = "SELECT Member_Email, Member_ID FROM member WHERE Member_Email = '$user_check1'";
$ses_sql = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session1 =$row['Member_Email'];
$mid = $row['Member_ID'];

$query1="SELECT Access_End from account where Member_ID ='$mid';";
$run=mysqli_query($con,$query1);
$data=mysqli_fetch_assoc($run);
$end_date=$data['Access_End'];

?>