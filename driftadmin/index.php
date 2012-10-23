<?php
session_start(); // Check session
/* PREF */
$title = "Adminitration - Server status";
/* END PREF */
include "jscripts/conn.php"; // Databaseconn
// Login
if (isset($_POST['loggain'])) {

  $sql = "SELECT userid FROM members WHERE user='{$_POST['user']}' AND pass='{$_POST['pass']}'";
  $result = mysql_query($sql);

  // MIssing user/pass
  // send to form with error mess
  if (mysql_num_rows($result) == 0){
    header("Location: index.php?badlogin");
    exit;
  }

// Set session with unic id
  $_SESSION['sess_id'] = mysql_result($result, 0, 'id');
  $_SESSION['sess_user'] = $_POST['user']; 
  setcookie("user", $_POST['user']);
  header("Location: start.php");
  exit;
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../css/admin.css" rel="stylesheet" type="text/css">
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<div id="wrapper">
		<div id="header">
			<div id="logo"><h1>Login for adminitration</h1></div>
		</div>
		<div id="page">
			<div class="post">
				
				<?php		// If you are logged out:
						if (isset($_GET['loggedout']))
					{
						echo '<h1>You have been logged out</h1><br><p><a href="../index.php">Please visit home</a> or login again:</p>';
					}		
				?> 
				
				<?php
			
				// Error at login
					if (isset($_GET['badlogin']))
					{ 
						echo '<p><strong>Wrong user or password<br>Try again.</strong></p>';
					}
				?>
				
				<form action="index.php?loggain" method="post">
					<p>Username:<br />
						<input name="user" type="text"></p>
					<p>Password:<br />
						<input name="pass" type="password"></p>
					<p><input type="submit" name="loggain" value="Logga in"></p>
				</form>
				<p><a href="createUser.php">Create new user</a></p>
			</div>
		</div>
		<div id="page">
			<div class="post">
				<?php include('../pref.php'); echo $footer; ?>
			</div>
		</div>
	</div>
</body>
</html>