<?php
//user logout the account and the login user's session is cleared
session_start();
unset($_SESSION['AdminID']);
unset($_SESSION['Password']);
session_destroy();

header("Location: adminlogin.html");
exit;
?>
