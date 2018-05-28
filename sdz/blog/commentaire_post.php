<?php 
	session_start();
	require_once("connexion.inc.php");
	$ref=$_SESSION['ref'];
	if(isset($_POST['btnCommentaire']))
	{
		if(!empty($_POST['auteur'] and $_POST['commentaire']))
		{
			$reqInsert=$bdd->prepare("INSERT INTO commentaires(id_billet,auteur,commentaire,date_commentaire) VALUES(?,?,?,now())");
			$reqInsert->execute(array($_SESSION['ref'],$_POST['auteur'],$_POST['commentaire']));
			header("Location:commentaire.php?ref=$ref");
		}
		else
		{
			echo "Impossible de posté votre message l'un des champs est video";
		}
	}
	else
	{
		header("Location:commentaire.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>