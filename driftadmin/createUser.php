<?php /*
session_start(); // Alltid överst på sidan 

// Check if user set = if not redirect
if (!isset($_SESSION['sess_user'])){ 
  header("Location: index.php"); 
  exit; 
} */
 
include "jscripts/conn.php"; // Databaseconnection 
 
if (isset($_POST['submit'])) { 
 
  // Erase any blanks before/after
  foreach($_POST as $key => $val) { 
    $_POST[$key] = trim($val); 
  } 
 
  // Check if empty
  if (empty($_POST['user']) || empty($_POST['pass'])) { 
    $reg_error[] = 0; 
  } 
  
  // Check if username occupied
  $sql = "SELECT COUNT(*) FROM members WHERE user='{$_POST['user']}'"; 
  $result = mysql_query($sql); 
  if (mysql_result($result, 0) > 0) { 
    $reg_error[] = 1; 
  } 
  
  // No errors? Check and Save and redirect to start.php
  if (!isset($reg_error)) { 
    $sql = "INSERT INTO members (user, pass) VALUES('{$_POST['user']}', '{$_POST['passwd']}')"; 
    mysql_query($sql); 
    
    $_SESSION['sess_id'] = mysql_insert_id(); 
    $_SESSION['sess_user'] = $_POST['user']; 
    header("Location: start.php"); 
    exit;      
  
  } 
 
} else { 
 
  // Set variable for empty fields
  for ($i=0; $i<4; $i++) { 
    $back[$i] = ""; 
  } 
 
} 
 
$error_list[0] = "You have not filled in every fields"; 
$error_list[1] = "Username is ocupied"; 
 
?> 
<!DOCTYPE HTML> 
<html> 
	<head> 
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
		<title>Registrera dig</title> 
		<link href="../css/admin.css" rel="stylesheet" type="text/css">
	</head> 
	<body>
	<div id="wrapper">
		<div id="page">
			<div class="post">
			<?php 						// Report if you not filled in every fields
				if (isset($reg_error)){ 
 
					echo "Something went wrong:<br>\n"; 
					echo "<ul>\n"; 
					for ($i=0; $i<sizeof($reg_error); $i++) { 
						echo "<li>{$error_list[$reg_error[$i]]}</li>\n"; 
					} 
					echo "</ul>\n"; 
  
				$back[0] = $_POST['user']; 
				$back[1] = $_POST['pass']; 
				} 
			?> <!-- Form for filling out new user -->
			<h1>Create a user for SSRS</h1>
		<hr>
			<p>Please fill in both fields</p>
			<form action="register.php" method="post"> 
				<p>Username:<br />
					<input name="user" type="text" value="<?=$back[0] ?>" size="35" class="form"></p>
				<p>Password:<br />
					<input name="pass" type="text" value="<?=$back[1] ?>" size="35" class="form"></p>
				<p><input type="submit" name="submit" value="Save your stuff"></p>
			</form>
			<p><a href="start.php">Back to start</a></p>
			</div>
		</div>
	</div>
	</body>
</html>
