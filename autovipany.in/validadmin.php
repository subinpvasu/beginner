<?php
################################################
############
############ Select DB
############
################################################

////////////////////////////////////////////////////////////////////////
if($_GET['msg'] == 'property')
{
$a=array();
$r=$_GET["r"];
$q=$_GET["q"];
if($r == 3)//-------------------------------------------------------------------------------
{
$sql = "SELECT register.name AS name FROM property INNER JOIN register ON property.informed_id=register.Id WHERE property.info_type = 'online_user'";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0)
	{$i=0;
		while($row = mysql_fetch_array($result))
		{
		$a[$i] = $row['name'];
		$i++;
		}

	}


$a = array_unique($a);
sort($a);
 //$p = count($a);
if (strlen($q) > 0)
  {
	$hint="";
  for($i=0; $i<count($a); $i++)
    {

 if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
      {
      if ($hint=="")
        {$z=str_replace(" ","_",$a[$i]);
        $hint='<p onclick=selterm("'.$z.'")>'.$a[$i].'</p>';
        }
      else
        {// $hint=$hint." , ".$a[$i];
		$z=str_replace(" ","_",$a[$i]);
        $hint=$hint.'<p onclick=selterm("'.$z.'")>'.$a[$i].'</p>';
        }
      }
    }
  }


if ($hint == "")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }
//*/

echo $response;
//print_r($a);
//
}
if($r == 13)//-------------------------------------------------------------------------------
{
$sql = "SELECT register.name AS name FROM property INNER JOIN register ON property.informed_id=register.Id WHERE property.info_type = 'operator' ";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0)
	{$i=0;
		while($row = mysql_fetch_array($result))
		{
		$a[$i] = $row['name'];
		$i++;
		}

	}
	$a = array_unique($a);
sort($a);
 //$p = count($a);
if (strlen($q) > 0)
  {
	$hint="";
  for($i=0; $i<count($a); $i++)
    {

 if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
      {
      if ($hint=="")
        {$z=str_replace(" ","_",$a[$i]);
        $hint='<p onclick=selterm("'.$z.'")>'.$a[$i].'</p>';
        }
      else
        {// $hint=$hint." , ".$a[$i];
		$z=str_replace(" ","_",$a[$i]);
        $hint=$hint.'<p onclick=selterm("'.$z.'")>'.$a[$i].'</p>';
        }
      }
    }
  }


if ($hint == "")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }
//*/

echo $response;
//print_r($a);
//

}
//----------------------------------------------------------
if($r == 4)
{
$sql = "SELECT  place FROM property ";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0)
	{$j=0;
		while($row = mysql_fetch_array($result))
		{
		$a[$j] = $row['place'];
		$j++;
		}

	}

$a = array_unique($a);
sort($a);
 //$p = count($a);
if (strlen($q) > 0)
  {
	$hint="";
  for($i=0; $i<count($a); $i++)
    {

 if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
      {
      if ($hint=="")
        {$z=str_replace(" ","_",$a[$i]);
        $hint='<p onclick=selterm("'.$z.'")>'.$a[$i].'</p>';
        }
      else
        {// $hint=$hint." , ".$a[$i];
		$z=str_replace(" ","_",$a[$i]);
        $hint=$hint.'<p onclick=selterm("'.$z.'")>'.$a[$i].'</p>';
        }
      }
    }
  }


if ($hint == "")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }
//*/

echo $response;
//print_r($a);
//

}
if($r == 6)//-------------------------------------------------------------------
  {
	$sql = "SELECT  name FROM register ";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0)
	{$j=0;
		while($row = mysql_fetch_array($result))
		{
		$a[$j] = $row['name'];
		$j++;
		}

	}

$a = array_unique($a);
sort($a);
 //$p = count($a);
if (strlen($q) > 0)
  {
	$hint="";
  for($i=0; $i<count($a); $i++)
    {

 if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
      {
      if ($hint=="")
        {
			$z=str_replace(" ","_",$a[$i]);
        $hint='<p onclick=selterm("'.$z.'")>'.$a[$i].'</p>';
        }
      else
        {// $hint=$hint." , ".$a[$i];
		$z=str_replace(" ","_",$a[$i]);
        $hint=$hint.'<p onclick=selterm("'.$z.'")>'.$a[$i].'</p>';
        }
      }
    }
  }


if ($hint == "")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }
//*/

echo $response;
//print_r($a);
//




  }

  if($r == 12)//-------------------------------------------------------------------
  {
	$sql = "SELECT  customer FROM payment ";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0)
	{$j=0;
		while($row = mysql_fetch_array($result))
		{
		$a[$j] = $row['customer'];
		$j++;
		}

	}

