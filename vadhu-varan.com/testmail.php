<?php
if($_GET['mail']=='true')
{
$to = "gitacommunications@gmail.com";
$subject = "Abuse Request Recieved";
$message = "<h3>Warm Wishes</h3>
You have an profile Abuse request.Please check it Soon.........
<br><br>Team <br>Vadhu-Varan";
	
	$headers  = "from:VADHU-VARAN.COM<response@vadhu-varan.com>\r\n";
	$headers .= "Reply-To: gitacommunications@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html";
	mail ( $to, $subject, $message, $headers );
}

echo "Hello World";
?>