<?php


include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$Series_ID = $_GET["Series_ID"];
$Genre_ID = $_GET["Genre_ID"];

$del = mysqli_query($con,"DELETE from tv_series_genre WHERE Series_ID = '$Series_ID' AND Genre_ID='$Genre_ID'");

if($del)
{

  echo "<script language=\"JavaScript\">\n";
  echo "alert('Genre Deleted Successfully!');\n";
  echo "window.location='admin_edit_series.php?Series_ID=$Series_ID#popup1'";
  echo "</script>";
  mysqli_close($con);
    exit;

}
else
{
    echo "Error deleting record";
}
?>
