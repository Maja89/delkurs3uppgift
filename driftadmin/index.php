<?php
session_start(); // Check session
/* PREF */
$title = "Administartion - Driftinfo";
/* END PREF */
include "jscripts/conn.php"; // Databaseconn
// Login
if (isset($_POST['loggain'])){
	$sql = "SELECT userid FROM members WHERE user='{$_POST['user']}' AND pass='{$_POST['pass']}'";
	$result = mysql_query($sql);
	if ($r = mysql_fetch_array($result))
{
	$salt = substr($r['pass'], 0, 64);
	$hash = $salt . $pass; 
	for ( $i = 0; $i < 100000; $i ++ ) {
  		$hash = hash('sha256', $hash);
	}
} else {
	// Missing user or pass
			if (mysql_num_rows($result) == 0){
				header("Location: index.php?badlogin");
    		exit;
  		}
}

if ($salt.$hash == $r['pass'] )
	{
  		// Set user with unic index and login
  		$_SESSION['sess_id'] = mysql_result($result, 0, 'userid');
  		$_SESSION['sess_user'] = $_POST['user']; 
  		setcookie("user", $_POST['user']);
  		header("Location: start.php");
  		exit;	
	} else {
		// Missing user or pass
			if (mysql_num_rows($result) == 0){
				header("Location: index.php?badlogin");
    		exit;
  		}
	}
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="../css/admin.css" rel="stylesheet" type="text/css">
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<div id="wrapper">
		<div id="content">
			<?php		// If you are logged out:
			if (isset($_GET['loggedout']))
			{
			  echo '<h1>Du har nu blivit utloggad.</h1><br>
			  <p><a href="../index.php">Gå till besökargränssnittet</a> eller logga in igen:</p>';
			}		
			?> 
			<h1 class="h1index">Inloggning f&ouml;r admin:</h1>
			<?php
			
			// Error at login
			if (isset($_GET['badlogin']))
			{ 
				echo '<p><strong>Fel lösenord eller användarnamn<br>Försök igen.</strong></p>';
			}
			?>
			<form action="index.php?loggain" method="post">
				<p>Anv&auml;ndarnamn:<br />
					<input name="user" type="text"></p>
				<p>L&ouml;senord:<br />
					<input name="pass" type="password"></p>
				<p><input type="submit" name="loggain" value="Logga in"></p>
			</form>
		</div>
	</div>
</body>
</html>