<!--<html><head>
<meta content="" http-equiv="refresh" >

</head>
<body>
 
<form action="testphp.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html> 

<?php /*

//type check/*
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }

  echo "<br />--------------------------------------------------<br />";
  
  /*
  
  
  
$a1=array(0,1,2,'','');
$a2=array(0);
array_splice($a1,0,-2,$a2);
print_r($a1);
echo "<br />--------------------------------------------------<br />";
print_r(array_splice($a1,0,-2,$a2));

echo "<br />--------------------------------------------------<br />";
$a=array(0,1,2,'','');
print_r(array_filter($a));
echo "<br>**--**--*-";
$b = array_search('',$a);
echo $b;
echo "<br />--------------------------------------------------<br />";
unset($a[$b]);
$l = count($a);
echo $l;
echo "<br />--------------------------------------------------<br />";
print_r($a);
echo "<br />--------------------------------------------------<br />";
$p = 0;
foreach ($a as $value)
{
	$c[$p]=$value;
	$p++;
}
print_r($c);
echo "<br />-----------++++++++++++++++++++++++++------------<br />";
$d = array(0,1,2,'','','','','',5,6,8,);
$p = "asdd|asdasdasdsd|sadsadsad|||";
$pp = explode("|",$p);
$cc = count($pp);
echo $cc."<br />";
$pp = array_filter($pp);
$pp = array_values($pp);
$ccc = count($pp);
echo $ccc."<br />";
echo 'Current PHP version: ' . phpversion()."<br />";

 
/* close connection */
//finfo_close($finfo);
/*
$d=array_filter($d);
$k = count($d);
print_r($d)."<br />";
echo $k."<br />";
$d = array_values($d);
for($h=0;$h<$k;$h++)
{
	echo $d[$h]."<br />";
}
*//*
/*
//simple download script
header("Content-type:text/plain");

// It will be called downloaded.pdf
header("Content-Disposition:attachment;filename=download");

// The PDF source is in original.pdf
readfile("C:/Users/DEVELOPER/Desktop/DESK/mail.txt");
// / */
/*  $birthDate = "04/32/1990";
         //explode the date to get month, day and year
         $birthDate = explode("/", $birthDate);
         //get age from date or birthdate
         $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
         echo "Age is:".$age;
  $varied = 10;
  echo $varied."<br>";
  echo "\"$varied\"";
  
  
*/

////////
/*
$p = 1;
$t = 0;
$mid = array();
$file = fopen("C:/Users/DEVELOPER/Desktop/DESK/allmailme.txt","r");

while(!feof($file))
  {
  	$k = fgets($file);
  	if(strpos("$k","@"))
  	{
if(!((strpos("$k","rediffmail.com"))||(strpos("$k","gmail.com"))||(strpos("$k","yahoo.com"))||(strpos("$k","yahoo.co.in"))||(strpos("$k","hotmail.com"))||(strpos("$k","yahoo.in"))))
  	{
 $mid[$t] = $k;
  	}
  	}
  	
  	$p++;
  	$t++;
  }
 // sort($mid);
  $mid = array_unique($mid);
  $mid = array_values($mid);
  $j = count($mid);
  echo "All mail userss<br>************************************************************************<br>";
  for($q=0;$q<$j;$q++)
  {
  /*if($q==450 || $q==(450*2) || $q==(450*3)|| $q==(450*4)|| $q==(450*5)|| $q==(450*6)|| $q==(450*7)|| $q==(450*8)|| $q==(450*9)|| $q==(450*10)|| $q==(450*11)|| $q==(450*12)|| $q==(450*13)|| $q==(450*14)|| $q==(450*15))
  	{
  		echo $mid[$q]."<br>";
  		echo "<br>***********************************".$q."**********************####################<br>";
  	}
  	else 
  	{*//*
  		echo $mid[$q]."<br>";
  /*	}
  	*//*
  }
  echo "<br>Total:".$q;
  
  //echo $p;
fclose($file);
 */
