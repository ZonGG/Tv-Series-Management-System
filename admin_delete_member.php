<?php
//delete member query

include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$MemberID= $_GET['Member_ID'];

$sqld = "DELETE FROM account WHERE Member_ID = '$MemberID';";
$sqld .= "DELETE FROM member WHERE Member_ID = '$MemberID'";



if(mysqli_multi_query($con, $sqld))
{

  echo "<script language=\"JavaScript\">\n";
  echo "alert('Member Deleted Successfully!');\n";
  echo "window.location='admin.php'";
  echo "</script>";
  mysqli_close($con);
    exit;

}
else
{
    echo "Error deleting record";
}
?>

