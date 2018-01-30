<?php
session_start();
include_once '../include/admin.php';
		
		
/***************************************************************************************************************
 * ************************************************************************************************************
 **************************************************************************************************************/

	define('WATERMARK_MARGIN_ADJUST', 5);
define('WATERMARK_FONT_REALPATH', '../fonts/');

function render_text_on_gd_image(&$source_gd_image, $text, $font, $size, $color, $opacity, $rotation, $align)
{
    $source_width = imagesx($source_gd_image);
    $source_height = imagesy($source_gd_image);
    $bb = imagettfbbox_fixed($size, $rotation, $font, $text);
    $x0 = min($bb[0], $bb[2], $bb[4], $bb[6]) - WATERMARK_MARGIN_ADJUST;
    $x1 = max($bb[0], $bb[2], $bb[4], $bb[6]) + WATERMARK_MARGIN_ADJUST;
    $y0 = min($bb[1], $bb[3], $bb[5], $bb[7]) - WATERMARK_MARGIN_ADJUST;
    $y1 = max($bb[1], $bb[3], $bb[5], $bb[7]) + WATERMARK_MARGIN_ADJUST;
    $bb_width = abs($x1 - $x0);
    $bb_height = abs($y1 - $y0);
    switch ($align) {
        case 11:
            $bpy = -$y0;
            $bpx = -$x0;
            break;
        case 12:
            $bpy = -$y0;
            $bpx = $source_width / 2 - $bb_width / 2 - $x0;
            break;
        case 13:
            $bpy = -$y0;
            $bpx = $source_width - $x1;
            break;
        case 21:
            $bpy = $source_height / 2 - $bb_height / 2 - $y0;
            $bpx = -$x0;
            break;
        case 22:
            $bpy = $source_height / 2 - $bb_height / 2 - $y0;
            $bpx = $source_width / 2 - $bb_width / 2 - $x0;
            break;
        case 23:
            $bpy = $source_height / 2 - $bb_height / 2 - $y0;
            $bpx = $source_width - $x1;
            break;
        case 31:
            $bpy = $source_height - $y1;
            $bpx = -$x0;
            break;
        case 32:
            $bpy = $source_height - $y1;
            $bpx = $source_width / 2 - $bb_width / 2 - $x0;
            break;
        case 33;
            $bpy = $source_height - $y1;
            $bpx = $source_width - $x1;
            break;
    }
    $alpha_color = imagecolorallocatealpha(
        $source_gd_image,
        hexdec(substr($color, 0, 2)),
        hexdec(substr($color, 2, 2)),
        hexdec(substr($color, 4, 2)),
        127 * (100 - $opacity) / 100
    );
    return imagettftext($source_gd_image, $size, $rotation, $bpx, $bpy, $alpha_color, WATERMARK_FONT_REALPATH . $font, $text);
}

/*
 * Fix for the buggy imagettfbbox implementation in gd library
 */

function imagettfbbox_fixed($size, $rotation, $font, $text)
{
    $bb = imagettfbbox($size, 0, WATERMARK_FONT_REALPATH . $font, $text);
    $aa = deg2rad($rotation);
    $cc = cos($aa);
    $ss = sin($aa);
    $rr = array();
    for ($i = 0; $i < 7; $i += 2) {
        $rr[$i + 0] = round($bb[$i + 0] * $cc + $bb[$i + 1] * $ss);
        $rr[$i + 1] = round($bb[$i + 1] * $cc - $bb[$i + 0] * $ss);
    }
    return $rr;
}

/*
 * Wrapper function for opening file, calling watermark function and saving file
 */

define('WATERMARK_OUTPUT_QUALITY', 100);

