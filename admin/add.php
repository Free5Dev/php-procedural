<?php 
    session_start();
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        header("Location:../index.php");
    }
    require_once("../connexion.inc.php");
    // var_dump($_POST);
    // var_dump($_FILES);
    if(isset($_POST['btnAdd'])){
        
        if(!empty($_POST['nom'] && $_POST['prenom'] && $_POST['login']  && $_POST['sexe']) && $_FILES['photo']['error']==0){

           copy($_FILES['photo']['tmp_name'], "../images/".$_FILES['photo']['name']);
           $insert=$bdd->prepare("
                INSERT INTO users (nom, prenom, login, photo, sexeId) VALUES (:nom, :prenom, :login, :photo, :sexeId)
           ");
           $insert->bindParam(':nom', $_POST['nom']);
           $insert->bindParam(':prenom', $_POST['prenom']);
           $insert->bindParam(':login', $_POST['login']);
        //    $insert->bindParam(':password', $_POST['password']);
           $insert->bindParam(':photo', $_FILES['photo']['name']);
           $insert->bindParam(':sexeId', $_POST['sexe']);
           $insert->execute();

           header("Location: index.php");
        }else{
            echo"Chmps vide ";
        }
    }
    $selectSexe=$bdd->query("SELECT * FROM sexe");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>ADD USER</title>
</head>
<body>
     <!-- include header-->
     <?php 
        include("../header.inc.php");
    ?>
     <!-- main page -->
    
    <div id="main_page">

        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="group">
                <label for="nom">Nom</label><input type="text" name="nom" id="nom">
            </div>
            <div class="group">
                <label for="prenom">Prenom</label><input type="text" name="prenom" id="prenom">
            </div>
            <div class="group">
                <label for="login">Login</label><input type="text" name="login" id="login">
            </div>
            <!-- <div class="group">
                <label for="password">Password</label><input type="password" name="password" id="password">
            </div> -->
            <div class="group">
                <label for="photo">Download Photo</label><input type="file" name="photo" id="photo">
            </div>
            <div class="group">
                <label for="sexe">Sexe</label>

                <select name="sexe" id="sexe">
                    <?php while($donneeSexe=$selectSexe->fetch()) { ?>
                        <option value="<?php echo $donneeSexe['id']; ?>"><?php echo $donneeSexe['genre']; ?></option>
                    <?php } $selectSexe->closeCursor(); ?>
                </select>
            </div>
            <div class="group">
            <input type="submit" name="btnAdd" value="ADD"/>
            </div>
        </form>
    </div>
</body>
</html>