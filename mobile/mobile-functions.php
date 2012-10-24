<?php	
// function to show database posts on index.php
	function writePost()
			{
            	include("../driftadmin/jscripts/conn.php");
				$strQuery = mysql_query("SELECT n.rubrik, n.nyhet, n.datum, s.image, n.sID FROM nyheter n INNER JOIN status s ON s.sid = n.sid ORDER by datum DESC LIMIT 15") or exit(mysql_error());
				while ($r = mysql_fetch_array($strQuery))
				{
					if ($r['sID'] == ('solved')) {
						echo '<p>SOLVED ISSUE: '.$r['datum'].'</p><h3>'.$r['rubrik'].'</h3><p>'.$r['nyhet'].'</p>';
					} else {
						echo '<p>UNSOLVED ISSUE: '.$r['datum'].'</p><h3>'.$r['rubrik'].'</h3><p>'.$r['nyhet'].'</p>';
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