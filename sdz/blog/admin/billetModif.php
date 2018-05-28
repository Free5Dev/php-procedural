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
		if(isset($_POST['btnModif']))
		{
			if(!empty($_POST['titre'] and $_POST['contenu']))
			{
				$reqUpdate=$bdd->prepare("UPDATE billets SET titre=?,contenu=?,date_creation=now() WHERE id=?");
				$reqUpdate->execute(array($_POST['titre'],$_POST['contenu'],$_POST['id']));
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
			<input type="submit" name="btnModif" value="Modification !"/>
		</form>
	</body>
</html>
