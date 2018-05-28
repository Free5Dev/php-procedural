<?php 
	// appel de la function de connexion  à la bdd
	
	require_once("connexionMysql.inc.php");
	// requetage
	$req=$bdd->query("SELECT * FROM articles");
	if(isset($_GET['btnSearch']))
	{
		$req=$bdd->prepare("SELECT reference,prix FROM articles WHERE famillesID=? ");
		$req->execute(array($_GET['famille']));
	}
	// menu deroulant
	$reqMenu=$bdd->query("SELECT * FROM familles");

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
	<form  method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<fieldset >
			<legend>Ménu déroulant dynamique</legend>
			<label for="search">Séléctionnez une famille</label>
			<select name="famille" id="famille">
			<?php while($donneesMenu=$reqMenu->fetch()) { ?>
				<option <?php if(!isset($_GET['famille'])) $_GET['famille']=1; if($_GET['famille']==$donneesMenu['id']) echo "selected='selected'"; ?> value="<?php echo $donneesMenu['id']; ?>"><?php echo $donneesMenu['intitule']; ?></option>
			<?php } $reqMenu->closeCursor(); ?>
			</select>
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
			<td><a href="fiche5.php?ref=<?php echo $donnees['reference']; ?>">Voir détails</a></td>
		</tr>
		<?php } $req->closeCursor(); ?>
	</table>
</body>
</html>