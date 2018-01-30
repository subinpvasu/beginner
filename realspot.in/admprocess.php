<?php
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$k =  date('d-m-Y H:i:s');
echo $k;

?>