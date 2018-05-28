<?php 
	// appel de la function de connexion à la bdd
	require_once("connexionMysql.inc.php");
	// requetage à la bdd
	$req=$bdd->query("SELECT * FROM articles WHERE reference='ART56'");
	$donnees= $req->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Test Connexion</title>
</head>
<body>
	<?php 
		echo"<pre>";
		print_r($donnees);
		echo"</pre>";

	?>
</body>
</html>