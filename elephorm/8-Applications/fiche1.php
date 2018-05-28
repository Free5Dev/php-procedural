<?php 
	// appel de la function de connexion à la bdd
	require_once("connexionMysql.inc.php");
	// requetage
	$req=$bdd->query("SELECT * FROM articles WHERE reference='ART56'");
	$donnees=$req->fetch();
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
	<table border="1" cellspacing="0" width="600" cellpadding="1">
		<tr>
			<td>Reference</td>
			<td><?php echo $donnees['reference']; ?></td>
		</tr>
		<tr>
			<td>Prix</td>
			<td><?php echo $donnees['prix']; ?></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><?php echo $donnees['description']; ?></td>
		</tr>
		<tr>
			<td>Famille</td>
			<td><?php echo $donnees['famillesID']; ?></td>
		</tr>
	</table>
</body>
</html>