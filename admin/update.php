<?php
    session_start();
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        header("Location:../index.php");
    }
    require_once("../connexion.inc.php");
    // var_dump($_POST);
    // var_dump($_FILES);

    if(isset($_GET['id'])){
        $selectGet=$bdd->prepare("SELECT * FROM users WHERE id = ?");
        $selectGet->execute(array($_GET['id']));
       
        $donneesGet=$selectGet->fetch();
        // $_SESSION['photo']=$donneesGet['photo'];
    }else{
        header("Location:index.php");
    }

    if(isset($_POST['btnUpdate'])){
        
        if(!empty($_POST['nom'] && $_POST['prenom'] && $_POST['login']  && $_POST['sexe'])){

           if($_FILES['photo']['error']==0){
                copy($_FILES['photo']['tmp_name'], "../images/".$_FILES['photo']['name']);
                $insert=$bdd->prepare("
                    UPDATE users SET nom= :nom, prenom= :prenom, login= :login, photo= :photo, sexeId= :sexeId WHERE id= :id
                ");

                $insert->bindParam(':nom', $_POST['nom']);
                $insert->bindParam(':prenom', $_POST['prenom']);
                $insert->bindParam(':login', $_POST['login']);
                //$insert->bindParam(':password', $_POST['password']);
                $insert->bindParam(':photo', $_FILES['photo']['name']);
                $insert->bindParam(':sexeId', $_POST['sexe']);
                $insert->bindParam(':id', $_POST['id']);
           }else{

            $insert=$bdd->prepare("
                UPDATE users SET nom= :nom, prenom= :prenom, login= :login, sexeId= :sexeId WHERE id= :id
            ");

            $insert->bindParam(':nom', $_POST['nom']);
            $insert->bindParam(':prenom', $_POST['prenom']);
            $insert->bindParam(':login', $_POST['login']);
            //$insert->bindParam(':password', $_POST['password']);
            $insert->bindParam(':sexeId', $_POST['sexe']);
            $insert->bindParam(':id', $_POST['id']);
           }
            
           
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
    <title>UPDATE USER</title>
</head>
<body>
     <!-- include header-->
     <?php 
        include("../header.inc.php");
    ?>
     <!-- main page -->
    
    <div id="main_page">

        <form action="update.php" method="post" enctype="multipart/form-data">
            <?php if(isset($_GET['id'])) echo $donneesGet['photo']; ?><br/>
            <img src="../images/<?php  echo $donneesGet['photo']; ?>" alt="<?php if(isset($_GET['id'])) echo $donneesGet['photo']; ?>" style="border:1px solid #000; width:200px;">
            <div class="group">
                <label for="id"></label><input type="hidden" name="id" value="<?php if(isset($_GET['id'])) echo $donneesGet['id']; ?>" id="id">
            </div>
            <div class="group">
                <label for="nom">Nom</label><input type="text" name="nom" value="<?php  echo $donneesGet['nom']; ?>" id="nom">
            </div>
            <div class="group">
                <label for="prenom">Prenom</label><input type="text" name="prenom" id="prenom" value="<?php  echo $donneesGet['prenom']; ?>">
            </div>
            <div class="group">
                <label for="login">Login</label><input type="text" name="login" id="login" value="<?php  echo $donneesGet['login']; ?>">
            </div>
            <!-- <div class="group">
                <label for="password">Password</label><input type="password" name="password" id="password">
            </div> -->
           
        
            <div class="group">
                <label for="photo">Download Photo</label><input type="file" name="photo" id="photo" >
            </div>
            
            <div class="group">
                <label for="sexe">Sexe</label>
                <select name="sexe" id="sexe">
                    <?php while($donneeSexe=$selectSexe->fetch()) { ?>
                        <option <?php if(!isset($donneesGet['sexeId'])) $donneesGet['sexeId']=1; if($donneesGet['sexeId']==$donneeSexe['id']) echo"selected='selected'"; ?> value="<?php echo $donneeSexe['id']; ?>"><?php echo $donneeSexe['genre']; ?></option>
                    <?php } $selectSexe->closeCursor(); ?>
                </select>
            </div>
            <div class="group">
                <input type="submit" name="btnUpdate" value="UPDATE"/>
            </div>
            
        </form>
    </div>
</body>
</html>