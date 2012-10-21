<?php /*
session_start();
if (!isset($_SESSION['sess_user'])){ 
  header("Location: index.php"); 
  exit; 
} */
?> 
<?php
include "jscripts/conn.php";
$strQuery = mysql_query("
	DELETE from nyheter
	WHERE nyhetid = ".$_POST['radera']."
") or exit(mysql_error());
?>
<script language='javascript'>
		<!--
		function redirect() {
		location.href = 'start.php'
		}
		-->
		</script>
<body onLoad="redirect()">
</body>
</html>