<?php 
session_start();
include 'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Select File</title></head>
<?php
$check = 'false';

if(isset($_FILES['resume']))
{/*
//PHP Version 5.2.17 not support
if ($_FILES['resume']['error'] !== UPLOAD_ERR_OK) {
die("Upload failed with error " . $_FILES['resume']['error']);
}
$finfo = finfo_open(FILEINFO_MIME);
$mime = finfo_file($finfo, $_FILES['resume']['tmp_name']);
$ok = false;
switch ($mime) {
	case 'text/plain':
	case 'application/msword':
    $check = 'true';
default:
die("Unknown/not permitted file type");
}
}*/
//$auth = $_POST['auth'];
$allowedExts = array("doc","docx","txt","pdf");
$extension = end(explode(".", $_FILES["resume"]["name"]));
if ((in_array($extension, $allowedExts)
	&&($_FILES["resume"]["type"] == "text/plain" || $_FILES['resume']['type'] == "application/msword" ||
$_FILES['resume']['type'] == "application/octet-stream" || 
$_FILES['resume']['type'] == "application/pdf") && ($_FILES["resume"]["size"] / 1024) < 200 ))
  {
  if ($_FILES["resume"]["error"] > 0)
    {
    echo "<font color=red>Error: " . $_FILES["resume"]["error"] . "<br />Select a Valid Document!</font>";
    }
  else
    {
   	$check = 'true';
	}
  }
else
  {
  echo "<font color=red>Select a Valid Document & Size less than 200 Kb.</font>";
  }
if($check == 'true')
{
$prefix = exec("hostname");
$random_digit = uniqid($prefix, true);
$new_file_name=$random_digit."-".$_SESSION['id']."-".$_FILES["resume"]["name"];
$path= "../upload/".$new_file_name;
if($resume != none)
{
if(copy($_FILES['resume']['tmp_name'], $path))
{
	if($_SESSION['account'] == 'true')
	{
	$sql = "UPDATE register SET resume='$new_file_name' WHERE id=".$_SESSION['id'];
	mysql_query($sql) or die(mysql_error());
echo 'Successfully  Uploaded Your Resume.
<b>

    <script language="JavaScript" type="text/javascript">  
    var count =3  
    var redirect="index.php"  
      
    function countDown(){  
     if (count <= 0){  
     window.opener.location.reload();
     // window.location = redirect;  
 self.close();
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




</b>



<!--

<BR/>
<script language="JavaScript" type="text/javascript">
		var count =4;
		countDown(); 
		function countDown(){ 
		var status = " '.$check.' "; 
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
	 </script>  -->
';
}
}
else
{
echo "Error";
}
}
}
}
if($check != 'true')
{
?>
<body>
<form action="upimage.php"  method="post" onsubmit="" enctype="multipart/form-data" name="form" id="form">
<table width="100%"  align="center" cellpadding="0" cellspacing="1" >
<tr>
<td>
<table width="100%"  cellpadding="3" cellspacing="1" >
<tr>
<td ><strong>Select Resume  </strong>  
</td><td id="test">
</td>
</tr>
<tr>
<td>
<input name="resume" type="file" id="resume" size="50"  /></td>
</tr>
<tr>
<td align="center"><input type="submit" name="submitted"  value="Upload" />
<input type="hidden" name="auth" value="<?php echo $_GET['auth'];  ?>"/></td>
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
/*
$file = fopen("C:/Users/DEVELOPER/Desktop/mailid.html","r");
$k = fgetcsv($file);
$m = 1;
$l = 1;
foreach( $k as $value)
{
	
	if(stristr("$value!","@"))
	{
		echo $value.",";
		
		if(($m%500) == 0)
		{
			echo "<br>**************************************<br>".$l;
			$l++;
		}
		$m++;
	}
	
	
	
}
fclose($file);
*/
?>