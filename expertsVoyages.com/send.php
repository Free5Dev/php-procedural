<?php
  //connexion à la bdd
  require_once("connexions.inc.php");
  // php mailer
  $mssg="";
  use PHPMailer\PHPMailer\PHPMailer;
  include_once "PHPMailer/PHPMailer.php";
  include_once "PHPMailer/Exception.php";

  $mail=new PHPMailer();
  $envoy=array("saidsoumah@gmail.com"=>"said soumah","freezysoumah@gmail.com"=>" Free soumah");
  foreach ($envoy as $emailFr => $nom) {
    $mail->setFrom($emailFr,$nom);
  }
  
  
  // inscription 
  if(isset($_POST['btnInscription']))
  {
    $reqInscription=$bdd->prepare("INSERT INTO preinscription SET civiliteInscript=?,prenomInscript=?,nomInscript=?,dateInscript=?,adresseInscript=?,telInscript=?,emailInscript=?,formationInscript=?,niveauInscript=?,destinationInscript=?,entretienInscript=?,messageInscript=?");
    $reqInscription->execute(array($_POST['civiliteInscription'],$_POST['prenomInscription'],$_POST['nomInscription'],$_POST['dateInscription'],$_POST['adresseInscription'],$_POST['telInscription'],$_POST['emailInscription'],$_POST['formationInscription'],$_POST['niveauInscription'],$_POST['destinationInscription'],$_POST['entretienInscription'],$_POST['messageInscription']));
      $success="Votre préinscription est faite on vas revenir vers vous très vite....A bientôt";
  }
  // Billet
  if(isset($_POST['btnBillet']))
  {
    if(!empty($_POST['prenomBillet'] and $_POST['nomBillet'] and $_POST['villeDepartBillet'] and $_POST['villeArriveBillet'] and $_POST['dateBillet'] and $_POST['telBillet'] and $_POST['emailBillet'] and $_POST['messageBillet'] ))
    {
       $reqBillet=$bdd->prepare("INSERT INTO billets SET civiliteB=?,prenomB=?,nomB=?,villeDepartB=?,villeArriveB=?,dateB=?,telB=?,emailB=?,entretienB=?,messageB=?");
      $reqBillet->execute(array($_POST['civiliteBillet'],$_POST['prenomBillet'],$_POST['nomBillet'],$_POST['villeDepartBillet'],$_POST['villeArriveBillet'],$_POST['dateBillet'],$_POST['telBillet'],$_POST['emailBillet'],$_POST['entretienBillet'],$_POST['messageBillet']));
      $billet="Votre demande de reservation à été pris en compte on vas revenir vers vous....A bientôt";
    }
    else
    {
      $chps="Tous les champs sont obligatoire veuillez les remplir....";
    }
   
  }
  // contact
  if(isset($_POST['btnContact']))
  {
    if(!empty($_POST['nomPrenomContact'] and $_POST['emailContact'] and $_POST['messageContact']))
    {
      // phpmailer
      $nomPrenomContact=$_POST['nomPrenomContact'];
      $emailContact=$_POST['emailContact'];
      $messageContact=$_POST['messageContact'];

      $reqContact=$bdd->prepare("INSERT INTO contact SET nomPrenom=?,email=?,messageContact=?");
      $reqContact->execute(array($_POST['nomPrenomContact'],$_POST['emailContact'],$_POST['messageContact']));
      $suc="Message posté avec succès...!";

      $mail->addAddress($emailContact,'');
      $mail->nomPrenomContact=$nomPrenomContact;
      $mail->messageContact=$messageContact;
      $mail->Subjet='Message de mon php mailer';
      $mail->isHTML(true);
      $mail->Body="Bonjour M : ".$nomPrenomContact." nous avons bien réussi votre message et on va revenir vers vous bientôt <br/> Cordialement.";

      if(!$mail->send())
      {
        $mssg="<br> Veuillez réessayer".$mail->ErrorInfo;
      }
      else
      {
        $mssg="Votre email a été envoyé, merci!";
      }
    }
    else
    {
     $chpss="Tous les champs sont obligatoire veuillez les remplir....";
    }
  }
  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta http-equiv="x-ua-compatible" content="ie=edge">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="icon" type="images/airplane.png" href="images/airplane.png">

    <title>Experts Voyage</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <a class="navbar-brand" href="index.php"><strong>EXPERTS VOYAGES</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ouvreToggle" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="ouvreToggle">
        <ul class="navbar-nav mr-auto justify-content-around">
          <li class="nav-item active">
            <a class="nav-link" href="#welcom">ACCUEIL <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services">NOS SERVICES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#inscriptions">INSCRIPTION EN LIGNE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#billetAvion">BILLETS D'AVION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#temoignage">TEMOIGNAGES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">CONTACT</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <!-- carousel -->
    <section id="carousel">
       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
              <img  src="images/tofCarousel2.jpg" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>BONJOUR</h5>
               <a href="" class="btn btn-lg btn-outline-primary">Par Ici</a>
              </div>
            </div>
            <div class="carousel-item ">
              <img  src="images/tofCarousel3.jpg" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>BONJOUR</h5>
                 <a href="" class="btn btn-lg btn-outline-primary">Par Ici</a>
              </div>
            </div>
            <div class="carousel-item ">
              <img  src="images/carousel.jpg" alt="First slide" style="width: 100%;">
              <div class="carousel-caption d-none d-md-block">
                <h5>BONJOUR</h5>
                 <a href="" class="btn btn-lg btn-outline-primary" >Par Ici</a>
              </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>


    <!-- welcom -->
    <section id="welcom">
      <article class="container">
        <div class="row">
          <h1>Bonjour et Bienvenue </h1><hr>
        <p>L'agence <span>Voyages Etudes</span> est créée en 2018 par, Mr <strong><a href="https://www.linkedin.com/in/saidsoumah" target="_blank">S SOUMAH</a></strong> .<br><br><br>
          L'agence Voyages Etudes est une agence d'orientations et d'informations des études supérieures de la  Guinée pour l'étranger.  <br><br>
          L'objectif de Voyages Etudes est d'orienter les Bacheliers, Etudiants et professionnels pour leurs études et formations supérieures à l'étranger; avec la collaboration des ses différents partenaires.</div>
        </p>
      </article>
    </section>

    
    <!-- informations -->
    <section id="information">
      <div class="row">
         <article id="information-inner" class="col-md-8 col-sm-12">
        
      </article>
      <article id="information-contenue" class="col-md-4 col-sm-12">
        <h2>A votre attention</h2>
        <p>pour les renseignements téléphoniques nous sommes joignables les jours ouvrables du Lundi au Vendredi de 9h00 à 20h00 et <br> 
          le Samedi de 9h00 à 14h00. <br><br> Adresse: Guinée Conakry Belle vue Carrefour....<br>Téléphone:<em class="text-danger">+ 0102030405</em> </p>
      </article>
      </div>
     
    </section>
    <!-- nos services -->
    <section id="nosServices">
          <h1 id="services">Nos Services</h1><hr>
