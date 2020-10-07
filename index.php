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
                $errors = $error[0];
            }
            unset($error[0]);
        }else{
            $chps = "The field's empty please enter your identification";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <title>Login Page | Accueil</title>
</head>
<body>
    <header class="bg-success text-white">
        <div class="container">
            <h1><i class="fas fa-book-reader"></i> ZBOOK</h1>
        </div>
    </header>
    <div class="container alert alert-success">
        <h1><i class="fas fa-user"></i> Identification</h1>
        <?php if(isset($chps)) { ?> <p class="alert alert-warning"><?php  echo $chps;  ?> <?php } ?></p>
        <?php if(isset($errors)) { ?> <p class="alert alert-danger"><?php  echo $errors;  ?> <?php } ?></p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" id="login" placeholder="Login" value="<?php if(isset($_POST['login'])) ECHO $_POST['login']; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Mots de passe</label>
                <input type="password" name="password" id="password" placeholder="Mots de passe" class="form-control">
            </div>
            <button type="submit" name="btnConnexion" class="btn btn-outline-success" id="btnConnexion"><i class="fas fa-sign-in-alt"></i>Connexion </button>
        </form>
    </div>
    <footer class="bg-success text-white">
        <div class="container">
            <p><i class="fas fa-book-reader"></i> Copyright &copy; 2020 Tous droits Réservés</p>
        </div>
    </footer>
</body>
</html>