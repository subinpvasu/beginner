<?php
session_start ();
if ($_SESSION ['user'] > 0) {
	echo '<h2 style="text-align:center;color:brown">You have Successfully Added the Details.!</h2>
<h4 style="text-align:center;"><a href="useraccount.php" style="text-decoration:none;font-weight:bolder;">Add One More Details</a></h4>
<h3 style="text-align:center">
<a style="text-decoration:none;text-transform:uppercase;color:blue" href="logout.php">Logout</a>
</h3>';
} else {
	header ( 'Location:login.php' );
}
?>