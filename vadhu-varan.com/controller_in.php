<?php
session_start();
include_once 'include/admin.php';
if($_POST['postage']=='true')
{
$name		= strip_tags($_POST['name']);
$marriage	= strip_tags($_POST['marriage']);
$gender		= strip_tags($_POST['gender']);
$dob		= strip_tags($_POST['dob']);
$ipaddress	= strip_tags($_POST['ipaddress']);
$age		= strip_tags($_POST['age']);
$religion	= strip_tags($_POST['religion']);
$caste		= strip_tags($_POST['caste']);
$present	= strip_tags($_POST['present']);
$address	= strip_tags($_POST['address']);
$place		= strip_tags($_POST['place']);
$pincode	= strip_tags($_POST['pincode']);
$city		= strip_tags($_POST['city']);
$district	= strip_tags($_POST['district']);
$state		= strip_tags($_POST['state']);
$country	= strip_tags($_POST['country']);
$landline	= strip_tags($_POST['landline']);
$mobile		= strip_tags($_POST['mobile']);
$id 		= strip_tags($_POST['person']);
$sql = "UPDATE personal_details SET marriage='$marriage',name='$name',gender='$gender',dob='$dob',age='$age',
		religion='$religion',caste='$caste',present='$present',address='$address',place='$place',pin='$pincode',
		city='$city',district='$district',state='$state',country='$country',telephone='$landline',mobile='$mobile'
		WHERE id=".$id;
$result = mysql_query($sql) or die( mysql_error());
if($result)
{
	header("Location:index.php?msg=person&result=done");
}
else{
	header("Location:index.php?msg=person&result=undone");
}

}
if(isset($_POST['physical']))
{
	
$body  			= strip_tags($_POST['body']);
$height			= strip_tags($_POST['height']);
$colour			= strip_tags($_POST['colour']);
$diet			= strip_tags($_POST['diet']);
$health			= strip_tags($_POST['health']);
$blood			= strip_tags($_POST['blood']);
$weight			= strip_tags($_POST['weight']);
$challenge		= strip_tags($_POST['challenge']);
$id 		    = strip_tags($_POST['person']);
try{$details	= strip_tags($_POST['details']);}
catch (Exception $e){}

$sql = "UPDATE physical_details SET body='$body',diet='$diet',height='$height',complexion='$colour',
		health='$health',blood='$blood',disability='$challenge',details='$details',weight='$weight' 
		WHERE person_id=".$id;
 $result = mysql_query($sql);
 if ($result) {
 	header("Location:index.php?msg=physical&result=done");
 }
 else
 {
 	header("Location:index.php?msg=physical&result=undone");
 }
////need an existing connection.do it and change the code to update


}


if(isset($_POST['educated']))
{
$education      = strip_tags($_POST['education']);
$institute		= strip_tags($_POST['institute']);
$place			= strip_tags($_POST['place']);
$period			= strip_tags($_POST['period']);
$employer		= strip_tags($_POST['employer']);
$designation	= strip_tags($_POST['designation']);
$location		= strip_tags($_POST['location']);
$duration		= strip_tags($_POST['duration']);
$last_employer	= strip_tags($_POST['last_employer']);
$last_location	= strip_tags($_POST['last_location']);
$last_duration	= strip_tags($_POST['last_duration']);
$salary			= strip_tags($_POST['salary']);
$income			= strip_tags($_POST['income']);
$id 		    = strip_tags($_POST['person']);
$more			= strip_tags($_POST['more']);
$sql = "UPDATE qualification SET education='$education',designation='$designation',employer='$employer',
		location='$location',duration='$duration',salary='$salary',institute='$institute',place='$place',
		period='$period',last_employer='$last_employer',last_location='$last_location',last_duration='$last_duration',
		income='$income',more='$more' WHERE person_id=".$id;
if(!empty($employer) && !empty($designation) && !empty($location))
{
	$zql = "UPDATE other SET job_status='Y' WHERE person_id=".$id;
	mysql_query($zql);
}

$result = mysql_query($sql);

 if ($result) {
 	header("Location:index.php?msg=job&result=done");
 }
 else {
 	header("Location:index.php?msg=job&result=undone");
 }
}

if(isset($_POST['family']))
{

$members 		= strip_tags($_POST['members']); 
$father 		= strip_tags($_POST['father']);
$occupation	 	= strip_tags($_POST['occupation']);
$mother  		= strip_tags($_POST['mother']);
$mother_occu 	= strip_tags($_POST['mother_occu']);
$nobro 			= strip_tags($_POST['nobro']);
$mar_bro 		= strip_tags($_POST['mar_bro']);
$unmar_bro 		= strip_tags($_POST['unmar_bro']);
$nosis 			= strip_tags($_POST['nosis']);
$mar_sis 		= strip_tags($_POST['mar_sis']);
$unmar_sis 		= strip_tags($_POST['unmar_sis']);
$family_details = strip_tags($_POST['family_details']);
$id 			= strip_tags($_POST['person']);
$sql = "UPDATE family SET total='$members',father='$father',fjob='$occupation',mother='$mother',mjob='$mother_occu',brother='$nobro',bmarried='$mar_bro',bunmarried='$unmar_bro',sister='$nosis',smarried='$mar_sis',sunmarried='$unmar_sis',otherz='$family_details'  WHERE person_id=".$id;
$result = mysql_query($sql) or die(mysql_error());
 if ($result) {
 	header("Location:index.php?msg=family&result=done");
 }else
 {
 	header("Location:index.php?msg=family&result=undone");
 	 }
}

