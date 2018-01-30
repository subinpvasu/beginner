<html><head>
<script type="text/javascript">
function nextPage()
{
	var pg  = "<?php if(empty($_GET['page'])){echo 2;}else{echo $_GET['page']+1;} ?>";
	var url = "<?php echo $_SERVER['PHP_SELF'];?>";
	var msg = "<?php echo $_GET['msg'];?>";
	
		
		window.location=url+"?msg="+msg+"&page="+pg;
	
	
}
</script>
</head>
<body>

<?php 
$k = $_GET['page'];
if(empty($k))
{
	$k=1;
}
echo $_SERVER['PHP_SELF']."<br>";
echo "?value=1&page=".$k."<br>";

echo"<br>////////////////////////////////////////////////////////////";

$p=11; 
$s = $p%10;
echo $s;
?>
<a href="<?php echo $_SERVER['PHP_SELF'].'?msg='.$k; ?>">reload</a>


<div align="center" style="width:100%;position:fixed;top:1px;" >
<input type="button" name="next" value="next" onclick="nextPage()" />
<div  id="restse" style="height:auto;width:150px;border:1px solid #ccc;overflow:auto;visibility:hidden;background-color:#FFF ">
</div>
</div>


</body></html>
