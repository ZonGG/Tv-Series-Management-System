<?php
//validate the existence of the input ID and password by comparing to the database. 
session_start();
$error='';

if (isset($_POST['submit'])) {
if (empty($_POST['admin_id']) || empty($_POST['password'])) {
	echo '<script language="javascript">';
	echo 'alert("Wrong ID or Password! Please try again!")';
	echo '</script>';
	header("location:adminlogin.html");

}
else
{

$admin_id=$_POST['admin_id'];
$password=$_POST['password'];
require 'db.php';



$query = "SELECT admin_id, password FROM admin WHERE admin_id=? AND password=? LIMIT 1";

$stmt = $con->prepare($query);
$stmt -> bind_param("ss", $admin_id, $password);
$stmt -> execute();
$stmt -> bind_result($admin_id, $password);
$stmt -> store_result();

if ($stmt->fetch())
{
	$_SESSION['adminlogin']=$admin_id;
	header("location: admin.php");
} else {
header("location:adminlogin.html");
echo '<script language="javascript">';
echo 'alert("Wrong ID or Password! Please try again!")';
echo '</script>';
}
mysqli_close($con);
}
}

if(isset($_SESSION['adminlogin'])){
header("location: admin.php");
}

?>
