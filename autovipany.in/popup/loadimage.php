
<?php
if($_GET['msg'] == 'true')
{
$url  = $_GET['data'];
$auth = $_GET['auth']; 
if($url == "")
{
$url = "default.jpg";

}
if($auth == 'true')
{
echo '
<p style="position:absolute;visibility:hidden"id="text">Change Image  </p>  <img src="../upload/'.$url.'" alt="Change Image" onmouseover="showText()" onmouseout="hideText()" height="50" width="50"    onclick="javascript:void window.open(\'../popup/upimage.php?auth=true\',\'1348219726554\',\'width=500,height=200,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100\');return false;"  />
<input type="hidden" value="'.$url.'" name="photo" />
';

}
else
{
echo '
<p style="position:absolute;visibility:hidden"id="text">Change Image  </p>  <img src="./upload/'.$url.'" alt="Change Image" onmouseover="showText()" onmouseout="hideText()" height="50" width="50"    onclick="javascript:void window.open(\'./popup/upimage.php\',\'1348219726554\',\'width=500,height=200,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100\');return false;"  />
<input type="hidden" value="'.$url.'" name="photo" />
';

}
}

?>
