<?php
function emailResponseFromServer($to,$subject,$msg)
{
	$to = "autovipany.in@gmail.com";
	$subject = "CONTACT US THROUGH ONLINE";
	$message = "<table>
<tr><td colspan=3 align=center>Feedback </td>
</tr</table>";
	$from = "WWW.AUTOVIPANY.IN<response@autovipany.in>";
	$headers = "from:" . $from . "\r\n";
	$headers .= "Reply-To: $_POST[cont_mail]\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html";
	
	mail ( $to, $subject, $message, $headers );
}

?>