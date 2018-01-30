<?php 
session_start();
$_SESSION['k']=10;
//session_destroy();
unset($_SESSION['k']);
echo $_SESSION['k'];
?>