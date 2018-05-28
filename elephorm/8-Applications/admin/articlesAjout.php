<?php 
session_start();
if(!isset($_SESSION['pseudo']) and !isset($_SESSION['password']))
{
	header("Location:../login.php");
}
	// function de connexion
	require_once("../connexionMysql.inc.php");
	if(isset($_POST['btnInscription']))
	{
		if(!empty($_POST['reference'] and $_POST['prix'] and $_POST['description'] and $_POST['famille']))
		{
			if($_FILES['photo']['tmp_name']==0)
			{
				copy($_FILES['photo']['tmp_name'],"../images/".$_FILES['photo']['name']);
					// requetage d'insertion
				$req=$bdd->prepare("INSERT INTO articles SET reference=?, prix=?, description=?,photo=? ,famillesID=?");
				$req->execute(array($_POST['reference'],$_POST['prix'],$_POST['description'],$_FILES['photo']['name'],$_POST['famille']));
				header("Location:articlesGestion.php");
				// echo"Ajout avec succès";
			}
			else
			{
				// requetage d'insertion
				$req=$bdd->prepare("INSERT INTO articles SET reference=?, prix=?, description=?, famillesID=?");
				$req->execute(array($_POST['reference'],$_POST['prix'],$_POST['description'],$_POST['famille']));
				header("Location:articlesGestion.php");
			}
			
		}
		else
		{
			echo"champs vide";
		}
		
	}
	// requetage menu déroulant
	$reqMenu=$bdd->query("SELECT * FROM familles");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Ajout d'article</title>
</head>
<body>
	<h1>Ajout d'article</h1>
	<p><a href="articlesGestion.php?logout=ok">Déconnexion</a></p>
	<form method="post"  enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="reference">Reference</label><br/>
		<input type="text" name="reference" id="reference"/><br/>
		<label for="prix">Prix</label><br/>
		<input type="text" name="prix" id="prix"/><br/>
		<label for="description">Description</label><br/>
		<input type="text" name="description" id="description"/><br/>
		<label for="famille">Famille</label><br/>
		<select name="famille" id="famille">
			<?php while($donneesMenu=$reqMenu->fetch()) { ?>
			<option value="<?php echo $donneesMenu['id'];  ?>"><?php echo $donneesMenu['intitule']; ?></option>
			<?php } $reqMenu->closeCursor(); ?>
		</select><br/><br>
		<label for="photo">Photo</label>
		<input type="file" name="photo" id="photo"/>
		<input type="submit" name="btnInscription" value="Inscription"/>
		<input type="reset" name="btnAnnuler" value="Annuler"/>
	</form>
	
</body>
</html>