<?php
#############################################-------0--------Set some messages.
#############################################-------1--------Register Email-
#############################################-------2--------Password Change Mail-
#############################################-------3--------Spam Reported Mail
#############################################-------4--------DEO Register-
#############################################-------5--------DEO Resend-
#############################################-------6--------Add Property-
#############################################-------7--------Contact Us-

$msg_header = '<div style="background-color:#123947;width:550px;height:500px;">
<div style="text-align:center;color:white;font-weight:bold;width:550px;
font-size:20px;background-repeat:no-repeat;padding-top:50px;
background-image:url(http://www.autovipany.in/images/logo.png);height:95px;">
Website for Selling/Buying Automobiles
<a href="http://autovipany.in" style="text-decoration:none;display:block;color:lightblue;text-align:center">www.autovipany.in</a></div>
<table style="text-align:center;width:100%;color:white;padding-left:25px;">
<tbody>';
$styll = 'position:absolute;opacity:0.2;';

$water = '<tr><td colspan="2" style="text-align:center;white-space:nowrap;"><div style="color:white;top:490px;left:490px;">Powered by Gitacommunications <a href="tel:9387335165" style="text-decoration:none;color:white;">9387335165</a> &copy; '.date("Y").'</div></td></tr></table>';
function composeSender($first,$second,$third,$fourth)
{
$sender = '<tr><td align="left" style="text-align:justify;font-style:italic;" colspan="3">
<p style="display:block;line-height:1px;color:white;">From,</p>
<p style="display:block;line-height:1px;color:white;">'.$first.'</p>
<p style="display:block;line-height:1px;color:white;">'.$second.'</p>
<a href="tel:'.$third.'" style="display:block;line-height:1px;color:white;">'.$third.'</a><br/>
<a href="mailto:'.$fourth.'" style="display:block;line-height:1px;color:white;">'.$fourth.'</a></td></tr>';
return $sender;
}
function composeTopic($fifth)
{
$topic  = '<tr><td align="left" style="width:20px;"><p style="display:block;line-height:10px">Topic:</p></td>
<td align="left" colspan="2">'.$fifth.'</td></tr>
';
return $topic;
}
function composeMsg($sixth)
{
$msg = '<tr><td align="left" style="text-align:justify" colspan="3">'.$sixth.'</td></tr>';
return $msg;
}
function composeConclusion($seventh)
{
$conclusion = '<tr><td align="left" style="padding-top:10px;font-style:italic;" colspan="3"><p style="display:block;line-height:1px">Thanks,</p>
<p style="display:block;line-height:1px">'.$seventh.'</p></td></tr>';
return $conclusion;
}


function composeNewMessage($topic='testing',$mesag='a lot of things',$name='Autovipany.in',$type='C/o Gitacommunications',$mobile='MG Road, Thrissur',$mail='09387335165',$conclude='Team Autovipany.')
{
	global $msg_header,$water;
	$content  = $msg_header;
	$content .= composeSender($name,$type,$mobile,$mail);
	$content .= composeTopic($topic);
	$content .= composeMsg($mesag);
	$content .= composeConclusion($conclude);
	$content .= $water;
	return $content;
}
function postTheMail($message,$to,$subject)
{
	$from = "WWW.AUTOVIPANY.IN<response@autovipany.in>";
	$headers  = "from:" . $from . "\r\n";
	$headers .= "Reply-To: $_POST[cont_mail]\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type:text/html; charset=ISO-8859-1\r\n";
	mail ( $to, $subject, $message, $headers );
}

?>