/*$i=1;
echo ($i%2);
// echo date("d-m-Y");
//D/M/Y=thu/dec/2012
//d/m/y=06/12/12
/*$tomorrow = mktime(23,23,23,date("m"),date("d")+20,date("Y"));
echo "Tomorrow is ".date("d/M/Y", $tomorrow);
echo "<br>";
$k = 1;
$l = "\"test".$k."\"";*/
/*echo $l;
$k="there";
$k=explode(" ",$k);
/*$l="there is a way"; 
$m = explode(" ",$k);
$n = explode(" ",$l);
$r = array_intersect($m,$n);
$c = count($r);
echo $c;
print_r($k)
$con = mysql_connect('127.0.0.1','root','');
mysql_select_db('test',$con);

$sql = "SELECT name,age FROM employ";
$result = mysql_query($sql) or die(mysql_error());
while($row = mysql_fetch_array($result))
{
	echo $row['name']."----".$row['age']."<br>";
}*/  /* *//*
$k = array(0=>100,500,600,400,300,200);
$l = array();
print_r($k);
$l = $k;
rsort($l);
echo "<br>";
arsort($k);
print_r($l);
echo array_search($l[0],$k);*/
/*echo $l[0];*/
////////////Internet Connection Checker
?>  
<script type="text/javascript">

function checkInter()
{
	
		
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
	if(xmlhttp.readyState==1){
		document.getElementById("indication").style.visibility="visible";
		document.getElementById("two").style.visibility="visible";
		document.getElementById("two").style.background="red";
		}
	if(xmlhttp.readyState==2)
	{
		document.getElementById("two").style.background="blue";
	}
	if(xmlhttp.readyState==3)
	{
		document.getElementById("two").style.background="green";
	}
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
	document.getElementById("two").style.visibility="hidden";
	document.getElementById("indication").style.visibility="hidden";
document.getElementById("test").innerHTML=xmlhttp.responseText;
}
};
xmlhttp.open("GET","testphp.php?msg=status",true);
xmlhttp.send();

}

</script>
<table width="100%" id="indication" style="visibility: visible"><tr>
<td style="width:30%;color:white;" id="one">Please Wait..</td>
<td style="width:30%;color:white;text-align: center" id="two">Please Wait..</td>
<td style="width:30%;color:white;" id="three">Please Wait..</td>
</tr></table>
<a href="javascript:checkInter()">Connection Checker</a><br /><p id="test"></p>
<?php 
/*if(isset($_GET['msg']))
{
	
    $connected = @fsockopen("google.com", 8840); //website and port
    if ($connected){
        echo "true<br>"; //action when connected
        fclose($connected);
    }else{
        echo "false<br>"; //action in connection failure
    }
   
}*/
/*$kr = "HelloWorld \"";
$pr = "GoodMorning";
$sr = "GoodBye";
$tp = array();
$zr = $kr." ".$pr." ".$sr;
echo "<br> ".$zr."<br> ";
$so = "he was a very good boy not mad";
$st = "i am mad";
$temp = explode(" ",$so);
$tt = explode(" ",$st);
$tp = array_merge($tt,$temp);
$kv = 'i';
$kvs = array($kv);
print_r($kvs)."<br />";
$m = array_search($kv,$tp);
echo "<br /> m ".$m."<br />";
if(array_search($kv,$tp)>= 0)
{
	echo "match<br/>";
	print_r($tp)."<br />";
}
$tm = implode(" ",$tp);
echo $tm;*/
/*$m = 'manmass';
$k = array($m);
$l = explode(",",$m);
print_r($l);
*/
/*$word = 'HAPPY CHRISTMAS';
echo ucwords(strtolower($word))."<br>";
$k=0;
while ($k<10)
{
	echo $k."Hello World!<br />";
	if($k > 6)
	{
		break;
	}
	$k++;
}
$startTimeStamp = strtotime("2009/09/07");
$endTimeStamp = strtotime("2013/01/04");

$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays);
echo "<br />".$numberDays;



$table='employer';
$sql = "SELECT premier FROM $table WHERE";
echo "<br />".$sql."<br />";

$applicant = '7,177,17,1777';
echo array_search(7,explode(",",$applicant));
$a=array(7,17);
echo "<br />--------------------------------------------------------------------<br />";*/
//echo array_search(102,$a);

