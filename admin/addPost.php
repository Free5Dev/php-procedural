<?php  

    require_once("../connexion.inc.php");
    var_dump($_POST);
    var_dump($_FILES);
    if(isset($_POST['btnAdd'])){
        
        if(!empty($_POST['nom'] && $_POST['prenom'] && $_POST['login'] && $_POST['password'] && $_POST['sexe']) && $_FILES['photo']['error']==0){

           copy($_FILES['photo']['tmp_name'], "../images/".$_FILES['photo']['name']);
           $insert=$bdd->prepare("
                INSERT INTO users (nom, prenom, login, password, photo, sexeId) VALUES (:nom, :prenom, :login, :password, :photo, :sexeId)
           ");
           $insert->bindParam(':nom', $_POST['nom']);
           $insert->bindParam(':prenom', $_POST['prenom']);
           $insert->bindParam(':login', $_POST['login']);
           $insert->bindParam(':password', $_POST['password']);
           $insert->bindParam(':photo', $_FILES['photo']['name']);
           $insert->bindParam(':sexeId', $_POST['sexe']);
           $insert->execute();
        }else{
            echo"Chmps vide ";
        }
    }
?>