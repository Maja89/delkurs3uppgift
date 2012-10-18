<!-- WELCOME TO THE MOBILE SITE FOR SMARTPHONES -->
<?php
$page = $_SERVER['PHP_SELF'];	// Doing a update of the page to check for new messages
$sec = "10";
header("Refresh: $sec; url=$page");
?>
<?php
include('user_agent.php'); // Redirecting mobile to a more userfriendly site.
include('functions.php'); // Needed for some functions on the site.
include('pref.php');	// preferenses for the site.
?>
<?php htmlstartmobil(); ?>

<div id="wrapper">
	<div id="header"><h1><?php echo $title; ?></h1></div>
	<div id="content"><p><?php writePost(); ?> <!-- Skriver ut alla inlägg --></p></div>
	<div id="footer"><p><?php echo $footer; ?></p></div> 
</div>

<?php htmlend(); ?>