<!--       <article class="container">
 -->        <div class="row">
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/008-passport.png" alt=""  /></a>
                <figcaption>Billet d'Avion</figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/018-france.png" alt=""  /></a>
                <figcaption>Etudier en France</figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/online-booking.png" alt=""  /></a>
                <figcaption>Reservation d'hôtel </figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/005-location.png" alt=""  /></a>
                <figcaption>Logement en France</figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/014-united-states.png" alt=""  /></a>
                <figcaption>Etudier aux Etats Unis</figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/015-canada.png" alt=""  /></a>
                <figcaption>Etudier au Canada</figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/016-england.png" alt=""  /></a>
                <figcaption>Etudier en Angleterre</figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/012-turkey.png" alt=""  /></a>
                <figcaption>Etudier en Turquie </figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/013-malasya.png" alt=""  /></a>
                <figcaption>Etudier en Malaisie</figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/011-china.png" alt=""  /></a>
                <figcaption>Etudier en Chine</figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/017-belgium.png" alt=""  /></a>
                <figcaption>Etudier en Belgique</figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/001-morocco.png" alt=""  /></a>
                <figcaption>Etudier au Maroc </figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/010-senegal.png" alt=""  /></a>
                <figcaption>Etudier au Sénégal</figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/007-maps-and-flags.png" alt=""  /></a>
                <figcaption>Séjours Lingustiques</figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
             <a href="#"> <img src="images/002-visa.png" alt=""  /></a>
                <figcaption>Loterie Américaine</figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/003-transfer.png" alt=""  /></a>
                <figcaption>Transfert d'argent</figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/009-mecca.png" alt=""  /></a>
                <figcaption>Pélérinage</figcaption>
            </figure>
          </div>
          <div class="col-md-2 col-sm-6">
            <figure>
              <a href="#"><img src="images/006-insurance.png" alt=""  /></a>
                <figcaption>Assurance Voyage</figcaption>
            </figure>
          </div>
          
