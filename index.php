<?php 
    session_start();
    require_once("connexion.inc.php");
    var_dump($_POST);
    if(isset($_POST['btnConnexion'])){

        if(!empty($_POST['login'] && $_POST['password'])){
            $select=$bdd->query("SELECT * FROM users");
            $donneeSelect=$select->fetch();

            if($donneeSelect['login']==$_POST['login'] && $donneeSelect['password']==$_POST['password']){
                $_SESSION['login']=$_POST['login']; $_SESSION['password']=$_POST['password'];
                header("Location:admin/index.php");
            }else{
                echo"Error d'identification";
            }
        }else{
            echo"Champs vide !";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Identification Form</title>
</head>
<body>
    <form action="index.php" method="post">
        <div class="group">
            <label for="login">Login</label><input type="text" name="login" id="login">
        </div>
        <div class="group">
            <label for="password">Password</label><input type="password" name="password" id="password">
        </div>
        <input type="submit" name="btnConnexion" value="Connexion">
    </form>
</body>
</html>