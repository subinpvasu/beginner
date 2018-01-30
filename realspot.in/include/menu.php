
<html>
<head>
</head><body>


<?php 
 /*
echo '

<span style="padding:15px 10px; margin:5px; text-decoration:none"><a href="">
<font color="white"><b>Home</b></font>
</a></span>
<span style="padding:0 10px"><a href=""><font color="white"><b>About Us</b></font></a></span>
<span style="padding:0 10px"><a href=""><font color="white"><b>Sell</b></font></a></span>
<span style="padding:0 10px"><a href=""><font color="white"><b>Buy</b></font></a></span>
<span style="padding:0 10px"><a href=""><font color="white"><b>Contact Us</b></font></a>
</span>
<span style="padding:0 10px"><a href=""><font color="white"><b>Payments</b></font></a></span>
<span style="padding:0 10px"><a href=""><font color="white"><b>FAQ</b></font></a></span>


';

echo'
<table cellpadding="5" cellspacing="0">
<tr>
<td width="14%"><a href=""><font color="white"><b> Home </b></font></a></td>
<td width="14%"><a href=""><font color="white"><b> Login </b></font></a></td>
<td width="14%"><a href=""><font color="white"><b> Buy </b></font></a></td>
<td width="14%"><a href=""><font color="white"><b> Sell </b></font></a></td>
<td width="14%"><a href=""><font color="white"><b> Register </b></font></a></td>
<td width="14%"><a href=""><font color="white"><b> Contact Us </b></font></a></td>
<td width="14%"><a href=""><font color="white"><b> FAQ </b></font></a></td>
</tr>

</table>
';
*/
if($_SESSION['account'] == 'true')
{
echo'
<ul>
  <li><a href="template.php"><span>Home</span></a></li>
  <li><a href="#"><span>Buy</span></a></li>
  <li><a href="./property/accept.htm"><span>Sell</span></a></li>
  <li><a href="#"><span>Contact</span></a></li>
  <li><a href="template.php?info=quit" ><span>LogOut</span></a></li>
</ul>
';
}
else
{
echo '
<ul>
  <li><a href="template.php"><span>Home</span></a></li>
  <li><a href="template.php?catid=login"><span>Login</span></a></li>
  <li><a href="template.php?catid=register"><span>Register</span></a></li>
  <li><a href="#"><span>Buy</span></a></li>
  <li><a href="./property/accept.htm"><span>Sell</span></a></li>
  <li><a href="#"><span>Contact</span></a></li>
</ul>
';
}
 
?>
