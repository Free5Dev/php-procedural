<?php 
	// appel de la function de connexion  à la bdd
	require_once("connexionMysql.inc.php");
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
			<td><a href="fiche3.php?ref=<?php echo $donnees['reference']; ?>">Voir détails</a></td>
		</tr>
		<?php } $req->closeCursor(); ?>
	</table>
</body>
</html>