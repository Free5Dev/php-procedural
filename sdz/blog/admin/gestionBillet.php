<?php 
	require_once("../connexion.inc.php");
	$reqSelect=$bdd->query("SELECT id,titre FROM billets");
?>
<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<a href="billetAjout.php?ref=ajout">Ajout de billets</a>
		<table border="1" cellpadding="1" cellspacing="0" width="600">
			<tr>
				<th>Titre</th>
				<th>Modification</th>
				<th>Suppression</th>
			</tr>
			<?php while($donneesSelect=$reqSelect->fetch()) { ?>
			<tr>
				<td><?php echo $donneesSelect['titre']; ?></td>
				<td><a href="billetModif.php?ref=<?php echo $donneesSelect['id']; ?>">Modification</a></td>
				<td><a href="billetSupprim.php?ref=<?php echo $donneesSelect['id']; ?>">Suppresion</a></td>
			</tr>
			<?php } $reqSelect->closeCursor(); ?>
		</table>
	</body>
</html>