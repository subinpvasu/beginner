<?php
session_start();
if($_GET['its']=='done')
{
	echo '<b style="color:red;position:absolute;top:500px;text-height:50px;font-size:22px">Your Message Sent.</b>
	';
}
?><form method="post" action="controller.php">
<table align="center" >
<tr>
<td colspan="2" align="center" style="font-weight: bold;font-size: 14px;padding-bottom: 20px">
Feel Free to Contact us</td>
</tr>


<tr>

<td>
<table style="padding-right:20px">


<tr>
<td style="font-weight: bold;line-height: 20px">
Gita Communications <br />
TMK Complex, Mannath Lane, <br />
MG Road, Thrissur-1, Kerala. <br />
Ph: 0487-2323926/2335165 <br />
Mobile: 09387335165 <br />
Email: gitacommunications@gmail.com
</td>
</tr>

</table>
</td>






<td>
<table>



<tr>
<td>Name</td>
<td>:</td>
<td><input type="text" id="name" class="textbox" /></td>
</tr>

<tr>
<td>Address</td>
<td>:</td>
<td><textarea id="address" class="textarea"></textarea></td>
</tr>

<tr>
<td>Mobile</td>
<td>:</td>
<td><input type="text" id="phone" class="textbox" /></td>
</tr>

<tr>
<td colspan="3" style="position:absolute;color:red;font-weight:bold;" id="ack"></td>
</tr>


<tr>
<td>Email</td>
<td>:</td>
<td><input type="text" id="email" class="textbox" /></td>
</tr>

<tr>
<td>Subject</td>
<td>:</td>
<td><input type="text" id="subject" class="textbox" /></td>
</tr>

<tr>
<td>Message</td>
<td>:</td>
<td><textarea id="message" class="textarea"></textarea></td>
</tr>

<tr>
<td colspan="3" align="center">
<input type="button" name="contact" onclick="javascript:showClose()" value="Send now" class="button" /></td>
</tr>

</table>
</td>


</tr>
</table>
</form>