/*//getting new instance
$pdfFile = new_pdf();

PDF_open_file($pdfFile, " ");

//document info
pdf_set_info($pdfFile, "Auther", "Ahmed Elbshry");
pdf_set_info($pdfFile, "Creator", "Ahmed Elbshry");
pdf_set_info($pdfFile, "Title", "PDFlib");
pdf_set_info($pdfFile, "Subject", "Using PDFlib");

//starting our page and define the width and highet of the document
pdf_begin_page($pdfFile, 595, 842);

//check if Arial font is found, or exit
if($font = PDF_findfont($pdfFile, "Arial", "winansi", 1)) {
    PDF_setfont($pdfFile, $font, 12);
} else {
    echo ("Font Not Found!");
    PDF_end_page($pdfFile);
    PDF_close($pdfFile);
    PDF_delete($pdfFile);
    exit();
}

//start writing from the point 50,780
PDF_show_xy($pdfFile, "This Text In Arial Font", 50, 780);
PDF_end_page($pdfFile);
PDF_close($pdfFile);

//store the pdf document in $pdf
$pdf = PDF_get_buffer($pdfFile);
//get  the len to tell the browser about it
$pdflen = strlen($pdfFile);

//telling the browser about the pdf document
header("Content-type: application/pdf");
header("Content-length: $pdflen");
header("Content-Disposition: inline; filename=phpMade.pdf");
//output the document
print($pdf);
//delete the object
PDF_delete($pdfFile); */
/*
//$/*k = "";
$v = 4;
$l = explode(",",$k);
//array_push($l,$v);
$r = array_search($v,$l);
echo $r;
//print_r($l);

echo"<br />---------------------------------------------";
if(is_int(1/12)){echo good;}*/
/*echo round(74.9);
$k = date("Y")."<br />";
echo $k;

echo(date("M-d-Y",mktime(0,0,0,12,36,2001))."<br />");
echo(date("M-d-Y",mktime(0,0,0,14,1,2001))."<br />");
echo(date("M-d-Y",mktime(0,0,0,1,1,2001))."<br />");
echo(date("M-d-Y",mktime(0,0,0,1,1,99))."<br />");
//date in mm/dd/yyyy format; or it can be in other formats as well
         $birthDate = "01/22/1989"; //mm/dd/yyyy
         //explode the date to get month, day and year
         $birthDate = explode("/", $birthDate);
         //get age from date or birthdate
         $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
         echo "Age is:".$age;
         
echo "<br />";
$err  ='';
$err .= 'assas';
$err .= 'bssas';
      $k =  $err."|<br />";
      echo $k;
      
            
$arr_1 = array(0,1);
$arr_2 = array("cat","mouse","cow","fox","lion");      
//print_r(array_unique( array_merge($arr_1, $arr_2) ));
echo "<br /> Array-1 ";
//$arr_1 = array_diff($arr_1, $arr_2);
$arr_2 = array_diff($arr_2, $arr_1);
print_r($arr_1);
//echo "<br /> Array-2 ";
//print_r($arr_2);
    */     
//create function with an exception
/*function checkNum($number)
  {
  if($number>1)
    {
    throw new Exception("Value must be 1 or below");
    }
  return true;
  }

//trigger exception
checkNum(2);*/

//create function with an exception
/*
function checkNum($number)
  {
  if($number>1)
    {
    throw new Exception("Value must be 1 or below");
    }
  return true;
  }

//trigger exception in a "try" block
try
  {
  checkNum(1);
  //If the exception is thrown, this text will not be shown
  echo 'If you see this, the number is 1 or below';
  }

//catch exception
catch(Exception $e)
  {
  echo 'Message: ' .$e->getMessage();
  }
  ?><br /><?php /*

date_default_timezone_set("Asia/Calcutta");
$k = (date("l dS \of F Y h:i:s A") . "<br />");
echo $k."<br />";


function myTest()
{
static $x=0;
echo $x;
$x++;
}

myTest();
myTest();
myTest();*/

