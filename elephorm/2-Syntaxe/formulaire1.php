<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Les variables de formulaire</h1>
   <form action="action1.php" method="post">
     <fieldset>
      <legend>Identification</legend>
        <label for="pseudo">Pseudo</label><br>
        <input type="text" name="pseudo" id="pseudo"/><br/>
        <label for="password">password</label><br>
        <input type="password" name="password" id="password"/><br><br>
        <input type="submit" name=" btn" value ="Connexion"/> 
        <input type="reset" name="btnAnnuler" value="Annuler"/>
     </fieldset>
   </form>
</body>
</html>