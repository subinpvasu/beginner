<?php 
		include_once 'include/signin.php';
		?></td>
switch ($_SERVER ['QUERY_STRING']) {
	case 'register' :
		include_once 'include/register.php';
		break;
	case 'signoff' : 
	default :
		echo "<!-- very good -->";
		break;
}
?>