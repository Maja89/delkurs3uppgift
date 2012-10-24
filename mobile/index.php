<!-- WELCOME TO THE MOBILE SITE FOR SMARTPHONES -->
<?php
$page = $_SERVER['PHP_SELF'];	// Doing a update of the page to check for new messages
$sec = "10";
header("Refresh: $sec; url=$page");
?>
<?php
include('mobile-functions.php'); // Needed for some functions on the site.
include('../pref.php');	// preferenses for the site.
?>
<!DOCTYPE html>
<html>
	<head>
	<meta content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' name='viewport' />
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
	<meta name='keywords' content='blog, blogg, dan paulsson, php, malmö'>
	<meta name='description' content='Inlämningsuppgift Blogg - PHP-utvecklare Malmö'>
	<link href='../css/mobile.css' rel='stylesheet' type='text/css'>
	<title>Mobile SSRS</title>							
	</head>
<body>

<div id="wrapper">
	<div id="header"><h1><u><?php echo $mobiletitle; ?></u></h1></div>
	<div id="content"><p><?php writePost(); ?> <!-- Skriver ut alla inlägg --></p></div>
	<div id="footer"><p><?php echo $footer; ?></p></div> 
</div>
</body>
</html>