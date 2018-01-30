<?php
session_start();
include_once 'include/functions.php';
$_SESSION['profile']='false';
$_SESSION['who']='me';
$_SESSION['verification']=false;
if($_SESSION['profile']=='false') 
{
echo '<h1 style="color:#c4160f;text-align:center;padding-top:75px;">THANK YOU <br /> <br /> VISIT  AGAIN</h1><b>
<script language="JavaScript" type="text/javascript">  
var count =6  
var redirect="index.php"  
function countDown(){  
if (count <=0){  
window.location = redirect;  
}else{  
count--;  
document.getElementById("timer").innerHTML = ""  
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
?>