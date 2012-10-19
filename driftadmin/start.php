<?php
	//session_start(user);
	//include 'dbhappen.php';
	include ('../functions.php');
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Administration - Driftinfo</title>
		<?php tinyMCE(); ?>
	</head>
	<body>
	<div id="wrapper">
		<div id="menu">
			<form>
				<li><input type="submit" name="logout" value="Logga ut"></li>
			</form>
		</div>
		<div id="content">
			<h3>Lägg till ny händelse</h3>
				<form method="post" action="">
					<fieldset>
						<p><label>Status</label><br />
								<select name="sid">
									<option value="solved">Solved</option>
									<option value="unsolved">Unsolved</option>
								</select></p>
						<p><label>Rubrik</label><br />
								<input type="text" name="rubrik" size="50"></p>
						<p><label>Händelse</label><br />
								<textarea name="nyhet" rows="15" cols="39"></textarea></p>
						<p><input type="submit" name="submit" value="Spara händelse"></p>
					</fieldset>
				</form>
		</div>
	</div>
	</body>
</html>
<?php
	include ('jscripts/conn.php');
	if(isset($_POST['submit'])) {
		$sid = $_POST['sid'];
		$rubrik = $_POST['rubrik'];
		$nyhet = $_POST['nyhet'];
		$query = mysql_query("INSERT INTO nyheter ('sid', 'rubrik', 'nyhet', 'datum') VALUES ('$sid', '$rubrik', '$nyhet', NOW())");
	}
?>