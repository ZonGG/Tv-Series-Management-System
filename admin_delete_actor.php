<?php
//delete actor query

include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$Actor_ID= $_GET['Actor_ID'];


$sql = "DELETE FROM tv_series_actor WHERE Actor_ID = '$Actor_ID';";
$sql .= "DELETE FROM actor WHERE Actor_ID = '$Actor_ID';";





if(mysqli_multi_query($con, $sql))
{

  echo "<script language=\"JavaScript\">\n";
  echo "alert('Actor Deleted Successfully!');\n";
  echo "window.location='actor_list.php'";
  echo "</script>";
  mysqli_close($con);
    exit;

}
else
{
    echo "Error deleting record";
}
?>