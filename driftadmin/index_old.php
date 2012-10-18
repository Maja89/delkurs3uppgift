<?php
session_start(); // Session start, set user
include "jscripts/conn.php"; // DB connection
// Login for admin
if (isset($_POST['login'])){
  $sql = "SELECT userid FROM members WHERE user='{$_POST['user']}' AND pass='{$_POST['pass']}'";
  $result = mysql_query($sql);
  // If non user or pass show error and form
  if (mysql_num_rows($result) == 0){
    header("Location: index.php?error");
    exit;
  }
  // Set session unic
  $_SESSION['sess_id'] = mysql_result($result, 0, 'userid');
  $_SESSION['sess_user'] = $_POST['user']; 
  setcookie("user", $_POST['user']);
  header("Location: input.php");
  exit;
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
		if (isset($_GET['loggedout'])) {
			echo "<p>Du har blivit utloggad, <a href='../index.php'>gå till användarsidan</a>. Eller
			logga in för att komma in igen"; }
		?>
		<?php 
		// Show error then failed login
			if (isset($_GET['error'])) { 
				echo '<p><strong>Fel lösenord eller användarnamn<br>Försök igen.</strong></p>'; }
			
			// Show message then changed password
			if (isset($_GET['changed'])) { 
				echo '<p>Ditt lösenord har nu ändrats<br>Logga in med dina nya uppgifter</p>'; }
		
		?>
		<form action="index.php?login" method="post">
			<fieldset>
				<legend>ADMINSTRATION - LOGGA IN</legend>
				<p><label>Anv&auml;ndarnamn</label><br />
				<input name="user" type="text" class="form"></p>
				<p><label>L&ouml;senord</label><br />
				<input name="pass" type="password" class="form"></p>
				<p><input type="submit" name="loggain" value="Logga in" class="knapp"></p>
			</fieldset>
		</form>
	</body>
</html>