?>
<form method="post" action="">
<input type="button" name="sign" value="done"/>

</form>
<?php 
/*
if(isset($_REQUEST['sign']))
{
	$k = $_REQUEST['name'];
	echo "HI--".$k."--HI";
	if(is_numeric($k))
	{
		echo "Number";
	}
	else
	{
		echo "Character";
	}
}
else {
	
	//echo "HI--".$k."--HI";
	
	echo "true";
}

?>
 


id<br />id
total<br />total
father<br />father
fjob<br />fjob
mother<br />mother
mjob<br />mjob
brother<br />brother
bmarried<br />bmarried
bunmarried<br />bunmarried
sister<br />sister
bdetails<br />bdetails
smarried<br />smarried
sunmarried<br />sunmarried
sdetails<br />sdetails
other<br />other
person_id<br />person_id







 
 

<img src="./images/img_2.png"/>
<img src="./images/sample.jpeg" width="200px" height="200px" onclick="waterIt()"/>
<script type="text/javascript">

function waterIt()
{
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
	document.getElementById("result").innerHTML= xmlhttp.responseText;
	}
	};
	xmlhttp.open("GET","testphp.php?msg=function",true);
	xmlhttp.send();
}
//
</script>
<p id="result"></p>
<?php  
/*
// Load the stamp and the photo to apply the watermark to
$stamp = imagecreatefrompng('./images/img_2.png');
$im = imagecreatefromjpeg('./images/sample.jpeg');

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 
imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

// Output and free memory
//header('Content-type: image/png');
//imagepng($im);
//imagedestroy($im);
*//*
function watermarkpic() {

ini_set('max_input_time', 300);

require 'config.php';  
$filename = 'header.jpg';
$path_to_image_directory = './images/';
$path_to_medimage_directory = './css/';
$watermark = imagecreatefrompng('./images/green_line.png');
$watermarkwidth = imagesx($watermark);
$watermarkheight = imagesy($watermark);

if(preg_match('/[.](jpg)$/', $filename)) {  
        $originalimage = imagecreatefromjpeg($path_to_image_directory . $filename);  
    } else if (preg_match('/[.](gif)$/', $filename)) {  
        $originalimage = imagecreatefromgif($path_to_image_directory . $filename);  
    } else if (preg_match('/[.](png)$/', $filename)) {  
        $originalimage = imagecreatefrompng($path_to_image_directory . $filename);  
    }  

$originalwidth = imagesx($originalimage);
$originalheight = imagesy($originalimage);

$maxsize = 800;
$imgratio = $originalwidth / $originalheight;

if($imgratio > 1) {
    $finalwidth = $maxsize;
    $finalheight = $maxsize / $imgratio;
}
else {
    $finalheight = $maxsize;
    $finalwidth = $maxsize * $imgratio;
}   

$finalimage = imagecreatetruecolor($finalwidth,$finalheight);

imagecopyresampled($finalimage, $originalimage, 0,0,0,0,$finalwidth,$finalheight,$originalwidth,$originalheight);
imagecopy($finalimage,$watermark,0,0,0,0,$watermarkwidth,$watermarkheight);
//imagecopy($finalimage, $watermark, 0, 0, 0, 0, $watermarkwidth, $watermarkheight, 100);


//now move the file where it needs to go
if(!file_exists($path_to_medimage_directory)) {  
        if(!mkdir($path_to_medimage_directory)) {  
                die("There was a problem. Please try again!");  
        }  
     } 

 imagejpeg($finalimage, $path_to_medimage_directory . $filename);   
}

if(isset($_GET['msg']) && $_GET['msg'] == 'function')
{
	watermarkpic();
}

/*$main_img       = "./images/sample.jpeg"; // main big photo / picture
$watermark_img  = "./images/search.png"; // use GIF or PNG, JPEG has no tranparency support
$padding        = 3; // distance to border in pixels for watermark image
$opacity        = 100;  // image opacity for transparent watermark

$watermark  = imagecreatefrompng($watermark_img); // create watermark
$image      = imagecreatefromjpeg($main_img); // create main graphic

if(!$image || !$watermark) die("Error: main image or watermark could not be loaded!");


$watermark_size     = getimagesize($watermark_img);
$watermark_width    = $watermark_size[0];  
$watermark_height   = $watermark_size[1];  

$image_size     = getimagesize($main_img);  
$dest_x         = $image_size[0] - $watermark_width - $padding;  
$dest_y         = $image_size[1] - $watermark_height - $padding;


// copy watermark on main image
imagecopymerge($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, $opacity);


// print image to screen
header("content-type: image/jpeg");   
imagejpeg($image);  
imagedestroy($image);  
imagedestroy($watermark);  

// Create a 100*30 image
$im = imagecreate(100, 30);

// White background and blue text
$bg = imagecolorallocate($im, 255, 255, 255);
$textcolor = imagecolorallocate($im, 0, 0, 255);

// Write the string at the top left
imagestring($im, 5, 0, 0, 'Hello world!', $textcolor);

// Output the image
header('Content-type: image/png');

imagepng($im);
imagedestroy($im);                                                         
*/
?>
 
