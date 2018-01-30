<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Select Image</title>
</head>
<?php

$check = 'false';
if (isset ( $_FILES ['ufile'] )) {
	$auth = $_POST ['auth'];
	$allowedExts = array ("jpg", "jpeg", "gif", "png" );
	$extension = end ( explode ( ".", $_FILES ["ufile"] ["name"] ) );
	if ((($_FILES ["ufile"] ["type"] == "image/gif") || ($_FILES ["ufile"] ["type"] == "image/jpeg") || ($_FILES ["ufile"] ["type"] == "image/png") || ($_FILES ["ufile"] ["type"] == "image/pjpeg")) && ($_FILES ["ufile"] ["size"] < 500000) && in_array ( $extension, $allowedExts )) {
		if ($_FILES ["ufile"] ["error"] > 0) {
			echo "<font color=red>Error: " . $_FILES ["ufile"] ["error"] . "<br />Select a Valid Image!</font>";
		} else {
			
			$check = 'true';
		
		}
	} else {
		echo "<font color=red>Invalid file<br/>Select a Valid Image & Size less than 500 Kb.</font>";
	}
	
	if ($check == 'true') {
		
		$prefix = exec ( "hostname" );
		$random_digit = uniqid ( $prefix, true );
		
		$new_file_name = $random_digit . $_FILES ["ufile"] ["name"];
		
		$path = "../upload/" . $new_file_name;
		if ($ufile != none) {
			if (copy ( $_FILES ['ufile'] ['tmp_name'], $path )) {
				echo 'Successfully  Selected Your Property Image.
<BR/>
<script language="JavaScript" type="text/javascript">

		connectParent();
		var count =4;
		countDown(); 
		var da="";
		
function connectParent()
{
var str = "' . $new_file_name . '";
var sbn = "' . $auth . '";
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
xmlhttp.open("GET","loadimage.php?msg=true&data="+str+"&auth="+sbn,true);
xmlhttp.send();

}
function showDetail()
{
this.window.opener.document.getElementById("disphoto").innerHTML=da;

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
			
			} else {
				echo "Error";
			}
		}
	}
}
if ($check != 'true') {
	?>
<body>
<form action="upimage.php" method="post" onsubmit=""
	enctype="multipart/form-data" name="form" id="form">
<table width="100%" border="0" align="center" cellpadding="0"
	cellspacing="1" bgcolor="#CCCCCC">
	<tr>

		<td>
		<table width="100%" border="0" cellpadding="3" cellspacing="1"
			bgcolor="#FFFFFF">
			<tr>
				<td><strong>Select Image </strong></td>
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

