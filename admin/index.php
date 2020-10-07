<?php 
    // session start
    session_start();
    // include file connexion in bdd
    require "./../connexion.inc.php";
    if(isset($_GET['logout'])){
        unset($_SESSION['login']);
        unset($_SESSION['password']);
    }
    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        header("Location:./../index.php");
    }
    // suppression 
    if(isset($_GET['ref']) && $_GET['supp']=="ok"){
        // querySupp
        $querySupp =  $bdd->prepare("DELETE FROM articles WHERE reference = ?");
        $querySupp->execute(array($_GET['ref']));
    }
    // query select in bdd
    $queryArticles = $bdd->query("SELECT * FROM articles");
    // search an article
    if(!empty($_GET['searchArticle'])){
        // query select in bdd
        $queryArticles = $bdd->prepare("SELECT  reference, prix, description FROM articles  WHERE reference LIKE ?");
        $queryArticles->execute(array("%".$_GET['searchArticle']."%"));
    }
    // query Menu deroulant
    $queryMenu = $bdd->query("SELECT * FROM familles");
    if(!empty($_GET['searchFamille'])){
        echo $_GET['searchFamille'];
    }
    // search an famille
    if(!empty($_GET['searchFamille'])){
        // query select in bdd
        $queryArticles = $bdd->prepare("SELECT  reference, prix, description, famillesID FROM familles INNER JOIN  articles  WHERE familles.id=articles.famillesID and  famillesID= ?");
        $queryArticles->execute(array($_GET['searchFamille']));
    }
    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <link rel="stylesheet" href="./../style.css">
    <title>Admin | CRUD</title>
</head>
<body>
    <header class="bg-success text-white">
        <div class="container d-flex justify-content-between align-items-center">
            <h1><i class="fas fa-book-reader"></i> ZBOOK</h1>
            <a href="index.php?logout=ok" class="text-white">Deconnexion</a>
        </div>
    </header>
    <div class="container m-5">
        <a href="create.php" class="btn btn-outline-success"><i class="fas fa-plus-circle"></i> Ajout Article</a>
        <form action="index.php" method="get" class="form-inline">
            <label for="searchArticle">Recherche d'Article</label>
            <input type="text" name="searchArticle" id="searchArticle" placeholder="Recherche..." value="<?php if(isset($_GET['btnSearch'])) echo $_GET['searchArticle'] ?>" class="form-control m-3"> 
            <select name="searchFamille" id="searchFamille" class="form-control m-3">
                    <option value="">Selectionner une Categorie</option>
                    <?php while($dataMenu = $queryMenu->fetch()){ ?>
                        <option value="<?php echo htmlspecialchars($dataMenu['id']); ?>"><?php echo htmlspecialchars($dataMenu['intitule']); ?></option>
                    <?php } $queryMenu->closeCursor(); ?>
            </select>
            <button type="submit"  name="btnSearch" id="btnSearch" class="btn btn-outline-success"><i class="fas fa-search"></i>Recherche </button>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#Reference</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Details</th>
                    <th>Modification</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <tbody>
                <?php while($articles = $queryArticles->fetch()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($articles['reference']); ?></td>
                    <td><?php echo htmlspecialchars($articles['prix']); ?></td>
                    <td><?php echo htmlspecialchars($articles['description']); ?></td>
                    <td><a href="describe.php?ref=<?php echo htmlspecialchars($articles['reference']); ?>" class="btn btn-outline-info"><i class="fas fa-dumbbell"></i> Détails</a></td>
                    <td><a href="update.php?ref=<?php echo htmlspecialchars($articles['reference']); ?>" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i> Modification</a></td>
                    <td><a href="index.php?ref=<?php echo htmlspecialchars($articles['reference']); ?>&amp;supp=ok" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Suppression</a></td>
                </tr>
                <?php } $queryArticles->closeCursor(); ?>
            </tbody>
        </table>
    </div>
    <footer class="bg-success text-white">
        <div class="container">
            <p><i class="fas fa-book-reader"></i> Copyright &copy; 2020 Tous droits Réservés</p>
        </div>
    </footer>
</body>
</html>