<?php /*
session_start();
if (!isset($_SESSION['sess_user'])){ 
  header("Location: index.php"); 
  exit; 
} */
?>
<html>
<script language='javascript'>
<!--
function redirect() {
location.href = 'start.php'
}
-->
</script>

<?php
include "jscripts/conn.php";
$strQuery = mysql_query("
	INSERT INTO nyheter
	(datum, rubrik, nyhet, sID)
	VALUES
	(NOW(),
	'" . $_POST['rubrik'] . "',
	'" . $_POST['nyhet'] . "',
	'" . $_POST['sid'] . "'
)")or exit(mysql_error());
?>
<body onLoad="redirect()">

</body>
</html>
