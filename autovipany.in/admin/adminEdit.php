<?php
include_once '../include/functions.php';
$flag = $_GET ['first'];
$plug = $_GET ['waste'];

#############
########### MAKE SURE THAT ID BELONGS TO SAM EO WNER LATER
############


/*
 * put these values as some variables to it and make them and call this by javascript and delete it. 
 * brand year color fuel.
 * onload fill all the form fields and let them to complete editing.
 * use an other function to image.
 * else put the functions here with the value selected.
 * remove left menu.add more table
 */
?>

<html>
<head>
<base>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
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

var temp="";
function changeStatus(prvlg,rid,rvl)//previlege,row id,row value
{
	var  r = confirm("Change Package Now...?");
	if(r==true)
	{
		loadAJAX().onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    temp=xmlhttp.responseText;
		    loadAgain(temp);
		    }
		  };
		xmlhttp.open("GET","validadmin.php?msg=previlege&p="+prvlg+"&i="+rid+"&v="+rvl,true);
		xmlhttp.send();
	} 
}
function loadAgain(temp)
{
	if(temp=='N'||temp=='Y')
	{
window.location.reload();
	}
}
</script>


</head>
<body style="background-color: white; font-family: serif">
<h2 align="center" style="color: blue; margin: 10px;">Profile Details</h2>
<hr style="width: 50%; color: red;" />
<?php
if ($_GET ['ipt'] == 'edit') {
	?>
<form action="admprocess.php" enctype="multipart/form-data"
	method="post">
<table align="center">

	<tr>
		<td>Advertisement Title</td>
		<td>:</td>
		<td><input type="text" name="adtitle"
			value="<?php
	echo getDetailsFromTable ( 'title', 'vehicle', $flag )?>"
			class="textbox" /></td>
	</tr>

	<tr>
		<td>Profile ID</td>
		<td>:</td>
		<td><?php
	$formattedNumber = sprintf ( '%06d', $flag );
	echo $formattedNumber;
	?></td>
	</tr>

	<tr>
		<td>Vehicle Type</td>
		<td>:</td>
		<td><?php
	displaySelectType ( getDetailsFromTable ( 'type', 'vehicle', $flag ) )?></td>
	</tr>

	<tr>
		<td>Condition</td>
		<td>:</td>
		<td><?php
	displaySelectCondn ( getDetailsFromTable ( 'conditions', 'vehicle', $flag ) )?></td>
	</tr>

	<tr>
		<td>Price</td>
		<td>:</td>
		<td><input type="text" name="price"
			value="<?php
	echo getDetailsFromTable ( 'price', 'vehicle', $flag )?>"
			class="textbox" onkeypress="return isNumberKey(event)" /></td>
	</tr>

	<tr>
		<td>Brand</td>
		<td>:</td>
		<td id="brand"><?php
	displaySelectBrand ( getDetailsFromTable ( 'type', 'vehicle', $flag ), getDetailsFromTable ( 'brand', 'vehicle', $flag ) )?></td>
	</tr>

	<tr>
		<td>Model</td>
		<td>:</td>
		<td><input type="text" name="model"
			value="<?php
	echo getDetailsFromTable ( 'model', 'vehicle', $flag )?>"
			class="textbox" /></td>
	</tr>

	<tr>
		<td>Year</td>
		<td>:</td>
		<td id="year"><?php
	displaySelectYear ( getDetailsFromTable ( 'years', 'vehicle', $flag ) )?></td>
	</tr>

	<tr>
		<td>Kms Driven</td>
		<td>:</td>
		<td><input type="text"
			value="<?php
	echo getDetailsFromTable ( 'driven', 'vehicle', $flag )?>"
			name="driven" class="textbox" /></td>
	</tr>

	<tr>
		<td>Colour</td>
		<td>:</td>
		<td id="color"><?php
	displaySelectColor ( getDetailsFromTable ( 'color', 'vehicle', $flag ) )?></td>
	</tr>

	<tr>
		<td>Fuel</td>
		<td>:</td>
		<td id="fuel"><?php
	displaySelectFuel ( getDetailsFromTable ( 'fuel', 'vehicle', $flag ) )?></td>
	</tr>

	<tr>
		<td>Transmission(Gear)</td>
		<td>:</td>
		<td><?php
	displaySelectTrans ( getDetailsFromTable ( 'transmission', 'vehicle', $flag ) )?></td>
	</tr>

	<tr>
		<td>Other Details</td>
		<td>:</td>
		<td><textarea name="other" class="textarea"><?php
	echo getDetailsFromTable ( 'description', 'vehicle', $flag )?> </textarea></td>
	</tr>

	<tr>
		<td>Visibility</td>
		<td>:</td>
		<td><a
			href="javascript:changeStatus('guest','<?php
	echo $flag?>','<?php
	echo getDetailsFromTable ( 'visibility', 'vehicle', $flag );
	?>')"><?php
	echo getDetailsFromTable ( 'visibility', 'vehicle', $flag );
	?></a></td>
	</tr>

	<tr>
		<td>Golden Profile</td>
		<td>:</td>
		<td><a
			href="javascript:changeStatus('golden','<?php
	echo $flag?>','<?php
	echo getDetailsFromTable ( 'golden', 'vehicle', $flag );
	?>')"><?php
	echo getDetailsFromTable ( 'golden', 'vehicle', $flag );
	?></a></td>
	</tr>

	<tr>
		<td>Premium Profile</td>
		<td>:</td>
		<td><a
			href="javascript:changeStatus('premium','<?php
	echo $flag?>','<?php
	echo getDetailsFromTable ( 'premium', 'vehicle', $flag );
	?>')"><?php
	echo getDetailsFromTable ( 'premium', 'vehicle', $flag );
	?></a></td>
	</tr>

	<tr>
		<td>Genuine</td>
		<td>:</td>
		<td></td>
	</tr>


	<tr>
		<td colspan="3" align="center"><input type="submit" class="button"
			name="motoredit" value="SAVE CHANGES" /> <input type="button"
			onclick="self.close();" class="button" value="Close" /> <input
			type="hidden" name="user" value="<?php
	echo $flag;
	?>" /></td>
	</tr>
</table>
<div id="disphoto" style="top: 403px; left: 700px; position: absolute;">
<p style="position: absolute; visibility: hidden" id="text">Change Image</p>
<?php
	getDetailsFromTable ( 'photo', 'vehicle', $flag ) == 'autovipany.jpg' ? $image = '../images/autovipany.png' : $image = "../upload/" . getDetailsFromTable ( 'photo', 'vehicle', $flag );
	?>
<img src="<?php
	echo $image;
	?>" alt="autovipanyImage"
	onmouseover="showText()" onmouseout="hideText()" height="50" width="50"
	onclick="javascript:void window.open('../popup/upimage.php?auth=true','_blank','width=500,height=200,left=100,top=100');return false;" />
<input type="hidden" name="photo"
	value="<?php
	echo getDetailsFromTable ( 'photo', 'vehicle', $flag )?>" /></div>
</form>

<?php
} else if (is_numeric ( $flag )) {
	?>
<table cellspacing="5">

	<tr>
		<td colspan="2" align="center">
		<h2><?php
	echo getDetailsFromTable ( 'title', 'vehicle', $flag );
	?></h2>
		</td>
	</tr>

	<tr>
		<td style="width: 436px; height: 327px;">
<?php
	if (getDetailsFromTable ( 'photo', 'vehicle', $flag ) == 'autovipany.jpg') {
		echo '<img src="../images/autovipany.png" width="430px" height="320px"/>';
	} else {
		echo '<img src="../upload/' . getDetailsFromTable ( 'photo', 'vehicle', $flag ) . '" width="430px" height="320px"/>';
	}
	?>
</td>
		<td>

		<table cellspacing="5" style="font-size: 14px; color: brown;">

			<tr>
				<td colspan="3"></td>
			</tr>

			<tr>
				<td>Profile ID</td>
				<td>:</td>
				<td><?php
	$formattedNumber = sprintf ( '%06d', $flag );
	echo $formattedNumber;
	?></td>
			</tr>

			<tr>
				<td>Brand</td>
				<td>:</td>
				<td><?php
	$z = strtolower ( $type [getDetailsFromTable ( 'type', 'vehicle', $flag )] ); //$car
	echo displayArrayasString ( $$z, getDetailsFromTable ( 'brand', 'vehicle', $flag ) );
	?></td>
			</tr>

			<tr>
				<td>Model</td>
				<td>:</td>
				<td><?php
	echo getDetailsFromTable ( 'model', 'vehicle', $flag );
	?></td>
			</tr>

			<tr>
				<td>Year of Release</td>
				<td>:</td>
				<td><?php
	echo displayArrayasString ( $year, getDetailsFromTable ( 'years', 'vehicle', $flag ) )?></td>
			</tr>

			<tr>
				<td>Price</td>
				<td>:</td>
				<td><?php
	echo "<img src=../images/rupee.png height=10px/> " . digitAliasPrice ( trim ( getDetailsFromTable ( 'price', 'vehicle', $flag ) ) ) . "/-";
	?></td>
			</tr>

			<tr>
				<td>Kms Driven</td>
				<td>:</td>
				<td><?php
	echo getDetailsFromTable ( 'driven', 'vehicle', $flag );
	?></td>
			</tr>

			<tr>
				<td>Color</td>
				<td>:</td>
				<td><?php
	echo displayArrayasString ( $color, getDetailsFromTable ( 'color', 'vehicle', $flag ) )?></td>
			</tr>

			<tr>
				<td>Fuel</td>
				<td>:</td>
				<td><?php
	echo displayArrayasString ( $fuel, getDetailsFromTable ( 'fuel', 'vehicle', $flag ) )?></td>
			</tr>

			<tr>
				<td>Transmission(Gear)</td>
				<td>:</td>
				<td><?php
	echo displayArrayasString ( $trans, getDetailsFromTable ( 'transmission', 'vehicle', $flag ) )?></td>
			</tr>

			<tr>
				<td>Condition</td>
				<td>:</td>
				<td><?php
	echo displayArrayasString ( $cond, getDetailsFromTable ( 'conditions', 'vehicle', $flag ) )?></td>
			</tr>

			<tr>
				<td>Details</td>
				<td>:</td>
				<td><?php
	echo getDetailsFromTable ( 'description', 'vehicle', $flag );
	?></td>
			</tr>

			<tr>
				<td>Visibility</td>
				<td>:</td>
				<td><a
					href="javascript:changeStatus('guest','<?php
	echo $flag?>','<?php
	echo getDetailsFromTable ( 'visibility', 'vehicle', $flag );
	?>')"><?php
	echo getDetailsFromTable ( 'visibility', 'vehicle', $flag );
	?></a></td>
			</tr>

			<tr>
				<td>Golden Profile</td>
				<td>:</td>
				<td><a
					href="javascript:changeStatus('golden','<?php
	echo $flag?>','<?php
	echo getDetailsFromTable ( 'golden', 'vehicle', $flag );
	?>')"><?php
	echo getDetailsFromTable ( 'golden', 'vehicle', $flag );
	?></a></td>
			</tr>

			<tr>
				<td>Premium Profile</td>
				<td>:</td>
				<td><a
					href="javascript:changeStatus('premium','<?php
	echo $flag?>','<?php
	echo getDetailsFromTable ( 'premium', 'vehicle', $flag );
	?>')"><?php
	echo getDetailsFromTable ( 'premium', 'vehicle', $flag );
	?></a></td>
			</tr>

			<tr>
				<td>Genuine</td>
				<td>:</td>
				<td></td>
			</tr>

		</table>

		</td>
	</tr>
</table>
<hr />
<table align="center"
	style="background-color: #BDE2F4; width: 500px; height: 150px; vertical-align: middle;"
	cellpadding="5">

	<tbody>
		<tr>
			<td style="text-align: center;">
			<h2>Contact Details</h2>
			</td>
		</tr>

		<tr>
			<td>
			<p style="text-align: center; color: blue; font-size: 14px;"><?php
	echo getDetailsFromTable ( 'name', 'rcowner', getDetailsFromTable ( 'holder', 'vehicle', $flag ) );
	?></p>
			<p style="text-align: center; color: blue; font-size: 14px;"><?php
	echo getDetailsFromTable ( 'mobile', 'rcowner', getDetailsFromTable ( 'holder', 'vehicle', $flag ) );
	?></p>
			<p style="text-align: center; color: blue; font-size: 14px;"><?php
	echo getDetailsFromTable ( 'email', 'rcowner', getDetailsFromTable ( 'holder', 'vehicle', $flag ) );
	?></p>
			<p style="text-align: center; color: blue; font-size: 14px;"><?php
	echo getDetailsFromTable ( 'address', 'rcowner', getDetailsFromTable ( 'holder', 'vehicle', $flag ) );
	?></p>

			<div align="right"><a style="color: red;" target="_blank"
				href="adminEdit.php?waste=<?php
	echo getDetailsFromTable ( 'id', 'rcowner', getDetailsFromTable ( 'holder', 'vehicle', $flag ) );
	?>">Edit
			User</a></div>

			</td>
		</tr>


	</tbody>
</table>
<div align="right"><a target="_blank"
	href="adminEdit.php?first=<?php
	echo $flag;
	?>&amp;ipt=edit"
	style="font-size: 15px; color: red; position: fixed; right: 10px; top: 150px;">Edit
Profile</a></div>

<?php
}
if ($_GET ['msg'] == 'edituser') {
	?>
<form action="admprocess.php" method="post">
<table align="center">
	<tr>
		<td>Type</td>
		<td>:</td>
		<td><select class="select" name="category">
			<option value="Select Type">Select Type</option>
			<option
				<?php
	if (getDetailsFromTable ( 'type', 'rcowner', $plug ) == 'Agent') {
		echo "selected";
	}
	?>
				value="Agent">Agent</option>
			<option
				<?php
	if (getDetailsFromTable ( 'type', 'rcowner', $plug ) == 'Buyer') {
		echo "selected";
	}
	?>
				value="Buyer">Buyer</option>
			<option
				<?php
	if (getDetailsFromTable ( 'type', 'rcowner', $plug ) == 'Seller') {
		echo "selected";
	}
	?>
				value="Seller">Seller</option>
		</select></td>
	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><input name="name" class="textbox" type="text" size="30" id="name"
			value="<?php
	echo getDetailsFromTable ( 'name', 'rcowner', $plug );
	?>" /></td>
	</tr>
	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><input name="mobile" type="text" size="30" id="mobile"
			value="<?php
	echo getDetailsFromTable ( 'mobile', 'rcowner', $plug );
	?>"
			class="textbox" /></td>
	</tr>
	<tr>
		<td>LandLine</td>
		<td>:</td>
		<td><input type="text" name="phone" size="30" id="landline"
			class="textbox"
			value="<?php
	echo getDetailsFromTable ( 'phone', 'rcowner', $plug );
	?>" /></td>
	</tr>
	<tr>
		<td>E-mail</td>
		<td>:</td>
		<td><input type="text" name="email"
			value="<?php
	echo getDetailsFromTable ( 'email', 'rcowner', $plug );
	?>"
			class="textbox" /></td>
	</tr>

	<tr>
		<td>Nickname</td>
		<td>:</td>
		<td><textarea name="nickname" class="textarea"><?php
	echo getDetailsFromTable ( 'nickname', 'rcowner', $plug );
	?></textarea></td>
	</tr>

	<tr>
		<td>Address</td>
		<td>:</td>
		<td><textarea name="address" class="textarea"><?php
	echo getDetailsFromTable ( 'address', 'rcowner', $plug );
	?></textarea></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><input type="text" name="place"
			value="<?php
	echo getDetailsFromTable ( 'place', 'rcowner', $plug );
	?>"
			class="textbox" /></td>
	</tr>

	<tr>
		<td>Other</td>
		<td>:</td>
		<td><textarea name="other" class="textarea"><?php
	echo getDetailsFromTable ( 'other', 'rcowner', $plug );
	?></textarea></td>
	</tr>

	<tr>
		<td>Password</td>
		<td>:<input type="hidden" name="userid" value="<?php
	echo $plug;
	?>" /></td>
		<td><input type="text" name="password"
			value="<?php
	echo getDetailsFromTable ( 'password', 'rcowner', $plug );
	?>"
			class="textbox" /></td>
	</tr>

	<tr>
		<td align="center" colspan="3"><input name="update" class="button"
			type="submit" value="Update" /> <input type="button"
			onclick='self.close();' class="button" value="Close" /></td>
	</tr>
</table>
</form>
	<?php
} else if (is_numeric ( $plug )) {
	?>
	<table align="center">
	<tr>
		<td>Type</td>
		<td>:</td>
		<td><?php
	echo getDetailsFromTable ( 'type', 'rcowner', $plug );
	?></td>
	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><?php
	echo getDetailsFromTable ( 'name', 'rcowner', $plug );
	?></td>
	</tr>
	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><?php
	echo getDetailsFromTable ( 'mobile', 'rcowner', $plug );
	?></td>
	</tr>
	<tr>
		<td>LandLine</td>
		<td>:</td>
		<td><?php
	echo getDetailsFromTable ( 'phone', 'rcowner', $plug );
	?></td>
	</tr>
	<tr>
		<td>E-mail</td>
		<td>:</td>
		<td><?php
	echo getDetailsFromTable ( 'email', 'rcowner', $plug );
	?></td>
	</tr>

	<tr>
		<td>Nickname</td>
		<td>:</td>
		<td><?php
	echo getDetailsFromTable ( 'nickname', 'rcowner', $plug );
	?></td>
	</tr>

	<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php
	echo getDetailsFromTable ( 'address', 'rcowner', $plug );
	?></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
	echo getDetailsFromTable ( 'place', 'rcowner', $plug );
	?></td>
	</tr>

	<tr>
		<td>Other</td>
		<td>:</td>
		<td><?php
	echo getDetailsFromTable ( 'other', 'rcowner', $plug );
	?></td>
	</tr>

	<tr>
		<td>Password</td>
		<td>:</td>
		<td><?php
	echo getDetailsFromTable ( 'password', 'rcowner', $plug );
	?></td>
	</tr>


</table>
<div align="right"><a target="_blank"
	href="adminEdit.php?waste=<?php
	echo $plug;
	?>&amp;msg=edituser"
	style="font-size: 15px; color: red; position: fixed; right: 10px; top: 150px;">Edit
Profile</a></div>

	<?php
}

?></body>
</html>