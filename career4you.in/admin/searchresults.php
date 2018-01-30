<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/
xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search</title>
<script type="text/javascript" src="validation.js"></script>
<style>
#google td {
	border:1px solid white;
	
}
</style>
</head>
<body>
<?php
include_once '../include/config.php';
$key   = $_GET['txt'];//keyword
$value = $_GET['val'];//values
//type herer the codes now
if($value == 1)
{//employer name search/part search.

	$sql = "SELECT * FROM employer WHERE name LIKE '%$key%'";
	$rst = mysql_query($sql);
	if($rst)
	{?>
		<table style="text-align: center;"><tr><td>Search Results</td>
		<td align="right"><a href="" onclick='javascript:document.getElementById("google").style.visibility="hidden"' style="color:red;">Close</a></td></tr>
		<?php
		if(mysql_num_rows($rst)>0)
		{ 
			while($row = mysql_fetch_array($rst))
			{
						echo '<tr><td colspan="2"><a target="_blank" href="adminEdit.php?msg=employ&num='.$row["id"].'"> '.$row["name"].'---'.$row["district"].'</a></td></tr>';
			}
		}
		else
		{
			echo '<tr><td colspan="2">No Results Found.</td></tr>';
		}
	}
	else {
	echo '<tr><td colspan="2">Please Check the Words.</td></tr>';
	}?></table><?php 
}
if($value == 2)
{//requirement name search /part search
$sql = "SELECT requirement.id AS id,requirement.designation AS designation,employer.district AS district FROM requirement INNER JOIN employer ON employer.id=requirement.empid WHERE requirement.designation LIKE '%$key%'";
	$rst = mysql_query($sql);
	if($rst)
	{?>
		<table style="border:1px solid white;text-align: center"><tr><td>Search Results</td><td align="right"><a href="" onclick='javascript:document.getElementById("google").style.visibility="hidden"' style="color:red;">Close</a></td></tr>
		<?php 
		if(mysql_num_rows($rst)>0)
		{
			while($row = mysql_fetch_array($rst))
			{
						echo '<tr><td colspan="2"><a target="_blank" href="adminEdit.php?msg=jobs&num='.$row["id"].'"> '.$row["designation"].'---'.$row["district"].'</a></td></tr>';
			}
		}
		else
		{
		echo '<tr><td colspan="2">No Results Found.</td></tr>';
		}
	}
	else {
	echo '<tr><td colspan="2">Please Check the Words.</td></tr>';
	}?></table><?php 
}
if($value == 3)
{

	$sql = "SELECT * FROM register WHERE name LIKE '%$key%'";
	$rst = mysql_query($sql);
	if($rst)
	{?>
		<table style="border:1px solid white;text-align: center"><tr><td>Search Results</td><td align="right"><a href="" onclick='javascript:document.getElementById("google").style.visibility="hidden"' style="color:red;">Close</a></td></tr>
		<?php
		if(mysql_num_rows($rst)>0)
		{ 
			while($row = mysql_fetch_array($rst))
			{
				echo '<tr><td colspan="2"><a target="_blank" href="adminEdit.php?msg=candi&num='.$row["id"].'"> '.$row["name"].'---'.$row["district"].'</a></td></tr>';
			}
		}
		else
		{
		echo '<tr><td colspan="2">No Results Found.</td></tr>';
		}
	}
	else {
	echo '<tr><td colspan="2">Please Check the Words.</td></tr>';
	}?></table><?php 
}
if($value == 4)
{
	if(is_numeric($key))
	{
$sql = "SELECT * FROM employer WHERE id='$key'";
	$rst = mysql_query($sql);
	if($rst)
	{?>
		<table style="border:1px solid white;text-align: center"><tr><td>Search Results</td><td align="right"><a href="" onclick='javascript:document.getElementById("google").style.visibility="hidden"' style="color:red;">Close</a></td></tr>
		<?php 
		if(mysql_num_rows($rst)>0)
		{
			while($row = mysql_fetch_array($rst))
			{
				echo '<tr><td colspan="2"><a target="_blank" href="adminEdit.php?msg=employ&num='.$row["id"].'"> '.$row["name"].'---'.$row["district"].'</a></td></tr>';
			}
		}
		else
		{
			echo '<tr><td colspan="2">No Results Found.</td></tr>';
		}
	}
	else {
	echo '<tr><td colspan="2">Please Check the Words.</td></tr>';
	}
	}?></table><?php 
}
if($value == 5)
{
if(is_numeric($key))
	{
$sql = "SELECT * FROM requirement WHERE id=".$key;
	$rst = mysql_query($sql);
	if($rst)
	{?>
		<table style="border:1px solid white;text-align: center"><tr><td>Search Results</td><td align="right"><a href="" onclick='javascript:document.getElementById("google").style.visibility="hidden"' style="color:red;">Close</a></td></tr>
		<?php 
		if(mysql_num_rows($rst)>0)
		{
			while($row = mysql_fetch_array($rst))
			{
				echo '<tr><td colspan="2"><a target="_blank" href="adminEdit.php?msg=jobs&num='.$row["id"].'">'.$row["designation"].'</a></td></tr>';
			}
		}
		else
		{
			echo '<tr><td colspan="2">No Results Found.</td></tr>';
		}
	}
	else {
	echo '<tr><td colspan="2">Please Check the Words.</td></tr>';
	}
	}?></table><?php 
}
if($value == 6)
{
if(is_numeric($key))
	{
$sql = "SELECT * FROM register WHERE id='$key'";
	$rst = mysql_query($sql);
	if($rst)
	{?>
		<table style="border:1px solid white;text-align: center"><tr><td>Search Results</td><td align="right"><a href="" onclick='javascript:document.getElementById("google").style.visibility="hidden"' style="color:red;">Close</a></td></tr>
		<?php 
		if(mysql_num_rows($rst)>0)
		{
			while($row = mysql_fetch_array($rst))
			{
				echo '<tr><td colspan="2"><a target="_blank" href="adminEdit.php?msg=candi&num='.$row["id"].'"> '.$row["name"].'---'.$row["district"].'</a></td></tr>';
			}
		}
		else
		{
		echo '<tr><td colspan="2">No Results Found.</td></tr>';
		}
	}
	else {
	echo '<tr><td colspan="2">Please Check the Words.</td></tr>';
	}
	}?></table><?php 
}
if($value == 7)
{//place,category,skill-rqrmnt

$rspnse = array();
$rspkey = array(); 
$rslt   = array(); 
$sql = "SELECT employer.district AS place,requirement.category AS category,requirement.requirement AS requirement,requirement.designation AS designation,requirement.id AS id FROM requirement INNER JOIN employer ON requirement.empid=employer.id";
$rst = mysql_query($sql);
if($rst)
	{?>
		<table style="border:1px solid white;text-align: center"><tr><td>Search Results</td><td align="right"><a href="" onclick='javascript:document.getElementById("google").style.visibility="hidden"' style="color:red;">Close</a></td></tr>
		<?php
		if(mysql_num_rows($rst)>0)
		{ 	while($row = mysql_fetch_array($rst))
			{
	$response = $row['place']." ".$row['category']." ".$row['requirement']." ".$row['designation'];		
	if(strpos($response,",")){$response = str_replace(","," ",$response);}
	$response = str_replace(" ",",",$response);
	if(strpos($key,",")){$key = str_replace(","," ",$key);}
	$key  	  = str_replace(" ",",",$key);
	$rspnse   = explode(",",$response);
	$rspkey   = explode(",",$key);
	$rspnse   = array_filter($rspnse);
	$rspkey	  = array_filter($rspkey);
	$rspnse   = array_values($rspnse);
	$rspkey   = array_values($rspkey);
	$rspnse   = array_map('strtolower',$rspnse);
	$rspkey   = array_map('strtolower',$rspkey);
	$rslt = array_intersect($rspnse,$rspkey);
	array_filter($rslt);
	array_values($rslt);
	if(count($rslt)>0)
	{//id location success full
		echo '<tr><td colspan="2"><a  href="adminEdit.php?msg=jobs&num='.$row["id"].'" target="_blank"> Job @ '.$row["place"].'</a></td></tr>';
		
	}
	
			}
		
			
		}else
		{
		echo '<tr><td colspan="2">No Results Found.</td></tr>';
		}
	}
	else {
	echo '<tr><td colspan="2">Please Check the Words.</td></tr>';
	}
	
	?></table><?php 
}
if($value == 8)
{//place,category,type--emplyr
	
$rspnse = array();
$rspkey = array(); 
$rslt   = array(); 
$sql = "SELECT * FROM employer";
$rst = mysql_query($sql);
if($rst)
	{?>
		<table style="border:1px solid white;text-align: center"><tr><td>Search Results</td><td align="right"><a href="" onclick='javascript:document.getElementById("google").style.visibility="hidden"' style="color:red;">Close</a></td></tr>
		<?php
		if(mysql_num_rows($rst)>0)
		{
			while($row = mysql_fetch_array($rst))
			{
	$response = $row['district']." ".$row['address'];		
	if(strpos($response,",")){$response = str_replace(","," ",$response);}
	$response = str_replace(" ",",",$response);
	if(strpos($key,",")){$key = str_replace(","," ",$key);}
	$key  	  = str_replace(" ",",",$key);
	$rspnse   = explode(",",$response);
	$rspkey   = explode(",",$key);
	$rspnse   = array_filter($rspnse);
	$rspkey	  = array_filter($rspkey);
	$rspnse   = array_values($rspnse);
	$rspkey   = array_values($rspkey);
	$rspnse   = array_map('strtolower',$rspnse);
	$rspkey   = array_map('strtolower',$rspkey);
	$rslt = array_intersect($rspnse,$rspkey);
	array_filter($rslt);
	array_values($rslt);
	if(count($rslt)>0)
	{//id location success full
		echo '<tr><td colspan="2"><a target="_blank" href="adminEdit.php?msg=employ&num='.$row["id"].'"> '.$row["name"].' @ '.$row["district"].'</a></td></tr>';
	}
	
			}
			/*print_r($rspkey);
			print_r($rspnse);
			print_r($rslt);*/
		}
	else
		{
			echo '<tr><td colspan="2">No Results Found.</td></tr>';
		}
	}
	else {
		echo '<tr><td colspan="2">Please Check the Words.</td></tr>';
	}
?></table><?php 
}
if($value == 9)
{//edctn,grdtn--cndidte
		
$rspnse = array();
$rspkey = array(); 
$rslt   = array(); 
$sql = "SELECT register.id AS id,employment.designation AS designation,employment.yourself AS yourself,education.course AS course,technical.summary AS summary,register.preaddress AS address,register.name AS name FROM register INNER JOIN education ON register.id=education.regid INNER JOIN technical ON register.id=technical.regid INNER JOIN employment ON register.id=employment.regid";
$rst = mysql_query($sql);
if($rst)
	{?>
		<table style="border:1px solid white;text-align: center"><tr><td>Search Results</td><td align="right"><a href="" onclick='javascript:document.getElementById("google").style.visibility="hidden"' style="color:red;">Close</a></td></tr>
		<?php
		if(mysql_num_rows($rst)>0)
		{
			while($row = mysql_fetch_array($rst))
			{
	$cor = explode("|",$row['course']);
	$cor = array_filter($cor);
	$cor = array_values($cor);
	$cor = implode(",",$cor);
	$response = $row['designation']." ".$row['yourself']." ".$row['summary']." ".$row['address']." ".$row['name']." ".$cor;		
	if(strpos($response,",")){$response = str_replace(","," ",$response);}
	$response = str_replace(" ",",",$response);
	if(strpos($key,",")){$key = str_replace(","," ",$key);}
	$key  	  = str_replace(" ",",",$key);
	$rspnse   = explode(",",$response);
	$rspkey   = explode(",",$key);
	$rspnse   = array_filter($rspnse);
	$rspkey	  = array_filter($rspkey);
	$rspnse   = array_values($rspnse);
	$rspkey   = array_values($rspkey);
	$rspnse   = array_map('strtolower',$rspnse);
	$rspkey   = array_map('strtolower',$rspkey);
	$rslt     = array_intersect($rspnse,$rspkey);
	array_filter($rslt);
	array_values($rslt);
	if(count($rslt)>0)
	{//id location success full
		echo '<tr><td colspan="2"><a target="_blank" href="adminEdit.php?msg=candi&num='.$row["id"].'"> '.$row['name'].' --- '.substr($row["summary"],0,25).'</a></td></tr>';
	}
	
			}
		}
	else
		{
			echo '<tr><td colspan="2">No Results Found.</td></tr>';
		}
	}
	else {
		echo '<tr><td colspan="2">Please Check the Words.</td></tr>';
	}
?></table><?php 
}

?>
</body>
</html>