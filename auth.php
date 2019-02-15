
<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: admin_loggin.php");
exit(); }
?>