<?php
$mysql_server = "mysql04.citynetwork.se"; 
$mysql_user = "110023-mp52198"; 
$mysql_password = "iPhoNe%900"; 
$mysql_database = "110023-skolan"; 
$conn = mysql_connect($mysql_server, $mysql_user, $mysql_password); 
mysql_set_charset('utf8',$conn);
mysql_select_db($mysql_database, $conn);
?>