<?php
require_once("connexionMysql.inc.php");
$requete="SELECT reference,prix  FROM articles WHERE reference='ART56' ";
$resultat=mysql_query($requete);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
</head>

<body>

<form id="monform" name="form1" method="post" action="articlesAjout.php">
  <p>
    <label>Référence :
      <input type="text" name="reference"  />
    </label>
  </p>
  <p>
    <label>Prix :
      <input type="text" name="prix"  />
    </label>
  </p>
  <p>
    <label>Description :
      <input type="text" name="description"  />
    </label>
  </p>
  <p>
    <label>Famille :
      <select name="famillesID" id="famillesID">
 		<option value="1">Guitare</option>
		<option value="2">Accessoire</option>
   </select>
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