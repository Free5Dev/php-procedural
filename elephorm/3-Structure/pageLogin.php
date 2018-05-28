<?php
if(isset($_POST['bouton']))
{
	if($_POST['code']=='1234')
	{
	header("Location:pagePrivee.php");
	}
	else
	{
	$erreur="code incorrect";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
<?php
//affichage d'un tableau
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>
<?php
if(isset($erreur)) echo "<h2>VOTRE CODE EST INCORRECT</h2>";
?>

<form id="monform" name="form1" method="post" action="pageLogin.php">
  <p>
    <label>Code :
      <input type="text" name="code"  />
    </label>
  </p>
  
  <p>
    <label>
      <input type="submit" name="bouton"  value="Envoyer" />
    </label>
  </p>
</form>
</body>
</html>
