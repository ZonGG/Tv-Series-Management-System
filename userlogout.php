<?php
session_start();
unset($_SESSION['Member_Email']);
unset($_SESSION['Member_Password']);
session_destroy();

header("Location: index.html");
exit;
?>
