<?php
$mysql_server = "localhost"; 
$mysql_user = "root"; 
$mysql_password = ""; 
$mysql_database = "driftinfo"; 
$conn = mysql_connect($mysql_server, $mysql_user, $mysql_password); 
mysql_set_charset('utf8',$conn);
mysql_select_db($mysql_database, $conn);
?>