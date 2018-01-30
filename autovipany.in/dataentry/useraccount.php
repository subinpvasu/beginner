<?php session_start();
include_once '../include/dblog.php';
if (is_numeric($_SESSION['user']))
{
function getDataEntryOperatorUser($var,$table='data_entry_operator') {
	if ($table=='data_entry_operator')
	{
		$persons = $_SESSION['user'];
	}
	else
	{
		$persons = $_SESSION['person'];
	}
	$sql = "SELECT $var FROM $table WHERE id=" . $persons;
	$result = mysql_query ( $sql ) or die ( "Error in query: $sql. " . mysql_error () );
	$data = mysql_fetch_array($result);
	return $data[0];
	//connect using and return name
}
?>
<html><head>
<script type="text/javascript" >
function loadAJAX()
{
if (window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
return xmlhttp;
}

function populateEverySelect(sbn)
{
		loadAJAX().onreadystatechange = function() {
			if (xmlhttp.readyState < 4) {
				document.getElementById("guard").style.display = 'block';
			}
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("brand").innerHTML = xmlhttp.responseText;
				populateEveryYear(sbn);
			}
		};
		xmlhttp.open("GET", "../include/validation.php?msg=populate&key="+sbn, true);
		xmlhttp.send();
}
function populateEveryYear(sbn)
{
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("year").innerHTML = xmlhttp.responseText;
			populateEveryColor(sbn);
		}
	};
	xmlhttp.open("GET", "../include/validation.php?msg=populaty&key="+sbn, true);
	xmlhttp.send();
}
function populateEveryColor(sbn)
{
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("color").innerHTML = xmlhttp.responseText;
			populateEveryFuel(sbn);
		}
	};
	xmlhttp.open("GET", "../include/validation.php?msg=populatc&key="+sbn, true);
	xmlhttp.send();
}
function populateEveryFuel(sbn)
{
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("guard").style.display = 'none';
			document.getElementById("fuel").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "../include/validation.php?msg=populatf&key="+sbn, true);
	xmlhttp.send();
}
function resetPerson()
{
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("guard").style.display = 'block';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("guard").style.display = 'none';
			window.location.reload();
		}
	};
	xmlhttp.open("GET", "../include/validation.php?msg=reset", true);
	xmlhttp.send();
}
function isNumberKey(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode;
   if (charCode != 46 && charCode > 31 
     && (charCode < 48 || charCode > 57))
      return false;

   return true;
}
</script>
<link href="../css/style.css"/ rel="stylesheet" type="text/css">
</head><body style="background-color:white;font-family:inherit;font-size: 12px;margin 0 auto;">
<div id="guard" style="position:fixed;background-color:black;opacity:0.4;width:100%;height:100%;display:none;">
</div>
<!-- Personal Details -->
<hr style="color:green;width:50%;"/>
<h3 style="text-align:center">PERSONAL DETAILS</h3><h4 style="text-align: right;position:absolute;right:1px;text-transform:uppercase">
<a href="logout.php">Logout</a></h4>
<hr style="color:green;width:50%;"/>
<form action="dataprocess.php" id="motor_form" enctype="multipart/form-data" method="post">
<?php 
if (is_numeric($_SESSION['person']))
{
	?>
	
	<table align="center" id="person" >
	<tr>
		<td>I am</td>
		<td>:</td>
		<td><select class="select" name="type" id="type">
			<option value="">--Select--</option>
			<option <?php if (getDataEntryOperatorUser('type','rcowner')=='Seller'){echo"selected";} ?> value="Seller">Seller</option>
			<option <?php if (getDataEntryOperatorUser('type','rcowner')=='Buyer'){echo"selected";} ?> value="Buyer">Buyer</option>
			<option <?php if (getDataEntryOperatorUser('type','rcowner')=='Agent'){echo"selected";} ?> value="Agent">Agent</option>
		</select></td>

	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><input name="name" class="textbox" type="text" size="30" value="<?php echo getDataEntryOperatorUser('name','rcowner');?>" id="name" /></td>
	</tr>

	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><input name="mobile" type="text" size="30" id="mobile"
			class="textbox" value="<?php echo getDataEntryOperatorUser('mobile','rcowner');?>" /></td>
	</tr>

	<tr>
		<td>Any LandLine</td>
		<td>:</td>
		<td><input type="text" value="<?php echo getDataEntryOperatorUser('phone','rcowner');?>" name="phone" size="30" id="landline"
			class="textbox" /></td>
	</tr>

	<tr>
		<td>E-mail</td>
		<td>:</td>
		<td><input name="email" type="text" value="<?php echo getDataEntryOperatorUser('email','rcowner');?>" class="textbox" size="30"
			id="mail" /></td>
	</tr>
	
	<tr>
		<td>Address</td>
		<td>:</td>
		<td><textarea class="textarea" name="address"><?php echo getDataEntryOperatorUser('address','rcowner');?></textarea></td>
	</tr>

<tr>
		<td colspan="3" style="text-align:center;"><a href="javascript:void resetPerson()">Change Person</a></td>
</tr>
</table>
	<?php 
}
else 
{
?>

<table align="center" id="person" >
	<tr>
		<td>I am</td>
		<td>:</td>
		<td><select class="select" name="type" id="type">
			<option value="">--Select--</option>
			<option <?php if ($_POST['type']=='Seller'){echo"selected";} ?> value="Seller">Seller</option>
			<option <?php if ($_POST['type']=='Buyer'){echo"selected";} ?> value="Buyer">Buyer</option>
			<option <?php if ($_POST['type']=='Agent'){echo"selected";} ?> value="Agent">Agent</option>
		</select></td>

	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><input name="name" class="textbox" type="text" size="30" value="<?php echo $_POST['name'];?>" id="name" /></td>
	</tr>

	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><input name="mobile" type="text" size="30" id="mobile"
			class="textbox" value="<?php echo $_POST['mobile'];?>" /></td>
	</tr>

	<tr>
		<td>Any LandLine</td>
		<td>:</td>
		<td><input type="text" value="<?php echo $_POST['phone'];?>" name="phone" size="30" id="landline"
			class="textbox" /></td>
	</tr>

	<tr>
		<td>E-mail</td>
		<td>:</td>
		<td><input name="email" type="text" value="<?php echo $_POST['email'];?>" class="textbox" size="30"
			id="mail" /></td>
	</tr>
	
	<tr>
		<td>Address</td>
		<td>:</td>
		<td><textarea class="textarea" name="address"><?php echo $_POST['address'];?></textarea></td>
	</tr>

</table>
<?php 
}
?>
<!--

