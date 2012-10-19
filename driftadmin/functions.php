<?php
	function checkServerStatus($server) {
		$host = $server;
		$up = ping($host);

		// if site is up, give green color on address.
		if( $up ) {
			echo '<p>Serveraddress: <span style="color: #0F0;">' . $host . '</span></p>';
		}
		// otherwise, give red color on address.
		else {
			echo '<p>Serveraddress: <span style="color: #F00;">' . $host . '</span>';
			echo 'Fel vid test av uppkoppling, eller så ligger servern nere.</p>';
		}
}
?>