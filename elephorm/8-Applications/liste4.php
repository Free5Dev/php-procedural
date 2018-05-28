<?php 
	// appel de la function de connexion  à la bdd
	
	require_once("connexionMysql.inc.php");
	// requetage
	$req=$bdd->query("SELECT * FROM articles");
	if(isset($_GET['btnSearch']))
	{
		$req=$bdd->prepare("SELECT reference,prix FROM articles WHERE description LIKE ?");
		$req->execute(array("%$_GET[search]%"));
	}

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
	<!-- insertion d'un formulaire de recherche -->
	<form width="600" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<fieldset >
			<legend>Recherche d'article</legend>
			<label for="search">Search</label>
			<input type="search" name="search" value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>" id="search"/>
			<input type="submit" name="btnSearch" value="Search" id="Search"/>
		</fieldset>
	</form>
	<table border="1" cellspacing="0" width="600" cellpading="0">
		<tr>
			<td>Reference</td>
			<td>Prix</td>
			<td>Détails</td>
		</tr>
		<?php while ($donnees=$req->fetch()) { ?>
		<tr>
			<td><?php echo $donnees['reference']; ?></td>
			<td><?php echo $donnees['prix']; ?></td>
			<td><a href="fiche4.php?ref=<?php echo $donnees['reference']; ?>">Voir détails</a></td>
		</tr>
		<?php } $req->closeCursor(); ?>
	</table>
</body>
</html>