change when needed else add with same id.
check using session.
if updated setand if new reset session choose id from these sesssions.

--><table id="dualperson" style="display:none;">
<tr>
		<td colspan="3" style="text-align:center;"><a href="javascript:void resetPerson()">Change Person</a></td>
</tr>
</table>


<hr style="color:green;width:50%;"/>
<h3 style="text-align:center">VEHICLE DETAILS</h3>
<hr style="color:green;width:50%;"/>
<!-- Product Add Here -->

<table align="center">

	<tr>
		<td>Advertisement Title</td>
		<td>:</td>
		<td><input type="text" name="adtitle" class="textbox" /></td>
	</tr>

	<tr>
		<td>Vehicle Type</td>
		<td>:</td>
		<td><select class="select" name="category"
			onchange="populateEverySelect(this.value)">
			<option value="0">Select Type</option>
			<option value="1">Scooter</option>
			<option value="2">Bike</option>
			<option value="3">Auto Rikshaw</option>
			<option value="4">Car</option>
			<option value="5">Bus/Tempo/Truck</option>
			<option value="6">Other</option>
		</select></td>
	</tr>

	<tr>
		<td>Condition</td>
		<td>:</td>
		<td><select class="select" name="condition">
			<option value="0">Select</option>
			<option value="1">New</option>
			<option value="2">Used</option>
		</select></td>
	</tr>

	<tr>
		<td>Price</td>
		<td>:</td>
		<td><input type="text" onkeypress="return isNumberKey(event)" name="price" class="textbox" /></td>
	</tr>

	<tr>
		<td>Brand</td>
		<td>:</td>
		<td id="brand"><select class="select" name="brand">
			<option>Select Vehicle Type</option>
		</select></td>
	</tr>

	<tr>
		<td>Model</td>
		<td>:</td>
		<td><input type="text" name="model" class="textbox" /></td>
	</tr>

	<tr>
		<td>Year</td>
		<td>:</td>
		<td id="year"><select class="select" name="year">
			<option>Select Vehicle Type</option>
		</select></td>
	</tr>

	<tr>
		<td>Kms Driven</td>
		<td>:</td>
		<td><input type="text" name="driven" class="textbox" /></td>
	</tr>

	<tr>
		<td>Colour</td>
		<td>:</td>
		<td id="color"><select class="select" name="color">
			<option>Select Vehicle Type</option>
		</select></td>
	</tr>

	<tr>
		<td>Fuel</td>
		<td>:</td>
		<td id="fuel"><select class="select" name="fuel">
			<option>Select Vehicle Type</option>
		</select></td>
	</tr>

	<tr>
		<td>Transmission(Gear)</td>
		<td>:</td>
		<td><select class="select" name="transmission">
			<option value="0">Select</option>
			<option value="1">Automatic</option>
			<option value="2">Manual</option>
		</select></td>
	</tr>

	<tr>
		<td>Other Details</td>
		<td>:</td>
		<td><textarea name="other" class="textarea"></textarea></td>
	</tr>
	
	<tr>
		<td>Vehicle Image</td>
		<td>:</td>
		<td><input type="file" name="image"/></td>
	</tr>

	<tr>
		<td colspan="3" align="center"><input type="submit" class="button"
			name="motor" value="ADD VEHICLE"  /> <input type="button"
			onclick='javascript:void document.getElementById("motor_form").reset();' class="button"
			value="Clear Form" /></td>
	</tr>
</table>

</form>
</body></html>
<?php }
else {
header('location:login.php');
}?>