$a = array_unique($a);
sort($a);
 //$p = count($a);
if (strlen($q) > 0)
  {
	$hint="";
  for($i=0; $i<count($a); $i++)
    {

 if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
      {
      if ($hint=="")
        {
		$z=str_replace(" ","_",$a[$i]);
        $hint='<p onclick=selterm("'.$z.'")>'.$a[$i].'</p>';
        }
      else
        {// $hint=$hint." , ".$a[$i];
		$z=str_replace(" ","_",$a[$i]);
        $hint=$hint.'<p onclick=selterm("'.$z.'")>'.$a[$i].'</p>';
        }
      }
    }
  }


if ($hint == "")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }
//*/

echo $response;
//print_r($a);
//




  }

}

if($_GET['msg'] == 'publish')
{
	$id  = $_GET['q'];
	$pby = 'Y';
	$pbn = 'N';
	$sql = "SELECT publish FROM property WHERE id='$id'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0)
	{
		while($row = mysql_fetch_array($result))
		{
		$pub = $row['publish'];
		}
		if($pub == 'Y')
		{
			mysql_query("UPDATE property SET publish='$pbn' WHERE id='$id'"	);
			echo "Y";
		}
		if($pub == 'N')
		{
			mysql_query("UPDATE property SET publish='$pby' WHERE id='$id'"	);
			echo"Y";
		}
	}


}
if($_GET['msg'] == 'sales')
{
	$id = $_GET['q'];
	$pby = 'for sale';
	$pbn = 'sold';
	$sql = "SELECT sale_status FROM property WHERE id='$id'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0)
	{
		while($row = mysql_fetch_array($result))
		{
		$pub = $row['sale_status'];
		}
		if($pub == 'for sale')
		{
			mysql_query("UPDATE property SET sale_status='$pbn' WHERE id='$id'"	);
			mysql_query("UPDATE property SET publish='N' WHERE id='$id'"	);
			echo "Y";
		}
		if($pub == 'sold')
		{
			mysql_query("UPDATE property SET sale_status='$pby' WHERE id='$id'"	);
			mysql_query("UPDATE property SET publish='Y' WHERE id='$id'"	);
			echo"Y";
		}
	}

}
if($_GET['msg'] == 'status')
{
	$id = $_GET['q'];
	$pby = 'unpaid';
	$pbn = 'paid';
	$sql = "SELECT status FROM property WHERE id='$id'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0)
	{
		while($row = mysql_fetch_array($result))
		{
		$pub = $row['status'];
		}
		if($pub == 'unpaid')
		{
			mysql_query("UPDATE property SET status='$pbn' WHERE id='$id'"	);
			echo "Y";
		}
		if($pub == 'paid')
		{
			mysql_query("UPDATE property SET status='$pby' WHERE id='$id'"	);
			echo"Y";
		}
	}

}

if($_GET['msg'] == 'order')
{
	$id  = $_GET['q'];
	$mat = $_GET['r'];



			mysql_query("UPDATE payment SET admin_status='$mat' WHERE id='$id'"	);
			echo "Y";



}
if($_GET['msg'] == 'delete')
{
	$id  = $_GET['q'];




			mysql_query("DELETE FROM operator WHERE id='$id'");
			echo "Y";



}
if($_GET['msg'] == 'adpublish')
{
	$id  = $_GET['q'];
	$pby = 'Y';
	$pbn = 'N';
	$sql = "SELECT publish FROM flashads WHERE id='$id'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0)
	{
		while($row = mysql_fetch_array($result))
		{
		$pub = $row['publish'];
		}
		if($pub == 'Y')
		{
			mysql_query("UPDATE flashads SET publish='$pbn' WHERE id='$id'"	);
			echo "Y";
		}
		if($pub == 'N')
		{
			mysql_query("UPDATE flashads SET publish='$pby' WHERE id='$id'"	);
			echo"Y";
		}
	}


}
if($_GET['msg'] == 'adpremier')
{
	$id  = $_GET['q'];
	$pby = 'Y';
	$pbn = 'N';
	$sql = "SELECT premier FROM flashads WHERE id='$id'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0)
	{
		$timezone = "Asia/Calcutta";
        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
        $k =  date('d-m-Y H:i:s');

		while($row = mysql_fetch_array($result))
		{
		$pub = $row['premier'];
		}
		if($pub == 'Y')
		{
			mysql_query("UPDATE flashads SET premier='$pbn',last_change='$k' WHERE id='$id'");
			echo "Y";
		}
		if($pub == 'N')
		{
			mysql_query("UPDATE flashads SET publish='$pby',last_change='$k' WHERE id='$id'");
			echo"Y";
		}
	}


}

?>