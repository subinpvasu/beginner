<?php
session_start();
include_once 'sendSomeMail.php';
$district = array (0=>"Select","Thrissur","Thiruvananthapuram","Kollam","Pathanamthitta","Kottayam","Alappuzha","Idukki","Ernakulam","Palakkad","Malappuram","Kozhikode","Wayanad","Kannur","Kasargod");
$distcity = array ("Thrissur" 			=> array (" Select Location", "Thrissur corporation", "Kuriachira", "Guruvayoor", "Irinjalakkuda", "Kodakara", "Elavally", "Chelakkara", "Kodungalloor", "Chevayoor", "Kadukutty", "Mannuthy", "Ollur", "Kuttanellor", "Athani", "Ponganamkad", "Chiyyaram", "Ayyanthole", "Pazhayannur", "Kottapuram", "Thanikudam", "Puzhakkal Padam", "Kechery", "Amballur", "Amala Medical College", "Thriprayar", "Thrithalloor", "Koorkenchery", "Poomkunnam", "Aranattukara", "Kunnappilly", "Mathilakam ", "Kunnamkulam", "Mudathicode", "Chungam", "Pazhanji ", "Parappur ", "Chevoor", "Palakkal", "Chittilappilly ", "Valapad ", "Velur", "Kanimangalam", "Vadanapally ", "Thriruvambady", "Cheroor Pallimoola", "Nellikunnu", "Akkikavu", "Vellore", "Puthenchira", "Kuttikkat", "Kuttur", "Mala", "Muthuvara", "Viyoor", "West Fort", "Koratty", "Ponkunnam", "Cherpu", "Thiruvilwamala", "Paravattany", "Cheroor", "Andhrakhanpadam", "Kallettumkara", "Chalakkudy", "Arimpur", "Pullazy", "Mundur" ),
				   "Select"				=> array (" Select Location" ),
				   "Ernakulam"			=> array (" Select Location", "Kakkanadu", "Perumbavoor", "Kothamangalam", "Aluva", "Koovappady", "Kumbalam", "Karukutty", "Thrikkakara", "Thripunithura", "Cheranalloor", "Edathala", "Athani", "Nedumbassery", "Kalamassery", "Udayamperoor", "Maradu", "Eroor", "Amballoor", "Kuzhuppilly", "Kalady", "Elamkunnappuzha", "Thiruvaniyoor", "Vazhakkulam", "Muvattupuzha", "Piravom", "Thiruvankulam", "Edakkattuvayal", "Kizhakkambalam", "Varapuzha", "Elanji", "Chottanikkara", "Mulavukad", "Koothattukulam", "Avoly", "Irumpanam", "Puthencruz", "Mulanthuruthy", "Paravoor", "Kolenchery", "Panangad", "Muttom", "Varapuzha", "Koonammavu", "Kodugalloor", "Puthanvelikkara", "Kongarappally", "Vadakkekkotta", "Vennala", "Pookattupady", "Manjummal", "North Paravoor", "Elamkunnapuzha", "Arakunnam", "Vallarpadam", "Pothanikkad", "Ponekkara", "Chittoor", "Palarivattom", "Vyppin", "Pattimattom", "Nettoor", "Fortkochi", "Edappally", "Panampally Nagar", "Thoppumpady", "Chakkaraparmbu", "Padivattom", "Chilavannoor", "Manjali", "Kanjoor", "Kangarappady", "Pazhamthottam", "Vazhakkala", "Kathrikadavu", "Desabhimani", "Pullepady", "Vyttila", "Ambalamugal", "Kuruppampady", "Panangad", "Chalikkavattom", "Pallikkara", "Kochal", "Kadavanthra", "Paigottoor", "Puthenkurish", "Thammanam", "Karingachira", "Elamakkara", "Kodanad", "Thevara", "Chembumukku", "Marine Drive", "Kaloor", "Ayyappankavu", "Nadakkavu ", "Arayankavu", "Medical Centre", "Vennikulam", "Olanadu", "Kottuvally", "Angamaly", "Edakochi", "Kureekad ", "Palluruthy", "Vaduthala", "Kanjiramattom", "Palakuzha", "Keezhillam", "Kumaramangalam", "Kundannoor", "Eruvely", "Meempara", "Vettikkal", "Kannamaly", "Bolghatty", "Kuruppumpady", "Kumbalangi", "Kadathy", "Thottakkattukara", "Banerji road", "Ambalam Pady", "Medical Centre", "Poonithura", "Elamkulam", "Pachalam", "Panayikulam", "Kacheripady", "Mamangalam", "Ponnurunni", "Eroor", "M G Road", "Ernakulam Medical Centre", "Ravipuram", "Broadway", "Poothrikka", "Cherai", "Chellanam", "Kolenchery", "North Paravoor" ),
				   "Thiruvananthapuram" => array (" Select Location", "Kazhakkoottom", "Kowdiyar", "Pattam", "Thirumala", "Thiruvananthapuram corporation", "Trivandrum", "Meenamkulam", "Kunnukuzhy", "Kunnukuzhy", "Mudavanmugal", "Poojappura", "Peroorkada", "Peyad", "Thiruvallam", "PTP Nagar", "Mangalapuram", "Palayam", "Mannanthala", "Vattiyoorkavu", "Pappanamcode", "Kalliyoor", "Vattappara", "Karakulam", "Vilappilsala", "Pachira", "Kallayam", "Keraladityapuram", "Mukkola", "Attukal", "Sasthamangalam", "Amboori", "Karamana", "Nanthancode", "Enchakkal", "Manacaud", "Akkulam", "Cheruvikkal", "Ambalathara", "Santhipuram ", "Pongummodu", "Powdikonam ", "Mukkilkada", "Kumarapuram", "Near Kims Hospital", "Kesavadasapuram", "Valiyavila", "Navaikulam", "Thampuranmukku", "Andoorkonam ", "Balaramapuram", "Oorutambalam ", "Pothencode", "Varkala", "Vanchiyoor", "Ambalamukku", "Kudappanakunnu", "Kattakada", "Ooruttambalam", "Inchakkal", "Kariyam", "Ulloor", "Karikkakam", "Medical College Trivandrum", "Sreekariyam", "Vellayani", "Kanjirapara", "Palode", "Neyyattinkara", "Thampanoor", "Njekkad", "Chengottukonam", "Perukavu", "Kuravankonam", "Jawahar Nagar ", "Marthandam", "Pravachambalam", "Jagathy", "Vazhuthacadu", "Vettamukku", "Kannanmoola", "Venpalavattom", "Kovalam", "Njandoorkonam", "Pangodu ", "Karakkamandapam", "Maruthankuzhi", "Kamaleswaram", "Sreevaraham ", "Vettinadu", "Edapazhanji ", "Shangumugham", "Vembayam", "Venjaramoodu ", "Venjaramoodu", "Nedumangad", "Vazhayila", "Kottamukku", "Pulimoodu ", "Cheriyakonni", "Punnakkamugal", "Anthiyoorkonam", "Karaikamandapam", "Vallakadavu", "Puliyarakonam ", "Malayinkeezhu", "Chempazhanthy ", "Plamoodu", "Thachottukavu", "Kodunganoor", "Nettayam ", "Pallippuram ", "Cherakulam", "Muttathura ", "Thycaud", "Vallanadu", "Nemam", "Nalanchira", "Powdikonam", "Petta", "Aenikkara", "Kurianadu", "Azhicode", "Kariyavattom", "Eanikkara", "Mullassery", "Kachani", "Attingal", "Chala Bazar", "Bhagavathipuram ", "Pattom", "Kollamkonam ", "Parasala", "Aruvikkarai", "Kadambanad" ),
				   "Kollam" 			=> array (" Select Location", "Kottiyam", "Kollam Corporation", "Pambady", "Pallimon", "Anchal", "Kavanad", "Padappakkara", "Karunagappally", "Pattazhi", "Mylapore", "Ayathil", "Kunnamangalam", "Mevaram", "Sakthikulangara ", "Parippally", "Karikkod", "Thattamala", "Ramankulangara", "Chinnakkada", "Kottamukku", "Ayoor", "Ezhukone", "Ezhukone", "Kundara", "Mampuzha", "Chandanathope", "Mayyanad ", "Ashtamudi", "Anchalmood", "Perumpuzha", "Kottarakkara", "Peroor", "East Kallada", "Mamood", "Puthanada", "Bharanikavu", "Kadapakada", "Chathannoor", "Kureepuzha", "Chamakkada Market", "Nallela", "Umayanallor ", "Nellimuk" ),
				   "Idukki"				=> array (" Select Location", "Adimali", "Santhanpara", "Thekkady", "Munnar", "Thodupuzha", "peerumedu", "Vagomon", "Rajakkattu ", "Periyar", "Thekkady", "Kumily", "Kodikulam", "Moolamattom", "Pullikkanam", "Kuttikkanam", "Pottankad", "Kunchithanny", "Anchal", "Pallivasal", "Bisonvalley", "Anachal", "Kallar Kottappara", "Kurissupara", "Sooryanelly", "Kamakshy ", "Thopramkudy", "Karipan", "Kattappana", "Elappara", "Muttom", "Kunchithanny", "Murikkassery", "Peerumedu", "Churuly", "Rajakumari", "Senapathy", "Sengulam", "Kampilikandam", "Chithirapurm", "Thoppramkudy", "Kalvari mount" ), 
				   "Alappuzha" 			=> array (" Select Location", "Alappuzha Municipality", "Karuvatta", "Thiruvanvandoor", "Aroor", "Veeyapuram", "Arattupuzha", "Edathva", "Thanneermukkam", "Mulakkuzha", "Harippad", "Mararikkulam North", "Mavelikkara", "Kanjikkuzhi", "Punnapra South", "Budhanoor", "Kainakary", "Mannar", "Kayamkulam", "Cherthala", "Ezhupunna", "Chunakkara", "Ambalapuzha North", "Champakkulam", "Muhamma", "Muthukulam", "Arthunkal", "Puthencavu", "Paravoor", "Kuttanad", "Punnapra North", "Chakkulathukavu", "Chengannur", "Ezhupunna", "Ambalapuzha", "Chengannur", "Thuravoor", "Kuthiathod", "Chungam ", "Noorandu", "Punnamada" ), 
				   "Pathanamthitta" 	=> array (" Select Location", "Chenganoor", "Mallappally", "Adoor", "Kozhenchery", "Pandalam", "Aranmula", "Thiruvalla", "Kumbanad", "Mylapra Town", "Ranni", "Mundiapally", "Ezhamkulam", "Chittar", "Kottarakkara", "Prakkanam", "Vadasserikkara", "Mannade", "Elavumthitta", "Omalloor " ), 
				   "Kottayam" 			=> array (" Select Location", "Changanacherry", "Manarkad", "Kottayam municipality", "Kanjikuzhy", "Pala", "Ettumanoor", "Erattupetta", "Athirampuzha", "Kumarakom", "Kanjirapally", "Vaikom", "Ponkunnam", "Manganam", "Arppokara", "Arppokara", "Methranchery", "Nattakam", "Nattakam", "Ramapuram", "kalathippady", "Pathirappilly", "kodimatha Bridge", "Vayala", "Carithas", "Ettumanoor", "kuruppanthara", "Chemmanampady", "Vagamon", "karithas Jn", "Poonjar", "Kuravilangad", "Kumaranalloor", "Pampady", "Neerikode", "Kurichithanam", "Vayala", "Mundakayam", "Marangattupilly", "Cheruvandoor", "Chirappuram", "Ayarkunnam", "Athirampuzha", "Neezhoor", "Moonnilavu", "Kanakkary", "Neendoor", "Vagamon", "Kollappally", "Puthanangady", "Thirunakkara ", "Ammancherry", "Kudamaloor", "Muttuchira", "Panampalam", "Nagambadam", "Puthupally", "Karukachal", "Kadathuruthy", "Koodalloor", "Kattachira", "Vettimukal", "Pattithanam", "Arumanoor", "Kummannoor", "Kuriyanad", "Erumeli", "Thiruvanchiyoor ", "Amballoor ", "Pravithanam", "Bharanganam", "Annadivayal ", "Muttambalam", "Vembelly", "Uzhavoor", "Velloor", "Chingavanam", "Vazhappally ", "Thalayolaparambu", "Bharananganam", "Kidangoor", "Kurichi", "Monippally ", "Kozha", "Kanjirathanam", "Kuruppunthara", "Erattupetta", "Kodungoor", "Karoor ", "Nechipuzhoor ", "Umayanallor ", "Kurianadu ", "Sankranthi", "Chethimattom", "Kuruppanthara", "Amalagiri", "Athirampuzha", "Kollad", "Arvikuzhy" ), 
				   "Palakkad" 			=> array (" Select Location", "Koottupatha", "Vadakkepadam", "Puthur", "Palakkad Municipality", "Ramanathapuram", "Vadakkanchery", "Manarkkad", "Malampuzha", "Nenmara", "Kuzhalmannam", "Puthupariyaram", "Akathethara", "Alathoor", "Kanjikode", "Oyalapathy", "Kalladikode", "Parli", "Chandra Nagar", "Kannanur ", "Thathamangalam", "Walayar", "Puthussery", "Hillview Nagar", "Kannadi", "Kalpathy", "Kozhinjampara", "Olavakkode", "Cheekuzhi", "Pirivu", "Thenoor", "Kallekkad", "Kinassery", "Pirayiri ", "Pattiripala", "Vadassery", "Yakkara", "Vallikode", "Imuri Kavala", "Nakshatra Nagar", "Kunnathumedu", "Alangad", "Erattakulam", "Elappully", "Mepparamba", "Kallekkad", "Edakkurussi", "Attapadi", "Ottapalam", "Chittoor", "Parali", "Chalissery", "Pattambi", "Vadackenchery", "Kulappully", "Velanthavalam", "Eruthenpathy", "Para Junction", "VIP Colony" ), 
				   "Kozhikode" 			=> array (" Select Location", "Pavangad", "Desaposhini Road", "Kozhikode corporation", "Payyoli", "Manassery", "Kuttyadi", "Puthiyangadi", "Manakavu", "Chathamangalam", "Eranhikkal", "Palazhi", "Koyilandy", "Karaparamba ", "Pantheerankavu", "Thamarassery", "Thondayadu", "Kuduparamba", "Chevayoor ", "Naduvettam ", "Elanji Palam", "Beach Road", "Kunduparamba", "Chelavoor", "Kunnamangalam", "Mavoor road", "West Hills", "Naduvattam", "Near NGO Quarters", "East hill", "Malaparamba", "Near Medical College", "Vengali", "Kovoor", "Malikkadavu", "Chinthavalapu", "Karanthur", "Nadakkavu ", "Paleri", "Civil Station", "Payadimethal", "Byepass Road Kozhikode ", "Feroke", "Chelavoor", "Byepass road Meenchantha", "Moozhikkal", "Varatiyakal", "Mattannur", "Markaz", "Nadakkavu ", "Kottoli", "Karuvassery", "Kunnamangalam", "Padanilam", "Malabar Christian College", "Eranhipalam", "Pillaserry ", "Vellimadkunnu", "Paroppadi", "Payambra", "Kuruvattur", "Panniyankara", "Balussery ", "Ulliyeri", "Thalayad", "Pavamani", "Vellayil beach", "Mukkom", "Kuthiravattom" ), 
				   "Malappuram" 		=> array (" Select Location", "Urkadavu", "Arecode", "Pongaloor", "Karuvarakundu", "Kottakkal", "Edappal", "Perinthalmanna", "Vettilappara", "Vettichira", "Nilambur", "Tirur" ), 
				   "Wayanad" 			=> array (" Select Location", "Makkiyad", "Sulthanbathery", "Meenangadi", "Kalpetta", "Kenichira", "Wayanad Municipality", "Panamaram", "Kuruva Island", "Manathavady", "Korome", "Nadavayal", "Pilakkavu", "Kuzhinilam", "Banasura", "Meenmutty", "Vythiri", "Lakkidi", "Pulpally", "Kartikkulam", "Ambalavayal", "Chundel", "Tholpetty", "Meppadi Panchayat", "Kappikalam " ), 
				   "Kasargod" 			=> array (" Select Location", "Kasargod Municipality", "Kanjangadu", "Neeleswaram", "Kundamkuzhy", "Manjeshwar", "Kattukkuke", "Pannippara", "Badradukkam", "Paikkom ", "Mulleria", "Poinachi", "Patla", "Nellikunnu", "Bekal", "Kumbala", "Cherkala ", "Anangoor", "Cheemeni", "Hosangadi", "Chevar", "Bovikkanam" ), 
				   "Kannur" 			=> array (" Select Location", "Kannur Municipality", "Thaliparamba", "Payambalam", "Talap", "Kadiroor", "Mundayad", "Elayavoor", "Kannur Town", "Payyannur", "Pallikkunnu", "Koothuparamba", "Thalassery", "Podikkundu", "Kappad", "Pannenpara Alavi", "Pannenpara Alavil", "Alacode", "Thottada", "Thottada", "Vellad", "Cherupuzha", "Eruvessi ", "Chempanthotty", "Peravoor", "Kunhippally", "Valapattanam", "Munderi Panchayath", "Sreekandapuram", "Muzhappilangad", "Edoor" ) 
				   );
