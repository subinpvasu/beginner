<?php
include_once 'admin.php';
function backToindex()
{
	header("Location:index.php");
}
function changeLoc($way)
{
	
echo '
<script language="JavaScript" type="text/javascript">  
var count =6  
var redirect="'.$way.'"  
function countDown(){  
if (count <=0){  
window.location = redirect;  
}else{  
count--;  
document.getElementById("timer").innerHTML = ""  
setTimeout("countDown()", 1000)  
}  
}  
</script>  
<span id="timer">  
<script>  
countDown();  
</script>  
</span>  
';
	
}
function prepareAccount($k)
{
	
	$table = array(0=>'family','horoscope','other','physical_details','qualification');
	$mysql   = "SELECT id FROM family WHERE person_id=".$k;
	$results = mysql_query($mysql);
	$key = mysql_fetch_array($results);
	$l = $key['id'];
	if(is_null($l)){	
	for ($i=0;$i<count($table);$i++)
	{
	$sql = "INSERT INTO $table[$i] (person_id)VALUES($k)";
	mysql_query($sql);
	}
	}
	
	changeLoc('index.php');
	//changeLoc('index.php?msg=done');
}
function checkMatch($acp,$rqt)
{

$sql = "SELECT * FROM personal_details LEFT JOIN other ON personal_details.id=other.person_id WHERE personal_details.id=".$acp;
$zql = "SELECT * FROM personal_details LEFT JOIN other ON personal_details.id=other.person_id WHERE personal_details.id=".$rqt;
$result = mysql_query($sql);
$rezult = mysql_query($zql);
try {
$dataz  = mysql_fetch_array($rezult);
$data   = mysql_fetch_array($result);} catch (Exception $e) {
}
$caste_barz = $dataz['caste_bar'];
$caste_bar  = $data['caste_bar'];
$religionz  = $dataz['religion'];
$religion   = $data['religion'];
$castez     = $dataz['caste'];
$caste      = $data['caste'];
if($caste_bar=='N'&& $religionz==$religion && $caste==$castez)
{	
	return true;
}
else if($caste_bar=='Y')
{
	return true;
}
else 
{
	return false;
}

}
function update_both($sec,$fir)
{
	if(is_numeric($sec) && is_numeric($fir))
	{
		//update first with second as visited
		#update second with first  as followed
		$sql = "SELECT visited FROM personal_details WHERE id=".$fir;
		$zql = "SELECT followed FROM personal_details WHERE id=".$sec;
		$result = mysql_query($sql);
		$rezult = mysql_query($zql);
		$data = mysql_fetch_array($result);
		$zata = mysql_fetch_array($rezult);
		$visited = $data['visited'];
		$followed = $zata['followed'];
	$success = 'good';
		if(empty($visited))
		{
			$mql = "UPDATE personal_details SET visited='$sec' WHERE id=".$fir;
			mysql_query($mql) or die(mysql_error());
		}
		else 
		{
			$arvar 	= explode("," , $visited);
			array_push($arvar,$sec);
			$arvar  = array_unique($arvar);			
			$seco 	= implode("," , $arvar);
			$mql 	= "UPDATE personal_details SET visited='$seco' WHERE id=".$fir;
			mysql_query($mql) or die(mysql_error());
		}
	if(empty($followed))
		{
			$zmql = "UPDATE personal_details SET followed='$fir' WHERE id=".$sec;
			mysql_query($zmql) or die(mysql_error());
		}
		else 
		{
			$arvarz	 = explode("," , $followed);
			array_push($arvarz,$fir);
			$arvarz  = array_unique($arvarz);
			$secoz	 = implode(",",$arvarz);
			$zmql 	 = "UPDATE personal_details SET followed='$secoz' WHERE id=".$sec;
			mysql_query($zmql) or die(mysql_error());
		}
		
	}
	
	
}
function showVisitors()
{
	$pid = $_SESSION['who'];
	$sql = "SELECT visited FROM personal_details WHERE id=".$pid;
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$visit = $row[0];
	if(!empty($visit))
	{
		$visi = explode(",",$visit);
		for ($i = 0; $i < count($visi); $i++) {
			displayOne($visi[$i]);
			
		}
		#arrangeGridshape()
		
	}
	else
	{
		echo '<b style="color:red;font-weight:bold;font-size:16;top:350px;">You have no visitors Yet</b>';
	}
}
function showFollower()
{
    $pid = $_SESSION['who'];
	$sql = "SELECT followed FROM personal_details WHERE id=".$pid;
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$visit = $row[0];
	if(!empty($visit))
	{
		$visi = explode(",",$visit);
		for ($i = 0; $i < count($visi); $i++) {
			displayOne($visi[$i]);
			
		}
		#arrangeGridshape()
		
	}
	else
	{
		echo '<b style="color:red;font-weight:bold;font-size:16;top:350px;">You have no Followers Yet</b>';
	}
}
$pqrs=1;
function displayOne($z)
{
	global $pqrs;
	$zql = "SELECT * FROM personal_details LEFT JOIN other ON personal_details.id=other.person_id
			WHERE personal_details.id=".$z;
	$rezult = mysql_query($zql);
	$row = mysql_fetch_array($rezult);
	?><div id="div<?php
		echo $pqrs;
		?>"
	style="position: absolute; bottom: 0; width: 190px; height: 230px;"><?php 
		if ($row ['profile_image'] == '') {
			if ($row ['gender'] == 'B') {
				?>
	<img src="images/girl.png" width="140px" height="160px" alt="PHOTO" />

	<?php
			} else {
				?>
<img src="images/boy.png" width="140px" height="160px" alt="PHOTO" />
<?php
			}
		} else {
			if ($row ['profile_image'] == 'YR') {
				?>
<img src="upload/<?php
				echo $row ['photos']?>" width="140px"
	height="160px" alt="PHOTO" />
<?php
			}
			if ($row ['profile_image'] == 'YC') {
				?>
<img src="upload/<?php
				echo $row ['photou']?>" width="140px"
	height="160px" alt="PHOTO" />
<?php
			}
			if ($row ['profile_image'] == 'YL') {
				?>
<img src="upload/<?php
				echo $row ['photob']?>" width="140px"
	height="160px" alt="PHOTO" />
<?php
			}
		}
		?>
<div><?php
		echo $row [2]?></div>
<div>Age : <?php
		echo $row ['age']?></div>
<a href="index.php?msg=second&second=<?php echo $z;?>"
	style="text-align: right; padding-left: 70px">View Full Profile</a><a
	id="test" href="#123456"></a></div>   
	<?php 
	
	$pqrs++;
	
}
function showSubmitResponse($msg='')
{
	if($msg=='done')
	{
		echo '<script>var r = alert("Data Submitted Successfully.!");
		
		window.location="index.php";
		
		</script>';
	}
	else if($msg=='undone') 
	{
		echo '<script>alert("Data Submitted Failed!");</script>';
	}
	else 
	{
		//to do
	}
}
?>