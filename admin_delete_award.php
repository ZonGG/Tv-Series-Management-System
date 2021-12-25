<?php
//delete award query

include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$Award_ID= $_GET['Award_ID'];


$sql = "DELETE FROM tv_series_award WHERE Award_ID = '$Award_ID';";
$sql .= "DELETE FROM award WHERE Award_ID = '$Award_ID';";





if(mysqli_multi_query($con, $sql))
{

  echo "<script language=\"JavaScript\">\n";
  echo "alert('Award Deleted Successfully!');\n";
  echo "window.location='award_list.php'";
  echo "</script>";
  mysqli_close($con);
    exit;

}
else
{
    echo "Error deleting record";
}
?>