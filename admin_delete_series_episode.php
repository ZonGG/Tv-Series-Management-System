<?php

include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$Series_ID = $_GET["Series_ID"];
$Episode_ID = $_GET["Episode_ID"];

$del = mysqli_query($con,"DELETE from episode WHERE Episode_ID='$Episode_ID'");

if($del)
{

  echo "<script language=\"JavaScript\">\n";
  echo "alert('Episode Deleted Successfully!');\n";
  echo "window.location='admin_edit_series.php?Series_ID=$Series_ID'";
  echo "</script>";
  mysqli_close($con);
    exit;

}
else
{
    echo "Error deleting record";
}
?>
