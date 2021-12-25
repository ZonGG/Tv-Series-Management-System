<?php
//delete director query

include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$Director_ID= $_GET['Director_ID'];


$sql = "DELETE FROM tv_series_director WHERE Director_ID = '$Director_ID';";
$sql .= "DELETE FROM director WHERE Director_ID = '$Director_ID';";





if(mysqli_multi_query($con, $sql))
{

  echo "<script language=\"JavaScript\">\n";
  echo "alert('Director Deleted Successfully!');\n";
  echo "window.location='director_list.php'";
  echo "</script>";
  mysqli_close($con);
    exit;

}
else
{
    echo "Error deleting record";
}
?>