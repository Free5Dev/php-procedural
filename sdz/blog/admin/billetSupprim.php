<?php 
	require_once("../connexion.inc.php");
	if(!isset($_GET['ref']))
	{
		header("Location:gestionBillet.php");
	}
		//requete de recuperation de contenu
		$reqRecup=$bdd->prepare("SELECT id,titre, contenu FROM billets WHERE id=?");
		$reqRecup->execute(array($_GET['ref']));
		$donneesRecup=$reqRecup->fetch();
		// requete de modification
		if(isset($_POST['btnSupprim']))
		{
			if(!empty($_POST['titre'] and $_POST['contenu']))
			{
				$reqDelete=$bdd->prepare("DELETE FROM billets WHERE id=?");
				$reqDelete->execute(array($_POST['id']));
				header("Location:gestionBillet.php");
			}
			else
			{
				echo "Les champs sont  vides";
			}
		}	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="hidden" name="id" value="<?php if(isset($_GET['ref'])) echo $donneesRecup['id']; ?>"/><?php if(isset($_GET['ref'])) echo $donneesRecup['id']; ?><br/>
			<input type="text" name="titre" size="60" value="<?php if(isset($_GET['ref'])) echo $donneesRecup['titre']; ?>" placeholder="Titre..."/><br/>
			<textarea rows="8" cols="50" name="contenu"><?php if(isset($_GET['ref'])) echo $donneesRecup['contenu']; ?></textarea><br/>
			<input type="submit" name="btnSupprim" value="Supprimer !"/>
		</form>
	</body>
</html>
