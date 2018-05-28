<?php 
	try
	{
		$bdd=new PDO('mysql:host=db693303573.db.1and1.com;port=3306;dbname=db693303573','dbo693303573','SaidSoumah.91');
	}
	catch(Exception $e)
	{
		die('erreur:'.$e->getMessage());
	}
?>