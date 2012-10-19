<?php 
session_start();
if (!isset($_SESSION['sess_user'])){ 
  header("Location: index.php"); 
  exit; 
}
include ('jscripts/conn.php');
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Ändra status - Administration Driftinfo</title>
		<link rel="stylesheet" href="../css/admin.css" type="text/css">
	</head>
	<body>
		<h2>Ändra status</h2>
		<?PHP						// Change status on post
			require_once "jscripts/conn.php";
			$strQuery = mysql_query("SELECT nyhetid, rubrik, sid FROM nyheter WHERE nyhetid = '" . $_POST['status'] . "'") or exit(mysql_error());
			while ($r = mysql_fetch_array($strQuery)) {
				echo '<form name="redigera_status" method="post" action="">
			<p>Rubrik: ' . $r['rubrik'] . '</p>
			<p>Vald status:  <strong>' . $r['sid'] . '</strong></p>
			<input type="hidden" name="sid" value="' . $_POST['submit'] . '">
			<p><input class="knapp" type="submit" name="solved" value="Ändra till SOLVED"></p>';
			}
			
			?>
	</body>
</html>
<?php
if(isset($_POST['sid'])) {
	include "jscripts/conn.php";
	$strQuery = mysql_query("UPDATE nyheter 
		SET sid = '" . $_POST['sid'] ."' 
		WHERE nyhetid = ".$_POST['radera']."") 
	or exit(mysql_error());
}

?>