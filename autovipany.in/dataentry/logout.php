<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head></head>
<body><?php 
if($_SESSION['user'] > 0) 
{
$_SESSION['user'] = 'subinpvasu';
$_SESSION['person'] = 'subinpvasu';
echo '
<h1 style="color:blue;text-align:center;">Successfully Logged Out!</h1><b>
<script  type="text/javascript">  
var count = 4; 
var redirect="login.php" ; 
function countDown(){  
if (count <=0){  
window.location = redirect;  
}else{  
count--;  
document.getElementById("timer").innerHTML = "<h2 style=color:brown;display:block;>THANK YOU COME AGAIN</h2><p>www.autovipany.in</p>";  
setTimeout(function(){countDown()}, 1000)  ;
}  
}  
</script>  
<span id="timer" style="text-align:center;">  
<script>  
countDown();  
</script>  
</span>  
</b>'; 
}
else
{
header('location:login.php');
}
?></body>
</html>