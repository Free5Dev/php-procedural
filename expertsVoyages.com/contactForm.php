<?php  
	require_once("connexion.inc.php");
  // inscription 
	// contact
  if(isset($_POST['btnContact']))
  {
    if(!empty($_POST['nomPrenom'] and $_POST['emailContact'] and $_POST['messageContact']))
    {
      $reqContact=$bdd->query("INSERT INTO contact SET nomPrenom=?,email=?,messageContact=?");
      $reqContact->execute(array($_POST['nomPrenomContact'],$_POST['emailContact'],$_POST['messageContact']));
      echo"Message posté avec succès...!";
    }
    else
    {
     $echo"Tous les champs sont obligatoire veuillez les remplir....";
    }
  }
?>