<?php	
// function to show database posts on index.php
	function writePost()
			{
            	include("driftadmin/jscripts/conn.php");
				$strQuery = mysql_query("SELECT n.rubrik, n.nyhet, n.datum, s.image, n.sID FROM nyheter n INNER JOIN status s ON s.sid = n.sid ORDER by datum DESC LIMIT 5") or exit(mysql_error());
				while ($r = mysql_fetch_array($strQuery))
				{
				echo "<table><tr>";
				echo '<td><img src=" images/'.$r['sID'].'.png "></td>';
				echo '<td><p>'.$r['datum'].'</p><h3>'.$r['rubrik'].'</h3><p>'.$r['nyhet'].'</p></td>';
				echo "</tr></table>";
				echo "<p><br /></p>";
				}
			}
?>
<?php	// showing htmlcode on index.php either comp. or mobile.
	function htmlstart()
		{
			include("pref.php");
			echo "<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
	<meta name='keywords' content='blog, blogg, dan paulsson, php, malmö'>
	<meta name='description' content='Inlämningsuppgift Blogg - PHP-utvecklare Malmö'>
	<link href='css/frontface.css' rel='stylesheet' type='text/css'>
	<title>$title</title>							
	</head>
<body>"; }

function htmlstartmobil()
		{
			include("pref.php");
			echo "<!DOCTYPE html>
<html>
	<head>
	<meta content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' name='viewport' />
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
	<meta name='keywords' content='blog, blogg, dan paulsson, php, malmö'>
	<meta name='description' content='Inlämningsuppgift Blogg - PHP-utvecklare Malmö'>
	<link href='../css/mobile.css' rel='stylesheet' type='text/css'>
	<title>$title</title>							
	</head>
<body>"; }

?>
<?php function htmlend() { echo "</body></html>"; } ?>

<?php
	function tinyMCE() {
		echo '
		<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript">
			tinyMCE.init({
				theme : "simple",
				mode : "textareas"
			});
		</script>';
	}
?>