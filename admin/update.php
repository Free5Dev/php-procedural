<?php 
    session_start();
    //include function connexion in bdd
    include "./../connexion.inc.php";
    
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        header("location:./../index.php");
    }
    // verfication de l'existance du params get
    if(isset($_GET['ref'])){
        // query select in prepare statement 
        $stmt = $bdd->prepare("SELECT reference, prix, description, photo, famillesID, intitule FROM articles as a INNER JOIN familles as f WHERE a.famillesID = f.id AND reference = ?");
        $stmt->bindParam(1, $_GET['ref']);
        $stmt->execute();
        $rowGet = $stmt->fetch();
    }else{
        header("location:./index.php");
    }
    // soumission du formulaire
    if(isset($_POST['btnUpdate'])){
        // verification si saisie de champs
        if(!empty($_POST['prix'] && $_POST['description'])){
            $uploaddir = './../images/';
            $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
            if(move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)){
                $stmtUpdate = $bdd->prepare("UPDATE  articles SET prix = :prix, description = :description, photo = :photo, famillesID = :famillesID WHERE reference = :reference");
                $stmtUpdate->bindParam(':prix', $_POST['prix']);
                $stmtUpdate->bindParam(':description', $_POST['description']);
                $stmtUpdate->bindParam(':photo', $_FILES['photo']['name']);
                $stmtUpdate->bindParam(':famillesID', $_POST['famille']);
                $stmtUpdate->bindParam(':reference', $_POST['reference']);
            }else{
                $stmtUpdate = $bdd->prepare("UPDATE  articles SET prix = :prix, description = :description, famillesID = :famillesID WHERE reference = :reference");
                $stmtUpdate->bindParam(':prix', $_POST['prix']);
                $stmtUpdate->bindParam(':description', $_POST['description']);
                $stmtUpdate->bindParam(':famillesID', $_POST['famille']);
                $stmtUpdate->bindParam(':reference', $_POST['reference']);
            }
            

            $stmtUpdate->execute();
            var_dump($_POST);
            var_dump($_FILES);
            header("Location:./index.php");
            
        }else{
            $chps="The fields is empty please check all fields";
        }
    }
    // query menu deroulant
    $sqlMenu = $bdd->query("SELECT * FROM familles");
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Describe</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="./../style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
    <div id="main_page">
        <!-- header -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="index.php">K.<span class="text-warning">B</span></span>.<span class="text-danger">Z</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarColor01">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php?logout=ok" title="Deconnecteez-vous"><span class="text-warning">Decon</span>nexion</a>
                    </li>
                  </ul>
                </div>
            </nav>
        </header>
        <!-- body -->
        <section>
            <div class="container bg-light mb-0 mt-2">
                <a href="./index.php" class="btn btn-primary mb-2 mt-2">Retour...! </a> 
                <h1>Formulaire de modification d'Article:  <strong class="text-danger"><?php echo $rowGet['reference']; ?></strong></h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <?php  
                        if(isset($chps)){
                            var_dump($_FILES);
                            ?>
                            <div class="alert alert-danger"><?php echo $chps; ?></div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <label for="reference">Reference (<span class="text-danger">*</span>)</label>
                        <input type="text" name="reference" id="reference" class="form-control" value="<?php echo $rowGet['reference']; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix (&euro;)</label>
                        <input type="number" min="0" name="prix" id="prix" class="form-control" value="<?php echo $rowGet['prix']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Détails(<span class="text-danger">*</span>)</label>
                        <textarea name="description" id="description" class="form-control"><?php echo nl2br($rowGet['description']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo(<span class="text-danger">*</span>)</label>
                        <input type="file" name="photo" id="photo" class="form-control-file" value="<?php echo $rowGet['photo'];  ?>">
                        <br>
                        <img src="./../images/<?php echo $rowGet['photo'];  ?>" alt="<?php echo $rowGet['photo']; ?>" class="img-thumbnail" width="200" height="200">
                    </div>
                    <div class="form-group">
                        <label for="famille">Famille</label>
                        <select class="form-control" name="famille" id="famille">
                            <?php while($rowMenu = $sqlMenu->fetch()) { ?>
                                <option <?php if(!isset($rowGet['famillesID'])) $rowGet['famillesID']= 1; if($rowGet['famillesID'] == $rowMenu['id']) echo "selected='selected'"; ?> value="<?php echo $rowMenu['id']; ?>"><?php echo $rowMenu['intitule']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button  type="submit" name="btnUpdate" onclick="return confirm('Confirmer la Modification ?')"  class="btn btn-primary mb-2">Modification de  l'article</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- footer include  -->
        <?php include "./../footer.inc.php" ?>
    </div>
</body>
</html>