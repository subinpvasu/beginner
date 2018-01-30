<?php
if (is_numeric ( $_SESSION ['pin'] )) {
	?>

<form method="post" action="jrexecution.php">
<table align="center">

	<tr>
		<td class="headers">I am</td>
	</tr>
	<tr>
		<td style="float: left;" id="n1"><textarea
			onkeyup="numberOfLetters(this.id)"
			onkeydown="numberOfLetters(this.id)"
			onblur="removeMessageHelp(this.id)" name="yourself" id="m1"
			class="describe" onfocus="showHelpData(this.id)"
			<?php
	echo 'maxlength="300"';
	?>><?php
	echo getDetails ( 'yourself', 'mannerism' );
	?></textarea></td>
	</tr>

	<tr>
		<td class="headers">My Favourites</td>
	</tr>
	<tr>
		<td style="float: left;" id="n2"><textarea
			onkeyup="numberOfLetters(this.id)"
			onkeydown="numberOfLetters(this.id)"
			onblur="removeMessageHelp(this.id)" name="favourites" id="m2"
			class="describe" onfocus="showHelpData(this.id)"
			<?php
	echo 'maxlength="300"';
	?>><?php
	echo getDetails ( 'favourites', 'mannerism' );
	?></textarea></td>
	</tr>

	<tr>
		<td class="headers">My Aim</td>
	</tr>
	<tr>
		<td style="float: left;" id="n3"><textarea
			onkeyup="numberOfLetters(this.id)"
			onkeydown="numberOfLetters(this.id)"
			onblur="removeMessageHelp(this.id)" name="motto" id="m3"
			class="describe" onfocus="showHelpData(this.id)"
			<?php
	echo 'maxlength="300"';
	?>><?php
	echo getDetails ( 'motto', 'mannerism' );
	?></textarea></td>
	</tr>

	<tr>
		<td class="headers">My Fun</td>
	</tr>
	<tr>
		<td style="float: left;" id="n4"><textarea
			onkeyup="numberOfLetters(this.id)"
			onkeydown="numberOfLetters(this.id)"
			onblur="removeMessageHelp(this.id)" name="fun" id="m4"
			class="describe" onfocus="showHelpData(this.id)"
			<?php
	echo 'maxlength="300"';
	?>><?php
	echo getDetails ( 'fun', 'mannerism' );
	?></textarea></td>
	</tr>

	<tr>
		<td class="headers">Mission Impossible</td>
	</tr>
	<tr>
		<td style="float: left;" id="n5"><textarea
			onkeyup="numberOfLetters(this.id)"
			onkeydown="numberOfLetters(this.id)"
			onblur="removeMessageHelp(this.id)" name="mission" id="m5"
			class="describe" onfocus="showHelpData(this.id)"
			<?php
	echo 'maxlength="300"';
	?>><?php
	echo getDetails ( 'mision', 'mannerism' );
	?></textarea></td>
	</tr>

	<tr>
		<td class="headers">Most Preference</td>
	</tr>
	<tr>
		<td style="float: left;" id="n6"><textarea
			onkeyup="numberOfLetters(this.id)"
			onkeydown="numberOfLetters(this.id)"
			onblur="removeMessageHelp(this.id)" name="prefer" id="m6"
			class="describe" onfocus="showHelpData(this.id)"
			<?php
	echo 'maxlength="300"';
	?>><?php
	echo getDetails ( 'prefer', 'mannerism' );
	?></textarea></td>
	</tr>

	<tr>
		<td class="headers">Most Irritation</td>
	</tr>
	<tr>
		<td style="float: left;" id="n7"><textarea
			onkeyup="numberOfLetters(this.id)"
			onkeydown="numberOfLetters(this.id)"
			onblur="removeMessageHelp(this.id)" name="irritation" id="m7"
			class="describe" onfocus="showHelpData(this.id)"
			<?php
	echo 'maxlength="300"';
	?>><?php
	echo getDetails ( 'irritation', 'mannerism' );
	?></textarea></td>
	</tr>

	<tr>
		<td class="headers">To the Rest</td>
	</tr>
	<tr>
		<td style="float: left;" id="n8"><textarea
			onkeyup="numberOfLetters(this.id)"
			onkeydown="numberOfLetters(this.id)"
			onblur="removeMessageHelp(this.id)" name="passage" id="m8"
			class="describe" onfocus="showHelpData(this.id)"
			<?php
	echo 'maxlength="300"';
	?>><?php
	echo getDetails ( 'passage', 'mannerism' );
	?></textarea></td>
	</tr>

	<tr>
		<td class="headers">My Last Birth</td>
	</tr>
	<tr>
		<td style="float: left;" id="n9"><textarea
			onkeyup="numberOfLetters(this.id)"
			onkeydown="numberOfLetters(this.id)"
			onblur="removeMessageHelp(this.id)" name="lastlife" id="m9"
			class="describe" onfocus="showHelpData(this.id)"
			<?php
	echo 'maxlength="300"';
	?>><?php
	echo getDetails ( 'lastlife', 'mannerism' );
	?></textarea></td>
	</tr>

	<tr>
		<td class="headers">I am Happy</td>
	</tr>
	<tr>
		<td style="float: left;" id="n10"><textarea
			onkeyup="numberOfLetters(this.id)"
			onkeydown="numberOfLetters(this.id)"
			onblur="removeMessageHelp(this.id)" name="happy" id="m10"
			class="describe" onfocus="showHelpData(this.id)"
			<?php echo 'maxlength="300"';?>><?php echo getDetails ( 'happy', 'mannerism' ) ;?></textarea></td>
	</tr>

	<tr>
		<td><input type="submit" name="manner" value="submit" class="button" /></td>
	</tr>
</table>
</form>
<?php }?>