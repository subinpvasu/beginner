<h2 align="center" style="color: blue; margin: 10px;">Account Details</h2>
<hr style="width: 50%; color: red;" />

<form action="process.php" method="post" name="additional">
<table>
	<tr>
		<td>Nickname</td><td>:</td>
		<td><input type="text" name="name" class="textbox"
			value="<?php
			echo getDetailsFromTable ( 'nickname' );
			?>"/></td>
	</tr>

	<tr>
		<td>Contact Address</td><td>:</td>
		<td><textarea class="textarea" name="address" ><?php
		echo getDetailsFromTable ( 'address' );
		?></textarea>
		</td>
	</tr>

	<tr>
		<td>Place</td><td>:</td>
		<td><input type="text" name="place" value="<?php
		echo getDetailsFromTable ( 'place' );
		?>" class="textbox"  /></td>
	</tr>
	
	<tr>
		<td>Other</td><td>:</td>
		<td><textarea class="textarea" name="other" ><?php
		echo getDetailsFromTable ( 'other' );
		?></textarea>
		</td>
	</tr>
	
	<tr>
		<td align="center" colspan="3">
		<input name="additional" class="button" type="submit" value="Add Details" />
		<input type="button" onclick='javascript:window.location="index.php"' class="button" value="Cancel" /></td>
	</tr>
</table>
</form>