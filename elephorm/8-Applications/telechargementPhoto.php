<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Test téléchargement photo</title>
</head>
<body>
	<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="photo">Photo</label>
		<input type="file" name="photo" id="photo"/>
		<input type="submit" name="btn" value="Télécharger"/>
	</form>

	<?php 
		echo"<pre>";
		print_r($_FILES);
		echo"</pre>";
	?>
</body>
</html>