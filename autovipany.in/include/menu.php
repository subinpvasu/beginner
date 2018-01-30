<?php
session_start ();
if (is_numeric ( $_SESSION ['id'] )) {
	echo '
<ul>
  <li><a href="index.php"><span>Home</span></a></li>
  <li><a href="index.php?msg=home"><span>profile</span></a></li>
  <li><a href="index.php?msg=sell"><span>Sell</span></a></li>
  <li><a href="index.php?msg=contact"><span>Contact</span></a></li>
  <li><a href="index.php?msg=quit"><span>LogOut</span></a></li>
</ul>
';
} else {
	echo '
<ul>
  <li><a href="index.php"><span>Home</span></a></li>
  <li><a href="index.php?msg=login"><span>Login</span></a></li>
  <li><a href="index.php?msg=register"><span>Register</span></a></li>
  <li><a href="index.php?msg=login"><span>Buy</span></a></li>
  <li><a href="index.php?msg=login"><span>Sell</span></a></li>
  <li><a href="index.php?msg=contact"><span>Contact</span></a></li>
</ul>
';
}

?>