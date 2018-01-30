<?php
session_start();
if($_SESSION['data'] != 'true')
{
echo "You are Not suppose to be here!<br>";
echo '
<script>
window.location="http://www.vadhu-varan.com";
</script>
';	
}

function closepage()
{
	//header('location:index.php');
	echo '
<script>
window.location="index.php";
</script>
';	
}
$_SESSION['data']     = 'subin';
$_SESSION['optr']     = 'subin';

closepage();
?>
