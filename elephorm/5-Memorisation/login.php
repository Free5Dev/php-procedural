<?php 
  session_start();
?>
<?php 
  if(isset($_POST['btnConnexion']))
  {
    if(!empty($_POST['pseudo'] and $_POST['password']))
    {
      if($_POST['pseudo']=="said" and $_POST['password']=="1234")
      {
        $_SESSION['pseudo']='said';   $_SESSION['password']='1234';
        header("Location:admin/articlesGestion.php");
      }
      else
      {
        $error="Error";
      }
    }
    else
    {
      $chps="Champs vide";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Identification de redirection</h1>
    <?php if(isset($chps)) echo $chps; if(isset($error)) echo $error;  ?>
   <form action="login.php" method="post">
     <fieldset>
      <legend>Identification</legend>
        <label for="pseudo">Pseudo</label><br>
        <input type="text" name="pseudo" id="pseudo"/><br/>
        <label for="password">password</label><br>
        <input type="password" name="password" id="password"/><br><br>
        <input type="submit" name=" btnConnexion" value ="Connexion"/> 
        <input type="reset" name="btnAnnuler" value="Annuler"/>
     </fieldset>
   </form>
   <?php print_r($_POST); ?>
</body>
</html>