<?php 
include_once 'include/admin.php';
$image  = array();
$delete = array();
$i = 0 ;



$sql = "SELECT photos,photou,photob FROM other";
$result = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($result) > 0 ) 
{
while($row = mysql_fetch_array($result))
{
$image[$i] = $row['photos'];
$i++;
$image[$i] = $row['photou'];
$i++;
$image[$i] = $row['photob'];
$i++;

}
}

if ($handle = opendir('upload')) {
   
	
	$j = 0;

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
	$delete[$j] = $entry;
	$j++;
        
    }

    /* This is the WRONG way to loop over the directory. 
    while ($entry = readdir($handle)) {
        echo $entry."<br>";
    }*/

    closedir($handle);
}

$trash = array_diff($delete,$image);
$klm = 0;
foreach($trash as $value)
{
if($value != "." && $value != "..")
{
$file = "upload/".$value;

//if (!unlink($file))
  {
  echo ("Error deleting<br>");
  }
//else
  {
  $klm++;
  }
  }
}
echo $klm." Images Deleted/Removed";
?>