<?php  
    //appel de la fonction connection
    require_once("connection.inc.php");
    //verification de l'exisitance du bouton
    if(isset($_POST['btn']))
    {
        if(!empty($_POST['email'] ) and !empty($_POST['message']))
        {
            $req=$bdd->prepare('insert into formulaire(email,message) values(?,?)');
            $req->execute(array($_POST['email'],$_POST['message']));
            $succes="Message Inséré";
        }
        else
        {
            $chps="Les champs avec (*) sont obligatoires";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Portfolio de Soumah Thierno Saïdou</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
<link rel="icon" type="image/.png" href="images/ninja.png".png" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /><![endif]-->

<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/moveme.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>

<!-- End Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Free5Dev</a>
    </div> 
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#apropos">A propos</a></li>
            <li><a href="#competence">Compétences</a></li>
            <li><a href="#experience">Experience</a></li>
            <li><a href="#formation">Formation</a></li>
            <li><a href="#contact">Contact</a></li>
           <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Social <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="http://www.facebook.com/saidsoumah@gmail.com">Facebook</a></li>
                    <li><a href="http://www.twitter.com">Twitter</a></li>
                    <li><a href="https://plus.google.com/saidsoumah@gmail.com">Google+</a></li>
                    <li><a href="http://www.linkedin.com/saidsoumah@gmail.com">LinkedIn</a></li>
                </ul>
            </li>
        </ul>
    </div>    
</nav>
<!-- fin navbar -->
<?php include("carousel.inc.php"); ?>
<!-- End Carousel -->
<div class="section">
	<div class="container">
		<h2 id="apropos">Bonjour et Bienvenue sur mon portfolio</h2><hr>
		<div class="row">
			<div class="col-sm-12">
				<p><strong class="text-primary">SOUMAH THIERNO SAÏDOU </strong>, 25 ans <br/><strong class="text-primary">Développeur Web à la recherche d'Entreprise</strong>.</p>
				<p>Venant d'une licence en programmation et Développement à sup'info Dakar,actuellement je suis étudiant au sein d'Etna à la recherche
				d'entreprise dans le domaine du web.<br/>
				Ce portfolio a pour but de présenter mon parcours de Développeur web et de m'aider à trouver une entreprise en tant que Développeur web.</p>
				<p>Si vous avez une question,ou si vous avez simplement besoin d'un renseignement ,vous pouvez me contacter en cliquant ici:<a href="#contact" class="btn btn-link">Contactez-moi</a>.</p>
				<a href="CvSaidSoumah.pdf" target="_blanck" class="btn btn-primary"><b class="glyphicon glyphicon-download-alt"></b> Télécharger mon CV</a>
			</div>
			<!-- <div class="col-sm-3">
				<img src="images/free.jpg" class="img-responsive img-circle"/>
			</div> -->
		</div>
	</div>
</div>
<!-- end apropos -->
<div class="sectionC">
	<div class="container">
		<h2 id="competence">Compétences Techniques</h2>
		<p>Les différents domaines que je maîtrise</p>
		<div class="row tpad myTooltip">
        <div class="col-sm-6 col-md-4 bpad">
            <a href="#" data-toggle="tooltip" title data-original-title="compétence html5-css3: 100%" class="thumbnail">
                <img src="images/html5css3.png" alt="logo">
            </a>
        </div>
        <div class="col-sm-6 col-md-4 bpad">
            <a href="#" data-toggle="tooltip" title data-original-title="compétence Github: 50%" class="thumbnail">
                <img src="images/github.png" alt="logo">
            </a>
        </div>
        <div class="col-sm-6 col-md-4 bpad">
            <a href="#" data-toggle="tooltip" title data-original-title="compétence Bootstrap: 80%" class="thumbnail">
                <img src="images/Bootstrap.png" alt="logo">
            </a>
        </div>
        <div class="col-sm-6 col-md-4 bpad">
            <a href="#" data-toggle="tooltip" title data-original-title="compétence Php-Mysql: 70%" class="thumbnail">
                <img src="images/phpMysql.png" alt="logo">
            </a>
        </div>
        <div class="col-sm-6 col-md-4 bpad">
            <a href="#" data-toggle="tooltip" title data-original-title="compétence Wordpress: 50%" class="thumbnail">
                <img src="images/wordpress.jpg" alt="logo">
            </a>
        </div>
        <div class="col-sm-6 col-md-4 bpad">
            <a href="#" data-toggle="tooltip" title data-original-title="compétence SQL: 100%" class="thumbnail">
                <img src="images/SQL.png" alt="logo">
            </a>
        </div>
    </div>
	</div>
</div>
<!-- end competence -->
<div class="sectionE">
	<div class="container">
		<h2 id="experience">Expérience professionnelle</h2>
		<p>Les projets que j'ai réalisés</p>
		<div class="row">
			<div class="col-md-1">
			<button type="button" class="btn btn-danger btn-circle btn-lg">2017</button>
			</div>
			<div class="col-md-10">
				<div class="well">
					<p><strong class="text-primary">Création d'un site vitre pour "SAS Vision Jeune" </strong><br/>
					<strong class="text-primary text-large">.</strong>C'est un site pour une agence de voyage en Guinée.<br/>
					<strong class="text-primary text-large">.</strong>Technologie utilisée:Bootstrap,html5-css3,Php-Mysql.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1">
			<button type="button" class="btn btn-danger btn-circle btn-lg">2016</button>
			</div>
			<div class="col-md-10">
				<div class="well">
					<p><strong class="text-primary">Création d'un site "E-commerce" pour la validation de la licence 2 </strong><br/>
					<strong class="text-primary text-large">.</strong>C'est un projet pour la validation de la licence 2.<br/>
					<strong class="text-primary text-large">.</strong>Technologie utilisée:Bootstrap,html5-css3,Php-Mysql avec système panier et toutes les fonctionnalités d'un site de vente.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1">
			<button type="button" class="btn btn-danger btn-circle btn-lg">2015</button>
			</div>
			<div class="col-md-10">
				<div class="well">
					<p><strong class="text-primary">Participation à la création de la plateforme Educative "Mère Dem" </strong><br/>
					<strong class="text-primary text-large">.</strong>C'est une plateforme éducative pour le Groupe Scolaire Privée Mère Dem basé sur le suivi parental et le partage des cours entre les élèves et les profs.<br/>
					<strong class="text-primary text-large">.</strong>Technologie utilisée:Bootstrap,html5-css3,Php-Mysql et Ajax et Oracle comme base de données.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1">
			<button type="button" class="btn btn-danger btn-circle btn-lg">2014</button>
			</div>
			<div class="col-md-10">
				<div class="well">
					<p><strong class="text-primary">Stage de Deux mois au sein de la startup Guinéenne "Free5Dev". </strong><br/>
					<strong class="text-primary text-large">.</strong>C'est un stage au sein d'une startup qui crée des applications multiplateformes.<br/>
					<strong class="text-primary text-large">.</strong>Technologie utilisée:Bootstrap,html5-css3,Php-Mysql,Github,Java.</p>
				</div>
			</div>
		</div>
    </div>
</div>
<!-- end zxperience -->
<div class="sectionF">
    <div class="container">
        <div class="row">
            <h2 id="formation">Formation</h2>
            <p>Mon parcours Scolaire</p>
            <div class="col-lg-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordian-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-certificate"></span> <strong class="text-primary">2017-2020:</strong> Cycle d'ingénierie Architecte Logiciel Développeur d'Applications </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                                Préparation d'un BAC+5 en trois ans en Architecture Logiciel et Développement d'applications au sein d'Etna à Ivry-Sur-Seine.
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordian-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-certificate"></span> <strong class="text-primary">2017:</strong> Préparation à une insertion professionnelle au SUMMPPS de Nantes</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                                Préparation à une insertion professionnelle au sein de la maison des services étudiantes  de Nantes
                        </div>
                    </div>
                </div>
                <div class="panel" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordian-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-certificate"></span> <strong class="text-primary">2014-2016:</strong> Licence en Programmation et Développement à Supinfo Dakar</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                                De 2014 à 2016:J'ai fais ma licence en Programmation et Développement au sein de Supinfo International Academy of Dakar
                        </div>
                    </div>
                </div>
                <div class="panel" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordian-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-certificate"></span> <strong class="text-primary">2014:</strong> Attestation de formation en C#</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                                En 2014 j'ai fais une formation de 4 jours en C_sharp à Dakar à travers la quelle on as crée une application de pointage pour un hôtel à Dakar
                        </div>
                    </div>
                </div>
                 <div class="panel" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordian-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-certificate"></span> <strong class="text-primary">2011:</strong> Baccalauréat Scientifique en Guinée</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                               J'ai passé mon Baccalauréat en Science Mathématique au Lycée 1 ers Mars de Matam en Guinée Conakry
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End formation -->
<div class="sectionContact">
	<div class="container">
		<h2 id="contact">Contacter Moi!</h2>
		<p>N'hésitez pas à me contacter pour plus d'informations.</p>
		<div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2619.814796616297!2d2.341271115677866!3d48.957012279297246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6693d627e24b5%3A0x987b34abd4c91b32!2s4+Rue+Pablo+Neruda%2C+93430+Villetaneuse!5e0!3m2!1sfr!2sfr!4v1507192916730" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="container">
			<div class="col-sm-6">
				<form method="post" action="" class="form" style="margin-top: 10px;">
                    <?php if(isset($succes))
                        {
                         echo $succes; 
                        }
                        if(isset($chps))
                        {
                            echo "<span class='text-danger'>".$chps."</span>";
                        }

                     ?>
					<div class="form-group">
						<label for="email">Email*</label>
						<input type="email" name="email" class="form-control" id="email" placeholder="Ex:saidsoumah@gmail.com">
					</div>
					<div class="form-group">
						<label for="message">Message*</label>
						<textarea name="message" class="form-control" id="message" placeholder="Ex:Message..." rows="8"></textarea>
					</div>
					<button type="submit" name="btn" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Valider</button>
				</form>
			</div>
			<div class="col-sm-6">
				<h3 class="text-primary">Citation Favorite</h3><hr>
					<p>&ldquo;  
					J'ai un ami qui a réussi tous ses examens. Moi j'ai échoué à tous. Lui est ingénieur chez Microsoft.Moi je suis le fondateur.
					.&rdquo;</p>
					 <p><small>Bill Gates, <cite title="source title">Fondateur Microsoft.</cite></small></p><hr>
					 <h3 class="text-primary"> Soumah Thierno Saïdou</h3>
					 <p><strong>Email:</strong> <a href="mailto:saidsoumah@gmail.com">saidsoumah@gmail.com</a><br/>
					 <strong> 4 rue Pablo Neruda 93430 Villetaneuse</strong><br>
					 <strong>Tel:</strong> 06-05-89-75-53/07-69-44-38-85</p><br/><br/>
					 <p>SaidSoumah@Copyright2017:Tous droits réservés</p>

			</div>
		</div>
	</div>
</div>
<!-- end contact -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script> 
<script>
    $(function () {
        $('.myTooltip').tooltip({
            selector: "[data-toggle=tooltip]",
            container: "body"
        })
    })
</script> 
<script>
$(function (){
    $('.carousel').carousel({
        interval: 4000
    });
})    
</script>
</body>
</html>