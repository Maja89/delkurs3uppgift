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
        <li><a href="createpdf.php">skapa en pdf av sidan</a></li>
    </ul></div>
	<div id="header">
    	<div id="logo">
    		<h1>About - <?php echo $title; ?></h1>
        </div>
    </div>
	<div id="page">
    	<div class="post">
    		<p><strong>English</strong></p>
				<p>This project was ment to be a server status site with messages telling what status you got on a specified server. But I had some real issues to get it work and wherefor 
				i don't have the ping server function right now. But if you want to develop it further just go a head.</p>
			<p><strong>Svenska</strong></p>
				<p>Det var tänkt att detta projekt skulle innehålla en server status funktion där man skulle få meddelande om att en server ligger nere eller om den är uppe. Men jag har haft
				problem med ping funktionen så har lagt det på hyllan så länge. Men utvecklingsmöjligheten finns där.</p>
		</div>
	</div>
    <div id="page">
		<div class="post">
    		<p><?php echo $footer; ?></p>
    	</div>
    </div>
</div>
<?php htmlend(); ?>