<?php
if (is_numeric ( $_SESSION ['pin'] )) {
	?>
<form method="post" action="jrexecution.php">
<table align="center" style="text-transform: capitalize;">
	<tr>
		<td colspan="2" class="headers">Looks</td>
	</tr>

	<tr>
		<td>height</td>
		<td><?php
	echo displayChoices ( 'per_height', 'height', getDetails ( 'height', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td>body</td>
		<td><?php
	echo displayChoices ( 'per_body', 'body', getDetails ( 'body', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td>complexion</td>
		<td><?php
	echo displayChoices ( 'per_color', 'complexion', getDetails ( 'complexion', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td>hair color</td>
		<td><?php
	echo displayChoices ( 'per_hair', 'hair', getDetails ( 'hair', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td>hair style</td>
		<td><?php
	echo displayChoices ( 'per_style', 'hairstyle', getDetails ( 'hairstyle', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td>eye color</td>
		<td><?php
	echo displayChoices ( 'per_eye', 'eye', getDetails ( 'eye', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td>eyesight</td>
		<td><?php
	echo displayChoices ( 'per_sight', 'sight', getDetails ( 'sight', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td colspan="2" class="headers">Lifestyle</td>
	</tr>

	<tr>
		<td>diet</td>
		<td><?php
	echo displayChoices ( 'per_diet', 'diet', getDetails ( 'diet', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td>smoke</td>
		<td><?php
	echo displayChoices ( 'per_smoke', 'smoke', getDetails ( 'smoke', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td>drink</td>
		<td><?php
	echo displayChoices ( 'per_drink', 'drink', getDetails ( 'drink', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td>profession</td>
		<td><?php
	echo displayChoices ( 'per_profession', 'occupation', getDetails ( 'occupation', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td>exercise</td>
		<td><?php
	echo displayChoices ( 'per_exercise', 'exercise', getDetails ( 'exercise', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td colspan="2" class="headers">Background/Values</td>
	</tr>

	<tr>
		<td>religion</td>
		<td><?php
	echo displayChoices ( 'per_religion', 'religion', getDetails ( 'religion', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td>religious beliefs</td>
		<td><?php
	echo displayChoices ( 'per_beliefs', 'beliefs', getDetails ( 'belief', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td>education</td>
		<td><?php
	echo displayChoices ( 'per_education', 'education', getDetails ( 'education', 'testimonial' ) );
	?></td>
	</tr>

	<tr>
		<td>income</td>
		<td><input type="text" name="income"
			value="<?php
	echo getDetails ( 'income', 'testimonial' );
	?>"
			class="textbox" /></td>
	</tr>

	<tr>
		<td colspan="2" class="headers">Relationship</td>
	</tr>

	<tr>
		<td valign="top">I am interested in</td>
		<td>
		<table border="0" cellpadding="0" cellspacing="0" width="100%"
			style="white-space: nowrap">
			<tbody>
				<tr>
					<td><input name="relation[]"
						<?php
	if (in_array ( "Friendship", returnasArray () )) {
		echo 'checked';
	}
	?>
						value="Friendship" type="checkbox">Friendship</td>
					<td><input name="relation[]"
						<?php
	if (in_array ( "Activity Partner", returnasArray () )) {
		echo 'checked';
	}
	?>
						value="Activity Partner" type="checkbox">Activity Partner</td>
					<td><input name="relation[]"
						<?php
	if (in_array ( "Email Buddy", returnasArray () )) {
		echo 'checked';
	}
	?>
						value="Email Buddy" type="checkbox">Email Buddy</td>
				</tr>
				<tr>
					<td><input name="relation[]"
						<?php
	if (in_array ( "Dating", returnasArray () )) {
		echo 'checked';
	}
	?>
						value="Dating" type="checkbox">Dating</td>
					<td><input name="relation[]"
						<?php
	if (in_array ( "Serious Relationship", returnasArray () )) {
		echo 'checked';
	}
	?>
						value="Serious Relationship" type="checkbox">Serious Relationship
					<input name="relation[]" value="none" type="hidden"></td>
				</tr>
			</tbody>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input class="button" name="username"
			value="Submit" type="submit"></td>
	</tr>
</table>
</form>
<?php
}
?>