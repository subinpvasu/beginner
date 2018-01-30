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

?>
<html>
<body style="text-align: center">
<?php 
if($_SESSION['job']=='added' && $_SESSION['resume']=='false'){
?>
	<p style="color:green;font-weight: bold;padding-bottom: 25px">Job Posted Successfully.!</p><br />
	<p style="padding-bottom: 0px"><a href="javascript:sameFirm()" style="text-decoration: none;color:blue;">
	Post New Job for same Company</a></p>
	<br />
	<p style="padding-top: 0px"><a href="javascript:newFirm()"  style="text-decoration: none;color:blue;">
	Post New Firm &amp; Jobs</a></p>
	<br />


<?php 
}
else if($_SESSION['resume'] != 'true' && $_SESSION['resume'] != 'false')
{
	?>
	
	<p ><a href="javascript:postJob()" style="text-decoration: none;color:blue;">
	Post Job</a></p>
	<br />
	<p ><a href="javascript:postResume()"  style="text-decoration: none;color:blue;">
	Post Resume</a></p>
	
	<?php 
}
else if($_SESSION['more']=='true')
{
?>
<p style="color:green;font-weight: bold;padding-bottom: 25px"><?php echo $_SESSION['employee']."----";?>
Resume Added Successfully.!</p><br />
	<p style="padding-bottom: 0px"><a href="javascript:newResume()" style="text-decoration: none;color:blue;">
	Add New Resume</a></p>
	<br />
	
	<?php 
}
?>


</body>
</html>