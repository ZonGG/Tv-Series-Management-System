<?php
require 'db.php';
session_start();
$error='';

if (isset($_POST['submit'])) {
if (empty($_POST['Member_Email']) || empty($_POST['Member_Password'])) {
$error = "Email or Password is invalid";
}
else
{
// Define $username and $password
$Member_Email=$_POST['Member_Email'];
$Member_Password=$_POST['Member_Password'];



// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT Member_Email, Member_Password FROM member WHERE Member_Email=? AND Member_Password=? LIMIT 1";

$stmt = $con->prepare($query);
$stmt -> bind_param('ss', $Member_Email, $Member_Password);
$stmt -> execute();
$stmt -> bind_result($Member_Email, $Member_Password);
$stmt -> store_result();

if ($stmt->fetch())
{
	$_SESSION['userlogin']=$Member_Email; // Initializing Session
	header("location: tv_series.php"); // Redirecting To Other Page
	} else {
	header("location: index.html");
	echo '<script language="javascript">';
	echo 'alert("Wrong Email or Password! Please try again!")';
	echo '</script>';
	}
	mysqli_close($con); // Closing Connection
	}
	}

	if(isset($_SESSION['userlogin'])){
	header("location: tv_series.php"); 
	}
?>