<!--       </article>
 -->    </section>


        <!-- inscription -->
        <section id="inscription">
          <div class="row">
            <div class="col-md-6 col-sm-12 inscriptiongauche">
            
            </div>
            <div class="col-md-6 col-sm-12 inscriptiondroite">
              <h2 id="inscriptions" style="color:#fff;">Préinscription en ligne <br><small>veuillez remplir le formulaire</small></h2>
              <form class="form" method="post" action="index.php">
              <div class="form-group">
                <span class="text-primary"><?php if(isset($success)) echo $success; ?></span>
                <!-- <label for="civilite">Civilité</label> -->
                <select name="civiliteInscription" id="civilite" class="form-control form-control-md col-md-6">
                  <optgroup label="Civilité">
                  <option value="1">Monsieur</option>
                  <option value="2">Mademoiselle</option>
                  <option value="3">Madame</option>
                  </optgroup>
                </select>
              </div>
              <div class="form-group">
                 <!-- <label for="prenom">Prenom</label> -->
                <input type="text" name="prenomInscription" placeholder="Prénom..." class="form-control form-control-md col-md-10" required/>
              </div>
              <div class="form-group">
                <!--  <label for="nom">Nom</label> -->
                <input type="text" name="nomInscription" placeholder="Nom..." class="form-control form-control-md col-md-10" required/>
              </div>
              <div class="form-group">
                <!-- <label for="date">Date</label> -->
                <input type="date" name="dateInscription" id="date" placeholder="Date..." class="form-control form-control-md col-md-10" required/>
              </div>
              <div class="form-group">
                <!-- <label for="adresse">Adresse domicile</label> -->
                <input type="text" name="adresseInscription" id="adresse" placeholder="adresse..." class="form-control form-control-md col-md-10" required/>
              </div>
              <div class="form-group">
                <!-- <label for="tel">Téléphone</label> -->
                <input type="tel" name="telInscription" id="tel" placeholder="Tel: 01-02-03" class="form-control form-control-md col-md-10" required/>
              </div>
              <div class="form-group">
                 <!-- <label for="email">Email:</label> -->
                <input type="email" name="emailInscription" id="email" placeholder="voyages-etudes@gmail.com" class="form-control form-control-md col-md-10" required/>
              </div>
               <div class="form-group">
                <!--  <label for="formation">Formation de choix:</label> -->
                <input type="text" name="formationInscription" id="formation" placeholder="Formation: Informatique" class="form-control form-control-md col-md-10" required/>
              </div>
              <div class="form-group">
                 <!-- <label for="niveau">Niveau envisagé pour la formation:</label> -->
                <select name="niveauInscription" id="civilite" class="form-control form-control-md col-md-6 col-md-10">
                  <option value="1">1 ère Année</option>
                  <option value="2">2 ème Année</option>
                  <option value="3">Licence/Licence pro</option>
                  <option value="4">Master 1</option>
                  <option value="5">Master 2</option>
                  <option value="6">Autres...</option>
                </select>
              </div>
               <div class="row">
                 <div class="col">
                    <label for="destination" style="color:#fff;">Destination:</label>
                    <select name="destinationInscription" id="destination" class="form-control col-md-8">
                      <option value="1">France</option>
                      <option value="2">Canada</option>
                      <option value="3">USA</option>
                      <option value="4">Chine</option>
                      <option value="5">Malaisie</option>
                      <option value="6">Turquie</option>
                      <option value="7">Angleterre</option>
                      <option value="8">Maroc</option>
                      <option value="9">Sénégal</option>
                    </select>
                 </div>
                 <div class="col">
                   <label for="entretien" style="color:#fff;">Je suis disponible pour m'entretenir à :</label>
                    <select name="entretienInscription" id="destination" class="form-control col-md-8">
                      <option value="1">Tout moment</option>
                      <option value="2">Entre 9h00 et 11h00</option>
                      <option value="3">Entre 11h00 et 14h00</option>
                      <option value="4">Entre 14h00 et 17h00</option>
                      <option value="5">Entre 17h00 et 20h00</option>
                    </select>
                 </div>
              </div>
              <div class="form-group">
                <label for="messageInscription" style="color:#fff;">Message</label>
                <textarea name="messageInscription" rows="3" class="form-control form-control-lg col-md-10" required></textarea>
              </div>
              <button type="submit" name="btnInscription" class="btn btn-outline-primary btn-lg">Valider...!</button>
            </form>
            </div>
          </div>
        </section>




        <!-- billets d'avion -->
        <section id="billetAvion">
            <div class="row">
               <div class="col-md-7 col-sm-12 billetGauche">
                <h1 class="text-primary">Billets d'Avion en promotion</h1>
                <p><small>Veuillez remplir le formulaire pour voir nos prix</small></p>
                  <form class="form" method="post" action="index.php">
                  <span class="text-primary"><?php if(isset($billet)) echo $billet; ?></span>
                   <span class="text-danger"><?php if(isset($chps)) echo $chps; ?></span>
                  <div class="form-group">
                    <!-- <label for="civilite">Civilité</label> -->
                    <select name="civiliteBillet" id="civilite" class="form-control form-control-md col-md-6">
                      <option value="1">Monsieur</option>
                      <option value="2">Mademoiselle</option>
                      <option value="3">Madame</option>
                    </select>
                  </div>
                  <div class="form-group">
                 <!-- <label for="prenom">Prenom</label> -->
                    <input type="text" name="prenomBillet" placeholder="Prénom..." class="form-control form-control-md col-md-10" />
                  </div>
                  <div class="form-group">
                    <!--  <label for="nom">Nom</label> -->
                    <input type="text" name="nomBillet" placeholder="Nom..." class="form-control form-control-md col-md-10" />
                  </div>
                  <div class="form-group">
                 <!-- <label for="prenom">Prenom</label> -->
                <input type="text" name="villeDepartBillet" placeholder="Ville de départ..." class="form-control form-control-md col-md-10" />
              </div>
              <div class="form-group">
                <!--  <label for="nom">Nom</label> -->
                <input type="text" name="villeArriveBillet" placeholder="Ville d'arriver ..." class="form-control form-control-md col-md-10" />
              </div>
              <div class="form-group">
                <!-- <label for="date">Date</label> -->
                <input type="date" name="dateBillet" id="dateVol" placeholder="Date..." class="form-control form-control-md col-md-10" />
              </div>
              <div class="form-group">
                <!-- <label for="tel">Téléphone</label> -->
                <input type="tel" name="telBillet" id="telVol" placeholder="Tel: 01-02-03" class="form-control form-control-md col-md-10" />
              </div>
              <div class="form-group">
                 <!-- <label for="email">Email:</label> -->
                <input type="email" name="emailBillet" id="email" placeholder="voyages-etudes@gmail.com" class="form-control form-control-md col-md-10" />
              </div>
              <div class="form-group">
                <label for="entretienBillet" style="color:#181818;">Je suis disponible pour m'entretenir à :</label>
                    <select name="entretienBillet" id="entretienBillet" class="form-control col-md-8">
                      <option value="1">Tout moment</option>
                      <option value="2">Entre 9h00 et 11h00</option>
                      <option value="3">Entre 11h00 et 14h00</option>
                      <option value="4">Entre 14h00 et 17h00</option>
                      <option value="5">Entre 17h00 et 20h00</option>
                    </select>
              </div>
               <div class="form-group">
                <label for="messageBillet" style="color:#181818;">Message</label>
                <textarea name="messageBillet" id="messageBillet" rows="3" class="form-control form-control-lg col-md-10" ></textarea>
              </div>
              <button type="submit" name="btnBillet" class="btn btn-outline-primary btn-lg">Valider...!</button>
              </div>
              <div class="col-md-4 col-sm-12 billetDroite">
                <h3 class="text-danger">Billets d'avion en Promo</h3>
                <p>Réservez dès maintenant chez <span class="text-primary">Voyages-Etudes</span> et bénéficiez de notre promotion...!</p>
                <marquee> <img src="images/airplane1.png"></marquee>
              </div>
             
            </div>
        </section>



        <!-- temoignages -->
        <section id="temoignage">
          <div class="container">
            <h1>Témoignages</h1><hr>
            <div class="row">
              <div class="col-md-4 col-sm-12 temoignageGauche">
               <figure>
                 <figcaption>Etudiant Guinéenns de France</figcaption>
                  <img src="images/006-temple.png" class="rounded-circle" style="border:1px solid black;">
                  <p>bla bla bla avec braucoup de text également</p>    
               </figure>
              </div>
              <div class="col-md-4 col-sm-12 temoignageCentre">
                <figure>
                 <figcaption>Des étudiants Guinéenns de Turquie</figcaption>
                  <img src="images/006-temple.png" class="rounded-circle" style="border:1px solid black;">
                  <p>bla bla bla avec braucoup de text également</p>    
               </figure>
              </div>
              <div class="col-md-4 col-sm-12 temoignageDroite">
                <figure>
                 <figcaption>Etudiants Guinéenns de Canada</figcaption>
                  <img src="images/006-temple.png" class="rounded-circle" style="border:1px solid black;">
                  <p>bla bla bla avec braucoup de text également</p>    
               </figure>
              </div>
            </div>
          </div>
        </section>


        <!-- footer -->
        <footer id="contact">
          <div class="container">
            <h1 class="display-6">Entre en contact avec nous</h1><hr>
            <div class="row">
              <div class="col-md-6 col-sm-12 contactAdresse">
                <h3 class="text-primary">Adresse</h3>
                <p><img src="images/facebook-placeholder-for-locate-places-on-maps.png">Guinée Conakry-Belle vue Carrefour...</p>
                <p><img src="images/call.png"> Téléphone:<span class="text-danger">01 01 010 10 </span></p><p><img src="images/gmail.png" alt="" title="Suivez nous sur Gmail"/> Email: 
                  <span class="text-danger ">Voyages-Etudes@gmail.com</span>
                </p>
                <figure>
                  <a href=""><img src="images/facebook-logo-button.png" alt="" title="Suivez nous sur Facebook" /></a>
                  <a href=""><img src="images/gmail.png" alt="" title="Suivez nous sur Gmail"/></a>
                  <a href=""><img src="images/linkedin-logo-button.png" alt="" title="Suivez nous sur linkedin"/></a>
                </figure>
              </div>
              <div class="col-md-6 col-sm-12 contactForm">
                <form method="post" class="form" action="index.php">
                   <span class="text-danger"><?php if(isset($chpss)) echo $chpss; ?></span>
                    <span class="text-primary"><?php if(isset($suc)) echo $suc; ?></span>
                    <span class="text-danger"><?php if(isset($mssg)) echo $mssg; ?></span>
                  <div class="row">
                    <div class="col">
                      <input type="text" name="nomPrenomContact" class="form-control" placeholder="Nom Prénom..." style="background-color:#333; color:#fff;" />
                    </div>
                    <div class="col">
                      <input type="email" name="emailContact" class="form-control" style="background-color:#333; color:#fff;" placeholder="Email..." />
                    </div>
                  </div><br>
                  <div class="form-group">
                    <textarea name="messageContact" rows="5" class="form-control" style="background-color:#333; color:#fff;" >
                      
                    </textarea>
                  </div>
                  <!-- <button type="submit" name="btnContact" target="_blank" class="btn btn-outline-secondary">Envoyez Message</button> -->
                  <input type="submit" name="btnContact" value="Validez" class="btn btn-outline-secondary btn-lg">
                </form>
              </div>
            </div>
          </div>
          <div class="copyright"><a href="http://www.saidsoumah.com" target="_blank">copyright@saidsoumah 2018 | Tous Droits réservés...!</a></div>
        </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>