$scooter  = array (0=>"Select Value","Bajaj","Hero","Honda","Kinetic Motors","TVS","Yamaha","BMW","Hero Honda","Imported Bikes","LML ( Piaggio)","Royal Enfield","Suzuki","Other");
$bike	  = array (0=>"Select Value","Bajaj","Hero","Hero Honda","Honda","TVS","Yamaha","BMW","Imported Bikes","Kinetic Motors","LML ( Piaggio)","Royal Enfield","Suzuki","Other");
$car	  = array (0=>"Select Value","Maruti Suzuki","Honda","Hyundai","Toyota","Tata","Mahindra","Audi","BMW","Bentley","Chevrolet","Daewoo","Fiat","Ford","Hindustan Motors","Mercedes Benz","Mitsubishi","Nissan","Opel","Rolls Royce","Skoda","Volkswagen","Volvo","Others");
$color    = array (0=>"Select Value","Black","Blue","Grey","Red","Silver","White","Beige","Golden","Green","Orange","Purple","Yellow","Other");
$fuel     = array (0=>"Select Value","CNG","Diesel","Electric","Hybrid","LPG","Petrol");
$cond	  = array (0=>"Select Value","New","Used");
$trans	  = array (0=>"Select Value","Automatic","Manual");
$type     = array (0=>"Select Type","Scooter","Bike","Auto Rikshaw","Car","Bus/Tempo/Truck","Other");
$worth	  = array (0=>"000000","25000","50000","100000","200000","300000","400000","500000","600000","700000","800000","900000","1000000","1500000","2000000","2500000","3000000","5000000","10000000");
$year	  = range(1940,date("Y"));
$person   = $_SESSION['id'];
include_once 'dblog.php';
###############################################################################################################
###############################################################################################################
################################	THE ORDER OF THE ARRAY MAKE SENSE        ##################################
################################              NEVER CHANGE IT                ##################################
###############################################################################################################
###############################################################################################################
function successmail() {
	header ( 'Location:index.php' );
}
function success() {
	header ( 'Location:index.php?msg=home' );
}
function successup() {
	header ( 'Location:index.php' );
}
function successlog() {
	header ( 'Location:index.php' );
}
function emailResponseFromServer($to,$subject,$msg)
{
	$to = "autovipany.in@gmail.com";
	$subject = "CONTACT US THROUGH ONLINE";
	$message = "<table>
<tr><td colspan=3 align=center>Feedback </td>
</tr</table>";
	$from = "WWW.AUTOVIPANY.IN<response@autovipany.in>";
	$headers = "from:" . $from . "\r\n";
	$headers .= "Reply-To: $_POST[cont_mail]\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html";
	
	mail ( $to, $subject, $message, $headers );
}
function checktheMailId($mail, $checkdb = 0) {
	if ($checkdb == 0) {
	#check the db to find whether the id used before.
	} else {
		if (filter_var ( $mail, FILTER_VALIDATE_EMAIL )) {
			echo 'N';
		}
	}
}
function sendSpamMessage($id)
{
	$topic = "WARNING-SPAM - #".$id;
	$messag = 'Dear Sirs,<br/>There is a profile has been informed as spam in autovipany.<br/>
	<a target="_blank" href="http://autovipany.in/index.php?msg=second&second='.$id.'" style="text-decoration:none;color:lightblue;">Check It HERE</a>';
			postTheMail(composeNewMessage($topic,$messag),'autovipany.in@gmail.com',$topic);
			
}
function checkRegisteredEmail($email)
{
	if (filter_var ( $email, FILTER_VALIDATE_EMAIL )) 
	{
	
	$sql = "SELECT * FROM rcowner WHERE email='$email' AND entrance='Y' ";
		$result = mysql_query ( $sql ) or die ( mysql_error () );
		if (mysql_num_rows ( $result ) > 0) {
			echo '<input type="button" onclick="sentPass()" name="mailbut" value="Submit" />';
		} else {
			echo 'Enter Registered EmailId';
		}
	} 
	else 
	{
			echo "Enter Valid email ID";
	}
}
function releasePasswordtoMail($mid)
{
	$sql = "SELECT id FROM rcowner WHERE email='$mid'";
	$result = mysql_query ( $sql ) or die ( "Error in query: $sql. " . mysql_error () );
	if (mysql_num_rows ( $result ) > 0) {
		while ( $row = mysql_fetch_array ( $result ) ) {
			$pass = $row [0];
		}
	}
	$topic = 'Password Information';
	$messag = 'Hi '.getDetailsFromTable('name','rcowner',$pass).',<br/>Your request has been processed successfully.
				Please stay close with us <a href="http://autovipany.in/" style="color:lightblue;text-decoration:none;">Here</a>.<br/>
				Your Credentials are <br/>Username:'.getDetailsFromTable('email','rcowner',$pass).' <br/>Password:'.getDetailsFromTable('password','rcowner',$pass).'<br/>';
	postTheMail(composeNewMessage($topic,$messag),getDetailsFromTable('email','rcowner',$pass),$topic);
	echo "An email sent to your registered email id with the details of password";
}
function getDetailsFromTable($tuple,$table='rcowner',$flag=1)
{
	if ($flag==1){global $person;}else{$person = $flag;}
	$sql = "SELECT $tuple FROM $table WHERE id=".$person;
	$result = mysql_query($sql);
	$data = mysql_fetch_array($result);
	return $data[0];
}
function displaySelectBrand($types,$sel=0)
{
	global $scooter,$bike,$car,$xxxx;
	switch ($types) {
		case 0 :$sel==0?$sel='':$sel;
		echo visualizeOther('brand',$sel);
		break;
		case 1 :echo visualizeSelect($scooter,'brand',$sel);
		break;
		case 2 :echo visualizeSelect($bike,'brand',$sel);
		break;
		case 3 :$sel==0?$sel='':$sel;
		echo visualizeOther('brand',$sel);
		break;
		case 4 :echo visualizeSelect($car,'brand',$sel);
		break;
		case 5 :$sel==0?$sel='':$sel;
		echo visualizeOther('brand',$sel);
		break;
		case 6 :$sel==0?$sel='':$sel;
		echo visualizeOther('brand',$sel);
		break;
		
	}
}
/*
 * other can be made upto.to visualize and data entry.so keep data entry.completed.
 * 
 * data entry can be assured.so
 */
