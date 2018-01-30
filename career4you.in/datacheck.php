<?php 
include_once 'include/config.php';
$image  = array();
$delete = array();
$i = 0 ;



$sql = "SELECT resume FROM register";
$result = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($result) > 0 ) 
{
while($row = mysql_fetch_array($result))
{
$image[$i] = $row['resume'];
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

foreach($trash as $value)
{
if($value != "." && $value != "..")
{
$file = "upload/".$value;

if (!unlink($file))
  {
  echo ("Error deleting<br>");
  }
else
  {
  echo ("Deleted<br>");
  }
  }
}
?>