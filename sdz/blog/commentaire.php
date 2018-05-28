<?php 
	session_start();
	require_once("connexion.inc.php");
	if(!isset($_GET['ref']))
	{
		header("Location:index.php");
	}
	else
	{
		$_SESSION['ref']=$_GET['ref'];
		$reqSelect=$bdd->prepare("SELECT id, titre, contenu, date_format(date_creation, '%d/%m/%Y à %Hh%imin%ss') as date_creation FROM billets WHERE id=?");
		$reqSelect->execute(array($_GET['ref']));
		$donneesSelect=$reqSelect->fetch();
		// requete commentaire relative aux billets
		$reqCommentaire=$bdd->prepare("SELECT id,id_billet, auteur,commentaire,date_format(date_commentaire, '%d/%m/%Y à %Hh%imin%ss') as date_commentaire FROM commentaires WHERE id_billet=? ORDER BY date_commentaire ");
		$reqCommentaire->execute(array($_GET['ref']));
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<a href="index.php">Retours à la liste des blog</a>
		<form method="post" action="commentaire_post.php" width="100%" style="text-align: center; margin:5px;">
			<input type="text" name="auteur" placeholder="Auteur"/><br/>
			<textarea rows="8" cols="40" name="commentaire" placeholder="commentaire"/>
				
			</textarea><br/>
			<button name="btnCommentaire">Postulez !</button>
		</form>
		<h1><?php echo htmlspecialchars($donneesSelect['titre'])." le ".htmlspecialchars($donneesSelect['date_creation']); ?></h1>
		<p><?php echo nl2br(htmlspecialchars($donneesSelect['contenu'])) ?></p>
		<?php $reqSelect->closeCursor(); ?>
		<h2>Commentaires</h2>
		<?php while($donneesCommentaire=$reqCommentaire->fetch()) { ?>
		<h4><?php echo htmlspecialchars($donneesCommentaire['auteur'])." le ".htmlspecialchars($donneesCommentaire['date_commentaire']); ?></h4>
		<p><?php echo nl2br(htmlspecialchars($donneesCommentaire['commentaire'])) ?></p>
		<?php } $reqCommentaire->closeCursor(); ?>
	</body>
</html>