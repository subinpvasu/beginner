
<script  type="text/javascript">
<!--
//email***********************************


function showUser(str)
{

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
				document.getElementById("msgmail").innerHTML=xmlhttp.responseText;
				}
				}
				xmlhttp.open("GET","./include/validation.php?msg=email&q="+str,true);
				xmlhttp.send();
}

///*******************type
function showType(str)
{

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
				document.getElementById("msgtype").innerHTML=xmlhttp.responseText;
				}
				}
				xmlhttp.open("GET","./include/validation.php?msg=type&q="+str,true);
				xmlhttp.send();
}
////////************************name
function showName(str)
{

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
				document.getElementById("msgname").innerHTML=xmlhttp.responseText;
				}
				}
				xmlhttp.open("GET","./include/validation.php?msg=name&q="+str,true);
				xmlhttp.send();
}
//**********************************mobile
function showMobile(str)
{

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
				document.getElementById("msgmobile").innerHTML=xmlhttp.responseText;
				}
				}
				xmlhttp.open("GET","./include/validation.php?msg=mobile&q="+str,true);
				xmlhttp.send();
}
//*********************************landline 
function showPhone(str)
{
						
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
				document.getElementById("msgphone").innerHTML=xmlhttp.responseText;
				}
				}
				xmlhttp.open("GET","./include/validation.php?msg=phone&q="+str,true);
				xmlhttp.send();
}
//************************password
function showPass(str)
						{
						var strr = document.getElementById("passa").value;
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
				document.getElementById("msgpass").innerHTML=xmlhttp.responseText;
				}
				}
				xmlhttp.open("GET","./include/validation.php?msg=password&p="+str+"&q="+strr,true);
				xmlhttp.send();
}
function showPassone(str)
{
						var strr = document.getElementById("passb").value;
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
				document.getElementById("msgpass").innerHTML=xmlhttp.responseText;
				}
				}
				xmlhttp.open("GET","./include/validation.php?msg=passone&p="+str+"&q="+strr,true);
				xmlhttp.send();
}

function validForm()
{

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
				document.getElementById("warning").innerHTML=xmlhttp.responseText;
				}
				}
				xmlhttp.open("GET","./include/validation.php?msg=validity",true);
				xmlhttp.send();
}

//&&&&&&&&&&&&&quot;
var error=new Array(); 
error[0] = 'subin';
error[1] = 'subin';
error[2] = 'subin';
error[3] = 'subin';
error[4] = 'subin';
error[5] = 'subin';
error[6] = 'subin';
error[7] = 'subin';



				function loadEmail()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Enter Valid email ID.</font>";
				error[0] = 'true';
				
				}

				
				function loadEuse()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Email ID already in Use.</font>";
				error[0] = 'true';
				}
				
				
function loadtEuse()
{
	error[0] = 'false';
	error[1] = 'false';
	document.getElementById("warning").innerHTML = "";
	
}



				
				function loadType()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Select the Type.</font>";
				error[2] = 'true';
				}

function loadtType()
{
	error[2] = 'false';
	document.getElementById("warning").innerHTML = "";
}

				function loadMobile()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Enter Valid Mobile Number.</font>";
				error[3] = 'true';
				}

function loadtMobile()
{
	error[3] = 'false';
	document.getElementById("warning").innerHTML = "";
	
}

				function loadPhone()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Enter Valid LandLine Number.</font>";
				error[4] = 'true';
				}

function loadtPhone()
{
	error[4] = 'false';
	document.getElementById("warning").innerHTML = "";
}

				function loadName()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Enter a Valid Name.</font>";
				error[5] = 'true';
				}

function loadtName()
{
	error[5] = 'false';
	document.getElementById("warning").innerHTML = "";
}
				 
				function loadPassa()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Password not Matching.</font>";
				error[6] = 'true';
				}


				
				function loadPassb()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Password not Matching.</font>";
				error[7] = 'true';
				}

function loadtPassa()
{
	
document.getElementById("warning").innerHTML = "<font color=green>Password  Matching.</font>";	
		error[6] = 'false';
		error[7] = 'false';
}



function validateForm()
{
if(error[0] == 'false' && error[1] == 'false' &&  error[2] == 'false' &&  error[3] == 'false' && 
error[4] == 'false' &&  error[5] == 'false' &&  error[6] == 'false' &&  error[7] == 'false' )
{
return true;
}
else
{
alert("Please fill up Correctly!");
return false;
}

	
		
		
}
//-->


</script>


    <h3 align="left"> Register Here!</h3><br />
    <div align="center"> 
    
<form  action="process.php" onsubmit="return validateForm()"  method="post" name="reg_form">

<table  width="100%" ><tr><td width="30%">
I am</td><td><font color="red">*</font>:
</td><td width="50%">
<select class="select" name="type" id="type" onchange="showType(this.value)">
<option name="" value="">--Select--</option>
<option name="" value="Seller">Seller</option>
<option name="" value="Buyer">Buyer</option>
<option name="" value="Agent">Agent</option>
</select></td>
<td width="20%" id="msgtype"></td></tr>

<tr><td width="30%">
Name</td><td><font color="red">*</font>:
</td><td width="50%">
<input name="name" class="tb8" type="text" size="30" maxlength="30"
onchange="showName(this.value)" id="name"/></td>
<td width="20%" id="msgname"></td></tr>

<tr><td width="30%">
Mobile</td><td><font color="red">*</font>:
</td><td width="50%">
<input name="mobile" type="text" size="30" maxlength="12" id="mobile" class="tb8" onchange="showMobile(this.value)"/></td>
<td width="20%">
<p id="msgmobile"></p></td></tr>

<tr><td width="30%">  
Any LandLine</td><td><font color="red">*</font>:
</td><td width="50%">
<input type="text" name="phone" size="30" id="landline" class="tb8" onchange="showPhone(this.value)"/></td>
<td width="20%" id="msgphone"></td></tr>

<tr><td width="30%">
E-mail</td><td><font color="red">*</font>:
</td><td width="50%"><input name="email"type="text" class="tb8" size="30" maxlength="60"
id="mail" onkeyup="showUser(this.value)" onchange="showUser(this.value)"/></td>
<td width="20%" id="msgmail"></td></tr>

<tr><td width="30%">
Password</td><td><font color="red">*</font>:
 </td><td width="50%"><input name="passa" class="tb8"  type="password" size="30" maxlength="30" id="passa" 
 onchange="showPassone(this.value)"/></td>
 <td width="20%" id="msgpassed"></td></tr>
 
<tr><td width="30%">
Confirm Password</td><td><font color="red">*</font>:
</td><td width="50%"><input name="passb" class="tb8"  type="password" size="30" maxlength="30" id="passb" 
onkeyup="showPass(this.value)" /></td>
<td width="20%" id="msgpass"></td></tr>

<tr></tr>
</table>

<div  align="center">
<input type="hidden" name="advertid" value=<?php echo $_GET['number'] ?> />
<input type="hidden" name="address" value=<?php echo $_SERVER['REMOTE_ADDR'] ?> /> 



<input name="submit" class="fb5"  onclick="return validForm()" type="submit" value="Next" />
</div>

</form>
</div>
    
    <div align="right">
    <h4><a href="template.php?catid=login&number=<?php echo $_GET['number'] ?>" style="text-decoration:none">Login Here</a> </h4>
    </div>
    
    
    
    
    
    
    
    
    
    
    
  