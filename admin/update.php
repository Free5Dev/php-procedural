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
    <title>Admin | Create</title>
</head>
<body>
    <a href="index.php">Retour</a>
    <a href="index.php?logout=ok">Deconnexion</a>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="reference">Reference</label>
            <input type="hidden" name="reference" id="reference" value="<?php if(isset($_GET['ref'])) echo $article['reference']; ?>" >: <?php if(isset($_GET['ref'])) echo $article['reference']; ?>
        </div>
        <div>
            <label for="prix">Prix</label>
            <input type="text" name="prix" id="prix" value="<?php if(isset($_GET['ref'])) echo $article['prix']; ?>" >
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"><?php if(isset($_GET['ref'])) echo nl2br(htmlspecialchars($article['description'])); ?></textarea>
        </div>
        <div>
            <label for="photo">Photo</label>
            <?php if(isset($_GET['ref'])) { ?> <img src="./../images/<?php echo $article['photo']; ?>" />  <?php } ?>
            <input type="file" name="photo" id="photo" value="<?php if(isset($_GET['ref'])) echo $article['photo']; ?>">
        </div>
        <div>
            <label for="famillesID">Famille</label>
            <select name="famillesID" id="famillesID">
                <option value="">Selectionner une famille</option>
                <?php while($dataMenu = $queryMenu->fetch()){ ?>
                    <option <?php if(!isset($article['famillesID'])) $article['famillesID']=1; if($article['famillesID']==$dataMenu['id']) echo"selected='selected'"; ?> value="<?php  echo htmlspecialchars($dataMenu['id']); ?>"><?php echo htmlspecialchars($dataMenu['intitule']); ?></option>
                <?php } $queryMenu->closeCursor(); ?>
            </select>
        </div>
        <input type="submit" value="Modifier l'article" name="btnUpdate" id="btnUpdate">
    </form>
</body>
</html>