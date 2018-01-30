<?php
session_start();

?>


<script type="text/javascript">
var error=new Array(); 
error[0] = 'subin';

function paStatus()
				{
				//document.getElementById("warning").innerHTML = "<font color=red>Select the Type.</font>";
				error[0] = 'true';
				}

function pcStatus()
{
	error[0] = 'false';
//	document.getElementById("warning").innerHTML = "";
}



	     function showStatus(str)
{
var user = "<?php echo $_SESSION['id'] ?>";


						if (window.XMLHttpRequest)
						{// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp=new XMLHttpRequest();
						}
						else
						{// code for IE6, IE5
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				xmlhttp.onreadystatechange=function()
				{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("status").innerHTML=xmlhttp.responseText;
				}
				}
				xmlhttp.open("GET","./include/validation.php?msg=change&q="+str+"&p="+user,true);
				xmlhttp.send();
}
    	
	/*	function paStatus()
		{
		var  curstatus = "success";
		}
		function pcStatus()
		{
		var curstatus = "fail";
		}
		*/
		function passCheck()
		{
		var pa = document.getElementById("passb").value;
		var pb = document.getElementById("passc").value;
		if( pa == "" || pa == null  ||  pb == ""  ||  pb == null )
		{
		alert ("Enter Valid Password!");
		return false;
		
		}
		
		if(pa == pb && error[0] == 'true')
		{
		//alert("true");
		return true;
		}
		else
		{
		alert("Password Not Matching!");
		return false;
		}
		
		
		
		}





</script>




<form name="password" action="./include/validation.php"  method="post" onsubmit="return passCheck()">
<table>
<tr>
<td>Current Password:</td><td><input class="tb8" type="password"  id="passa" name="passa" size="30" maxlength="20" onkeyup="showStatus(this.value)"/></td><td id="status"></td>
</tr>
<tr>
<td>New Password:</td><td><input class="tb8" type="password" name="passb" id="passb" size="30" maxlength="20"  /></td>
<td id="password"> </td>
</tr>
<tr>
<td>Confirm Password:</td><td><input class="tb8" type="password" name="passc" id="passc" size="30" maxlength="20"  /></td>
</tr>
<tr>
<td></td><td> <input type="submit" class="fb5" value="Change Password" name="changepass" /> 
<input type="hidden" name="userid" id="userid" value="<?php echo $_GET['name'] ?> "/>
 </td>
</tr>
</table>
</form>

