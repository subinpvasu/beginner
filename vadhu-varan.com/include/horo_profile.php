<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Select Horoscope</title>
</head>
<?php

if (isset ( $_FILES ['ufile'] )) {
	$check = 'false';
	$id = $_POST ['keyid'];
	$auth = $_POST ['auth'];
	$allowedExts = array ("jpg", "jpeg", "gif", "png" );
	$extension = end ( explode ( ".", $_FILES ["ufile"] ["name"] ) );
	if ((($_FILES ["ufile"] ["type"] == "image/gif") || ($_FILES ["ufile"] ["type"] == "image/jpeg") || ($_FILES ["ufile"] ["type"] == "image/png") || ($_FILES ["ufile"] ["type"] == "image/pjpeg")) && ($_FILES ["ufile"] ["size"] < 1024000) && in_array ( $extension, $allowedExts )) {
		if ($_FILES ["ufile"] ["error"] > 0) {
			echo "<font color=red>Error: " . $_FILES ["ufile"] ["error"] . "<br />Select a Valid Image!</font>";
		} else {
			$check = 'true';
		}
	} else {
		echo "<font color=red>Invalid file<br/>Select a Valid Image & Size less than 1 MB.</font>";
	}global $new_file_name;
	if ($check == 'true') {
		
		
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
        135,
        21
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

$result = process_image_upload('ufile');////connect the image through tihs
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
		
		$new_file_name =  $result[1];
		//$path =  $new_file_name;
		
			
				echo '<p style="font-weight:bold;color:#C4160F;text-align:center;">Successfully  Uploaded Your Horoscope.</p><BR/>
<script language="JavaScript" type="text/javascript">
connectParent();
var count =4;
countDown(); 
var da="";
var idt = "'.$id.'";
function connectParent()
{
var str = "' . $new_file_name . '";
var sbn = "' . $auth . '";
var idt = "'.$id.'";

if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
da = xmlhttp.responseText;
showDetail();
}
}
xmlhttp.open("GET","validation.php?msg=truehoro&data="+str+"&auth="+sbn+"&idt="+idt,true);
xmlhttp.send();
}
function showDetail()
{
var z = "'.$id.'";

this.window.opener.document.getElementById(z).innerHTML=da;
this.window.opener.document.getElementById("horosubmit").click();
}
function countDown(){ 
var status = " ' . $check . ' "; 
if (count <=0){  
if(status == "true")
{
this.window.close();
}
else
{
this.window.close();
}
}else{  
count--;  
setTimeout(function(){countDown()}, 1000);  
}  
}
</script>
';
			
	}
}
if ($check != 'true') {
	?>
<body>
<form action="horo_profile.php" method="post" onsubmit=""
	enctype="multipart/form-data" name="form" id="form">
<table width="100%" border="0" align="center" cellpadding="0"
	cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<td>
		<table width="100%" border="0" cellpadding="3" cellspacing="1"
			bgcolor="#FFFFFF">
			<tr>
				<td><strong>Select Horoscope </strong></td>
				<td id="test"></td>
			</tr>
			<tr>
				<td><input name="ufile" type="file" id="ufile" size="50" /></td>
			</tr>
			<tr>
				<td align="center"><input type="submit" name="submitted"
					value="Upload" /> <input type="hidden" name="auth"
					value="<?php
	echo $_GET ['auth'];
	?>" /> <input type="hidden" name="keyid"
					value="<?php
	echo $_GET ['keyid'];
	?>" /></td>
			</tr>
		</table>
		</td>
	</tr>
</table>
</form>
</body>
</html>
<?php
}
?>