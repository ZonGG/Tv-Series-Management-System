<?php

include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$Series_ID = $_GET["Series_ID"];
$Actor_ID = $_GET["Actor_ID"];

$del = mysqli_query($con,"DELETE from tv_series_actor WHERE Series_ID = '$Series_ID' AND Actor_ID='$Actor_ID'");

if($del)
{

  echo "<script language=\"JavaScript\">\n";
  echo "alert('Actor Deleted Successfully!');\n";
  echo "window.location='admin_edit_series.php?Series_ID=$Series_ID#popup2'";
  echo "</script>";
  mysqli_close($con);
    exit;

}
else
{
    echo "Error deleting record";
}
?>
