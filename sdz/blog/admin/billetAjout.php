<?php 
	require_once("../connexion.inc.php");
	if(isset($_POST['btnAjout']))
	{
		if(!empty($_POST['titre'] and $_POST['contenu']))
		{
			$reqInsert=$bdd->prepare("INSERT INTO billets SET titre=?,contenu=?,date_creation=now()");
			$reqInsert->execute(array($_POST['titre'],$_POST['contenu']));
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
			<input type="text" name="titre" placeholder="Titre..."/><br/>
			<textarea rows="8" cols="40" name="contenu"></textarea><br/>
			<input type="submit" name="btnAjout" value="Ajouter !"/>
		</form>
	</body>
</html>