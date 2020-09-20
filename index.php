<?php 
    // session
    session_start();
    // include file connexion in bdd
    require "connexion.inc.php";
    // soumission du btn connexion
    if(isset($_POST['btnConnexion'])){
        // si le champs n'est pas vide
        if(!empty($_POST['login'] && $_POST['password'])){
            // query select all user in bdd
            $queryUser = $bdd->query("SELECT * FROM user");
           $error = '';
            while($dataUser = $queryUser->fetch()){
                // echo"<pre>";
                // print_r($dataUser['login']);
                // echo"</pre>";
                $error = [];
                if($dataUser['login'] != $_POST['login'] || $dataUser['password'] != $_POST['password']){
                   $error[] = "Erreur d'identification";
                }else{
                    $_SESSION['login'] = $_POST['login'];
                    $_SESSION['password'] = $_POST['password'];
                    header("Location:./admin/index.php");
                }
                
            }$queryUser->closeCursor();
            if(count($error) != 0){
                echo"<p>".$error[0]."</p>";
            }
            unset($error[0]);
        }else{
            echo"Champs vide";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page | Accueil</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <label for="login">Login</label>
            <input type="text" name="login" id="login" placeholder="Login" value="<?php if(isset($_POST['login'])) ECHO $_POST['login']; ?>">
        </div>
        <div>
            <label for="password">Mots de passe</label>
            <input type="password" name="password" id="password" placeholder="Mots de passe">
        </div>
        <input type="submit" value="Connexion" name="btnConnexion" id="btnConnexion">
    </form>
</body>
</html>