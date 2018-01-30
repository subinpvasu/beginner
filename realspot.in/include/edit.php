<script type="text/javascript">

function showUser(str,b)
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
		xmlhttp.open("GET","./include/validation.php?msg=mail&from=acc&q="+str+"&p="+b,true);
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
/*function showPass(str)
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
*/
//&&&&&&&&&&&&&quot;
var error=new Array(); 
error[0] = 'false';
error[1] = 'false';
error[2] = 'false';
error[3] = 'false';
error[4] = 'false';
error[5] = 'false';
error[6] = 'false';
error[7] = 'false';



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
	/*			 
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

*/

function validateForm()
{
if(error[0] == 'false' && error[1] == 'false' &&  error[2] == 'false' &&  error[3] == 'false' && 
error[4] == 'false' &&  error[5] == 'false' )
{
return true;
}
else
{
alert("Please fill up Correctly!");
return false;
}

	
		
		
}







</script>
<?php




if($_SESSION['account'] == 'true') 
{
$email     = $_SESSION['email'];
$id = $_GET['name'];


$con = mysql_connect("localhost","wwwreals_realtes","test@123");


if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);

 
 
 $sql = "SELECT * FROM register WHERE email='$email' AND Id='$id'";
 
$result = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($result) > 0) 
{
while($row = mysql_fetch_array($result))
{
echo'     

<form  action="process.php" onsubmit="return validateForm()" method="post" name="reg_form">
    
  <table   style="padding-left:15px" align="center" width="450px"><tr><td >
    I am</td><td><font color="red">*</font>:</td><td ><select class="select" name="type"  id="item" onFocus="showType(this.value)" onchange="showType(this.value)">
    <option name="" value="">--Select--</option>
    <option name="" value="Seller" ';
	 if($row['type'] == 'Seller'){echo "selected";}
echo '	     >Seller</option>
    <option name="" value="Buyer" ';
	 if($row['type'] == 'Buyer'){echo "selected";}
echo '	    >Buyer</option>
    <option name="" value="Agent" ';
	 if($row['type'] == 'Agent'){echo "selected";}
echo	'    >Agent</option>
    </select></td><td  id="msgtype"></td></tr>
    
    <tr><td >
   Name </td><td><font color="red">*</font>:</td><td ><input name="name" class="tb8" type="text" size="30" maxlength="30" 
   onchange="showName(this.value)" onfocus="showName(this.value)" onkeyup="showName(this.value)" id="name" 
   value=" '.strip_tags( $row['name'] ).'" /></td><td  id="msgname">   </td></tr>
   <tr><td >
   Mobile</td><td><font color="red">*</font>:</td><td >
   <input name="mobile" type="text" size="30" maxlength="12" id="mobile"
   value="'.  $row['mobile'].'"  class="tb8" onfocus="showMobile(this.value)" onkeyup="showMobile(this.value)"
   onchange="showMobile(this.value)"/> </td><td ><p id="msgmobile" ></p>  </td></tr>
 <tr><td>  
LandLine </td><td><font color="red">*</font>:</td><td >
   <input type="text" name="phone" size="30" id="landline" class="tb8" 
   value="'.  $row['landline'].'" onchange="showPhone(this.value)" onfocus="showPhone(this.value)"
   onkeyup="showPhone(this.value)"
   /></td><td  id="msgphone"></td></tr>
   

    <tr><td >
 <!--  E-mail<font color="red">*</font>: --> </td><td ><input name="email" type="hidden" class="tb8" size="30" maxlength="60" id="mail"
   value="'.  $row['email'].'"  onchange="showUser(this.value,'.$row['Id'].')" onkeyup="showUser(this.value,'.$row['Id'].')"
   onfocus="showUser(this.value,'.$row['Id'].')"/></td><td  id="msgmail"></td></tr>
   <tr><td></td>
 
 <td align="left" colspan="2" valign="middle">
  <input type="hidden" name="id" value="'.$row['Id'].'">
 <input name="update" class="fb5" type="submit" value="Update" />
  
</td></tr>  </table>
   
   
  
    </form>
	
	';
}
}

/*****

<tr><td width="30%">
   Password<font color="red">*</font>: </td><td width="50%"><input name="passa" class="tb8" type="password" size="30" maxlength="30" value="'.  $row['password'].'" id="passa"/></td><td width="20%" id="msg"></td></tr>

*/
}
else
{
echo "you are not a valid user from edit.php";
}

?>