function create_watermark_from_string($source_file_path, $output_file_path, $text, $font, $size, $color, $opacity, $rotation, $align)
{
    list($source_width, $source_height, $source_type) = getimagesize($source_file_path);
    if ($source_type === NULL) {
        return false;
    }
    switch ($source_type) {
        case IMAGETYPE_GIF:
            $source_gd_image = imagecreatefromgif($source_file_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gd_image = imagecreatefromjpeg($source_file_path);
            break;
        case IMAGETYPE_PNG:
            $source_gd_image = imagecreatefrompng($source_file_path);
            break;
        default:
            return false;
    }
    render_text_on_gd_image($source_gd_image, $text, $font, $size, $color, $opacity, $rotation, $align);
    imagejpeg($source_gd_image, $output_file_path, WATERMARK_OUTPUT_QUALITY);
    imagedestroy($source_gd_image);
}

/*
 * Uploaded file processing function
 */

//define('UPLOADED_IMAGE_DESTINATION', 'old/');
define('PROCESSED_IMAGE_DESTINATION', '../upload/');

function process_image_upload($Field)
{	
	$prefix = exec ( "hostname" );
	$random_digit = uniqid ( $prefix, true );
	 
    $temp_file_path = $_FILES[$Field]['tmp_name'];
    $temp_file_name = $random_digit.$_FILES[$Field]['name'];
    list(, , $temp_type) = getimagesize($temp_file_path);
    if ($temp_type === NULL) {
        return false;
    }
    switch ($temp_type) {
        case IMAGETYPE_GIF:
            break;
        case IMAGETYPE_JPEG:
            break;
        case IMAGETYPE_PNG:
            break;
        default:
            return false;
    }
    $uploaded_file_path = $temp_file_path;
    $processed_file_path =  PROCESSED_IMAGE_DESTINATION . preg_replace('/\\.[^\\.]+$/', '.jpg', $temp_file_name);
  //  move_uploaded_file($temp_file_path, $uploaded_file_path);
    /*
     * PARAMETER DESCRIPTION
     * (1) SOURCE FILE PATH
     * (2) OUTPUT FILE PATH
     * (3) THE TEXT TO RENDER
     * (4) FONT NAME -- MUST BE A *FILE* NAME
     * (5) FONT SIZE IN POINTS
     * (6) FONT COLOR AS A HEX STRING
     * (7) OPACITY -- 0 TO 100
     * (8) TEXT ANGLE -- 0 TO 360
     * (9) TEXT ALIGNMENT CODE -- POSSIBLE VALUES ARE 11, 12, 13, 21, 22, 23, 31, 32, 33
     */
    $result = create_watermark_from_string(
        $uploaded_file_path,
        $processed_file_path,
        'WWW.VADHU-VARAN.COM',
        'arial.ttf',
        24,
        'CCCCCC',
        100,
        0,
        32
    );
    if ($result === false) {
        return false;
    } else {
        return array($uploaded_file_path, $processed_file_path);
    }
}

/*
 * Here is how to call the function(s)
 */





if($_POST['submit']=='Login')
{
	$user = $_POST['user']; 
	$pass = $_POST['pass'];
$sql = "SELECT id FROM dataentry WHERE email='$user' AND password='$pass'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
if(mysql_num_rows($result)>0)
{
	$_SESSION['data']='true';
	$_SESSION['optr']=$row[0];
	$zql = "UPDATE dataentry SET last=NOW() WHERE id=".$row[0];
	mysql_query($zql);
	header("Location:index.php?txt=come");
}
else
{
	header("Location:index.php");
}

}
if($_POST['dataprofile']=='Submit')
{
	$verify = 0;

    $check = 'false';
	$allowedExts = array ("jpg", "jpeg", "gif", "png" );
	$extension = end ( explode ( ".", $_FILES ["horoscope"] ["name"] ) );
	if ((($_FILES ["horoscope"] ["type"] == "image/gif") || ($_FILES ["horoscope"] ["type"] == "image/jpeg") || ($_FILES ["horoscope"] ["type"] == "image/png") || ($_FILES ["horoscope"] ["type"] == "image/pjpeg")) && ($_FILES ["horoscope"] ["size"] < 1024000) && in_array ( $extension, $allowedExts )) {
		if ($_FILES ["horoscope"] ["error"] > 0) {
		} else {
			$check = 'true';
		}
	} else {
	}
	
	if ($check == 'true') {

$result = process_image_upload('horoscope');////connect the image through tihs
if ($result === false) {
    echo '<br>An error occurred during file processing.';
} else {
 //   echo '<br>Original image saved as <a href="' . $result[0] . '" target="_blank"><img src="' . $result[0] . '"/></a>';
 //   echo '<br>Watermarked image saved as <a href="' . $result[1] . '" target="_blank"><img src="' . $result[1] . '"/></a>'.str_replace('new/','',$result[1]);
	}

/***************************************************************************************************************
 * ************************************************************************************************************
 **************************************************************************************************************/
		
		///////code should be here.....|||||
		
		$horoscope =  str_replace('../upload/','',$result[1]);
		//$path =  $new_file_name;
		}

 $check = 'false';
	$allowedExts = array ("jpg", "jpeg", "gif", "png" );
	$extension = end ( explode ( ".", $_FILES ["picture"] ["name"] ) );
	if ((($_FILES ["picture"] ["type"] == "image/gif") || ($_FILES ["picture"] ["type"] == "image/jpeg") || ($_FILES ["picture"] ["type"] == "image/png") || ($_FILES ["picture"] ["type"] == "image/pjpeg")) && ($_FILES ["picture"] ["size"] < 1024000) && in_array ( $extension, $allowedExts )) {
		if ($_FILES ["picture"] ["error"] > 0) {
		} else {
			$check = 'true';
		}
	} else {
	}
	global $new_file_name;
	if ($check == 'true') {
		
		
/***************************************************************************************************************
 * ************************************************************************************************************
 **************************************************************************************************************/


$resultz = process_image_upload('picture');////connect the image through tihs
if ($resultz === false) {
    echo '<br>An error occurred during file processing.';
} else {
 //   echo '<br>Original image saved as <a href="' . $result[0] . '" target="_blank"><img src="' . $result[0] . '"/></a>';
 //   echo '<br>Watermarked image saved as <a href="' . $result[1] . '" target="_blank"><img src="' . $result[1] . '"/></a>'.str_replace('new/','',$result[1]);
	}

/***************************************************************************************************************
 * ************************************************************************************************************
 **************************************************************************************************************/
		
		///////code should be here.....|||||
		
		$picture =  str_replace('../upload/','',$resultz[1]);
		//$path =  $new_file_name;
	}



/*$picture 		= strip_tags($_POST['picture']);
$picture 		= strip_tags($_POST['picture']);*/

///////////////////////
$marriage 		= strip_tags($_POST['marriage']);
$name 			= strip_tags($_POST['name']);
$gender 		= strip_tags($_POST['gender']);
$dob 			= strip_tags($_POST['dob']);
$age 			= strip_tags($_POST['age']);
$religion 		= strip_tags($_POST['religion']);
$caste 			= strip_tags($_POST['caste']);
$present 		= strip_tags($_POST['present']);
$address 		= strip_tags($_POST['address']);
$place 			= strip_tags($_POST['place']);
$pincode 		= strip_tags($_POST['pincode']);
$city 			= strip_tags($_POST['city']);
$district 		= strip_tags($_POST['district']);
$state 			= strip_tags($_POST['state']);
$country 		= strip_tags($_POST['country']);
$landline 		= strip_tags($_POST['landline']);
$mobile 		= strip_tags($_POST['mobile']);
$email 			= strip_tags($_POST['email']);
////////////////////////
$ip				= strip_tags($_POST['userip']);
$dataentry		= strip_tags($_POST['user']);
///////////////////////
$body 			= strip_tags($_POST['body']);
$height 		= strip_tags($_POST['height']);
$complexion 	= strip_tags($_POST['colour']);
$diet 			= strip_tags($_POST['diet']);
$weight 		= strip_tags($_POST['weight']);
$health 		= strip_tags($_POST['health']);
$blood 			= strip_tags($_POST['blood']);
$challenge 		= strip_tags($_POST['challenge']);
try{$details	= strip_tags($_POST['details']);}
catch (Exception $e){}
/////////////////////
$education 		= strip_tags($_POST['education']);
$institute 		= strip_tags($_POST['institute']);
$edplace 		= strip_tags($_POST['edplace']);
$edduration 	= strip_tags($_POST['edduration']);
$employer 		= strip_tags($_POST['employer']);
$designation 	= strip_tags($_POST['designation']);
$duration 		= strip_tags($_POST['preduration']);
$location 		= strip_tags($_POST['location']);
$ememployer 	= strip_tags($_POST['ememployer']);
$emplace 		= strip_tags($_POST['emplace']);
$emduration 	= strip_tags($_POST['emduration']);
$salary 		= strip_tags($_POST['salary']);
$income 		= strip_tags($_POST['income']);
/////////////////////
$total 			= strip_tags($_POST['total']);
$father 		= strip_tags($_POST['father']);
$fjob 			= strip_tags($_POST['fjob']);
$mother 		= strip_tags($_POST['mother']);
$mjob 			= strip_tags($_POST['mjob']);
$brother 		= strip_tags($_POST['brother']);
$mar_bro 		= strip_tags($_POST['mar_bro']);
$unmar_bro 		= strip_tags($_POST['unmar_bro']);
$sister 		= strip_tags($_POST['sister']);
$mar_sis 		= strip_tags($_POST['mar_sis']);
$unmar_sis 		= strip_tags($_POST['unmar_sis']);
$family_details = strip_tags($_POST['family_details']);
////////////////////
$star 			= strip_tags($_POST['star']);
$mdob 			= strip_tags($_POST['mdob']);
$tob 			= strip_tags($_POST['tob']);
$pob 			= strip_tags($_POST['pob']);
$rasi 			= strip_tags($_POST['rasi']);
$sista 			= strip_tags($_POST['sista']);
$sista_end 		= strip_tags($_POST['sista_end']);

$horo1    		= strip_tags($_POST['horo1']);
$horo2    		= strip_tags($_POST['horo2']);
$horo3    		= strip_tags($_POST['horo3']);
$horo4    		= strip_tags($_POST['horo4']);
$horo5    		= strip_tags($_POST['horo5']);
$horo6    		= strip_tags($_POST['horo6']);
$horo7    		= strip_tags($_POST['horo7']);
$horo8    		= strip_tags($_POST['horo8']);
$horo9    		= strip_tags($_POST['horo9']);
$horo10    		= strip_tags($_POST['horo10']);
$horo11    		= strip_tags($_POST['horo11']);
$horo12    		= strip_tags($_POST['horo12']);
$horo13    		= strip_tags($_POST['horo13']);
$horo14    		= strip_tags($_POST['horo14']);
$horo15    		= strip_tags($_POST['horo15']);
$horo16    		= strip_tags($_POST['horo16']);
$horo17    		= strip_tags($_POST['horo17']);
$horo18    		= strip_tags($_POST['horo18']);
$horo19    		= strip_tags($_POST['horo19']);
$horo20    		= strip_tags($_POST['horo20']);
$horo21    		= strip_tags($_POST['horo21']);
$horo22    		= strip_tags($_POST['horo22']);
$horo23    		= strip_tags($_POST['horo23']);
$horo24    		= strip_tags($_POST['horo24']);
$horotype   	= $horo1.'|'.$horo2.'|'.$horo3.'|'.$horo4.'|'.$horo5.'|'.$horo6.'|'.$horo7.'|'.$horo8.'|'.
				  $horo9.'|'.$horo10.'|'.$horo11.'|'.$horo12.'|'.$horo13.'|'.$horo14.'|'.$horo15.'|'.$horo16.'|'.
				  $horo17.'|'.$horo18.'|'.$horo19.'|'.$horo20.'|'.$horo21.'|'.$horo22.'|'.$horo23.'|'.$horo24;
$horo_details 	= strip_tags($_POST['horo_details']);
/////////////////////
$expectation 	= strip_tags($_POST['expectation']);

$register 		= strip_tags($_POST['register']);
$reg_name 		= strip_tags($_POST['reg_name']);
$reg_number 	= strip_tags($_POST['reg_number']);



$sqla = "INSERT INTO personal_details(marriage, name, gender, dob, age, religion, caste, present, address,
		 place, pin, city, district, state, country, telephone, mobile, email,ip,dataentry,added) 
		 VALUES ('$marriage','$name','$gender','$dob','$age','$religion','$caste','$present','$address',
		 '$place','$pincode','$city','$district','$state','$country','$landline','$mobile','$email','$ip',
		 '$dataentry',NOW())";
mysql_query($sqla);
$result = mysql_insert_id();

if(is_numeric($result)){
$sqlb = "INSERT INTO physical_details(person_id, body, diet, height, complexion, health, weight, blood,
 		disability, details) VALUES ('$result','$body','$diet','$height','$complexion','$health','$weight',
 		'$blood','$challenge','$details')";

$sqlc = "INSERT INTO qualification(education, designation, employer, location, duration, salary, institute,
		 place, period, last_employer, last_location, last_duration, income, person_id) VALUES ('$education',
		 '$designation','$employer','$location','$duration','$salary','$institute','$edplace','$edduration',
		 '$ememployer','$emplace','$emduration','$income','$result')";

$sqld = "INSERT INTO family(total, father, fjob, mother, mjob, brother, bmarried, bunmarried, sister,smarried,
		sunmarried, other, person_id) VALUES ('$total','$father','$fjob','$mother','$mjob',
		 '$brother','$mar_bro','$unmar_bro','$sister','$mar_sis','$unmar_sis','$family_details','$result')";

$sqle = "INSERT INTO horoscope(star, dob, tob, pob, rasi, sista_dasa, dasa_end, horo, horobox, other,
		 person_id) VALUES ('$star','$mdob','$tob','$pob','$rasi','$sista','$sista_end','$horoscope',
		 '$horotype','$horo_details','$result')";

$sqlf = "INSERT INTO other(register, name, number,  photou, partner, person_id)
		 VALUES ('$register','$reg_name','$reg_number','$picture','$expectation','$result')";

mysql_query($sqlb);
mysql_query($sqlc);
mysql_query($sqld);
mysql_query($sqle);
mysql_query($sqlf);
$variable = 'good';
}
if($variable=='good')
{
header("Location:index.php?txt=think");
}
else 
{
	echo '
<script>
window.location="index.php";
</script>
';	
}

}