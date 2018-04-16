<?php 
	if(!isset($_GET['ref']))
	{
		header("Location:http://www.saidsoumah.com/veloAssurance.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Formulaire de récupération de données saisies</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	</head>
	<body>
		<div class="container-fluid">
			<div class="container">
								<h1>Bienvenue Mr: <?php echo $_GET['nom']." ".$_GET['prenom']; ?></h1>

				<div class="row">
					<form method="post" action="form.php" style="width:100%;">
						<div class="form-group">
						    <label for="nom">Nom</label>
						    <input type="text" class="form-control" id="nom"  value="<?php if(isset($_GET['nom'])) echo $_GET['nom']; ?>">
						    <small id="nom" class="form-text text-muted">Votre nom a été rempli automatiquement à travel l'url.</small>
					  	</div>
					 	<div class="form-group">
						    <label for="prenom">Prenom</label>
						    <input type="text" class="form-control" id="prenom"  value="<?php if(isset($_GET['nom'])) echo $_GET['prenom']; ?>">
						    <small id="prenom" class="form-text text-muted">Votre prenom a été rempli automatiquement à travel l'url.</small>
					  	</div>
					  	<div class="form-group">
						    <label for="email">Email</label>
						    <input type="email" class="form-control" id="email"  value="<?php if(isset($_GET['email'])) echo $_GET['email']; ?>">
						    <small id="email" class="form-text text-muted">Votre Email a été rempli automatiquement à travel l'url.</small>
					  	</div>
					  	<div class="form-group">
						    <label for="prix">Prix</label>
						    <input type="number" class="form-control" id="prix"  value="<?php if(isset($_GET['prix'])) echo $_GET['prix']; ?>">
						    <small id="prix" class="form-text text-muted">Le prix a été rempli automatiquement à travel l'url.</small>
					  	</div>
					  	<div class="form-group">
						    <label for="annee">annee</label>
						    <input type="date" class="form-control" id="date" value="<?php if(isset($_GET['annee'])) echo $_GET['annee']; ?>">
						    <small id="date" class="form-text text-muted">La Date a été rempli automatiquement à travel l'url.</small>
					  	</div>
					  <button type="submit" class="btn btn-primary">Valider</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>