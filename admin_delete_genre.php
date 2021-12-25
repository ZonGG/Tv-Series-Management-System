<?php
//delete genre query

include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$Genre_ID= $_GET['Genre_ID'];


$sql = "DELETE FROM tv_series_genre WHERE Genre_ID = '$Genre_ID';";
$sql .= "DELETE FROM genre WHERE Genre_ID = '$Genre_ID';";





if(mysqli_multi_query($con, $sql))
{

  echo "<script language=\"JavaScript\">\n";
  echo "alert('Genre Deleted Successfully!');\n";
  echo "window.location='genre_list.php'";
  echo "</script>";
  mysqli_close($con);
    exit;

}
else
{
    echo "Error deleting record";
}
?>