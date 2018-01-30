<?php
session_start ();
include_once 'include/functions.php';
$flag = $_GET ['first'];
$_SESSION['flag']=$flag;

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
<body>
<h2 align="center" style="color: blue; margin: 10px;">Profile Details</h2>
<hr style="width: 50%; color: red;" />
<form action="process.php" enctype="multipart/form-data" method="post">
<table>

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
		<td colspan="3" align="center"><input type="submit" class="button"
			name="motoredit" value="SAVE CHANGES" /> <input type="button"
			onclick='javascript:window.location="index.php"' class="button"
			value="Cancel" /></td>
	</tr>
</table>
<div id="disphoto" style="top: 603px; left: 700px; position: absolute;">
<p style="position: absolute; visibility: hidden" id="text">Change Image</p>
<?php
getDetailsFromTable ( 'photo', 'vehicle', $flag ) == 'autovipany.jpg' ? $image = 'images/autovipany.png' : $image = "upload/" . getDetailsFromTable ( 'photo', 'vehicle', $flag );
?>
<img src="<?php
echo $image;
?>" alt="autovipanyImage"
	onmouseover="showText()" onmouseout="hideText()" height="50" width="50"
	onclick="javascript:void window.open('./popup/upimage.php','_blank','width=500,height=200,left=100,top=100');return false;" />
<input type="hidden" name="photo"
	value="<?php
	echo getDetailsFromTable ( 'photo', 'vehicle', $flag )?>" /></div>
</form>
</body>
</html>