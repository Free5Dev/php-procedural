<?php
    // session start
    session_start();
    // include file connexion in bdd
    require "./../connexion.inc.php";
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        header("Location:./../index.php");
    } 
    // query Menu deroulant
    $queryMenu = $bdd->query("SELECT * FROM familles");
    if(!empty($_GET['searchFamille'])){
        echo $_GET['searchFamille'];
    }
    if(isset($_POST['btnCreate'])){
        if(!empty($_POST['reference'] && $_POST['prix'] && $_POST['description'] && $_POST['famillesID']))
        {
            $uploaddir = './../images/';
            $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
                $queryInsert = $bdd->prepare("INSERT INTO articles (reference, prix, description, photo, famillesID) VALUES (:reference, :prix, :description, :photo, :famillesID)");
                $queryInsert->bindParam(':reference', $_POST['reference']);
                $queryInsert->bindParam(':prix', $_POST['prix']);
                $queryInsert->bindParam(':description', $_POST['description']);
                $queryInsert->bindParam(':photo', $_FILES['photo']['name']);
                $queryInsert->bindParam(':famillesID', $_POST['famillesID']);
                $queryInsert->execute();
                echo"Success";
            } else {
                $queryInsert = $bdd->prepare("INSERT INTO articles (reference, prix, description, famillesID) VALUES (:reference, :prix, :description, :famillesID)");
                $queryInsert->bindParam(':reference', $_POST['reference']);
                $queryInsert->bindParam(':prix', $_POST['prix']);
                $queryInsert->bindParam(':description', $_POST['description']);
                $queryInsert->bindParam(':famillesID', $_POST['famillesID']);
                $queryInsert->execute();
                echo"Success not Photos";
            }
        }else{
            echo"The field's empty";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Create</title>
</head>
<body>
    <a href="index.php">Retour</a>
    <a href="index.php?logout=ok">Deconnexion</a>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="reference">Reference</label>
            <input type="text" name="reference" id="reference">
        </div>
        <div>
            <label for="prix">Prix</label>
            <input type="text" name="prix" id="prix">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo">
        </div>
        <div>
            <label for="famillesID">Famille</label>
            <select name="famillesID" id="famillesID">
                <option value="">Selectionner une famille</option>
                <?php while($dataMenu = $queryMenu->fetch()){ ?>
                    <option value="<?php echo htmlspecialchars($dataMenu['id']); ?>"><?php echo htmlspecialchars($dataMenu['intitule']); ?></option>
                <?php } $queryMenu->closeCursor(); ?>
            </select>
        </div>
        <input type="submit" value="Ajouté l'article" name="btnCreate" id="btnCreate">
    </form>
</body>
</html>