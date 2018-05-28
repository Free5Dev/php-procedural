<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		if(!isset($_POST['btn']))
		{
			?>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<input type="text" name="login" placeholder="Login..."/><br/>
					<input type="password" name="password" placeholder="...."/><br/>
					<input type="submit" name="btn" value="Connexion"/>
				</form>
			<?php
		}
		else
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
</body>
</html>