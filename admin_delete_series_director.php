<?php

include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$Series_ID = $_GET["Series_ID"];
$Director_ID = $_GET["Director_ID"];

$del = mysqli_query($con,"DELETE from tv_series_director WHERE Series_ID = '$Series_ID' AND Director_ID='$Director_ID'");

if($del)
{

  echo "<script language=\"JavaScript\">\n";
  echo "alert('Director Deleted Successfully!');\n";
  echo "window.location='admin_edit_series.php?Series_ID=$Series_ID#popup3'";
  echo "</script>";
  mysqli_close($con);
    exit;

}
else
{
    echo "Error deleting record";
}
?>
