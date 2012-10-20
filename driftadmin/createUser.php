<?php
if(isset ($_POST['pass'])) {
	$conn = mysqli_connect("127.0.0.1", "root", "", "driftinfo");
	$user = $_POST['user'];

	// creates a unic password for every user
	$salt = hash('sha256', time() . 'qwerty' . strtolower($user));
	$hash = $salt . $_POST['pass'];

	// rehash password several times for more secure
	for ( $i = 0; $i < 100000; $i ++ ) {
		$hash = hash('sha256', $hash); }

	$hash = $salt . $hash;
	$hash = mysqli_real_escape_string($conn, $hash);
	$user = mysqli_real_escape_string($conn, $user);
	$sql = "INSERT INTO members (user, pass) VALUES ('$user', '$hash')";
	mysqli_query($conn, $sql);
}
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Skapa användare - Driftinfo</title>
	</head>
	<body>
		<form method="post" action="createUser.php">
			<fieldset>
				<legend>SKAPA NYA ANVÄNDARE</legend>
				<p>Användarnamn<br />
				<input type="text" name="user" size="50" maxlenght="50"></p>
				<p>Lösenord<br />
				<input type="text" name="pass" size="50"></p>
				<p><input type="submit" name="submit"></p>
				<p>OBS: kom ihåg ditt lösenord, det kan inte återskapas</p>
			</fieldset>
		</form>
	</body>
</html>
