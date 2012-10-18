<?php
session_start(); // Alltid överst på sidan 
// Kolla om inloggad = sessionen satt 
if (!isset($_SESSION['sess_user'])){ 
  header("Location: index.php"); 
  exit; 
}
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="admin.css" rel="stylesheet" type="text/css">
<title>Bloggen - Dan Paulsson</title>
</head>

<body>

	<div id="wrap">
		
        <h1 class="h1start">Administrera blogginlägg</h1>
        
      <div class="menu">	
		<ul>
            <li><a href="start.php">Hem</a></li>
			<li><a href="uppgifter.php">Byt ditt lösenord</a></li>
			<li><a href="utloggning.php">Logga ut</a></li>
        </ul>
	  </div>
      
      <div id="frontface">
      		
            <h3>Lägg till inlägg</h3>	
			<form name="frontface" method="post" action="frontface_lagra.php">
			<p>Rubrik:<br />
            <input  name="rubrik" type="text" id="rubrik" class="form" size="30" maxlength="45"></p>
			<p>Kategori:<br />
			<select name="catid" class="form">
			<?php									
				showCat();			// Lägger in kategorierna i formuläret (funktion sist på sidan)
			?>
			</select></p>
			<p>Text:<br />
			<textarea class="form" name="text" cols="50" rows="7"></textarea><br /></p>
			<p>
			<input class="knapp" type="submit" name="submit" value="Lägg till">
			<input class="knapp" type="reset" name="reset" value="Rensa"></p>
			</form>
			
			<h3>Redigera/Ta bort inlägg</h3><br>
			<p>
			<?PHP				// Möjlighet att redigera inlägg man har gjort
			include "conn.php"; 
				
				$strQuery = mysql_query("SELECT f.id, f.datum, f.rubrik, f.text, f.forfattare, c.category FROM frontface f INNER JOIN categories c ON f.catid = c.catID ORDER BY datum DESC;") or exit(mysql_error());
				while ($r = mysql_fetch_array($strQuery)) {
					echo '<hr><h1>' . $r['rubrik'] . '</h1><p><i>' . $r['datum'] . '</i></p><p>' . $r['text'] . '</p>
					<p><i>Författare: ' . $r['forfattare'] . '</i><br /><i>Vald kategori: ' . $r['category'] . '</p> 
					<form name="redigera" method="post" action="frontface_redigera.php">
					<input type="hidden" name="redigera" value="' . $r['id'] . '">
					<p><input class="knapp" type="submit" name="submit" value="Redigera"></p>
			  		</form>
			  		<form name="redigera" method="post" action="frontface_radera.php">
			  		<input type="hidden" name="radera" value="' . $r['id'] . '">
			  		<p><input class="knapp" type="submit" name="submit" value="Radera"></p>
					</form>';
				} 
			?>
      </div>
    </div>
</body> <!-- funktion visa kategorier -->
</html>
<?php
function showCat()
{
	include "conn.php";
				
	$strQuery = mysql_query("SELECT catid, category FROM categories") or exit(mysql_error());
	while ($res = mysql_fetch_array($strQuery)) {
	$catid = $res['catid'];
	$category = $res['category'];
	echo '<option value="' . $res['catid'] . '">' . $res['category'] . '</option>';
	}
}
?>