<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Select </title></head>
<?php /*
include_once '../include/config.php';
if(isset($_POST['submitteddf']))
{
	$name		= $_POST['name'];
	$comp		= $_POST['comname'];	
	$mobile		= $_POST['mobile'];
	$address	= $_POST['address'];
	$adname		= $_POST['adname'];
	$caption    = $_POST['caption'];
	//$new_file_name=$_FILES["ufile"]["name"];
	$prefix = exec("hostname");
	$random_digit = uniqid($prefix, true);
	$new_file_name=$random_digit.$_FILES["ufile"]["name"];

	
	$sql = "INSERT INTO flashads(company,payee,adname,address,mobile,adfile,caption)VALUES('$comp','$name','$adname','$address','$mobile','$new_file_name','$caption')";
	$result = mysql_query($sql) or die(mysql_error());
	if($result)
	{
	$path= "../flash/".$new_file_name;
	if($ufile != none)
	{
	if(copy($_FILES['ufile']['tmp_name'], $path))
	{
	echo '
	<script>
	this.window.close();
	</script>
	';
	}
	else
	{
	echo "Error";
	}
	}
	}
	
	
} 
if(isset($_POST['edit_submitted']))
{
	$name		= $_POST['name'];
	$comp		= $_POST['comname'];	
	$mobile		= $_POST['mobile'];
	$address	= $_POST['address'];
	$adname		= $_POST['adname'];
	$caption    = $_POST['caption'];
	$id 		= $_POST['fid'];
	//$new_file_name=$_FILES["ufile"]["name"];


	
	$sql = "UPDATE flashads SET company='$comp',payee = '$name',adname = '$adname',address = '$address',mobile = '$mobile',caption = '$caption' WHERE id='$id' ";
	$result = mysql_query($sql) or die(mysql_error());
	if($result)
	{
	
	echo '
	<script>
	this.window.close();
	</script>
	';
	}
	else
	{
	echo "Error";
	}
	}

	
	

*/?><!-- 
<body>
<table width="100%"  align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form action="flashadvert.php"  method="post" onsubmit="" enctype="multipart/form-data" name="form" id="form">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td>Name</td><td> <input type="text" name="name" size="30" maxlength="20"/></td>
</tr>
<tr>
<td>Company Name</td><td><input type="text" name="comname" size="30" maxlength="60"/></td>
</tr>
<tr>
<td>Mobile</td><td><input type="text" name="mobile" size="30" maxlength="20"/></td>
</tr>
<tr>
<td>Address</td><td><textarea name="address"></textarea></td>
</tr>
<tr>
<td>Advertisement Name</td><td><input type="text" name="adname" size="30" maxlength="40"/></td>
</tr>
<tr>
<td>Caption</td><td><textarea name="caption"></textarea></td>
</tr>
<tr>
<td >Select File 
</td>

<td>
<input name="ufile" type="file" id="ufile" size="30"  /></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submitted"  value="Upload" /></td>
</tr>
</table>
</td>
</form>
</tr>
</table> 
</body>
</html>-->