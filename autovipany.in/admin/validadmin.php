<?php 
include_once '../include/functions.php';
switch ($_GET['msg']){
	case 'previlege' : echo changePrevilegesNow($_GET['p'],$_GET['i'],$_GET['v']);
	break;
	
	
}

function changePrevilegesNow($prvlg,$rid,$rvl)
{
	switch ($prvlg){
		case 'guest' :
			if($rvl=='Y')
			{
				return updatePrevilegesNow('visibility','N',$rid);
			}
			else
			{
				return updatePrevilegesNow('visibility','Y',$rid);
			}
			break;
		case 'golden' :
			if($rvl=='Y')
			{
				return updatePrevilegesNow('golden','N',$rid);
			}
			else
			{
				return updatePrevilegesNow('golden','Y',$rid);
			}
			break;
		case 'premium' :
			if($rvl=='Y')
			{
				return updatePrevilegesNow('premium','N',$rid);
			}
			else
			{
				return updatePrevilegesNow('premium','Y',$rid);
			}
			break;
		case 'frontpage' :
			if($rvl=='Y')
			{
				return updatePrevilegesNow('frontpage','N',$rid);
			}
			else
			{
				return updatePrevilegesNow('frontpage','Y',$rid);
			}
			break;
	}
}
function updatePrevilegesNow($tuple,$val,$id)
{
	$sql = "UPDATE vehicle SET $tuple='$val' WHERE id=$id";
	mysql_query($sql);
	return $val;
}

?>