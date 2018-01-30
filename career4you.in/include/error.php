<?php
if(isset($_GET['aim']))
{
	$url = $_GET['aim'];
	echo'<h2 style="text-align:center;color:red">Username & Password not matching.!</h2>
	 <script language="JavaScript" type="text/javascript">  
    var count =2  
    var redirect="index.php?msg='.$url.'"  
      
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
    ';
}
?>