<?php
session_start(); // Set session cookie 
// Check if logged in - session set 
if (!isset($_SESSION['sess_user'])){ 
  header("Location: index.php"); 
  exit; 
} 
?>
<?php
	include 'jscripts/conn.php';
	include '../functions.php';
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Administration - SSRS</title>
		<link rel="stylesheet" href="../css/frontface.css" type="text/css" media="screen">
		<?php tinyMCE(); ?>
	</head>
	<body>
	<div id="wrapper">
    	<div id="menu">
        	<ul>
            	<li><a href="loggedout.php">Logout</a></li>
            </ul>
        </div>
    	<div id="header">
        	<div id="logo"><h1>Administration - SSRS</h1></div>
        </div>
		<div id="page">
        	<div class="post">
				<form method="post" action="start_lagra.php">
						<h3>New SSRS posts</h3>
						<p><label>Status</label><br />
								<select name="sid">
									<option value="unsolved">Unsolved</option>
									<option value="solved">Solved</option>
								</select></p>
						<p><label>Header</label><br />
								<input type="text" name="rubrik" size="50"></p>
						<p><label>SSRS Post</label><br />
								<textarea name="nyhet" rows="15" cols="39"></textarea></p>
						<p><input type="submit" name="submit" value="Save post"></p>
				</form>
            </div>
            <?php 			// get database post
				include ('jscripts/conn.php');
				
				if(isset($_POST['update'])) {
			  					$nyhetid =  (int) $_POST['status'];
								$strQuery = mysql_query("UPDATE nyheter SET sid = 'solved' WHERE nyhetid = $nyhetid") or exit(mysql_error());
							}
				
				$Query = mysql_query("SELECT nyhetid, rubrik, nyhet, datum, sID FROM nyheter ORDER by datum DESC LIMIT 15") or exit(mysql_error());
				while ($r = mysql_fetch_array($Query))
				{										// check, if status solved, show in green and with a delete button
					if ($r['sID'] == ('solved')) {
						echo '<div class="post">';
						echo '<p id="green">' . $r['datum'] . '<br />' . $r['rubrik'] . '</p>';
						echo '
							<form name="radera" method="post" action="start_radera.php">
			  				<input type="hidden" name="radera" value="' . $r['nyhetid'] . '">
			  				<p><input class="knapp" type="submit" name="submit" value="Radera"></p>
							</form></div>';
					} else {		// check, if status unsolved, show in red and with a change status button
						echo '<div class="post">';
						echo '<p id="red">' . $r['datum'] . '<br />' . $r['rubrik'] . '</p>';
						if ($r['sID'] == ('unsolved')) {
							echo '<form name="status" method="post" action="">
									<input type="hidden" name="status" value="' . $r['nyhetid'] . '">
									<input type="hidden" name="update" value="update">
									<p><input class="knapp" type="submit" name="submit" value="Ändra status"></p>
			  						</form></div>';
			  				
						} 
					}
				}
			?>
		</div>
	</div>
	</body>
</html>