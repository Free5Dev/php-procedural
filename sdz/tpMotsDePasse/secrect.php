<?php 
	if(isset($_POST['btn']))
	{
		if(!empty($_POST['login']) and !empty($_POST['password']))
		{
			if($_POST['login']=='free' and $_POST['password']=='1234')
			{
				?>
				<h1>Welcom to the sever of the Naezzea</h1>
				<p>The secret code access is :pim pim pim pam pam pam </p>
				<?php
			}
			else
			{
				echo "Erreur d'identification inutile d'insister hahahah";
			}
		}
		else
		{
			echo"Les champs sont obligatoires";
		}
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