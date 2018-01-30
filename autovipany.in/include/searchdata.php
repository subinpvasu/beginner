<?php
global $district;

if ($_GET ['msg'] == 'search') {
	
	$dist = $_GET ['dist'];
	$count = count ( $district ["$dist"], 1 );
	array_multisort ( $district ["$dist"] );
	//echo $dist ."" .$count;
	

	for($i = 0; $i < $count; $i ++) {
		//echo  $district['Thrissur'][$i] ;
		$z = str_replace ( " ", "_", $district ["$dist"] [$i] );
		echo "<option value=" . $z . ">" . $district ["$dist"] [$i] . "</option>";
	}
	echo "</select>";
}

if ($_GET ['msg'] == 'dosearch') {
	$dist = $_GET ['dist'];
	$city = $_GET ['city'];
	$count = count ( $district ["$dist"], 1 );
	array_multisort ( $district ["$dist"] );
	echo '
<select class="select"  name="propcity" id="propcity" >

';
	for($i = 0; $i < $count; $i ++) {
		$z = str_replace ( " ", "_", $district ["$dist"] [$i] );
		if ($district ["$dist"] [$i] == $city) {
			echo "<option selected value=" . $z . ">" . $district ["$dist"] [$i] . "</option>";
		} else {
			echo "<option value=" . $z . ">" . $district ["$dist"] [$i] . "</option>";
		}
	
	}
	echo "</select>";

}

///*************************************************image validation
if (isset ( $_FILES ['image'] )) {
	
	$allowedExts = array ("jpg", "jpeg", "gif", "png" );
	$extension = end ( explode ( ".", $_FILES ['image'] ["name"] ) );
	if ((($_FILES ['image'] ["type"] == "image/gif") || ($_FILES ['image'] ["type"] == "image/jpeg") || ($_FILES ['image'] ["type"] == "image/pjpeg")) && ($_FILES ['image'] ["size"] < 1000000) && in_array ( $extension, $allowedExts )) {
		if ($_FILES ['image'] ["error"] > 0) {
			echo ' <script type="text/javascript">
	alert("Error1");
	</script>';
		} else {
			echo ' <script type="text/javascript">
	alert("Success");
	</script>';
		}
	} else {
		echo ' <script type="text/javascript">
	alert("Error2");
	</script>';
	}

}

?>