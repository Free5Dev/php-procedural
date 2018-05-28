<?php 
	session_start();
 if(!isset($_SESSION['pseudo']) and !isset($_SESSION['password']))
 {
	 header("Location:../login.php");
 }
	// function de connexion
	require_once("../connexionMysql.inc.php");
	if(isset($_GET['ref']))
	{
		$_SESSION['ref']=$_GET['ref'];
		$reqSelect=$bdd->prepare("SELECT a.reference,a.prix,a.description,a.photo,a.famillesID,f.intitule FROM articles as a, familles as f WHERE a.famillesID=f.id and reference=?");
		$reqSelect->execute(array($_SESSION['ref']));
		$donneesSelect=$reqSelect->fetch();
	}
	else
	{
		header("Location:articlesGestion.php");
	}
	if(isset($_POST['btnModif']))
	{
		if(!empty($_POST['reference'] and $_POST['prix'] and $_POST['description'] and $_POST['famille']))
		{
			if($_FILES['photo']['tmp_name']==0)
			{
				copy($_FILES['photo']['tmp_name'],"../images/".$_FILES['photo']['name']);
				// requetage d'insertion
				$req=$bdd->prepare("UPDATE articles SET prix=?, description=?, photo=?, famillesID=? WHERE  reference=?");
				$req->execute(array($_POST['prix'],$_POST['description'],$_FILES['photo']['name'],$_POST['famille'],$_POST['reference']));
				// header("Location:articlesGestion.php");
				echo"success";

			}
			else
			{
				// requetage d'insertion
				$req=$bdd->prepare("UPDATE articles SET prix=?, description=?, famillesID=? WHERE  reference=?");
				$req->execute(array($_POST['prix'],$_POST['description'],$_POST['famille'],$_POST['reference']));
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
	<title>Modification d'article</title>
</head>
<body>
	<h1>Modification  d'article</h1>
	<p><a href="articlesGestion.php?logout=ok">Déconnexion</a></p>
	<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="reference">Reference</label>
		<input type="hidden" name="reference" id="reference" value="<?php echo $donneesSelect['reference']; ?>"/>:<?php echo $donneesSelect['reference']; ?><br/>
		<label for="prix">Prix</label><br/>
		<input type="text" name="prix" id="prix" value="<?php echo $donneesSelect['prix']; ?>"/><br/>
		<label for="description">Description</label><br/>
		<input type="text" name="description" id="description" value="<?php echo $donneesSelect['description']; ?>"/><br/>
		<label for="famille">Famille</label><br/>
		<select name="famille" id="famille">
			<?php while($donneesMenu=$reqMenu->fetch()) { ?>
			<option <?php if($donneesSelect['famillesID']==$donneesMenu['id'] ) echo "selected='selected'"; ?> value="<?php echo $donneesMenu['id'];  ?>"><?php echo $donneesMenu['intitule']; ?></option>
			<?php } $reqMenu->closeCursor(); ?>
		</select><br/><br>
		<p><img src="../images/<?php echo $donneesSelect['photo']; ?>" alt=""></p>
		<label for="photo">Photo</label>
		<input type="file" name="photo" id="photo"/>
		<input type="submit" name="btnModif" value="Modification"/>
		<input type="reset" name="btnAnnuler" value="Annuler"/>
	</form>
	
</body>
</html>