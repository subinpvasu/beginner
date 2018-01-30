<?php
session_start();
$k = $_GET['number'];
$i = $_SESSION['id'];
echo'
<script>

	 var redirect="template.php?msg=pay&prid='.$k.'&name'.$i.'"; 
	 window.location=redirect;


</script>
';



?>