if(isset($_POST['horosubmit']))
{
 //////upload script is not here.
$horoimg	= strip_tags($_POST['photo-imghoro']);
$star		= strip_tags($_POST['star']);
$mdob    	= strip_tags($_POST['mdob']);
$tob    	= strip_tags($_POST['tob']);
$pob    	= strip_tags($_POST['pob']);
$rasi    	= strip_tags($_POST['rasi']);
$jsd    	= strip_tags($_POST['jsd']);
$jsde    	= strip_tags($_POST['jsde']);
$horo1    	= strip_tags($_POST['horo1']);
$horo2    	= strip_tags($_POST['horo2']);
$horo3    	= strip_tags($_POST['horo3']);
$horo4    	= strip_tags($_POST['horo4']);
$horo5    	= strip_tags($_POST['horo5']);
$horo6    	= strip_tags($_POST['horo6']);
$horo7    	= strip_tags($_POST['horo7']);
$horo8    	= strip_tags($_POST['horo8']);
$horo9    	= strip_tags($_POST['horo9']);
$horo10    	= strip_tags($_POST['horo10']);
$horo11    	= strip_tags($_POST['horo11']);
$horo12    	= strip_tags($_POST['horo12']);
$horo13    	= strip_tags($_POST['horo13']);
$horo14    	= strip_tags($_POST['horo14']);
$horo15    	= strip_tags($_POST['horo15']);
$horo16    	= strip_tags($_POST['horo16']);
$horo17    	= strip_tags($_POST['horo17']);
$horo18    	= strip_tags($_POST['horo18']);
$horo19    	= strip_tags($_POST['horo19']);
$horo20    	= strip_tags($_POST['horo20']);
$horo21    	= strip_tags($_POST['horo21']);
$horo22    	= strip_tags($_POST['horo22']);
$horo23    	= strip_tags($_POST['horo23']);
$horo24    	= strip_tags($_POST['horo24']);
$other    	= strip_tags($_POST['otherhoro']);
$id 		= strip_tags($_POST['person']);
$horotype   = $horo1.'|'.$horo2.'|'.$horo3.'|'.$horo4.'|'.$horo5.'|'.$horo6.'|'.$horo7.'|'.$horo8.'|'.$horo9.'|'.$horo10
.'|'.$horo11.'|'.$horo12.'|'.$horo13.'|'.$horo14.'|'.$horo15.'|'.$horo16.'|'.$horo17.'|'.$horo18.'|'.$horo19
.'|'.$horo20.'|'.$horo21.'|'.$horo22.'|'.$horo23.'|'.$horo24;

$sql = "UPDATE horoscope SET star='$star',dob='$mdob',tob='$tob',pob='$pob',rasi='$rasi',sista_dasa='$jsd',
dasa_end='$jsde',horobox='$horotype',other='$other',horo='$horoimg' WHERE person_id=".$id;
$result = mysql_query($sql);
 if ($result) {
 	header("Location:index.php?msg=horo&result=done");
 }
else
{
	header("Location:index.php?msg=horo&result=undone");
}
}

if(isset($_POST['other']))
{
$agefrom		= strip_tags($_POST['age_from']);
$ageto			= strip_tags($_POST['age_to']);
$heightfrom		= strip_tags($_POST['height_from']);
$heightto		= strip_tags($_POST['height_to']);
$marriage		= strip_tags($_POST['marriage']);
$castbar		= strip_tags($_POST['castebar']);
$marjob			= strip_tags($_POST['mar_job']);
$edudesc		= strip_tags($_POST['edu_desc']);
$marfam			= strip_tags($_POST['mar_fam']);
$joblo			= strip_tags($_POST['job_lo']);
$cases			= strip_tags($_POST['cases']);
$reqrother		= strip_tags($_POST['reqrother']);	////////////
$expectation 	= strip_tags($_POST['expectation']);
$register 		= strip_tags($_POST['register']);
$name 			= strip_tags($_POST['name']);
$number 		= strip_tags($_POST['number']);
$id 			= strip_tags($_POST['person']);
$photos			= strip_tags($_POST['photo-sideleft']);
$photou			= strip_tags($_POST['photo-proimg']);
$photob			= strip_tags($_POST['photo-sideright']);
$arrears		= strip_tags($_POST['arrears']);
$sql = "UPDATE other SET age_from='$agefrom',age_to='$ageto',height_from='$heightfrom',height_to='$heightto',
mar_status='$marriage',caste_bar='$castbar',mar_job='$marjob',mar_education='$edudesc',mar_joblo='$joblo',
special='$cases',mar_other='$reqrother',register='$register',name='$name',number='$number',
partner='$expectation',photos='$photos',photou='$photou',photob='$photob',arrears='$arrears',mar_religion='$marfam'
 WHERE person_id=".$id;
$result = mysql_query($sql);
 if ($result) {
 	header("Location:index.php?msg=other&result=done");
 }
else
{
	header("Location:index.php?msg=other&result=undone");
}
}


