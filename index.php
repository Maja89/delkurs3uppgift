<?php
$page = $_SERVER['PHP_SELF'];	// Doing a update of the page to check for new messages
$sec = "30";
header("Refresh: $sec; url=$page");
?>
<?php
include('user_agent.php'); // Redirecting mobile to a more userfriendly site.
include('functions.php'); // Needed for some functions on the site.
include('pref.php');	// preferenses for the site.
?>
<?php htmlstart(); ?>
<div id="wrapper">
	<div id="menu"><ul>
    	<li><a href="index.php">Home</a></li>
		<li><a href="about.php">About project</a></li>
        <li><a href="driftadmin/">Admin</a></li>
        <li><a href="createpdf.php">Create a pdf</a></li>
    </ul></div>
	<div id="header">
    	<div id="logo">
    		<h1><?php echo $title; ?></h1>
        </div>
    </div>
	<div id="page">
    	<div class="post">
    		<p><?php writePost(); ?> </p> <!-- Write all post from database -->
		</div>
	</div>
    <div id="page">
		<div class="post">
    		<p><?php echo $footer; ?></p>
    	</div>
    </div>
</div>
<?php htmlend(); ?>