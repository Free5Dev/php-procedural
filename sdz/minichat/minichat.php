<?php 
	session_start();
	require("connexion.inc.php");
	$reqSelect=$bdd->query("SELECT * FROM minichat ORDER BY id desc LIMIT 10");
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<form method="post" action="minichat_post.php">
			<input type="text" name="pseudo" placeholder="Pseudo..." value="<?php if(isset($_SESSION['pseudo'])) echo $_SESSION['pseudo']; ?>" /><br/>
			<textarea name="message" placeholder="Message..."></textarea><br/>
			<input type="submit" name="btn" value="Postulez !">
		</form>
		<a href="minichat.php">Actualisez la page</a>
		<?php 
			while($donneesSelect=$reqSelect->fetch()) {
				?>		
				<p><mark><?php echo htmlspecialchars($donneesSelect['pseudo']); ?> :</mark> <?php echo nl2br(htmlspecialchars($donneesSelect['message'])); ?> </p>
				<?php
			} $reqSelect->closeCursor();
		?>
	</body>
</html>