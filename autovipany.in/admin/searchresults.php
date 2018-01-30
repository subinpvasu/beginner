<?php 
include_once '../include/functions.php';
$end = 15;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/
xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search</title>
<script></script>
<style type="text/css">
.button {
	background-color: #479D34;
	padding-left: 6px;
	padding-right: 6px;
	padding-top: 3px;
	text-transform:uppercase;
	padding-bottom: 3px;
	color: #ffffff;
	border: 1px solid #479D34;
	background-image: url(images/button_bg.jpg);
}

.button:hover {
	text-transform:uppercase;
	background-color: #000000;
	border: 1px solid #000000;
	background-image: url(images/button_bg_over.jpg);
}

</style>
</head>
<body>
<?php 
switch ($_GET['msg'])
{
	case 'proid' : return displayPageVehicle($_GET['value']);break;
	case 'price' : return searchForPrice($_GET['value'],$_GET['begin'],$_GET['page']); break;
	case 'years' : return searchForYears($_GET['value'],$_GET['begin'],$_GET['page']); break;
	case 1		 : return searchForType(1,$_GET['value'],$_GET['begin'],$_GET['page']);break;
	case 2 		 : return searchForType(2,$_GET['value'],$_GET['begin'],$_GET['page']);break;
	case 3		 : return searchForType(3,$_GET['value'],$_GET['begin'],$_GET['page']);break;
	case 4		 : return searchForType(4,$_GET['value'],$_GET['begin'],$_GET['page']);break;
	case 5		 : return searchForType(5,$_GET['value'],$_GET['begin'],$_GET['page']);break;
	case 6		 : return searchForType(6,$_GET['value'],$_GET['begin'],$_GET['page']);break;
}

function searchForPrice($num,$begin,$page)
{
	global $end;
	$sql = "SELECT id FROM vehicle WHERE price<=".$num;
	$rest = mysql_query($sql);
    $cnt  = mysql_num_rows($rest);
    $tot  = ceil($cnt/$end);
    $sql .= " LIMIT $begin,$end";
    $result = mysql_query($sql);
	
	if (mysql_num_rows($result)>0)
	{
		while ($row = mysql_fetch_array($result))
		{
			 displayPageVehicle($row[0]);
		}
	}
	?>
<span style="float:left;width:23%;text-align:left;height:1px;"><?php if ($page>1){?>
<button class="button" onclick="window.opener.searchFromAdmin(<?php echo ($page-1)*$end  ?>,<?php echo $page-1;?>);self.close();">Back</button><?php }?></span>
<span style="float:left;width:53%;text-align:center;color:red;">Page <?php echo $page;?><br/>Total <?php echo $cnt; ?> Result(s) in <?php echo $tot; ?> Page(s).</span>
<span style="float:right;width:23%;text-align:right;height:1px;"><?php if ($tot>$page){?><button class="button" onclick="window.opener.searchFromAdmin(<?php echo $page*$end?>,<?php echo $page+1;?>);self.close();">Next</button><?php }?></span>
<?php 
}
function searchForType($tp,$bd,$begin,$page)
{
	global $end;
	$sql = "SELECT id FROM vehicle WHERE type=".$tp;
	if($bd!=0){$sql .= " AND brand=".$bd;}
	$rest = mysql_query($sql);
    $cnt  = mysql_num_rows($rest);
    $tot  = ceil($cnt/$end);
    $sql .= " LIMIT $begin,$end";
	$result = mysql_query($sql);
	if (mysql_num_rows($result)>0)
	{
		while ($row = mysql_fetch_array($result))
		{
			 displayPageVehicle($row[0]);
		}
	}
	?>
<span style="float:left;width:23%;text-align:left;height:1px;"><?php if ($page>1){?>
<button class="button" onclick="window.opener.searchFromAdmin(<?php echo ($page-1)*$end  ?>,<?php echo $page-1;?>);self.close();">Back</button><?php }?></span>
<span style="float:left;width:53%;text-align:center;color:red;">Page <?php echo $page;?><br/>Total <?php echo $cnt; ?> Result(s) in <?php echo $tot; ?> Page(s).</span>
<span style="float:right;width:23%;text-align:right;height:1px;"><?php if ($tot>$page){?><button class="button" onclick="window.opener.searchFromAdmin(<?php echo $page*$end?>,<?php echo $page+1;?>);self.close();">Next</button><?php }?></span>
<?php 
}
function searchForYears($num,$begin,$page)
{	global $year,$end;
	$key = array_search($num, $year);
	$sql = "SELECT id FROM vehicle WHERE years=".$key;
	$rest = mysql_query($sql);
    $cnt  = mysql_num_rows($rest);
    $tot  = ceil($cnt/$end);
    $sql .= " LIMIT $begin,$end";
	$result = mysql_query($sql);
	if (mysql_num_rows($result)>0)
	{
		while ($row = mysql_fetch_array($result))
		{
			 displayPageVehicle($row[0]);
		}
	}
	?>
<span style="float:left;width:23%;text-align:left;height:1px;"><?php if ($page>1){?>
<button class="button" onclick="window.opener.searchFromAdmin(<?php echo ($page-1)*$end  ?>,<?php echo $page-1;?>);self.close();">Back</button><?php }?></span>
<span style="float:left;width:53%;text-align:center;color:red;">Page <?php echo $page;?><br/>Total <?php echo $cnt; ?> Result(s) in <?php echo $tot; ?> Page(s).</span>
<span style="float:right;width:23%;text-align:right;height:1px;"><?php if ($tot>$page){?><button class="button" onclick="window.opener.searchFromAdmin(<?php echo $page*$end?>,<?php echo $page+1;?>);self.close();">Next</button><?php }?></span>
<?php 
}
function displayPageVehicle($num)
{
	echo  '<a target="_blank" href="adminEdit.php?first='.$num.'" style="padding:10px;">PROFILE #'.$num.'</a><br/>';
}
?>
</body>
</html>