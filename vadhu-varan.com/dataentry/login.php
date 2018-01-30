<?php 
session_start();
if($_SESSION['chk'] != 'true')
{
echo "You are Not suppose to be here!<br>";
echo '
<script>
window.location="http://www.vadhu-varan.com";
</script>
';	
}

?>
<html><body style="text-align:center;padding-top:25%;"><form method="post" action="datacontroller.php">Username:
<input type="text" name="user" size="30" class="textbox" /><br/><br/>Password:
<input type="password" name="pass" size="30" class="textbox"/>
<br></br><input type="submit" name="submit" class="button" value="Login"/></form></body></html>
