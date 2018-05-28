
<?php 
 session_start();
 if(isset($_GET['logout']))
 {
	 unset($_SESSION['pseudo'] ,$_SESSION['password']);
 }
 if(!isset($_SESSION['pseudo']) and !isset($_SESSION['password']))
 {
	 header("Location:../login.php");
 }
	// appel de la function de connexion  à la bdd
	require_once("../connexionMysql.inc.php");
	if(isset($_GET['supp']))
	{
		$req=$bdd->prepare("DELETE FROM articles WHERE reference=?");
		$req->execute(array($_GET['ref']));
	}
	// requetage
	$req=$bdd->query("SELECT * FROM articles");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<h1> Articles Gestion </h1>
	<p><a href="articlesAjout.php">Ajout d'articles</a></p>
	<p><a href="articlesGestion.php?logout=ok">Déconnexion</a></p>
	<table border="1" cellspacing="0" width="600" cellpading="0">
		<tr>
			<td>Reference</td>
			<td>Modifier</td>
			<td>Supprimer</td>
		</tr>
		<?php while ($donnees=$req->fetch()) { ?>
		<tr>
			<td><?php echo $donnees['reference']; ?></td>
			<td><a href="articlesModif.php?ref=<?php echo $donnees['reference']; ?>">Modification</a></td>
			<td><a href="articlesGestion.php?ref=<?php echo $donnees['reference']; ?>&amp;supp=ok">Supprim</a></td>
		</tr>
		<?php } $req->closeCursor(); ?>
	</table>
</body>
</html>
