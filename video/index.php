<?php 
	// connexion
	require_once("connexion.php");
	$req=$bdd->query("SELECT * FROM video");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
</head>
<body>
	<div class="container">
		
		<?php while($donnees=$req->fetch()) { ?>
	<h1><?php echo $donnees['titre']; ?></h1>
	<p><?php echo $donnees['artisite']; ?></p>
	<p><iframe width="350" height="150" src="<?php echo $donnees['url']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><br>
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-share-button" data-href="http://localhost/phpProcedural/video/" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2FphpProcedural%2Fvideo%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager sur Facebook</a></div>

<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.12';
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<div class="fb-comments" data-href="http://localhost/phpProcedural/video/" data-width="700" data-numposts="5"></div>
	</p>



	<p><?php echo $donnees['dateUrl']; ?></p>
	<?php } $req->closeCursor(); ?>
	</div>
</body>
</html>