<?php
include_once 'functions.php';
switch ($_GET ['call']) {
		case 'states' 	: echo listState();
		break;
		case 'login' 	: echo loginNow($_GET['user'],$_GET['pass']);
		break;
		case 'status' 	: echo updateStatusMSG($_GET['msg']);
		break;
		case 'recent'	: echo recentUpdateNOW();
		break;
}