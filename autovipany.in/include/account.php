<h2 align="center" style="color: blue; margin: 10px;">Your Profile</h2>
<hr style="width: 50%; color: red;" />
<table cellpadding="10" align="center">
		<tr>
		<td>Type</td>
		<td>:</td>
		<td><?php echo getDetailsFromTable('type');?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td>:</td>
		<td id="user"><?php echo getDetailsFromTable('name');?></td>
	</tr>
	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><?php echo getDetailsFromTable('mobile');?></td>
	</tr>
	<tr>
		<td>Land Line</td>
		<td>:</td>
		<td><?php echo getDetailsFromTable('phone');?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo getDetailsFromTable('email');?></td>
	</tr>
</table>