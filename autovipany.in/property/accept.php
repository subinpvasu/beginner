<h2 align="center" style="color: blue; margin: 10px;">Add Property Here</h2>
<hr style="width: 50%; color: red;" />
<form action="process.php" enctype="multipart/form-data" method="post">
<table>

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
		<td><input type="text" onkeypress="return isNumberKey(event)"  name="price" class="textbox" /></td>
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

	<!--<tr>
		<td>State</td>
		<td>:</td>
		<td><input type="text" name="state" class="textbox" /></td>
	</tr>

	<tr>
		<td>District</td>
		<td>:</td>
		<td><input type="text" name="district" class="textbox" /></td>
	</tr>

	<tr>
		<td>Location</td>
		<td>:</td>
		<td><input type="text" name="location" class="textbox" /></td>
	</tr>

	--><tr>
		<td colspan="3" align="center"><input type="submit" class="button"
			name="motor" value="ADD VEHICLE" /> <input type="button"
			onclick='javascript:window.location="index.php"' class="button"
			value="Cancel" /></td>
	</tr>
</table>
<div id="disphoto" style="top: 690px; left: 700px; position: absolute;">
<p style="position: absolute; visibility: hidden" id="text">Change
Default Image</p>
<img src="./images/autovipany.png" alt="autovipanyImage"
	onmouseover="showText()" onmouseout="hideText()" height="50" width="50"
	onclick="javascript:void window.open('./popup/upimage.php','_blank','width=500,height=200,left=100,top=100');return false;" />
<input type="hidden" name="photo" value="autovipany.jpg" /></div>
</form>