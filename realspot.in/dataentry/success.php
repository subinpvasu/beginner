<?php 
session_start();
if($_SESSION['userid'] > 0)
{
echo '
You have Successfully Added the Details.!<br>
';
echo '
<a href="useraccount.php">Add One More Details</a><br>

';
echo '
<a href="logout.php">Logout</a>

';
}
else
{
header('Location:login.php');


}