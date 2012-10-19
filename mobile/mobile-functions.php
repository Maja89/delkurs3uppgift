<?php	
// function to show database posts on index.php
	function writePost()
			{
            	include("../driftadmin/jscripts/conn.php");
				$strQuery = mysql_query("SELECT n.rubrik, n.nyhet, n.datum, s.image, n.sID FROM nyheter n INNER JOIN status s ON s.sid = n.sid ORDER by datum DESC LIMIT 15") or exit(mysql_error());
				while ($r = mysql_fetch_array($strQuery))
				{
					if ($r['sID'] == ('solved')) {
						echo '<span id="green"><p>'.$r['datum'].'</p><h3>'.$r['rubrik'].'</h3><p>'.$r['nyhet'].'</p></span>';
					} else {
						echo '<span id="red"><p>'.$r['datum'].'</p><h3>'.$r['rubrik'].'</h3><p>'.$r['nyhet'].'</p></span>';
					}
				echo "<hr><br />";
				}
			}
?>
<?php
	function tinyMCE() {
		echo '
		<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript">
			tinyMCE.init({
				theme : "simple",
				mode : "textareas"
			});
		</script>';
	}
?>