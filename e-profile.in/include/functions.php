<?php
session_start();
include_once 'myadmin.php';
$yearbeg = date ( "Y" ) - 60;
$yearend = date ( "Y" ) - 18;
$years = range ( $yearbeg, $yearend );
$pin = $_SESSION['pin'];
##############################################################################################################
############################--------DO NOT CHANGE THE ORDER OF ARRAY ELEMENTS---------########################
##############################################################################################################
$month 				= array(1=>"Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" );
$tables 			= array(0=>'album','testimonial','mannerism');
$country 			= array(0=>"India", "USA", "United Kingdom", "Canada", "Australia", "Pakistan", "Bangladesh", "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "Argentina", "Armenia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Barbados", "Belarus", "Belgium", "Belize", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo", "Congo (DRC)", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji Islands", "Finland", "France", "French Guiana", "French Polynesia", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong SAR", "Hungary", "Iceland", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau SAR", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "North Korea", "Norway", "Oman", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn Islands", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "St. Kitts and Nevis", "St. Lucia", "St. Pierre and Miquelon", "St. Vincent &amp; Grenadines", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands", "Virgin Islands (British)", "Wallis and Futuna", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe" );
$state 				= array(0=>"Andaman and Nicobar Islands", "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chandigarh", "Chhattisgarh", "Dadra and Nagar Haveli", "Daman and Diu", "Delhi", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", "Karnataka", "Kerala", "Lakshadweep", "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Orissa", "Pondicherry", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Tripura", "Uttar Pradesh", "Uttaranchal", "West Bengal" );
$per_height 		= array(0=>"Select One","&lt;4&apos; 6&quot; (134cm)","4&apos; 6&quot; (137cm)","4&apos; 7&quot; (139cm)","4&apos; 8&quot; (142cm)","4&apos; 9&quot; (144cm)","4&apos; 10&quot; (147cm)","4&apos; 11&quot; (149cm)","5&apos; 0&quot; (152cm)","5&apos; 1&quot; (154cm)","5&apos; 2&quot; (157cm)","5&apos; 3&quot; (160cm)","5&apos; 4&quot; (162cm)","5&apos; 5&quot; (165cm)","5&apos; 6&quot; (167cm)","5&apos; 7&quot; (170cm)","5&apos; 8&quot; (172cm)","5&apos; 9&quot; (175cm)","5&apos; 10&quot; (177cm)","5&apos; 11&quot; (180cm)","6&apos; 0&quot; (182cm)","6&apos; 1&quot; (185cm)","6&apos; 2&quot; (187cm)","6&apos; 3&quot; (190cm)","6&apos; 4&quot; (193cm)","6&apos; 5&quot; (195cm)","6&apos; 6&quot; (198cm)","&gt;6&apos; 6&quot; (198cm)");
$per_body 			= array(0=>"Select One","Slim","Athletic","Average","A few extra pounds","Large","Physically challenged");
$per_color 			= array(0=>"Select One","Very Fair","Fair","Wheatish","Dark");
$per_hair  			= array(0=>"Select One","Black","Dark Brown","Reddish Brown","Light Brown","Grey","White","Inform Later","Other");
$per_style  		= array(0=>"Select One","Crew cut","Short","Medium","Long","Receding hairline","What hair?","Inform Later","Other");
$per_eye 			= array(0=>"Select One","Black","Brown","Gray","Green","Blue","Hazel","Inform Later","Other");			
$per_sight  		= array(0=>"Select One","Perfect","Wear glasses","Wear contact lenses","Inform Later","Other");			
$per_diet  			= array(0=>"Select One","Vegetarian","Eggatarian","Vegan","Non-Vegetarian","Fish &amp; chicken only","Organic/Health foods","Jain");
$per_smoke  		= array(0=>"Select One","Don't Smoke","Smoke Regularly","Smoke Occasionally","Smoke socially only","Trying to quit");
$per_drink  		= array(0=>"Select One","Don't Drink","Drink Regularly","Drink Occasionally","Drink socially only");
$per_profession  	= array(0=>"Select One","Administrative /Secretarial","Artistic / Musical /Writer","Executive / Management","Finance / Accounting","Hospitality / Service","Labor / Construction","Medical / Dental","Political / Government","Sales / Marketing /	Advertising","Self Employed","Student","Teacher / Professor","Technical / Science/ Engineering","Other");
$per_exercise  		= array(0=>"Select One","Fitness freak","Exercise to keep healthy","Love body the way it is","Inform Later");
$per_religion  		= array(0=>"Select One","Hindu","Muslim","Christian","Sikh","Buddhist / Toaist","Jain","Parsi / Zoroastrian","Atheist","Animist","Baha'I","Jewish","Jehovah's Witness","Pagan African","Shamanism","Shinto","Other");
$per_beliefs  		= array(0=>"Select One","Very religious","Somewhat religious","Not religious","Inform Later");			
$per_education		= array(0=>"Select One","High School","Trade School","Diploma","Bachelor's","Master's","Doctorate");	
$per_testims		= array(0=>"height","body","complexion","hair","hairstyle","eye","sight","diet","smoke","drink","occupation","exercise","religion","beliefs","education");
function registerBirthday() {
	global $month, $years;
	$m = 12;
	$mm = '<option value="">Month</option>';
	$d = 31;
	$dd = '<option value="">Date</option>';
	$y = 60;
	$yy = '<option value="">Year</option>';
	for($i = 1; $i <= $m; $i ++) {
		$mm = $mm . '<option value="' . $i . '">' . $month [$i] . '</option>';
	}
	for($i = 1; $i <= $d; $i ++) {
		$dd = $dd . '<option value="' . $i . '">' . $i . '</option>';
	}
	for($i = 0; $i <= 42; $i ++) {
		$yy = $yy . '<option value="' . $years [$i] . '">' . $years [$i] . '</option>';
	}
	return '<select name="day" id="day" style="border:1px solid #DEECF5">' . $dd . '</select>
			<select name="month" id="month" style="border:1px solid #DEECF5">' . $mm . '</select>
			<select name="year" id="year" style="border:1px solid #DEECF5">' . $yy . '</select>';
}
function listCountry() {
	global $country;
	$cc = '<option value="">Country</option>';
	for($i = 0; $i < count ( $country ); $i ++) {
		$cc = $cc . '<option value="' . $country [$i] . '">' . $country [$i] . '</option>';
	}
	return '<select name="country" id="country" onchange="populateState(this.value)" style="border:1px solid #DEECF5;width:180px">' . $cc . '</select>';
}
function listState() {
	global $state;
	$cc = '<option value="">State</option>';
	for($i = 0; $i < count ( $state ); $i ++) {
		$cc = $cc . '<option value="' . $state [$i] . '">' . $state [$i] . '</option>';
	}
	return '<select name="state" id="state" style="border:1px solid #DEECF5;width:180px">' . $cc . '</select>';
}
function inputValidation($ipt) {
	if (preg_match ( "/^[0-9A-Za-z \\._]+$/", $ipt )) {
		return true;
	} else {
		
		return false;
	}
}
function inputValidationDigit($ipt) {
	if (preg_match ( "/^[0-9]+$/", $ipt )) {
		return true;
	} else {
		
		return false;
	}
}
function calculateAge($d,$m,$y)
{   if(checkdate($m, $d, $y))
	{
	$birthDate = $m . "/" . $d . "/" . $y;
	$birthDate = explode ( "/", $birthDate );
	$age = (date ( "md", date ( "U", mktime ( 0, 0, 0, $birthDate [0], $birthDate [1], $birthDate [2] ) ) ) > date ( "md" ) ? ((date ( "Y" ) - $birthDate [2]) - 1) : (date ( "Y" ) - $birthDate [2]));
	return $age;
	}
	else 
	{
	return $y;
	}
}
function getDetails($sbn,$table='members')
{
	global $pin;
	$sql = "SELECT $sbn FROM $table WHERE";
	if($table=='members'){$sql .= " id=".$pin;}
	else {$sql .= " pin=".$pin;}
	$result = mysql_query($sql);
	$zata = mysql_fetch_array($result);
	return $zata[0]; 
}
function loginNow($u,$p)
{
$sql = "SELECT * FROM members WHERE email='$u' AND password='$p'";
$result = mysql_query($sql);
$zata = mysql_fetch_array($result);
if ($zata[0]>=1)
{
	$_SESSION['pin']=$zata[0];
	$zql  = "UPDATE members SET last=NOW() WHERE id=".$zata[0];
	mysql_query($zql);
	echo 'Y';
}
else
{
	echo 'N';
}
}
function showPhoto()
{
	global $pin;
	$sql = "SELECT profile_picture FROM album WHERE pin=".$pin;
	$result = mysql_query($sql);
	$data = mysql_fetch_array($result);
	if($data[0]=='N')
	{
		echo '<img src="images/profileimg.png">';
	}
	else
	{
		echo '<img src="upload/'.$data[0].'">';
	}
}
function setupProfile()
{
	global $tables;
	for($i=0;$i<count($tables);$i++)
	{
		prepareTable($tables[$i]);
	}
}
function prepareTable($tab)
{
	global $pin;
	$zql = "SELECT * FROM ".$tab." WHERE pin=".$pin;
	$result = mysql_query($zql) or die(mysql_error());
	if(mysql_num_rows($result)==0)
	{	
	$sql = "INSERT INTO ".$tab."(pin)VALUES('$pin')";
	mysql_query($sql) or die(mysql_error());
	}
}
function updateStatusMSG($msg)
{
	global $pin;
	$sql = "INSERT INTO textbytext(pin,status_date,msg)VALUES('$pin',NOW(),'$msg')";
	mysql_query($sql);
	echo 'Y';
}
function recentUpdateNOW()
{
	global $pin;
	$sql = "SELECT msg FROM textbytext WHERE pin='$pin' ORDER BY status_date DESC";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$row = mysql_fetch_array($result);
		echo '<p>'.$row[0].'</p>';
		/*while ($row = mysql_fetch_array($result))
		{
			echo '<p>'.$row['msg'].'</p>';
		}*/
	}
	
}
function displayChoices($option_array,$objname,$selected=0)
{
	global ${$option_array};
	$cc = '';
	for($i = 0; $i < count ( ${$option_array} ); $i ++) {
		if($i==$selected)
		{
			$cc = $cc . '<option selected value="' . $i . '">' . ${$option_array} [$i] . '</option>';
		}
		else
		{
		$cc = $cc . '<option value="' . $i . '">' . ${$option_array} [$i] . '</option>';
		}
	}
	return '<select name="'.$objname.'" id="'.$option_array.'" style="border:1px solid #DEECF5;width:180px">' . $cc . '</select>';
}
function returnasArray()
{
	global $pin;
	$sql = "SELECT relation FROM testimonial WHERE pin='$pin'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$valu = $row[0];
	if (!empty($row))
	{
		$arval = explode(",",$valu);
	}
	else 
	{
		$arval = null;
	}
	return $arval;
}
?>