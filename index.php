<?php 
    session_start();
    require_once("connexion.inc.php");
    // var_dump($_POST);
    if(isset($_POST['btnConnexion'])){

        if(!empty($_POST['login'] && $_POST['password'])){
            $select=$bdd->query("SELECT * FROM users");
            $donneeSelect=$select->fetch();

            if($donneeSelect['login']==$_POST['login'] && $donneeSelect['password']==$_POST['password']){
                $_SESSION['login']=$_POST['login']; $_SESSION['password']=$_POST['password'];
                header("Location:admin/index.php");
            }else{
               $error="Error d'identification";
            }
        }else{
            $chps="Champs vide !";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Identification Form</title>
</head>
<body>
    <!-- include header-->
    <?php 
        include("header.inc.php");
    ?>

     <!-- main page -->
    
    <div id="main_page">
        <form action="index.php" method="post">
        <strong><?php if(isset($error)) echo $error;  if(isset($chps)) echo $chps; ?></strong>
            <div class="group">
                <label for="login">Login</label><input type="text" name="login" id="login">
            </div>
            <div class="group">
                <label for="password">Password</label><input type="password" name="password" id="password">
            </div>
            <div class="group">
                <input type="submit" name="btnConnexion" value="Connexion">
            </div>
            
        </form>
    </div>
    
</body>
</html>