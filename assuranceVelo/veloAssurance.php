<?php 
	$msg="";
	use PHPMailer\PHPMailer\PHPMailer;
	include_once "PHPMailer/PHPMailer.php";
	include_once "PHPMailer/Exception.php";
	if(isset($_POST['btn']))
	{
		$nom=$_POST['nom'];
		$email=$_POST['email'];
		$prenom=$_POST['prenom'];
		$tel=$_POST['tel'];
		$annee=$_POST['annee'];
		$prix=$_POST['prix'];
		
		$mail=new PHPMailer();
		$mail->setFrom('freezysoumah@gmail.com','Saidou Soumah');
		$mail->addAddress($email,'');
		$mail->nom=$nom;
		$mail->prenom=$prenom;
		$mail->tel=$tel;
		$mail->annee=$annee;
		$mail->prix=$prix;
		$mail->Subjet='Message de mon php mailer';
		$mail->isHTML(true);
		if($prix<=1000)
		{
			$mail->Body="Bonjour Mr :<strong>".$nom." ".$prenom."<br/> Vous avez un vélo Classique <br/> Pour assurer votre vélo cliquez sur le liens en bas:<a href='http://www.saidsoumah.com/form.php?ref=ok&amp;nom=$nom&amp;prenom=$prenom&amp;prix=$prix&amp;annee=$annee&amp;tel=$tel&amp;email=$email'>http://www.saidsoumah.com/form.php</a>";
		}
		else
		{
			$mail->Body="Bonjour Mr :<strong>".$nom." ".$prenom."<br/> Vous avez un vélo Electrique <br/> Pour assurer votre vélo cliquez sur le liens en bas:<a href='http://www.saidsoumah.com/form.php?ref=ok&amp;nom=$nom&amp;prenom=$prenom&amp;prix=$prix&amp;annee=$annee&amp;tel=$tel&amp;email=$email'>http://www.saidsoumah.com/form.php</a>";
		}

		if(!$mail->send())
		{
			$msg=" Veuillez réessayer".$mail->ErrorInfo;
		}
		else
		{
			$msg="Votre email a été envoyé, merci!";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title></title>
		<link rel="stylesheet" type="text/css" href="veloAssurance.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-fixed-top justify-content-between navbar-dark bg-dark">
			  <div class="container">
			  	<a class="navbar-brand" href="veloAssurance.php"><img src="images/logo-assurance-velo.png"></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			<div class="collapse navbar-collapse " id="navbarNav">
			    <ul class="navbar-nav">
			      <li class="nav-item active">
			        <a class="nav-link" href="#">Assurance parc vélo <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Liste des antivols</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">FAQ</a>
			      </li>
			       <li class="nav-item">
			        <a class="nav-link" href="#">Challenge</a>
			      </li>
			       <li class="nav-item">
			        <a class="btn btn-custom" href="#"><img src="images/incoming-call.png"> 01.47.71.17.07</a>
			      </li>
			    </ul>
			 </div>
			  </div>
		</nav>
		<!-- banniere -->
		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="images/813.jpg" alt="First slide">
		      <div class="carousel-caption">
		      		<h1>Votre vélo electrique assuré contre casse</h1><hr>
					<p>Assurance valable en tous lieux et sans vétusé</p>
                      <a href="#main" class="btn btn-warning btn-lg">Dévis gratuit</a>
                      <a href="#main" class="btn btn-outline-warning btn-lg">Souscrire</a>
                </div>
		    </div>
		  </div>
		</div>
		<!-- section -->
		<section class="container-fluid section">
			<h1>on a la bonne assurance pour votre vélo</h1>
			<p>N'hesitez pas à appéler notre équipe pour plus de renseignement: <strong>01.74.71.17.07</strong></p>
			</div>
		</section>
		<!-- type velo -->
		<section class="container-fluid type">
			<div class="row">
				<div class="classique col-md-6 col-sm-12">
					<h2>Vélo classique</h2><hr/>
					<p>Assurance casse</p>
					<p>Zéro Vétusé</p><p> 4000 € de couverture maximale</p><p>Françise 10% de sinistre 100€ </p>
					<p>à partir de : <span>7 € / mois</span></p>
					<p class="a"><a href="#main" class="btn btn-warning">Devis Gratuit</a></p>
				</div>
				<div class="electrique col-md-6 col-sm-12">
					<h2>Vélo éléctrique</h2><hr>
					<p>Assurance casse</p>
					<p>Zéro Vétusé</p><p> 5000 € de couverture maximale</p><p>Françise 10% de sinistre 200€ </p>
					<p>à partir de : <span>4 € / mois</span></p>
					<p class="a"><a href="#main" class="btn btn-warning">Devis Gratuit</a></p>
				</div>
			</div>
		</section>
		<!-- casse -->
		<section class="container-fluid casse">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-6 gauche">
						<h2>Disponible le 15er Février 2018!</h2>
						<h3>Pour Les Vélos non Electriques</h3>
						<p><marque>1 MOIS Offert</marque> pour les 1000 premiers clients !</p>
					</div>
					<div class=" col-sm-12 col-md-6 droite">
						<h1>Vélo Classique</h1><hr>
						<h2>Assurance vol et casse</h2>
						<p>Vol: dans la maison voiture</p>
						<p>Casse: loisir compétition</p>
						<p>Zéro Vétusté</p>
						<p>4000 € de couverture mximale</p>
						<p>Franchise 10 % du sinistre min 100€</p>
						<p>Cotisation mensuelle sans frais à partir de </p>
						<p ><strong>9 €</strong></p>
						<p class="btn"><a href="#main" class="btn btn-info btn-lg"> Me prévenir</a></p>
					</div>
				</div>
			</div>
		</section>
		<!-- article -->
		<section class="container-fluid tableContenu">
			<div class="container" style="text-align: center;">
					<h1 style="text-align: center;">ON ASSURE MIEUX VOTRE VELO QUE TOUT LE MONDE!</h1>
					<table class="table table-light table-hover" >
						<thead class="thead-dark">
							<th class="right">Garantie de la police</th>
							<th class="right">Autres assurances</th>
							<th class="right"><img src="images/logo-electrique-assurancesvelo.png" class="tofTable"></th>
							<th><img src="images/logo-classique-assurancesvelo.png" class="tofTable"></th>
						</thead>
						<tbody>
							<tr>
							<td>Vol</td>
							<td><img src="images/circle.png" class="logoTable"> Limité</td>
							<td><img src="images/success.png" class="logoTable"> Oui</td>
							<td><img src="images/cancel.png" class="logoTable" > Non</td>
						</tr>
						<tr>
							<td>Casse du Vélo</td>
							<td><img src="images/success.png" class="logoTable"> Oui</td>
							<td><img src="images/success.png" class="logoTable"> Oui</td>
							<td><img src="images/success.png" class="logoTable"> Oui</td>
						</tr>
						<tr>
							<td>Casse Equipements Cycliste</td>
							<td><img src="images/cancel.png" class="logoTable" > Non</td>
							<td><img src="images/cancel.png" class="logoTable" > Non</td>
							<td><img src="images/success.png" class="logoTable"> Oui</td>
						</tr>
						<tr>
							<td>Acune Vétusté</td>
							<td><img src="images/cancel.png" class="logoTable" > Non</td>
							<td><img src="images/success.png" class="logoTable"> Oui</td>
							<td><img src="images/success.png" class="logoTable"> Oui</td>
						</tr>
						<tr>
							<td>Compétition</td>
							<td><img src="images/cancel.png" class="logoTable" > Non</td>
							<td><img src="images/cancel.png" class="logoTable" > Non</td>
							<td><img src="images/cancel.png" class="logoTable" > Non</td>
						</tr>
						<tr>
							<td>Transport</td>
							<td><img src="images/circle.png" class="logoTable"> Limité</td>
							<td><img src="images/success.png" class="logoTable"> Oui</td>
							<td><img src="images/success.png" class="logoTable"> Oui</td>
						</tr>
						</tbody>
						
					</table>
			</div>
		</section>
		<!--question  -->
		<div class="container-fluid contact">
			<div class="container contact-inner">
				<div class="row">
					<h1 id="main">Demandez un dévis <br><?php if(isset($msg)) echo"".$msg.""; ?>	</h1>
					<form method="post" action="veloAssurance.php" >
						<div class="row rowForm">
							<div id="formGauche" class="form-group col-sm-12 col-md-6">
								<input type="text" name="nom" placeholder="nom" class="form-control" required />
								<input type="email" name="email" placeholder="adresse mail" class="form-control"  required/>
								<input type="number" name="prix" placeholder="prix" class="form-control" max="2000" min="100"  required/>
							</div>
							<div id="formDroite" class="form-group col-sm-12 col-md-6">
								<input type="text" name="prenom" class="form-control"  placeholder="prenom" required/>
								<input type="text" name="tel" class="form-control"  placeholder="tel" required/>
								<input type="date" name="annee"  class="form-control"  placeholder="annee" required/>
							</div>
						</div>
						<div class="btn"><button type="submit" name="btn" class="btn btn-warning btn-lg" />Obtenez votre devis</button></div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>