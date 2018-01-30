<?php
$email = "gitacommunications@gmail.com";
$to=$email;
$subject="Order Details";
$message="<html><body>
<table><tr><td>

 Name  </td><td> subinpvasu</td>
<td> mail </td><td>  $_GET[mail]</td>

</tr>
</table>
 
</body>
</html>



";
$from="response@realspot.in";
$headers="from:".$from."\r\n";
$headers .= "Reply-To: realspot.in@gmail.com\r\n";
$headers  .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html";

mail($to,$subject,$message,$headers);


?>