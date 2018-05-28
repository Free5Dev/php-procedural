<?php 
	require_once("connexion.inc.php");
	$reqSelect=$bdd->query("SELECT id,titre,contenu,date_format(date_creation, '%d/%m/%Y à %Hh%imin%ss') as date_creation FROM billets ORDER BY ID desc LIMIT 0,5");
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<h1>Wecom to my blog</h1>
		<?php while($donneesSelect=$reqSelect->fetch()) { ?>
		<h1><?php echo htmlspecialchars($donneesSelect['titre'])." le ".htmlspecialchars($donneesSelect['date_creation']); ?></h1>
		<p><?php echo nl2br(htmlspecialchars($donneesSelect['contenu'])) ?><br/><a href="commentaire.php?ref=<?php echo $donneesSelect['id']; ?>">Commentaires</a></p>
		<?php } $reqSelect->closeCursor(); ?>
	</body>
</html>