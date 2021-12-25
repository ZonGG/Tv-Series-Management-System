<?php
//delete series query

include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}
$Series_ID= $_GET['Series_ID'];
$sql2 = "SELECT Season_ID FROM season WHERE Series_ID='$Series_ID'";
$result = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            $Season_ID= $row["Season_ID"];
            $sql3 ="DELETE FROM episode WHERE Season_ID='$Season_ID'";
            $result2 = mysqli_query($con,$sql3);
        }
    }



$sql = "DELETE FROM tv_series_actor WHERE Series_ID = '$Series_ID';";
$sql .= "DELETE FROM tv_series_award WHERE Series_ID = '$Series_ID';";
$sql .= "DELETE FROM tv_series_director WHERE Series_ID = '$Series_ID';";
$sql .= "DELETE FROM tv_series_genre WHERE Series_ID = '$Series_ID';";
$sql .= "DELETE FROM season WHERE Series_ID = '$Series_ID';";
$sql .= "DELETE FROM viewhistory WHERE Series_ID = '$Series_ID';";
$sql .= "DELETE FROM tv_series WHERE Series_ID = '$Series_ID'";




if(mysqli_multi_query($con, $sql))
{

  echo "<script language=\"JavaScript\">\n";
  echo "alert('Series Deleted Successfully!');\n";
  echo "window.location='series_list.php'";
  echo "</script>";
  mysqli_close($con);
    exit;

}
else
{
    echo "Error deleting record";
}
?>