<form action="testphp.php" method="post" enctype="multipart/form-data">
    Select a file to upload for processing<br>
    <input type="file" name="File1"><br>
    <input type="submit" value="Submit File">
</form>
<?php /*
/*
 * PHP function to text-watermark an image
 * http://salman-w.blogspot.com/2008/11/watermark-your-images-with-text-using.html
 *
 * Writes the given text on a GD image resource using
 * the specified true-type font, size, color, etc
 *//*
*/
define('WATERMARK_MARGIN_ADJUST', 5);
define('WATERMARK_FONT_REALPATH', 'c:\\windows\\fonts\\');

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
/**/
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
/**/
define('WATERMARK_OUTPUT_QUALITY', 90);

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
    imagegif($source_gd_image, $output_file_path);
    imagedestroy($source_gd_image);
}

/*
 * Uploaded file processing function
 */
/**/
//define('UPLOADED_IMAGE_DESTINATION', 'old/');
define('PROCESSED_IMAGE_DESTINATION', 'new/');

function process_image_upload($Field)
{
    $temp_file_path = $_FILES[$Field]['tmp_name'];
    $temp_file_name = $_FILES[$Field]['name'];
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
    $processed_file_path = PROCESSED_IMAGE_DESTINATION . preg_replace('/\\.[^\\.]+$/', '.gif', $temp_file_name);
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
     *//**/
    $result = create_watermark_from_string(
        $uploaded_file_path,
        $processed_file_path,
        'WWW.VADHU-VARAN.COM',
        'arial.ttf',
        24,
        'CCCCCC',
        80,
        345,
        31
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
/**/
$result = process_image_upload('File1');////connect the image through tihs
if ($result === false) {
    echo '<br>An error occurred during file processing.';
} else {
 //   echo '<br>Original image saved as <a href="' . $result[0] . '" target="_blank"><img src="' . $result[0] . '"/></a>';
    echo '<br>Watermarked image saved as <a href="' . $result[1] . '" target="_blank"><img src="' . $result[1] . '"/></a>'.str_replace('new/','',$result[1]);
}/*
$name = '1';
?><br /><?php 
$kkk = substr(SHA1($name).'...',0,10);
?><br /><?php 
echo $kkk;
?><br /><?php 
echo SHA1($name);*/
?>


<?php 

/*echo '
<script>eval(sayGood());
function sayGood()
{
document.write("Good Morning.!");
}
</script>
';*//*
$a = 10;$b=20;$c=10;
$k = $a;$l=$b;
$v = explode(",",$k);
array_push($v,$l);
array_push($v,$c);
$n = array_unique($v);
//array_values($v);
print_r($n);
echo "<br>";
$s = implode(",",$v);
echo $s;
/**/
/*
$date1=2013-02-18;
$date2=2013-02-20;
/*$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");*//*
$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$seconds_diff = $ts2 - $ts1;
//echo floor($seconds_diff/3600/24);
//echo $seconds_diff;
$dStart = new DateTime(date('2012-07-26'));
   $dEnd  = new DateTime(date('2012-08-26'));
   $dDiff = $dStart->diff($dEnd);
   echo $dDiff->format('%R'); // use for point out relation: smaller/greater
   echo $dDiff->days;
   echo "<br>";
   $date1 =  date("Y-m-d");  
   $date2 =  2013-05-13;
   $ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$seconds_diff = $ts2 - $ts1;
echo $seconds_diff;
 echo "<br>";
//$diff=date_diff($date1,$date2);
//echo $diff->format("%R%a days");
$ddd  = '2013-05-13'; 
$date1 = date("Y-m-d");  
$date2 = $ddd;

$diff = abs(strtotime($date2) - strtotime($date1));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

printf(" %d days\n",$days);*//*
$jh = mt_rand(10000,10000000000000000);
echo $jh;
echo "<br>";*/
//echo"";
/*$t=time();
echo($t . "<br>");*/


/*
switch ($_SERVER['QUERY_STRING'])
{
case "red":
   echo "Your favorite color is red!";
   break;
case "blue":
   echo "Your favorite color is blue!";
   break;
case "green":
   echo "Your favorite color is green!";
   break;
default:
   echo "Your favorite color is neither red, blue, or green!";
}
echo "<br>";
echo $_SERVER['QUERY_STRING'];
echo date("Y")-18;

  if (ereg("^[a-zA-Z0-9_]{3,16}$",$var)) {
    echo "<br> Success";
   }
//preg_match('/^hello/', $str);
if (preg_match('^/[a-zA-Z0-9_]+$^',$var)) {
    echo "<br> Successed";
   }
   $email = 'subinpvasuatyahoo.com@gmail.com';
   if (!preg_match("^/[a-z0-9_.]*@[a-z0-9.-]+\\.[a-z]{2,4}$/i^", $email)) {
        echo '<br>bad email';
    } else {
        echo '<br>good email';
    }  
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<br>good email';
} else {
      echo '<br>bad email';
}
*//*
$var = '';
if ( preg_match("/^[0-9A-Za-z \\._]+$/", $var) ) {
              echo '<br>good emailz';
        } else {
            //return 'Not a valid string';
         echo '<br>bad emailz';
        }



function validate_string($data) {
        // Remove excess whitespace
        $data = trim($data);

        if ( preg_match("/^[0-9A-Za-z \\.\\-\\'\"]+$/", $data) ) {
            return true;
        } else {
            //return 'Not a valid string';
            return false;
        }
    }
    date_default_timezone_set("Asia/Kolkata");
    echo date('H-i-s');
    echo '------<br>';
    echo $_SERVER['QUERY_STRING'];
     echo '------<br>';
     switch (connection_status ())
{
case CONNECTION_NORMAL:
  $txt = 'Connection is in a normal state';
  break;
case CONNECTION_ABORTED:
  $txt = 'Connection aborted';
  break;
case CONNECTION_TIMEOUT:
  $txt = 'Connection timed out';
  break;
case (CONNECTION_ABORTED & CONNECTION_TIMEOUT):
  $txt = 'Connection aborted and timed out';
  break;
default:
  $txt = 'Unknown';
  break;
}

echo "____________".$txt."$$$$$$";

$ar = array(0=>"one","two","three","four");
$re = 10;
function showThearray($k){
	/*global $ar;
	
	print_r($$k);
	
	$cc = '';
	for($i = 0; $i < count ( $k ); $i ++) {
		$cc = $cc . '<option value="' . $$k [$i] . '">' . $$k [$i] . '</option>';
	}
	return '<select name="'.$k.'" id="'.$$k.'" style="border:1px solid #DEECF5;width:180px">' . $cc . '</select>';
	*//*global $$k;
	echo count($$k);print_r($$k);
	$l = $$k;
	echo ${$k}[0];
}
showThearray('ar');

$hel = 'good';
$good = 'hel';

echo $$hel;
?>
<br/><br/><br/><br/><br/>
<form method="get">
    <input type="checkbox" name="options[]" value="Politics"/> Politics<br/>
    <input type="checkbox" name="options[]" value="Movies"/> Movies<br/>
    <input type="checkbox" name="options[]" value="World "/> World<br/>
    <input type="submit" value="Go!" />
</form>

<?php 

$checked = $_GET['options'];
print_r($checked);

   ?>
   <br/>
    <input type="checkbox" <?php if(in_array("Politics",$checked)){echo 'checked';}?> name="options[]" value="Politics"/> Politics<br/>
    <input type="checkbox" <?php if(in_array("Movies",$checked)){echo 'checked';}?>   name="options[]" value="Movies"/> Movies<br/>
    <input type="checkbox" <?php if(in_array("World ",$checked)){echo 'checked';}?>   name="options[]" value="World "/> World<br/>
  <br/> <?php 
   echo "---".array_search("Politics",$checked)."---<br/>";
   echo "---".array_search("Movies",$checked)."---<br/>";
   echo "---".array_search("World ",$checked)."---<br/>";
   
   if(array_search("Politics",$checked)>=0)
   {$kl = array_search("Politics",$checked);echo $kl;}
*/?> <?php //$k = gethostname(); echo $k."ss"; // may output e.g,: sandie
// Or, an option that also works before PHP 5.3
echo php_uname('n'); 
?>

<?php 
$kk = '$kn';
echo "$kk";

?>-->

<?php

echo number_format("1000000")."<br>";
$string = 123456;
  $token = strtok($string, "");
 
while ($token != false)
    {
    echo "$token<br>";
    $token = strtok(" ");
    }
    
   
   $x = 1234;
   /* $l = strrev($x);
    $kk = str_split($l);
 	$k .=$kk[0].$kk[1].$kk[2].",".$kk[3].$kk[4].",".$kk[5].$kk[6];//6
   	$k .=$kk[0].$kk[1].$kk[2].",".$kk[3].$kk[4].",".$kk[5].$kk[6].",".$kk[7];//7
   	$k = strrev($k);
    return $k;*/
    
    $formattedNumber = sprintf('%06d', $x);
    echo "<br/>".$formattedNumber;
?>
<form method="get" action="">

<div style="height:100px;overflow:auto;width:auto;border:1px solid black;border-left:4px solid black;">
<input type="checkbox" value="IT Jobs" name="category[]"/>IT Jobs<br/>
<input type="checkbox" value="Tele Calling / BPO Jobs" name="category[]"/>Tele Calling / BPO Jobs<br/>
<input type="checkbox" value="Engineering Jobs" name="category[]"/>Engineering Jobs<br/>
<input type="checkbox" value="Marketing Jobs" name="category[]"/>Marketing Jobs<br/>
<input type="checkbox" checked value="Sales Jobs" name="category[]"/>Sales Jobs<br/>
<input type="checkbox" value="Office, Admin / HR Jobs" name="category[]"/>Office, Admin / HR Jobs<br/>
<input type="checkbox" value="Finance / Accounting Jobs" name="category[]"/>Finance / Accounting Jobs<br/>
<input type="checkbox" value="Medical / Health Care" name="category[]"/>Medical / Health Care<br/>
<input type="checkbox" value="Education / Teaching" name="category[]"/>Education / Teaching<br/>
<input type="checkbox" value="Apprentice / Internship" name="category[]"/>Apprentice / Internship<br/>
<input type="checkbox" value="Other Jobs " name="category[]"/>Other Jobs <br/></div>


<input name="customer1" type="text" />
<input name="customer2" type="text" />
<input name="customer3" type="text" />
<input name="customer4" type="text" />

<input type="submit" name="multiCheck" value="Done"/>
</form>
<?php if ($_GET['multiCheck']=='Done'){
	$cat ="";
	//print_r($_GET['category']);
	foreach ($_GET['category'] as $value)
	{
		$cat .= $value."|"; 
	}
	
	//echo $cat;
	//$sat = explode("|", $cat);
	
	

function returnAsArray($cat)
{
	$sat = explode("|", $cat);
	return $sat;
}

//print_r(returnAsArray($cat));
$arr = returnAsArray($cat);
echo $arr[0];

}
echo "||||||||||||||||||||".$_SERVER['QUERY_STRING'];
?>


