<?php

include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$Series_ID = $_GET["Series_ID"];
$Award_ID = $_GET["Award_ID"];
$year = $_GET["year"];

$del = mysqli_query($con,"DELETE from tv_series_award WHERE Series_ID = '$Series_ID' AND Award_ID='$Award_ID' and Year='$year'");

if($del)
{

  echo "<script language=\"JavaScript\">\n";
  echo "alert('Award Deleted Successfully!');\n";
  echo "window.location='admin_edit_series.php?Series_ID=$Series_ID#popup4'";
  echo "</script>";
  mysqli_close($con);
    exit;

}
else
{
    echo "Error deleting record";
}
?>
