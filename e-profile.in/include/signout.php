<?php 
/*
 * clear all session and amke them empty
 */
if(isset($_SESSION['pin']))
{unset($_SESSION['pin']);}
echo '<script>directLocation(\'index.php\');</script>';
?>