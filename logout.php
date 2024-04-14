<?php
session_start();
session_unset();
session_destroy();
header('location:login.php');
exit; // Make sure to add this to prevent further execution
?>
