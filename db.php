<?php
//connection to the database

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "database_project";

	$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($con->connect_error);

	return $con;

?>
