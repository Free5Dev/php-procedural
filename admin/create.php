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
                header("Location:index.php");
            } else {
                $queryInsert = $bdd->prepare("INSERT INTO articles (reference, prix, description, famillesID) VALUES (:reference, :prix, :description, :famillesID)");
                $queryInsert->bindParam(':reference', $_POST['reference']);
                $queryInsert->bindParam(':prix', $_POST['prix']);
                $queryInsert->bindParam(':description', $_POST['description']);
                $queryInsert->bindParam(':famillesID', $_POST['famillesID']);
                $queryInsert->execute();
                header("Location:index.php");
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./../style.css">
    <title>Admin | Create</title>
</head>
<body>
    <header class="bg-success text-white">
        <div class="container d-flex justify-content-between align-items-center">
            <h1><i class="fas fa-book-reader"></i> ZBOOK</h1>
            <a href="index.php?logout=ok" class="text-white">Deconnexion</a>
        </div>
    </header>
    <div class="container m-5">
        <a href="index.php" class="btn btn-outline-success">Retour</a>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="reference">Reference</label>
                <input type="text" name="reference" id="reference" class="form-control">
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="text" name="prix" id="prix" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>
            <div class="form-group">
                <label for="famillesID">Famille</label>
                <select name="famillesID" id="famillesID" class="form-control">
                    <option value="">Selectionner une famille</option>
                    <?php while($dataMenu = $queryMenu->fetch()){ ?>
                        <option value="<?php echo htmlspecialchars($dataMenu['id']); ?>"><?php echo htmlspecialchars($dataMenu['intitule']); ?></option>
                    <?php } $queryMenu->closeCursor(); ?>
                </select>
            </div>
            <input type="submit" value="Ajouté l'article" class="btn btn-outline-success" name="btnCreate" id="btnCreate">
        </form>
    </div>
    <footer class="bg-success text-white">
        <div class="container">
            <p><i class="fas fa-book-reader"></i> Copyright &copy; 2020 Tous droits Réservés</p>
        </div>
    </footer>
</body>
</html>