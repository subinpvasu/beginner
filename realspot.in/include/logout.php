<?php 

if($_SESSION['account'] == 'true') 
{


$_SESSION['account'] = 'false';
$_SESSION['email']   = 'exit' ;
$_SESSION['id']		 = '';

echo '
<h1 class="title">Successfully Logged Out!</h1><b>

    <script language="JavaScript" type="text/javascript">  
    var count =6  
    var redirect="template.php"  
      
    function countDown(){  
     if (count <=0){  
      window.location = redirect;  
     }else{  
      count--;  
      document.getElementById("timer").innerHTML = "This page will redirect in "+count+" seconds."  
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