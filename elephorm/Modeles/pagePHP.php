<?php 
	try
	{
		$bdd=new PDO('mysql:host=localhost;dbname=catalogue;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		$req=$bdd->query("select * from articles");
		$donnees=$req->fetch();

		echo "<pre>";
		print_r($donnees);
		echo "</pre>";
	}
	catch(Exception $e)
	{
		die('Erreur:'.$e->getMessage());
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title></title>
	</head>
	<body>
		<?php

		?>
	</body>
</html>