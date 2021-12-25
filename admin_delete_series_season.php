<?php

include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$Series_ID = $_GET["Series_ID"];
$Season_ID = $_GET["Season_ID"];

$sql = "DELETE FROM episode WHERE Season_ID = '$Season_ID';";
$sql .= "DELETE FROM season WHERE Season_ID = '$Season_ID';";

$del = mysqli_multi_query($con,$sql);

if($del)
{

  echo "<script language=\"JavaScript\">\n";
  echo "alert('Season Deleted Successfully!');\n";
  echo "window.location='admin_edit_series.php?Series_ID=$Series_ID#popup6'";
  echo "</script>";
  mysqli_close($con);
    exit;

}
else
{
    echo "Error deleting record";
}
?>
