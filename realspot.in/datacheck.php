<?php 

$image  = array();
$delete = array();
$i = 0 ;

$con = mysql_connect("localhost","wwwreals_realtes","test@123");


if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);


$sql = "SELECT image FROM property";
$result = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($result) > 0 ) 
{
while($row = mysql_fetch_array($result))
{
$image[$i] = $row['image'];
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