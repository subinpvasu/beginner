<?php
session_start();
if($_SESSION['data'] != 'true')
{
echo "You are Not suppose to be here!<br>";
echo '
<script>
window.location="http://www.career4you.in";
</script>
';	
}

function closepage()
{
	header('location:index.php');
}
$_SESSION['data']     = 'subin';
$_SESSION['job']      = 'subin';
$_SESSION['firm']     = 'subin';
$_SESSION['resume']   = 'subin';
$_SESSION['more']     = 'subin';
$_SESSION['chk']	  = 'subin';
$_SESSION['company']  = 'subin';
$_SESSION['employee'] = 'subin';
closepage();
?>