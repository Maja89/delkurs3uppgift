<?php
	$title = "Administration - Login";
?>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
		<?php
			if(isset($_POST['login'])) {
				include 'dbhappen.php';
				$sql = "SELECT $user, $pass FROM members WHERE $user='{$_POST['$user']}' AND $pass='{$_POST['$pass']}'";
				$result = mysqli_query($db, $sql);

				$_SESSION['sess_id'] = mysqli_result($result, 0, 'id');
				$_SESSION['sess_user'] = $_POST['$user'];
				setcookie("user", $_POST['$user']);
				header("Location: start.php");
			} else {
				echo "<p>De uppgifter du angivit finns inte i vårt register</p>";
			}
			exit;
		?>
		<form $method="post" action="index.php?login">
			<fieldset>
			<legend>ADMINISTRATION - LOGIN</legend>
				<p>Användarnamn<br />
				<input type="text" name="user" size="40"></p>
				<p>Lösenord<br />
				<input type="password" name="pass" size="40"></p>
				<p><input type="submit" name="submit" value="Logga in">&ansp;<input type="reset" name="reset" value="Rensa">
			</fieldset>
		</form>
	</body>
</html>