function displaySelectCondn($types=0)
{
	global $cond;
	echo visualizeSelect($cond,'condition',$types);
}
function displaySelectTrans($types=0)
{
	global $trans;
	echo visualizeSelect($trans,'transmission',$types);
}

function displaySelectType($types=0)
{
	global $type;
	echo visualizeSelect($type,'category',$types);
}
function displaySelectYear($types=0)
{
	global $year;
	echo visualizeSelect($year,'year',$types);
}
function displaySelectColor($types=0)
{
	global $color;
	echo visualizeSelect($color,'color',$types);
}
function displaySelectFuel($types=0)
{
	global $fuel;
	echo visualizeSelect($fuel,'fuel',$types);
}
function visualizeSelect($arrayName,$name,$selected=0)
{
	$opt = "";
	for ($i=0;$i<count($arrayName);$i++)
	{
		if($i==$selected)
		{
			$opt = $opt ."<option value=".$i." selected>".$arrayName[$i]."</option>";
		}
		else
		{
			$opt = $opt ."<option value=".$i.">".$arrayName[$i]."</option>";
		}
	}
	if($name=='category'){return "<select onchange=populateEverySelect(this.value)  name=".$name." class=select>".$opt."</select>";}
	else{return "<select name=".$name." class=select>".$opt."</select>";}
}
function visualizeOther($name,$val)
{
	return '<input type="text" name="'.$name.'" value="'.$val.'" placeholder="Type Here." class="textbox"/>';
	
}
function sessionChangeDataEntry()
{
	$_SESSION['person']='subinpvasu';
}
function displayArrayasString($array,$selected)
{
	if (is_numeric($selected)){return $array[$selected];}
	else{return $selected;}
	
}
function displaySearchResults($cate=1,$brand=1,$min=1,$max=10,$begin=0,$pg=1,$end=25)
{
	$c=0;global $worth;
	$sql = "SELECT * FROM vehicle WHERE type=$cate AND ";
    if($brand==0){$sql  .=  "";}
    else{$sql .= "brand=$brand AND ";}
    if($min==0||$max==0||$min==19||$max==19)
    {$sql .= " ";}
    else{$sql .= " price BETWEEN $worth[$min] AND $worth[$max]  AND ";}
    $sql .= " visibility='Y' ORDER BY id DESC ";
    $rest = mysql_query($sql);
    $cnt  = mysql_num_rows($rest);
    $tot  = ceil($cnt/$end);
    $sql .= " LIMIT $begin,$end";
	$result = mysql_query($sql)or die(mysql_error());
	
	
	?>
<table width="740px"  cellpadding="2" id="searchfill" style="visibility: visible;margin-top:25px;float:left;">
<tr><td colspan="5" align="center" style="font-weight: bold;text-transform: uppercase">Search Results</td></tr>
<tr><td colspan="5" align="left"><img src="./images/blue_line.png" alt="photo" width="738px"/> </td></tr>
<tr>
<?php
if (mysql_num_rows($result)>0)
	{
	while($col = mysql_fetch_array($result))
	{
		if(!empty($col['title']))
		{
				$catgo  = $col['title'];
				$cat    = $catgo;
				$catgo  = substr($catgo,0,20)."..";
  				$string = "<br/>PRICE : <img src=images/rupee.png height=9px/>  ".digitAliasPrice(trim($col['price']))."/-";
		}
		
  	if($c%5==0)
  	{
  		echo'</tr><tr>
<td align="center" width="150px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
<div  style="height:110px;width:124px;padding-top:8px"><a target="_blank" href="index.php?msg=second&second='.$col['id'].'">';


if($col['photo']=='autovipany.jpg')
{	
	echo '<img src="images/autovipany.png" title="'.$cat.'" width="124px" height="110px"  alt="PHOTO" />';
}
else
	{
	echo '<p style="position:absolute;visibility:hidden;color:white;font-weight:bold;padding-top:25px;"  id="check">Change Profile Picture</p>';
	echo '<img src="upload/'.$col["photo"].'" title="'.$cat.'"  width="110px" height="125px" alt="PHOTO" />';
 	}
  		
echo '
</a></div>
<div align="center" style="background-image: url(../images/details.png);background-repeat: no-repeat;width:140px;height:56px;padding-top:8px;margin-top:5px">
<a target="_blank"  title="'.$cat.'"  href="index.php?msg=second&second='.$col['id'].'">'.$catgo . $string.'</a></div>
</td> 
';
  	}
  	else {
 echo'
<td align="center" width="150px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
<div  style="height:110px;width:124px;padding-top:8px"><a target="_blank" href="index.php?msg=second&second='.$col['id'].'">';
if($col['photo']=='autovipany.jpg')
{
	echo '<img src="images/autovipany.png" title="'.$cat.'"  width="124px" height="110px"  alt="PHOTO" />';
}
else
{
	echo '<p style="position:absolute;visibility:hidden;color:white;font-weight:bold;padding-top:25px;"  id="check">Change Profile Picture</p>';
	echo '<img src="upload/'.$col["photo"].'" title="'.$cat.'"  width="110px" height="125px" alt="PHOTO" />';
}
echo '
</a></div>
<div align="center" style="background-image: url(../images/details.png);background-repeat: no-repeat;width:140px;height:56px;padding-top:8px;margin-top:5px">
<a target="_blank" title="'.$cat.'"  href="index.php?msg=second&second='.$col['id'].'">'.$catgo . $string.'</a></div>
</td> 
';
  }
 $c++;
	}
	 ?>
</tr>
<tr>
<td colspan="5"> 

<span style="float:left;width:23%;text-align:left;height:1px;"><?php if ($pg>1){?>
<button class="button" onclick="keepSearching(<?php echo ($pg-1)*$end  ?>,<?php echo $pg-1;?>);">Back</button><?php }?></span>
<span style="float:left;width:53%;text-align:center;color:red;">Page <?php echo $pg;?><br/>Total <?php echo $cnt; ?> Result(s) in <?php echo $tot; ?> Page(s).</span>
<span style="float:right;width:23%;text-align:right;height:1px;"><?php if ($tot>$pg){?><button class="button" onclick="keepSearching(<?php echo $pg*$end?>,<?php echo $pg+1;?>);">Next</button><?php }?></span>

</td>
</tr>
</table>
<?php
	}
	else
	{
		echo '<td colspan="5" align="center">No Results Found.!</td></tr></table>';
	}
}
function digitAliasPrice($number)
{
	switch (strlen(trim($number)))
	{
		case 0 : return number_format($number);
		break;
		case 1 : return number_format($number);
		break;
		case 2 : return number_format($number);
		break;
		case 3 : return number_format($number);
		break;
		case 4 : return number_format($number);
		break;
		case 5 : return number_format($number);
		break;
		case 6 : return lengthGreater($number);
		break;
		case 7 : return lengthGreater($number);
		break;
		default : return number_format($number);
		break;
	}
}
function lengthGreater($num)
{
	$l  = strrev($num);
    $kk = str_split($l);
    $k  = $kk[0].$kk[1].$kk[2].",".$kk[3].$kk[4].",".$kk[5].$kk[6].$kk[7];//6
    $k  = strrev($k);
    return $k;
}
?>