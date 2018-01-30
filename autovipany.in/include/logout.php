<?php 
session_start();
if($_SESSION['id']>0) 
{
unset($_SESSION['id']);
echo '
<h1 class="title">THANK YOU COME AGAIN.</h1><b>
<script language="JavaScript" type="text/javascript">  
var count =6  
var redirect="index.php"  
function countDown(){  
if (count <=0){  
window.location = redirect;  
}else{  
count--;  
document.getElementById("timer").innerHTML = "www.autovipany.in"  
setTimeout("countDown()", 1000)  
}  
}  
</script>  
<span id="timer">  
<script>  
countDown();  
</script>  
</span>  
</b>';
}
else
{
echo "you are not logged in anymore from logout.php";
}
?>