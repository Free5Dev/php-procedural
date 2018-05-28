<?php 
	session_start();
	require("connexion.inc.php");
	if(isset($_POST['btn']))
	{
		if(!empty($_POST['pseudo'] and $_POST['message']))
		{
			$_SESSION['pseudo']=$_POST['pseudo'];
			$reqInsert=$bdd->prepare("INSERT INTO minichat(pseudo,message) VALUES(?,?)");
			$reqInsert->execute(array($_POST['pseudo'],$_POST['message']));
			header("Location:minichat.php");
		else
		{
			echo "Les champs sont vides par contre votre vous ne pourrez postuler de message";
		}
	}
	else
	{
		header("Location:minichat.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php 
			echo "<pre>";
			print_r($_POST);
			echo "</pre>";
		?>
	</body>
</html>