<?php
    // session start
    session_start();
    // include file connexion in bdd
    require "./../connexion.inc.php";
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        header("Location:./../index.php");
    } 
    // si le aprams get exist
    if(isset($_GET['ref'])){
        $queryArticle = $bdd->prepare("SELECT intitule, prix, description, photo, famillesID, reference FROM familles INNER JOIN articles  WHERE familles.id=articles.famillesID  and  reference = ?");
        $queryArticle->execute(array($_GET['ref']));
        $article = $queryArticle->fetch();
    }
    // query Menu deroulant
    $queryMenu = $bdd->query("SELECT * FROM familles");
    if(!empty($_GET['searchFamille'])){
        echo $_GET['searchFamille'];
    }
    if(isset($_POST['btnUpdate'])){
        if(!empty($_POST['reference'] && $_POST['prix'] && $_POST['description'] && $_POST['famillesID']))
        {
            $uploaddir = './../images/';
            $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
                $queryInsert = $bdd->prepare("UPDATE articles SET  prix=:prix, description=:description, photo=:photo, famillesID=:famillesID WHERE reference=:reference ");
                $queryInsert->bindParam(':prix', $_POST['prix']);
                $queryInsert->bindParam(':description', $_POST['description']);
                $queryInsert->bindParam(':photo', $_FILES['photo']['name']);
                $queryInsert->bindParam(':famillesID', $_POST['famillesID']);
                $queryInsert->bindParam(':reference', $_POST['reference']);

                $queryInsert->execute();
                echo"Success";
            } else {
                $queryInsert = $bdd->prepare("UPDATE articles SET  prix=:prix, description=:description, famillesID=:famillesID WHERE reference=:reference ");
                $queryInsert->bindParam(':prix', $_POST['prix']);
                $queryInsert->bindParam(':description', $_POST['description']);
                $queryInsert->bindParam(':famillesID', $_POST['famillesID']);
                $queryInsert->bindParam(':reference', $_POST['reference']);
                $queryInsert->execute();
                echo"Success not Photos";
            }
            header("Location:index.php");
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
                <input type="hidden" name="reference" id="reference" value="<?php if(isset($_GET['ref'])) echo $article['reference']; ?>" class="form-control">:  <span class="badge badge-warning"> <?php if(isset($_GET['ref'])) echo $article['reference']; ?>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="text" name="prix" id="prix" value="<?php if(isset($_GET['ref'])) echo $article['prix']; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?php if(isset($_GET['ref'])) echo nl2br(htmlspecialchars($article['description'])); ?></textarea>
            </div>
            <div class="form-group">
                <!-- <label for="photo">Photo</label> -->
                <?php if(isset($_GET['ref'])) { ?> <img src="./../images/<?php echo $article['photo']; ?>" class="img-thumbnail"/>  <?php } ?>
                <input type="file" class="form-control" name="photo" id="photo" value="<?php if(isset($_GET['ref'])) echo $article['photo']; ?>">
            </div>
            <div class="form-group">
                <label for="famillesID">Famille</label>
                <select class="form-control" name="famillesID" id="famillesID">
                    <option value="">Selectionner une famille</option>
                    <?php while($dataMenu = $queryMenu->fetch()){ ?>
                        <option <?php if(!isset($article['famillesID'])) $article['famillesID']=1; if($article['famillesID']==$dataMenu['id']) echo"selected='selected'"; ?> value="<?php  echo htmlspecialchars($dataMenu['id']); ?>"><?php echo htmlspecialchars($dataMenu['intitule']); ?></option>
                    <?php } $queryMenu->closeCursor(); ?>
                </select>
            </div>
            <input type="submit" class="btn btn-outline-warning" value="Modifier l'article" name="btnUpdate" id="btnUpdate">
        </form>
    </div>
    <footer class="bg-success text-white">
        <div class="container">
            <p><i class="fas fa-book-reader"></i> Copyright &copy; 2020 Tous droits Réservés</p>
        </div>
    </footer>
</body>
</html>